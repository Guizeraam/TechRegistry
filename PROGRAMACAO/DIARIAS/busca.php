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
	<link rel="stylesheet" type="text/css" href="lista.css">

 </head>

<body background="/PROGRAMACAO/img/concreto.jpg" bgproperties="fixed">

<div class="voltar" class="corpoF">

<?php

	$pedido = $_GET['cod']; // Recebendo o valor vindo do link
	$obra 	= $_GET['obra']; // Recebendo o valor vindo do link
	$data 	= $_GET['data']; // Recebendo o valor vindo do link



	$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");
	
	$date = date('Y-m-d');
	
	$sql = "
	SELECT 'PROD' AS EMP, SZ5.Z5_HRSENTR, SZ5.Z5_DESCRI, SZ5.Z5_VOLUME, SZ5.Z5_LACRE, SZ5.Z5_BETONEI, 
		SZ5.Z5_MOTBET, BET.DA4_NREDUZ AS MOTBET,SZ5.Z5_BOMBA, SZ5.Z5_MOTBOM, BOM.DA4_NREDUZ AS MOTBOM, 
		AJU.DA4_NREDUZ AS AJUDAN, SZ5.Z5_DOC, SZ5.Z5_USUARIO, SZ3.Z3_NOME 
		
	FROM DBPROD.dbo.SZ5010 SZ5
	INNER JOIN DBPROD.dbo.SZ3010 AS SZ3 ON SZ3.Z3_COD = SZ5.Z5_OBRA AND SZ3.D_E_L_E_T_ = ''
	LEFT JOIN DBPROD.dbo.DA4010 AS BET ON BET.DA4_COD = SZ5.Z5_MOTBET AND BET.D_E_L_E_T_ = ''
	LEFT JOIN DBPROD.dbo.DA4010 AS BOM ON BOM.DA4_COD = SZ5.Z5_MOTBOM AND BOM.D_E_L_E_T_ = ''
	LEFT JOIN DBPROD.dbo.DA4010 AS AJU ON AJU.DA4_COD = SZ5.Z5_AJUDAN AND AJU.D_E_L_E_T_ = ''
	
	WHERE SZ5.Z5_OBRA = '".$obra."' 
	AND SZ5.Z5_PEDIDO = '".$pedido."' 
	AND SZ5.Z5_DTENTR = '".$data."' 
	AND SZ5.D_E_L_E_T_ ='' 

	UNION

	SELECT 'FIL' AS EMP, SZ5.Z5_HRSENTR, SZ5.Z5_DESCRI, SZ5.Z5_VOLUME, SZ5.Z5_LACRE, SZ5.Z5_BETONEI, 
		SZ5.Z5_MOTBET, BET.DA4_NREDUZ AS MOTBET,SZ5.Z5_BOMBA, SZ5.Z5_MOTBOM, BOM.DA4_NREDUZ AS MOTBOM, 
		AJU.DA4_NREDUZ AS AJUDAN, SZ5.Z5_DOC, SZ5.Z5_USUARIO, SZ3.Z3_NOME 
		
	FROM DBAUX.dbo.SZ5010 SZ5
	INNER JOIN DBAUX.dbo.SZ3010 AS SZ3 ON SZ3.Z3_COD = SZ5.Z5_OBRA AND SZ3.D_E_L_E_T_ = ''
	LEFT JOIN DBAUX.dbo.DA4010 AS BET ON BET.DA4_COD = SZ5.Z5_MOTBET AND BET.D_E_L_E_T_ = ''
	LEFT JOIN DBAUX.dbo.DA4010 AS BOM ON BOM.DA4_COD = SZ5.Z5_MOTBOM AND BOM.D_E_L_E_T_ = ''
	LEFT JOIN DBAUX.dbo.DA4010 AS AJU ON AJU.DA4_COD = SZ5.Z5_AJUDAN AND AJU.D_E_L_E_T_ = ''
	
	WHERE SZ5.Z5_OBRA = '".$obra."' 
	AND SZ5.Z5_PEDIDO = '".$pedido."' 
	AND SZ5.Z5_DTENTR = '".$data."' 
	AND SZ5.D_E_L_E_T_ ='' ";
				
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
<p align="LEFT">Nome da Obra:&nbsp;&nbsp;<?=$linha['Z3_NOME']?></p>
<p align="LEFT" type="date">Relatório de Cargas da Programação:&nbsp;<b><font color=#FF0040><?php echo $pedido; ?> </b></font>&nbsp; &nbsp; &nbsp;  Data dos Carregamentos:&nbsp; <b><font color=#FF0040><?php echo date('d/m/Y', strtotime($data)); ?> </b> </font></p>
<!--<p align="LEFT" Class="joseT2"><b> TOTAL ACUMULADO MES:&nbsp;<font color=#01DF3A><?php// echo $TACU; ?> M3</font></b></p>-->

			<table cellspacing = "0" class="jose2">
			<tr bgcolor="#58D3F7">
			<td style="border-style: solid; border-color: #848484;" WIDTH=60   cellspacing = "0">HORA</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=262  cellspacing = "0">PRODUTO</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=60   cellspacing = "0">M3</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=60   cellspacing = "0">LACRE</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=100  cellspacing = "0">BETONEIRA</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=100  cellspacing = "0">MOTORISTA</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=100  cellspacing = "0">BOMBA</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=100  cellspacing = "0">MOTORISTA</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=100  cellspacing = "0">AJUDANTE</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=100  cellspacing = "0">NF</td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=140  cellspacing = "0">BALANCEIRO</td>
			</tr>
			</table>
<?php
	
	//$TPRO = 0;
	//$TREA = 0;
	
	// se o número de resultados for maior que zero, mostra os dados
	if($total > 0) { //echo round(5.055, 2);    // 5.06
		// inicia o loop que vai mostrar todos os dados
		do {
			//$P = $linha['TOT_PROG'];
			//$E = $linha['TOT_ENT'];
			
?>			
			
			<table cellspacing = "0" class="jose2">
			<tr bgcolor="#FAFAFA">
			<td style="border-style: solid; border-color: #848484;" WIDTH=60   cellspacing = "0"><?=$linha['Z5_HRSENTR']?></td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=262  cellspacing = "0"><?=$linha['Z5_DESCRI']?></td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=60   cellspacing = "0"><?php echo round($linha['Z5_VOLUME'], 2); ?></td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=60   cellspacing = "0"><?=$linha['Z5_LACRE']?></td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=100  cellspacing = "0"><?=$linha['Z5_BETONEI']?></td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=100  cellspacing = "0"><?=$linha['MOTBET']?></td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=100  cellspacing = "0"><?=$linha['Z5_BOMBA']?></td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=100  cellspacing = "0"><?=$linha['MOTBOM']?></td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=100  cellspacing = "0"><?=$linha['AJUDAN']?></td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=100  cellspacing = "0"><?=$linha['Z5_DOC']?></td>
			<td style="border-style: solid; border-color: #848484;" WIDTH=140  cellspacing = "0"><?=$linha['Z5_USUARIO']?></td> 
			</tr>
			</table>
			
<?php
		
		//$TPRO = $TPRO + $linha['TOT_PROG'];
		//$TREA = $TREA + $linha['TOT_ENT'];
		
		// finaliza o loop que vai mostrar os dados
		}while($linha = odbc_fetch_array($consulta));
	// fim do if 
	}
	//$DIFE = $TPRO - $TREA;
?>
<BR/>
<BR/>

<br/>
</div>
</div>
</body>
</html>