<?php
require("Connections/conecta.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $nome_maquina = $_POST['nome_maquina'];
    $nome_usr_setor = $_POST['nome_usr_setor'];
    $modelo = $_POST['modelo'];
    $programas = $_POST['programas'];
    $especificacoes = $_POST['especificacoes'];
    $ip = $_POST['ip'];
    $mac_ethernet = $_POST['mac_ethernet'];
    $mac_wifi = $_POST['mac_wifi'];
    $st = $_POST['st'];
    $anydesk = $_POST['anydesk'];
    $user_ad = $_POST['user_ad'];
    $certificados = $_POST['certificados'];
    $licenca_terceiros = $_POST['licenca_terceiros'];
    $etiqueta = $_POST['etiqueta'];
    $ramal = $_POST['ramal'];

    // Prepara e executa a query
    $query = "INSERT INTO maquinas (
        nome_maquina, nome_usr_setor, modelo, programas, especificacoes, ip,
        mac_ethernet, mac_wifi, st, anydesk, user_ad, certificados,
        licenca_terceiros, etiqueta, ramal
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conecta, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sssssssssssssss',
            $nome_maquina, $nome_usr_setor, $modelo, $programas, $especificacoes,
            $ip, $mac_ethernet, $mac_wifi, $st, $anydesk, $user_ad,
            $certificados, $licenca_terceiros, $etiqueta, $ramal
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "<p style='color:green;'>Cadastro realizado com sucesso! Redirecionando para a home...</p>";
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'home.php';
                    }, 3000); // 3000ms = 3 segundos
                  </script>";
            exit();
        }
         else {
            echo "<p style='color:red;'>Erro ao cadastrar: " . mysqli_stmt_error($stmt) . "</p>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<p style='color:red;'>Erro ao preparar a consulta: " . mysqli_error($conecta) . "</p>";
    }
}

