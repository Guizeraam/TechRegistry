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
    <link rel="icon" type="image/png" href="recursos/img/iconLajes.png">
    <link rel="stylesheet" href="recursos/CSS/estiloHome.css">
    <title>Lista de Máquinas</title>
</head>
<body>
    <header class="cabecalho">
    </header>
    <main class="principal">
    <div class="navbar">
        <a href="#home">Cadastrar</a>
        <a href="#news">Alterar</a>
        <a href="logout.php">Sair</a>
        <h3 class="nome-direita">Bem-vindo, <?php echo $_SESSION['usuario']; ?>!</h3>
    </div>
        <div class="conteudo">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                     </tr>
                </thead>
            <tbody>
            </tbody>
            </table>
        <!-- //    if (mysqli_num_rows($result) > 0) {
        //     // Iterar pelos resultados
        //     echo "<table>";
        //     echo "<tr><th>ID</th><th>Ip</th><th>Anydesk</th></tr>";
        //     while($row = mysqli_fetch_assoc($result)) {
        //         echo "<tr><td>" . $row["id"]. "</td><td>" . $row["ip"]. "</td><td>" . $row["anydesk"]. "</td></tr>";
        //     }
        //     echo "</table>";
        // } else {
        //     echo "Nenhum resultado encontrado";
        // }
         -->
        </div>
    </main>
</body>
<footer class="rodape">
GuilhermeFerraz © <?= date('Y'); ?>
</html>

<?php
mysqli_close($conecta);
?>
