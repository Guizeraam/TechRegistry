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
    <header class="cabecalho">
    </header>
    <main class="principal">
    <div class="navbar">
        <a href="Home.php">Home</a>
        <a href="pag-cadastro.php">Cadastrar</a>
        <a href="logout.php">Sair</a>
        <h3 class="nome-direita">Bem-vindo, <?php echo $_SESSION['usuario']; ?>!</h3>
    </div>
        <div class="conteudo">  
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Nome da máquina</th>
                    <th scope="col">Nome - setor</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Programas utilizados</th>
                    <th scope="col">Especificações</th>
                    <th scope="col">Ip</th>
                    <th scope="col">MAC ETHERNET</th>
                    <th scope="col">MAC WIFI</th>
                    <th scope="col">ST</th>
                    <th scope="col">AnyDesk</th>
                    <th scope="col">User ad</th>
                    <th scope="col">Certificados</th>
                    <th scope="col">Licença de terceiros</th>
                    <th scope="col">Etiqueta</th>
                    <th scope="col">Ramal</th>
                    <th scope="col">Ações</th>
                     </tr>
                </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>". $user_data["nome_maquina"] . "</td>";
                        echo "<td>". $user_data["nome_usr_setor"] . "</td>";
                        echo "<td>". $user_data["modelo"] . "</td>";
                        echo "<td>". $user_data["programas"] . "</td>";
                        echo "<td>". $user_data["especificacoes"] . "</td>";
                        echo "<td>". $user_data["ip"] . "</td>";
                        echo "<td>". $user_data["mac_ethernet"] . "</td>";
                        echo "<td>". $user_data["mac_wifi"] . "</td>";
                        echo "<td>". $user_data["st"] . "</td>";
                        echo "<td>". $user_data["anydesk"] . "</td>";
                        echo "<td>". $user_data["user_ad"] . "</td>";
                        echo "<td>". $user_data["certificados"] . "</td>";
                        echo "<td>". $user_data["licenca_terceiros"] . "</td>";
                        echo "<td>". $user_data["etiqueta"] . "</td>";
                        echo "<td>". $user_data["ramal"] . "</td>";
                        echo "<td>
        <a href='editar.php?id=" . $user_data['id'] . "'>Editar</a> | 
        <a href='excluir.php?id=" . $user_data['id'] . "' onclick=\"return confirm('Tem certeza que deseja excluir esta máquina?');\">Excluir</a>
      </td>";

                    }              
                ?>
            </tbody>
            </table>
        </div>
    </div>
    </main>
    <footer class="rodape"></footer>
</body>
<footer class="rodape">
GuilhermeFerraz © <?= date('Y'); ?>
</html>

<?php
mysqli_close($conecta);
?>