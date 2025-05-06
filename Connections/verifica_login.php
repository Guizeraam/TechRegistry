<?php
session_start();
include("conecta.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM tb_usuario WHERE usuario = ?";
$stmt = mysqli_prepare($conecta, $sql);
mysqli_stmt_bind_param($stmt, "s", $usuario);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($user = mysqli_fetch_assoc($result)) {
    if (password_verify($senha, $user['senha'])) {
        $_SESSION['usuario'] = $user['usuario'];
        header("Location: ../home.php");
        exit();
    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Usuário não encontrado.";
}
$result = mysqli_query($conecta, "SELECT * FROM tb_usuario");
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['usuario'] . " - " . $row['senha'] . "<br>";
}

?>