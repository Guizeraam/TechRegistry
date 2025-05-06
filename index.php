<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('Connections/conecta.php');
require_once('Connections/VALIDA.php');
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
                    $_SESSION['usuario'] = $row['usuario'];
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

                            // Recupera os grupos do usuário e armazena na sessão
                            $stmtGrupos = $conecta->prepare("SELECT grupo_id FROM tb_usuario_grupo WHERE usuario_id = ?");
                            $stmtGrupos->bind_param("i", $row['id']);
                            $stmtGrupos->execute();
                            $resultGrupos = $stmtGrupos->get_result();

                            $grupos = [];
                            while ($grupo = $resultGrupos->fetch_assoc()) {
                                $grupos[] = $grupo['grupo_id'];
                            }
                            $_SESSION['grupos'] = $grupos; // Armazena os grupos na sessão

                            echo "<meta http-equiv='refresh' content='0; url=../home.php'>";
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

        $stmt_update_log = $conecta->prepare("UPDATE tb_usuario_log SET hora_saida = ?, tempo_ativo = ? WHERE id = ?");
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
<!-- Inicio HTML -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="recursos/img/iconLajes.png">
  <link rel="stylesheet" href="recursos/CSS/estiloT.css">
  <title>Login - Lajes Patagonia</title>
</head>
<body>
  <div class="login-container">
    <h1>LOGIN</h1>
    <form name="logar" method="POST" action="?go=logar">
  <label for="username">Usuário</label>
  <input type="text" id="username" name="usuario" placeholder="Digite o seu usuário">

  <label for="password">Senha</label>
  <input type="password" id="password" name="senha" placeholder="Digite sua senha">

  <button type="submit">Entrar</button>

  <div class="forgot-password">
    <a href="#">Esqueceu a senha?</a>
  </div>
</form>
  </div>
</body>
</html>
