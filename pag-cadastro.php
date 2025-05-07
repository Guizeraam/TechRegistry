<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}

include("Connections/conecta.php"); // Inclui a conexão com o banco

// Executa a consulta
$query = "SELECT * FROM maquinas ORDER BY id DESC";
$result = mysqli_query($conecta, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="recursos/img/iconLajes.png">
    <link rel="stylesheet" href="recursos/CSS/estiloHome.css">
    <title>Lista de Máquinas</title>
</head>

<body>
    <header class="cabecalho"></header>
    <main class="principal">
    <div class="navbar">
        <a href="Home.php">Home</a>
        <a href="cadastro.php">Cadastrar</a>
        <a href="logout.php">Sair</a>
        <h3 class="nome-direita">Bem-vindo, <?php echo $_SESSION['usuario']; ?>!</h3>
    </div>
        <h2>Cadastro de Nova Máquina</h2>
        <form method="post" action="cadastro.php">
            <input type="text" name="nome_maquina" placeholder="Nome da máquina" required><br>
            <input type="text" name="nome_usr_setor" placeholder="Nome/Setor" required><br>
            <input type="text" name="modelo" placeholder="Modelo" required><br>
            <input type="text" name="programas" placeholder="Programas" required><br>
            <input type="text" name="especificacoes" placeholder="Especificações" required><br>
            <input type="text" name="ip" placeholder="IP" required><br>
            <input type="text" name="mac_ethernet" placeholder="MAC Ethernet"><br>
            <input type="text" name="mac_wifi" placeholder="MAC WiFi"><br>
            <input type="text" name="st" placeholder="ST"><br>
            <input type="text" name="anydesk" placeholder="AnyDesk"><br>
            <input type="text" name="user_ad" placeholder="Usuário AD"><br>
            <input type="text" name="certificados" placeholder="Certificados"><br>
            <input type="number" name="licenca_terceiros" placeholder="Licença de terceiros"><br>
            <input type="text" name="etiqueta" placeholder="Etiqueta"><br>
            <input type="text" name="ramal" placeholder="Ramal"><br>
            <button type="submit" name="enviar">Salvar</button>
        </form>
</body>