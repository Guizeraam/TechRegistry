<?php
	
	
	$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");
	
	$date = date('Y-m-d');
	
	$sql = "SELECT PRODUTO,MAX(DESC_PRODUTO) AS DESC_PRODUTO, MAX(CUSTO) AS CUST, SUM(ESTOQUE) AS ESTO, SUM(QTD_VEN) AS VENDIDO, SUM(QTD_ENT) AS ENTREGUE,SUM(CASE EMP WHEN 'MATRIZ' THEN ESTOQUE ELSE 01 END) AS EST_MATRIZ
				,SUM(CASE EMP WHEN 'FILIAL' THEN ESTOQUE ELSE 0 END) AS EST_FILIAL,SUM(CASE EMP WHEN 'PR' THEN ESTOQUE ELSE 0 END) AS EST_PR
			FROM (	SELECT 'MATRIZ' AS EMP, B1_COD AS PRODUTO, B1_DESC AS DESC_PRODUTO, B2_QATU AS ESTOQUE, B1_CUSTD AS CUSTO, SUM(C6_QTDVEN) AS QTD_VEN, SUM(C6_QTDENT) AS QTD_ENT, SUBSTRING(B1_COD, 0, 7) AS FAMILIA
					FROM SB1010 SB1
					INNER JOIN SB2010 SB2 ON B1_COD = B2_COD AND B2_LOCAL = '01' AND SB2.D_E_L_E_T_ = ''
					INNER JOIN SC6010 SC6 ON B2_FILIAL = C6_FILIAL AND B1_COD = C6_PRODUTO AND C6_LOCAL = B2_LOCAL AND SC6.D_E_L_E_T_ = ''
					INNER JOIN SC5010 SC5 ON C6_FILIAL = C5_FILIAL AND C6_NUM = C5_NUM AND LEFT(C5_NOTA,6) <> 'XXXXXX' AND SC5.D_E_L_E_T_ = ''
					WHERE B1_FILIAL='' AND LEFT(B1_COD,3) IN ('800') AND SB1.D_E_L_E_T_=''
                    AND B1_DESC LIKE 'LAJO%' 
                    --OR B1_FILIAL='' AND LEFT(B1_COD,4) IN ('3001') AND SB1.D_E_L_E_T_=''
					GROUP BY B1_COD, B1_DESC, B1_CUSTD, B2_QATU

					UNION 

					SELECT 'PR' AS EMP, B1_X_SECUN AS PRODUTO, B1_DESC AS DESC_PRODUTO, B2_QATU AS ESTOQUE, B1_CUSTD AS CUSTO, SUM(C6_QTDVEN) AS QTD_VEN, SUM(C6_QTDENT) AS QTD_ENT, SUBSTRING(B1_X_SECUN, 0, 7) AS FAMILIA
					FROM SB1040 SB1
					INNER JOIN SB2040 SB2 ON B1_COD = B2_COD AND B2_LOCAL='00' AND SB2.D_E_L_E_T_ = ''
					INNER JOIN SC6040 SC6 ON B2_FILIAL = C6_FILIAL AND B1_COD = C6_PRODUTO AND C6_LOCAL = B2_LOCAL AND SC6.D_E_L_E_T_ = ''
					INNER JOIN SC5040 SC5 ON C6_FILIAL = C5_FILIAL AND C6_NUM = C5_NUM AND LEFT(C5_NOTA,6) <> 'XXXXXX' AND SC5.D_E_L_E_T_ = ''
					WHERE B1_FILIAL='' AND LEFT(B1_X_SECUN,3) IN ('800') AND  SB1.D_E_L_E_T_=''
                    AND B1_DESC LIKE 'LAJO%' 
                    --OR B1_FILIAL='' AND LEFT(B1_COD,4) IN ('3001') AND SB1.D_E_L_E_T_=''
					GROUP BY B1_X_SECUN, B1_DESC, B1_CUSTD, B2_QATU

					UNION

					SELECT 'FILIAL' AS EMP, B1_COD AS PRODUTO, B1_DESC AS DESC_PRODUTO, B2_QATU AS ESTOQUE, B1_CUSTD AS CUSTO, SUM(C6_QTDVEN) AS QTD_VEN, SUM(C6_QTDENT) AS QTD_ENT, SUBSTRING(B1_COD, 0, 7) AS FAMILIA 
					FROM DBAUX.dbo.SB1010 SBA
					INNER JOIN DBAUX.dbo.SB2010 SB2 ON B1_COD = B2_COD AND B2_LOCAL = '01' AND SB2.D_E_L_E_T_ = ''
					INNER JOIN DBAUX.dbo.SC6010 SCC ON B2_FILIAL = C6_FILIAL AND B1_COD = C6_PRODUTO AND C6_LOCAL = B2_LOCAL AND SCC.D_E_L_E_T_ = ''
					INNER JOIN DBAUX.dbo.SC5010 SCD ON C6_FILIAL = C5_FILIAL AND C6_NUM = C5_NUM AND LEFT(C5_NOTA,6) <> 'XXXXXX' AND SCD.D_E_L_E_T_ = ''
					WHERE B1_FILIAL='' AND LEFT(B1_COD,3) IN ('800') AND SBA.D_E_L_E_T_='' 
                    AND B1_DESC LIKE 'LAJO%' 
                    --OR B1_FILIAL='' AND LEFT(B1_COD,4) IN ('3001') AND SBA.D_E_L_E_T_=''
					GROUP BY B1_COD, B1_DESC, B1_CUSTD, B2_QATU
				) AS TMP
			GROUP BY PRODUTO
			ORDER BY TMP.PRODUTO";
		
	/* Realiza a consulta no banco de dados */
	$consulta  = odbc_exec($con, $sql);
	
	
?>
<?php

 
?>
<?php

$linha = odbc_fetch_array($consulta);
// calcula quantos dados retornaram
$total  = odbc_num_rows($consulta);// CONSULTA PARA EXIBICAO PROGRAMACAO

$TACU = 0;


?>
<meta charset="utf-8"> 
<html>
	<head>
	<title>MIUDEZA</title>
	<link rel="stylesheet" type="text/css" href="lista1.css">
	<?php header("Refresh: 30"); ?>
	
		<script>

function EscreveData() {

var mydate=new Date()

var year=mydate.getYear()

if (year < 1000)

year+=1900

var day=mydate.getDay()

var month=mydate.getMonth()

var daym=mydate.getDate()

if (daym<10)

daym="0"+daym

var dayarray=new

Array("domingo","segunda-feira","terça-feira","quarta-feira","quinta-feira","sexta-feira","sábado")

var montharray=new

Array("Jaineiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro")

document.write(""+dayarray[day]+", "+daym+" de "+montharray[month]+" de "+year+"</b></font></small>")

}

function EscreveHora() {

agora = new Date (); horas = agora.getHours ();

minutos = agora.getMinutes ();

if (horas < 10) horas = "0" + horas;

if (minutos < 10) minutos = "0" + minutos;

document.write(horas+":" +minutos+ "  Hrs");

}

</script>
</head>
<body background="" bgproperties="fixed">

<div class="corpoF">

<div>
        <p  align="center">	
			<a href="TUBOS.php" ><img id="dia" src="./botaoT.png"></a>&nbsp;&nbsp;&nbsp;
			<a href="PAVER.php"	><img id="dia" src="./botaoP.png"></a>&nbsp;&nbsp;&nbsp;
			<a href="LAJES.php" ><img id="dia" src="./botaoL.png"></a>&nbsp;&nbsp;&nbsp;
			<a href="MIUDE.php"	><img id="dia" src="./botaoM.png"></a>&nbsp;&nbsp;&nbsp;
			<a href="GERAL.php"	><img id="dia" src="./botaoG.png"></a>&nbsp;&nbsp;&nbsp;
		</p>
</div>

<p align="center" class="jose2">Valor Atualizado em <font color=#088A29><b><script>EscreveData(); </script></font> 

as <font color=#088A29 ><script>EscreveHora();</script></font> &nbsp; ESTOQUE X PEDIDOS MIUDEZA</b></p>
			<table class="jose2"  cellspacing="0">
			<tr>
			<td WIDTH=180  class="" style=" border: 1px solid; border-collapse: collapse;">CODIGO</td>
			<td WIDTH=450  class="" style=" border: 1px solid; border-collapse: collapse;">PRODUTO</td>
			<!--<td WIDTH=150 class=""style=" border: 1px solid; border-collapse: collapse;">CUSTO</td>-->
			<td WIDTH=150 class=""style=" border: 1px solid; border-collapse: collapse;">EST MATRIZ</td>
			<td WIDTH=150 class=""style=" border: 1px solid; border-collapse: collapse;">EST FILIAL</td>
			<td WIDTH=150 class=""style=" border: 1px solid; border-collapse: collapse;">EST PR</td>
			<td WIDTH=150 class=""style=" border: 1px solid; border-collapse: collapse;">EST REAL</td>
			
			<!--<td WIDTH=150 class=""style=" border: 1px solid; border-collapse: collapse;">CUSTO X EST</td>-->
			<td WIDTH=150 class=""style=" border: 1px solid; border-collapse: collapse;">QNT PEDIDOS</td>
			<td WIDTH=150 class=""style=" border: 1px solid; border-collapse: collapse;">DIF EST X PED</td>
			</tr>
			</table>
<?php
	
	$TPRO = 0;
	$TREA = 0;
	
	
	
	// se o número de resultados for maior que zero, mostra os dados
	if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
			
			$REAL = $linha['VENDIDO'] - $linha['ENTREGUE'];
			$CUSTOQ = $linha['CUST']* $linha['ESTO'];
            $ESTPED = $linha['ESTO'] - $REAL;	
            
            If($REAL > 0 OR $linha['ESTO'] > 0){
?>
			
			<table class="jose2"  cellspacing="0">
			<tr>
			<td style=" border: 1px solid; border-collapse: collapse;" Class="" WIDTH=180 ><?=$linha['PRODUTO']?></td>
			<td style=" border: 1px solid; border-collapse: collapse;" Class="" WIDTH=450 ><?=$linha['DESC_PRODUTO']?></td>
			<!--<td style=" border: 1px solid; border-collapse: collapse; text-align: right;" class="" WIDTH=150> - </td>-->
			<td style=" border: 1px solid; border-collapse: collapse; text-align: right;" class="" WIDTH=150><?php echo '&nbsp;' . number_format($linha['EST_MATRIZ'], 2, ',', '.');?></td>
			<td style=" border: 1px solid; border-collapse: collapse; text-align: right;" class="" WIDTH=150><?php echo '&nbsp;' . number_format($linha['EST_FILIAL'], 2, ',', '.');?></td>
			<td style=" border: 1px solid; border-collapse: collapse; text-align: right;" class="" WIDTH=150><?php echo '&nbsp;' . number_format($linha['EST_PR'], 2, ',', '.');?></td>
			<td style=" border: 1px solid; border-collapse: collapse; text-align: right;" class="" WIDTH=150><?php 
																												If($linha['ESTO'] >= 0)
																												echo "<font color='#32CD32'>" . number_format($linha['ESTO'], 2, ',', '.'),"</font>";
																												Else
																												echo "<font color='#DF3A01'>" . number_format($linha['ESTO'], 2, ',', '.'),"</font>";
																											
																												?></td>
			
			<!--<td style=" border: 1px solid; border-collapse: collapse; text-align: right;" class="" WIDTH=150> - </td>-->
			<td style=" border: 1px solid; border-collapse: collapse; text-align: right;" class="" WIDTH=150><a href="busca.php?cod=<?=$linha['PRODUTO']?>" style="text-decoration: none; color: #04B431;" target="_blank"><?php echo '&nbsp;' . number_format($REAL, 2, ',', '.');?></a></td> 
			<td style=" border: 1px solid; border-collapse: collapse; text-align: right;" class="" WIDTH=150><?php 
																												If($ESTPED >= 0)
																												echo "<font color='#32CD32'>" . number_format($ESTPED, 2, ',', '.'),"</font>";
																												Else
																												echo "<font color='#DF3A01'>" . number_format($ESTPED, 2, ',', '.'),"</font>";
																											
																												?></td> 
			</tr>
			</table>
			
<?php
        }		
		// finaliza o loop que vai mostrar os dados
		}while($linha = odbc_fetch_array($consulta));
	// fim do if 
	}
	
?>
<br/>

</body>
</html>
<?php
// tira o resultado da busca da memória
odbc_free_result($consulta);
?>