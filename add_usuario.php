<?php
include("Connections/conecta.php"); // conexão com o banco

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha_plana = $_POST['senha'];

    // Gera o hash seguro da senha
    $senha_hash = password_hash($senha_plana, PASSWORD_DEFAULT);

    // Insere no banco
    $sql = "INSERT INTO tb_usuario (usuario, senha) VALUES (?, ?)";
    $stmt = mysqli_prepare($conecta, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $usuario, $senha_hash);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p style='color:green;'>Usuário cadastrado com sucesso!</p>";
    } else {
        echo "<p style='color:red;'>Erro: " . mysqli_stmt_error($stmt) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form method="POST">
        <label>Usuário:</label><br>
        <input type="text" name="usuario" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
