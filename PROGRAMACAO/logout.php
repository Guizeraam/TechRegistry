<?php
// Inclui a conexão com o banco
include_once(__DIR__ . '/LOGIN/Connections/conecta.php');

session_start();

// Define o fuso horário para São Paulo (Brasil)
date_default_timezone_set('America/Sao_Paulo');

// Função para registrar a saída do usuário
function registraSaida() {
    global $conecta;

    if (isset($_SESSION['log_id'])) {
        $log_id = $_SESSION['log_id'];
        
        // Obtem a data e hora atual no fuso horário definido
        $hora_saida = date('Y-m-d H:i:s');
        $hora_entrada = $_SESSION['hora_entrada'];

        // Calcula o tempo ativo
        $tempo_ativo = strtotime($hora_saida) - strtotime($hora_entrada);
        $duracao_formatada = gmdate("H:i:s", $tempo_ativo);

        // Atualiza o log com a hora de saída e tempo ativo
        $sql_update_log = "UPDATE tb_usuario_log SET hora_saida = ?, tempo_ativo = ? WHERE id = ?";
        $stmt_update_log = $conecta->prepare($sql_update_log);

        if ($stmt_update_log) {
            $stmt_update_log->bind_param("ssi", $hora_saida, $duracao_formatada, $log_id);
            if ($stmt_update_log->execute()) {
                // Destrói a sessão
                session_destroy();
                // Redireciona para a página de login com uma mensagem
                header(header("Location: ./LOGIN/index.php"));
                exit(); // Certifique-se de parar a execução do script
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

// Chama a função para registrar a saída
registraSaida();
?>
