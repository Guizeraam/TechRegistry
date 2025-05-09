<?php
session_start();
if(!isset($_SESSION['usuarioL'])){
    header("Location: ./LOGIN/index.php");
exit;
}
?>
<html>
 <head>
	<meta http-equiv="Content-Type" content="text/html, charset=utf-8">
	<title>Resultado</title>
	<link rel="stylesheet" type="text/css" href="./css/lista.css">

 </head>

<body background="./img/concreto.jpg" bgproperties="fixed">

<div class="voltar" class="corpoF">

<?php
	
	$cond1 = $_SESSION['cond1'];

	$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");
	
	$date = date('Y-m-d');
	
	$sql = "SELECT * FROM [dbo].[vw_LP_PROGRAMACAO] WHERE DT_ENTREGA=CONVERT(VARCHAR(8),CAST('".$cond1."' as date),112) AND FILIAL = '01IND01' ORDER BY HORA_ENTREGA ASC";
		
	/* Realiza a consulta no banco de dados */
	$consulta  = odbc_exec($con, $sql);
	
	// mysql_query("UPDATE solic SET natureza='".$natureza."', tipo = '".$tipo.")

?>

<?php
//$query = sprintf("SELECT C5_XHRPROG, C5_X_QTDM3, C5_XDSCPRO, C5_X_NOME, C5_X_END, C5_X_OBS FROM SC5010 WHERE C5_XTIPO = 'P' AND C5_EMISSAO = '20180417' AND C5_FILIAL = '01IND01' ORDER BY C5_XHRPROG");
// executa a query
//$dados = odbc_fetch_array($consulta) or die(mysql_error());
// transforma os dados em um array
$linha = odbc_fetch_array($consulta);
// calcula quantos dados retornaram
$total  = odbc_num_rows($consulta);// CONSULTA PARA EXIBICAO PROGRAMACAO

?>

<div class="corpoF">
<br />
<p align="LEFT"><img id="rh2" src="./img/CABE_PATMED.png" ></p>


<p align="center" class="jose2">Hoje é <font color=#088A29><b><script>EscreveData(); </script></font> e 

Agora são <font color=#088A29 ><script>EscreveHora();</script></font></b></p>
			<table cellspacing = "0" class="jose2">
			<tr bgcolor="#04B486">
			<td style="border-style: solid; border-color: #848484;" WIDTH=60   cellspacing = "0">NUM</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=60   cellspacing = "0">HORA</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=60   cellspacing = "0">PROG</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=60   cellspacing = "0">ENTR</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=245  cellspacing = "0">CONCRETO</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=140   cellspacing = "0">VENDEDOR</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=180  cellspacing = "0">CLIENTE</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=240  cellspacing = "0">ENDERECO</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=240  cellspacing = "0">BAIRRO</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=400  cellspacing = "0">OBSERVACAO</td>
			</tr>
			</table>
<?php
	
	$TPRO = 0;
	$TREA = 0;
	
	
	
	// se o número de resultados for maior que zero, mostra os dados
	if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
				
			$P = $linha['TOT_PROG'];
			$E = $linha['TOT_ENT'];
			
			
			If ($P != $E){
				
				$STATUS = 'P';
				
			}
			Else
				
				$STATUS = 'F';
			
			
?>
			
			<table class="jose2"  cellspacing="0">
			<tr>
			<td style="border-style: solid; border-color: #848484;" WIDTH=60  cellspacing = "0"><a href="busca.php?cod=<?=$linha['PEDIDO']?>&obra=<?=$linha['OBRA']?>&data=<?=$linha['DT_ENTREGA']?>"  style="text-decoration: none; color: #04B431;" target="_blank"><?=$linha['PEDIDO']?></a></td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=60  cellspacing = "0"><?=$linha['HORA']?></td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=60  cellspacing = "0"><?=$linha['TOT_PROG']?> M3</td>
			
			<?php
					
				if($P>$E){
				
				echo "<td style='border-style: solid; border-color: #848484; background-color: #F78181;' WIDTH=60  cellspacing = '0'>".$linha['TOT_ENT'] ."M3</td>";
				
				}Else{

				echo "<td style='border-style: solid; border-color: #848484; background-color: #81F79F;' WIDTH=60  cellspacing = '0'>".$linha['TOT_ENT'] ."M3</td>";
				}
			?>	
			<td style="border-style: solid; border-color: #848484;" WIDTH=245 cellspacing = "0"><?=$linha['PRODUTO']?></td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=140  cellspacing = "0"><?=$linha['VENDEDOR']?></td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=180 cellspacing = "0"><?=$linha['NOMECLI']?></td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=240 cellspacing = "0"><?=$linha['ENDERECO']?></td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=240 cellspacing = "0"><?=$linha['BAIRRO']?></td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=400  cellspacing = "0"><?=$linha['OBS_PEDIDO']?></td>
			</tr>
			</table>
			
<?php
		
		$TPRO = $TPRO + $linha['VOL_PROG'];
		$TREA = $TREA + $linha['VOL_ENTR'];
		
		// finaliza o loop que vai mostrar os dados
		}while($linha = odbc_fetch_array($consulta));
	// fim do if 
	}
	$DIFE = $TPRO - $TREA;
?>
<BR/>
<BR/>
<p align="center" class="joseT"><b>PROGRAMADO DIA: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;REALIZADO DIA:&nbsp;<font color=#01DF3A><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>NAO ENTREGUE:&nbsp;<font color=#0040FF><?php echo $DIFE; ?> M3</p>

<br/>
</div>
</div>
</body>
</html>