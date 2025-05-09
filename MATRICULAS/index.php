<?php
// CONSTANTES DE DEFINICAO DOS DADOS DE CONEXAO COM BANCO DE DADOS

define('DB_HOST'        , "192.168.2.166");
define('DB_USER'        , "usrConsulta");
define('DB_PASSWORD'    , "totvs@123");
define('DB_NAME'        , "dbprod");
define('DB_DRIVER'      , "sqlsrv");

// -- VARIAVEIS DEFINIDAS PELOS INPUTS PARA MUDAR CONSULTA AO BANCO DE DADOS

//$matricul = $_GET['matricul']??'';
//$nome     = $GET['nome']??'';

$nomes = isset($_GET['n_nome']) ? $_GET['n_nome'] : '';
$name  = strtoupper($nomes);
$matriculas = '';


// print_r(PDO::getAvailableDrivers());


//CHAMADA DO ARQUIVO DE CONEXAO AO BANCO

require_once "config.php";

try{

      
    
    // VARIAVEL SENDO ATRIBUIDA COM METODO DE CONEXAO
    $Conexao = Conexao::getConnection();
    
    //CONSULTA AO BANCO

    if ($name <> '') {
      
    

    $query1     = $Conexao->query("SELECT * FROM SRA010 WHERE RA_NOME LIKE '%$name%' AND D_E_L_E_T_=''
    AND RA_SITFOLH IN ('A','F','') ORDER BY RA_NOME");

    //CONSULTA PARA COMBOBOX
    //$query      = $Conexao->query("SELECT RA_NOME FROM SRA010  ORDER BY RA_NOME");
    
    
    
    // VARIAVEL QUE RECEBE QUERY DE CONEXAO E TRANSFORMA EM UM ARRAY
    $matriculas   = $query1->fetchAll();
    //$matricul     = $query1->fetchAll();
   
};
    //TRATAMENTO DE EXCESSOES
    }catch(Exception $e){

    echo $e->getMessage();
    exit;
 

 }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Matriculas</title>
</head>
<body>

    <div  class="cabecalho" > 
        <h1 class="titulo"> Consulta Matriculas </h1>    
    </div>

  
   <div class="input" >
   <form action="index.php" method="$_POST" >
        <input type="text" name="n_nome">
        <button type="submit">Pesquisar</button>
   </div>
   </form>




<div class="table1" >

<form action="index.php" method="$_POST" >

            <table border="1px">
            <tr><th>Nome</th>
            <th>Matricula</th>
            <th>Filial</th>
            <th>Centro de Custo</th>
            </tr>
            
        
            
            <?php 
            if ($matriculas <> '') {
                # code...
            
                foreach ($matriculas as $matri) {
                    # code...
                
            ?>

        <tr><td><?php echo $matri['RA_NOME'];?></td>
        <td><?php echo $matri['RA_MAT']; ?></td>
        <td><?php echo $matri['RA_FILIAL']; ?></td>
        <td><?php echo $matri['RA_CC']; ?></td>

        </tr>
        <?php
    }
}
    ?>
        </table>
    </form>

    </div>
    


</body>
</html>
