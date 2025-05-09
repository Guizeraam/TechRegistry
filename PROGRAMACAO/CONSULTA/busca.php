<?php
session_start();
if(!isset($_SESSION['usuarioL'])){
    header("Location: ./LOGIN/index.php");
exit;
}
	
?>


	<?php
	
	
	$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");
	
	$date = date('Y-m-d');
	
	$sql = "SELECT * FROM [dbo].[vw_LP_PROGRAMACAO] WHERE DT_ENTREGA=CONVERT(VARCHAR(8),GETDATE(),112) AND FILIAL = '01IND01' ORDER BY HORA_ENTREGA ASC";
		
	/* Realiza a consulta no banco de dados */
	$consulta  = odbc_exec($con, $sql);
	
	// mysql_query("UPDATE solic SET natureza='".$natureza."', tipo = '".$tipo.")
	
	
?>

	<?php

	$totalmes = "SELECT * FROM [dbo].[vw_LP_PROGRAMACAO] WHERE DT_ENTREGA >= '20180401' AND DT_ENTREGA <= '20180430' AND FILIAL = '01IND01' ";

	$consulta2 = odbc_exec($con, $totalmes);
	
	
 
?>

	<?php
//$query = sprintf("SELECT C5_XHRPROG, C5_X_QTDM3, C5_XDSCPRO, C5_X_NOME, C5_X_END, C5_X_OBS FROM SC5010 WHERE C5_XTIPO = 'P' AND C5_EMISSAO = '20180417' AND C5_FILIAL = '01IND01' ORDER BY C5_XHRPROG");
// executa a query
//$dados = odbc_fetch_array($consulta) or die(mysql_error());
// transforma os dados em um array
$linha = odbc_fetch_array($consulta);
// calcula quantos dados retornaram
$total  = odbc_num_rows($consulta);// CONSULTA PARA EXIBICAO PROGRAMACAO

$linha2 = odbc_fetch_array($consulta2);

$total2 = odbc_num_rows($consulta2);//CONSULTA PARA TOTAL MES

?>

<html>
	<head>
	<title>Busca</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body background="/PROGRAMACAO/img/concretoL.jpg" bgproperties="fixed">

<div >
	<!-- PERSQUISA -->
	<div id="cadastro">
		<form method="post" action="?go=buscar">
			<table id="cad_table3">
					<br />
					<br />
					<tr>
					
					<td>Filial:</td>
					<td><select class="sel" name="cond2">
					<option value="01IND01">  PATMED </option>
					<option value="01IND06">  PATVEL </option>
					<option value="01IND08">  PATFOZ </option>
					<option value="01IND09">  PATLEDO </option>
					<option value="01IND07">  PATSTH </option>
					</select></td>
					
					
					<td><input id="date" name="cond1" type="date" class="selBusca"></td>	
					<td colspan="2">&nbsp;&nbsp;<input type="submit" value="Buscar" id="btnCad"></td> 				
					</tr>	
			</table>
		</form>
						
	</div>
<!--FIM PESQUISA-->
<br/>
<table class="lista" border="2" cellspacing="0">
			
			</table>


				 
</div>
							 
<?php
if(@$_GET['go'] == 'buscar'){
	
	$cond1 = $_POST['cond1'];
	$cond2 = $_POST['cond2'];


			$_SESSION['cond1'] = $cond1;
			$_SESSION['cond2'] = $cond2;
		
			if(empty($cond1) AND empty($cond2)){
				
				echo "<script>alert('Campo de busca Vazio !.'); history.back();</script>";	
				
			}else{
		    echo "<meta http-equiv='refresh' content='0, url=/PROGRAMACAO/consulta/selecionada.php'>";
	        }
}
?>
</body>
</html>
<?php
// tira o resultado da busca da memória
//mysql_free_result($dados);
?>