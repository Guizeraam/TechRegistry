<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}

include("Connections/conecta.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
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

    $query = "UPDATE maquinas SET
        nome_maquina = ?, nome_usr_setor = ?, modelo = ?, programas = ?, especificacoes = ?, ip = ?,
        mac_ethernet = ?, mac_wifi = ?, st = ?, anydesk = ?, user_ad = ?, certificados = ?,
        licenca_terceiros = ?, etiqueta = ?, ramal = ?
        WHERE id = ?";

    $stmt = mysqli_prepare($conecta, $query);
    mysqli_stmt_bind_param($stmt, 'sssssssssssssssi',
        $nome_maquina, $nome_usr_setor, $modelo, $programas, $especificacoes, $ip,
        $mac_ethernet, $mac_wifi, $st, $anydesk, $user_ad, $certificados,
        $licenca_terceiros, $etiqueta, $ramal, $id
    );

    if (mysqli_stmt_execute($stmt)) {
        // Redireciona após atualização
        echo "<p style='color:green;'>Atualização feita com sucesso! Redirecionando...</p>";
        echo "<script>setTimeout(() => { window.location.href = 'home.php'; }, 2000);</script>";
    } else {
        echo "Erro ao atualizar: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}
?>
