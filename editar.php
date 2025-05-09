<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}

include("Connections/conecta.php");

if (!isset($_GET['id'])) {
    echo "ID da máquina não informado.";
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM maquinas WHERE id = ?";
$stmt = mysqli_prepare($conecta, $query);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
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
    <h2>Editar Máquina</h2>
    <form method="post" action="atualizar.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <input type="text" name="nome_maquina" value="<?php echo $row['nome_maquina']; ?>" required><br>
        <input type="text" name="nome_usr_setor" value="<?php echo $row['nome_usr_setor']; ?>" required><br>
        <input type="text" name="modelo" value="<?php echo $row['modelo']; ?>" required><br>
        <input type="text" name="programas" value="<?php echo $row['programas']; ?>" required><br>
        <input type="text" name="especificacoes" value="<?php echo $row['especificacoes']; ?>" required><br>
        <input type="text" name="ip" value="<?php echo $row['ip']; ?>" required><br>
        <input type="text" name="mac_ethernet" value="<?php echo $row['mac_ethernet']; ?>"><br>
        <input type="text" name="mac_wifi" value="<?php echo $row['mac_wifi']; ?>"><br>
        <input type="text" name="st" value="<?php echo $row['st']; ?>"><br>
        <input type="text" name="anydesk" value="<?php echo $row['anydesk']; ?>"><br>
        <input type="text" name="user_ad" value="<?php echo $row['user_ad']; ?>"><br>
        <input type="text" name="certificados" value="<?php echo $row['certificados']; ?>"><br>
        <input type="number" name="licenca_terceiros" value="<?php echo $row['licenca_terceiros']; ?>"><br>
        <input type="text" name="etiqueta" value="<?php echo $row['etiqueta']; ?>"><br>
        <input type="text" name="ramal" value="<?php echo $row['ramal']; ?>"><br>

        <button type="submit">Atualizar</button>
    </form>
<?php
} else {
    echo "Máquina não encontrada.";
}
?>
