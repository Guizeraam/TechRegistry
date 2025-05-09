<?php
require_once('Connections/conecta.php');
require_once('Connections/VALIDA.php');

if (!isset($_SESSION)) {
    session_start();
}

// Define o fuso horário para Brasil
date_default_timezone_set('America/Sao_Paulo');

// Função para obter o IP do usuário
function getUserIpAddr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

$errorMessage = '';
if (isset($_GET['go']) && $_GET['go'] == 'logar') {
    $user = $_POST['usuario'];
    $pwd = $_POST['senha'];

    if (empty($user) || empty($pwd)) {
        $errorMessage = 'Preencha todos os campos para logar-se.';
    } else {
        // Consulta ao banco de dados
        $stmt = $conecta->prepare("SELECT * FROM tb_usuario WHERE usuario = ? AND senha = ?");

        if ($stmt) {
            $stmt->bind_param("ss", $user, $pwd);

            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $_SESSION['usuarioL'] = $row['usuario'];
                    $_SESSION['usuario_id'] = $row['id'];
                    $nome_usuario = $row['usuario'];

                    $ip_usuario = getUserIpAddr();
                    $url_login = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                    $hora_entrada = (new DateTime())->format('Y-m-d H:i:s');

                    // Insere os dados de log no banco e define status como 'online'
                    $sql_log = "INSERT INTO tb_usuario_log (usuario_id, ip, hora_entrada, nome, url_login) VALUES (?, ?, ?, ?, ?)";
                    $stmt_log = $conecta->prepare($sql_log);

                    if ($stmt_log) {
                        $stmt_log->bind_param("issss", $_SESSION['usuario_id'], $ip_usuario, $hora_entrada, $nome_usuario, $url_login);
                        if ($stmt_log->execute()) {
                            $_SESSION['log_id'] = $conecta->insert_id;
                            $_SESSION['hora_entrada'] = $hora_entrada;
                            echo "<meta http-equiv='refresh' content='0; url=/PROGRAMACAO/'>";
                        } else {
                            $errorMessage = 'Erro ao inserir log: ' . $stmt_log->error;
                        }
                        $stmt_log->close();
                    } else {
                        $errorMessage = 'Erro ao preparar a consulta de log: ' . $conecta->error;
                    }
                } else {
                    $errorMessage = 'Usuário ou senha incorretos :(';
                }
            } else {
                $errorMessage = 'Erro ao executar a consulta: ' . $stmt->error;
            }
            $stmt->close();
        } else {
            $errorMessage = 'Erro ao preparar a consulta de login: ' . $conecta->error;
        }
    }
}

// Função para registrar a saída do usuário e atualizar status para 'offline'
function registraSaida() {
    global $conecta;

    if (isset($_SESSION['log_id'])) {
        $log_id = $_SESSION['log_id'];
        
        $hora_saida = (new DateTime())->format('Y-m-d H:i:s');
        $hora_entrada = $_SESSION['hora_entrada'];

        $tempo_ativo = strtotime($hora_saida) - strtotime($hora_entrada);
        $tempo_ativo = gmdate("H:i:s", $tempo_ativo);

        $stmt_update_log = $conecta->prepare($sql_update_log);

        if ($stmt_update_log) {
            $stmt_update_log->bind_param("ssi", $hora_saida, $tempo_ativo, $log_id);
            if ($stmt_update_log->execute()) {
                session_destroy();
                echo "Sessão encerrada. Tempo ativo: " . $tempo_ativo;
            } else {
                echo "Erro ao atualizar log: " . $stmt_update_log->error;
            }
            $stmt_update_log->close();
        } else {
            echo "Erro ao preparar a consulta de atualização de log: " . $conecta->error;
        }
    } else {
        echo "Nenhum log encontrado para o usuário.";
    }
}

// Verifica se o logout foi requisitado
if (isset($_GET['logout']) && $_GET['logout'] == '1') {
    registraSaida();
    echo "<meta http-equiv='refresh' content='0; url=/index.php'>";
}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Perfil</title>
    <link rel="icon" type="image/png" href="src/logo2.png">
    <style>
        #error-message {
            background-color: red;
            color: white;
            padding: 10px;
            text-align: center;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            font-size: 18px;
            display: none;
        }
    </style>
</head>
<body>
    <main>
    <div id="error-message"><?php echo $errorMessage; ?></div>
        <div class="left-login">
            <img class="left-login-image" src="src/logo-pat.png" alt="Logo">
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1>LOGIN</h1>
                <form name="logar" method="POST" action="?go=logar">
                    <div class="textfield">
                        <label for="usuario">Usuário</label>
                        <input type="text" name="usuario" placeholder="Digite o seu usuário" required>
                    </div>
                    <div class="textfield">
                        <label for="password">Senha</label>
                        <div class="input-container">
                            <input type="password" name="senha" id="password" placeholder="Digite sua senha" required>
                            <i class="fas fa-eye" id="toggle"></i>
                        </div>
                    </div>
                    <button class="btn-login" type="submit" name="logar">Login</button>
                </form>
            </div>
        </div>
    </main>
    <script src="js/scriptpassword.js"></script>

    <script>
        // Exibe a mensagem de erro se houver
        const errorMessage = document.getElementById('error-message');
        if (errorMessage.innerText.trim() !== '') {
            errorMessage.style.display = 'block';
            setTimeout(function () {
                errorMessage.style.display = 'none';
            }, 5000); // Remove após 5 segundos
        }
    </script>
</body>
</html>
