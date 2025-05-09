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

	$ESTO = 0;

	$PRODUTO = $_GET['cod']; // Recebendo o valor vindo do link
    $FILIAL = $_GET['filial']; // Recebendo o valor vindo do link




	$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");
	
	$date = date('Y-m-d');
	
	$sql = "	SELECT 'MATRIZ' AS EMP, B2_FILIAL, B2_COD, B1_DESC, B2_LOCAL, B1_UM, B2_QATU 
				FROM SB2010 SB2
                INNER JOIN SB1010 SB1 ON B1_COD = B2_COD AND SB1.D_E_L_E_T_ = ''
                WHERE B2_COD = '".$PRODUTO."' AND B2_FILIAL = '".$FILIAL."' AND SB2.D_E_L_E_T_ = ''
                	AND B2_QATU <> 0

                UNION

                SELECT 'FILIAL' AS EMP, B2_FILIAL, B2_COD, B1_DESC, B2_LOCAL,  B1_UM, B2_QATU FROM DBAUX.dbo.SB2010 SB2
				INNER JOIN  DBAUX.dbo.SB1010 SB1 ON B1_COD = B2_COD AND SB1.D_E_L_E_T_ = ''
                WHERE B2_COD = '".$PRODUTO."' AND B2_FILIAL = '".$FILIAL."' AND SB2.D_E_L_E_T_ = ''
                	AND B2_QATU <> 0

                UNION

                SELECT 'PR' AS EMP, B2_FILIAL, B2_COD, B1_DESC, B2_LOCAL,  B1_UM, B2_QATU FROM SB2040 SB2
				INNER JOIN  SB1040 SB1 ON B1_COD = B2_COD AND SB1.D_E_L_E_T_ = '' AND B1_X_SECUN = '".$PRODUTO."'
                WHERE SB2.D_E_L_E_T_ = ''
                	AND B2_QATU <> 0";
				
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
<p align="LEFT" type="date">PRODUTO:&nbsp;<b><font color=#FF0040><?=$linha['B2_COD']?> - <?=$linha['B1_DESC']?></font></p>
<!--<p align="LEFT" Class="joseT2"><b> TOTAL ACUMULADO MES:&nbsp;<font color=#01DF3A><?php// echo $TACU; ?> M3</font></b></p>-->

			<table cellspacing = "0" class="jose2" style="margin:auto;">
			<tr bgcolor="#58D3F7">
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=80   cellspacing = "0">EMPRESA</td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=80   cellspacing = "0">FILIAL</td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=150  cellspacing = "0">CODIGO</td>
            <td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100  cellspacing = "0">UM</td>
			<!--<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=400  cellspacing = "0">PRODUTO</td>-->
            <td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=400  cellspacing = "0">LOCAL</td>
            <td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=400  cellspacing = "0">ESTOQUE</td>
			</tr>
			</table>
<?php
	
	//$TPRO = 0;
	//$TREA = 0;
	
	// se o número de resultados for maior que zero, mostra os dados
	if($total > 0) { //echo round(5.055, 2);    // 5.06
		// inicia o loop que vai mostrar todos os dados
		do {
			
?>			
			
			<table cellspacing = "0" class="jose2" style="margin:auto;">
			<tr bgcolor="#FAFAFA">
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=80   cellspacing = "0"><?=$linha['EMP']?></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=80   cellspacing = "0"><?=$linha['B2_FILIAL']?></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=150  cellspacing = "0"><?=$linha['B2_COD']?></td>
            <td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100  cellspacing = "0"><?=$linha['B1_UM']?></td>
			<?php 
			If($linha['B2_LOCAL'] == 02)
			echo "<td style='border: 1px solid;  border-collapse: separate; border-color: #848484; background-color:red;' WIDTH=400  cellspacing = '0'>" .$linha['B2_LOCAL'],"</td>";
			Else
			echo "<td style='border: 1px solid;  border-collapse: separate; border-color: #848484;' WIDTH=400  cellspacing = '0'>" .$linha['B2_LOCAL'],"</td>";
			?>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=400  cellspacing = "0"><?=$linha['B2_QATU']?></td>
			</tr>
			</table>
			
<?php
        $ESTO = $ESTO + $linha['B2_QATU'];
		
		// finaliza o loop que vai mostrar os dados
		}while($linha = odbc_fetch_array($consulta));
        
	// fim do if 
	}
	//$DIFE = $TPRO - $TREA;
    $ESTO = $ESTO + $linha['B2_QATU'];
?>

            <table cellspacing = "0" class="jose2" style="margin:auto;">
			<tr bgcolor="#FAFAFA">
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=80   cellspacing = "0"><hr></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=80  cellspacing = "0"><hr></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=150   cellspacing = "0"><hr></td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=100  cellspacing = "0"><hr></td>
			<!--<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=400  cellspacing = "0"><hr></td>-->
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=400  cellspacing = "0">TOTAL</td>
			<td style="border: 1px solid;  border-collapse: separate; border-color: #848484;" WIDTH=400  cellspacing = "0"><?php echo "<font color='BLACK'>" . number_format($ESTO, 2, ',', '.'); ?></td>
			</tr>
			</table>
<BR/>
<BR/>

<br/>
</div>
</div>
</body>
</html>