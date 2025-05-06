<?php
include("Connections/conecta.php");

// Dados do usuário que você quer atualizar
$usuario = 'guilherme.ferraz';
$senha_plana = 'sejwck34';

// Gera o hash seguro da senha
$senha_hash = password_hash($senha_plana, PASSWORD_DEFAULT);

// Atualiza no banco de dados
$sql = "UPDATE tb_usuario SET senha = ? WHERE usuario = ?";
$stmt = mysqli_prepare($conecta, $sql);
mysqli_stmt_bind_param($stmt, "ss", $senha_hash, $usuario);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "Senha atualizada com sucesso!";
} else {
    echo "Erro: usuário não encontrado ou senha já está atualizada.";
}
?>
