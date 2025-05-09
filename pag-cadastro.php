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
    <link rel="stylesheet" href="recursos/CSS/cadastro.css">
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

    <div class="cadastro"> 
        <h2>Cadastro de Nova Máquina</h2>
        <form method="post" action="cadastro.php">
            <h3>Patrimonio</h3>
            <input type="text" name="patrimonio" placeholder="Nº Património"><br>
            <h3>Nome da máquina</h3>
            <input type="text" name="nome_maquina" placeholder="Nome da máquina" required><br>
            <h3>Nome - Setor</h3>
            <input type="text" name="nome_usr_setor" placeholder="Nome - Setor" required><br>
            <h3>Modelo</h3>
            <input type="text" name="modelo" placeholder="modelo do PC" required><br>
            <h3>Programas</h3>
            <input type="text" name="programas" placeholder="Programas" required><br>
            <h3>Especificações</h3>
            <input type="text" name="especificacoes" placeholder="Processador/ Ram/ Sistema" required><br>
            <h3>IP</h3>
            <input type="text" name="ip" placeholder="000.000.0.000" required><br>
            <h3>MAC Ethernet</h3>
            <input type="text" name="mac_ethernet" placeholder="XX-XX-XX-XX-XX-XX"><br>
            <h3>MAC wifi</h3>
            <input type="text" name="mac_wifi" placeholder="XX-XX-XX-XX-XX-XX"><br>
            <h3>ST</h3>
            <input type="text" name="st" placeholder="XXXXXXX"><br>
            <h3>AnyDesk</h3>
            <input type="text" name="anydesk" placeholder="0 000 000 000"><br>
            <h3>Usuário ad</h3>
            <input type="text" name="user_ad" placeholder="Sim ou Não?"><br>
            <h3>Certificados</h3>
            <input type="text" name="certificados" placeholder="Certificados"><br>
            <h3>Licença de terceiros</h3>
            <input type="text" name="licenca_terceiros" placeholder="Sim ou Não?"><br>
            <h3>Etiqueta</h3>
            <input type="text" name="etiqueta" placeholder="Sim ou Não?"><br>
            <h3>Ramal</h3>
            <input type="text" name="ramal" placeholder="0000"><br>
            
            <button type="submit" name="enviar">Salvar</button>
        </form>
    </div>
     
</body>
</main>
<footer class="rodape">
GuilhermeFerraz © <?= date('Y'); ?>
</html>