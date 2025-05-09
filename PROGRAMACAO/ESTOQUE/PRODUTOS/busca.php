<?php
	session_start();
?>
<html>
 <head>
	<meta http-equiv="Content-Type" content="text/html, charset=utf-8">
	<title>Resultado</title>
	<link rel="stylesheet" type="text/css" href="lista5.css">

 </head>

<body background="/PROGRAMACAO/img/concreto.jpg" bgproperties="fixed">

<div class="voltar" class="corpoF">

<?php

	$TVEN = 0;
	$TENT = 0;
	$TDIF = 0;

	$PRODUTO = $_GET['cod']; // Recebendo o valor vindo do link




	$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");
	
	$date = date('Y-m-d');
	
	$sql = "SELECT 'MATRIZ' AS EMP, C6_FILIAL AS FILIAL, C6_NUM AS PEDIDO, C6_PRODUTO AS COD, C6_DESCRI AS DESCRI, C6_UM AS UM, C6_QTDVEN AS QTD_VEN, C6_QTDENT AS QTD_ENT, C5_X_NOME
	FROM SC6010 SC6 WITH(NOLOCK)
	INNER JOIN SC5010 SC5 WITH(NOLOCK) ON C5_FILIAL = C6_FILIAL AND C5_NUM = C6_NUM AND LEFT(C5_NOTA,6) <> 'XXXXXX' AND SC5.D_E_L_E_T_ = ''
	WHERE C6_PRODUTO = '".$PRODUTO."' AND SC6.D_E_L_E_T_ = ''
		AND C6_QTDVEN != C6_QTDENT AND C6_NOTA <> 'XXXXXX'
			
	UNION ALL 

	SELECT 'FILIAL' AS EMP, C6_FILIAL AS FILIAL, C6_NUM AS PEDIDO, C6_PRODUTO AS COD, C6_DESCRI AS DESCRI, C6_UM AS UM, C6_QTDVEN AS QTD_VEN, C6_QTDENT AS QTD_ENT, C5_X_NOME
	FROM DBAUX.dbo.SC6010 SC7 WITH(NOLOCK) 
	INNER JOIN DBAUX.dbo.SC5010 SC8 WITH(NOLOCK) ON C5_FILIAL = C6_FILIAL AND C5_NUM = C6_NUM AND LEFT(C5_NOTA,6) <> 'XXXXXX' AND SC8.D_E_L_E_T_ = ''
	WHERE C6_PRODUTO = '".$PRODUTO."' AND SC7.D_E_L_E_T_ = ''
		AND C6_QTDVEN != C6_QTDENT AND C6_NOTA <> 'XXXXXX' 
			
	UNION ALL

	SELECT 'PR' AS EMP, C6_FILIAL AS FILIAL, C6_NUM AS PEDIDO, C6_PRODUTO AS COD, C6_DESCRI AS DESCRI, C6_UM AS UM, C6_QTDVEN AS QTD_VEN, C6_QTDENT AS QTD_ENT, C5_X_NOME
	FROM SB1040 SBA WITH(NOLOCK)  
	INNER JOIN SC6040 SCA WITH(NOLOCK) ON C6_PRODUTO=B1_COD AND SCA.D_E_L_E_T_ = '' AND C6_QTDVEN != C6_QTDENT	AND C6_NOTA <> 'XXXXXX' 
	INNER JOIN SC5040 SCB WITH(NOLOCK) ON C5_FILIAL = C6_FILIAL AND C5_NUM = C6_NUM AND LEFT(C5_NOTA,6) <> 'XXXXXX' AND SCB.D_E_L_E_T_ = ''
	WHERE B1_X_SECUN = '".$PRODUTO."' AND SBA.D_E_L_E_T_ = ''
	
	ORDER BY EMP

";
				
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
<p align="LEFT" type="date">Consulta de Pedidos por Produto:&nbsp;<b><font color=#FF0040><?=$linha['COD']?></font></p>
<!--<p align="LEFT" Class="joseT2"><b> TOTAL ACUMULADO MES:&nbsp;<font color=#01DF3A><?php// echo $TACU; ?> M3</font></b></p>-->

			<table cellspacing = "0" class="jose2">
			<tr bgcolor="#58D3F7">
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=80   cellspacing = "0">EMPRESA</td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=80  cellspacing = "0">FILIAL</td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100   cellspacing = "0">PEDIDO</td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=400   cellspacing = "0">CLIENTE</td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=150  cellspacing = "0">CODIGO</td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=400  cellspacing = "0">PRODUTO</td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100  cellspacing = "0">UM</td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100  cellspacing = "0">QNT VENDIDO</td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100  cellspacing = "0">QNT ENTREGUE</td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100  cellspacing = "0">DIFERENÇA</td>
			</tr>
			</table>
<?php
	
	//$TPRO = 0;
	//$TREA = 0;
	
	// se o número de resultados for maior que zero, mostra os dados
	if($total > 0) { //echo round(5.055, 2);    // 5.06
		// inicia o loop que vai mostrar todos os dados
		do {
			$DIFE = $linha['QTD_VEN'] - $linha['QTD_ENT'];
			//$E = $linha['TOT_ENT'];
			
?>			
			
			<table cellspacing = "0" class="jose2">
			<tr bgcolor="#FAFAFA">
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=80   cellspacing = "0"><?=$linha['EMP']?></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=80  cellspacing = "0"><?=$linha['FILIAL']?></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100   cellspacing = "0"><?=$linha['PEDIDO']?></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=400   cellspacing = "0"><?=$linha['C5_X_NOME']?></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=150  cellspacing = "0"><?=$linha['COD']?></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=400  cellspacing = "0"><?=$linha['DESCRI']?></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100  cellspacing = "0"><?=$linha['UM']?></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100  cellspacing = "0"><?=$linha['QTD_VEN']?></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100  cellspacing = "0"><?=$linha['QTD_ENT']?></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100  cellspacing = "0"><?php echo $DIFE; ?></td>
			</tr>
			</table>
			
<?php
		
		$TVEN = $TVEN + $linha['QTD_VEN'];
		$TENT = $TENT + $linha['QTD_ENT'];
		$TDIF = $TDIF + $DIFE;
		
		// finaliza o loop que vai mostrar os dados
		}while($linha = odbc_fetch_array($consulta));
	// fim do if 
	}
	//$DIFE = $TPRO - $TREA;
?>

<table cellspacing = "0" class="jose2">
			<tr bgcolor="#FAFAFA">
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=80   cellspacing = "0"></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=80  cellspacing = "0"></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100   cellspacing = "0"></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=400  cellspacing = "0"></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=150  cellspacing = "0"></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=400  cellspacing = "0"></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100  cellspacing = "0">TOTAIS</td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100  cellspacing = "0"><?php echo $TVEN; ?></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100  cellspacing = "0"><?php echo $TENT; ?></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100  cellspacing = "0"><?php echo $TDIF; ?></td>
			</tr>
			</table>
<BR/>
<BR/>

<br/>
</div>
</div>
</body>
</html>