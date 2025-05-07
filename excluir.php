<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}

include("Connections/conecta.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM maquinas WHERE id = ?";
    $stmt = mysqli_prepare($conecta, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: home.php");
        exit();
    } else {
        echo "Erro ao excluir: " . mysqli_stmt_error($stmt);
    }
} else {
    echo "ID não informado.";
}
?>
