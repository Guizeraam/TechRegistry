<?php
session_start();
if(!isset($_SESSION['usuarioL'])){
    header("Location: ./LOGIN/index.php");
exit;
}
	
	
	$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");
	
	$date = date('Y-m-d');
	
	$sql = "
	SELECT FILIAL , PEDIDO, OBRA, DT_ENTREGA, DT_EMISSAO, OBS_FINALIZACAO AS MOTIVO, LEFT(PRODUTO, 26) AS PRODUTO, HORA_ENTREGA AS HORA, NOMECLI, ENDERECO, BAIRRO, OBS_PEDIDO, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV
	FROM [dbo].[vw_LP_PROGRAMACAO]  	
	WHERE FILIAL = '01IND01' AND DT_ENTREGA=CONVERT(VARCHAR(8),GETDATE(),112)
	GROUP BY FILIAL, PEDIDO, OBRA, DT_ENTREGA, DT_EMISSAO, PRODUTO, NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, NOMECLI, ENDERECO, BAIRRO, OBS_PEDIDO, OBS_FINALIZACAO, OBS_FINALIZACAO, MUNICIPIO , APROV
	ORDER BY HORA_ENTREGA ASC";
		
	/* Realiza a consulta no banco de dados */
	$consulta  = odbc_exec($con, $sql);
	
	
	
	
?>
<?php
	//WHERE MONTH(DT_ENTREGA) = MONTH(GETDATE())  and YEAR(DT_ENTREGA) = YEAR(GETDATE())
	
	$totalmes = "SELECT * FROM [dbo].[vw_LP_PROGRAMACAO] WHERE MONTH(DT_ENTREGA) = MONTH(GETDATE()) and YEAR(DT_ENTREGA) = YEAR(GETDATE()) AND FILIAL = '01IND01' ";

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

$TACU = 0;

if($total2 > 0) {
		do {
			
			$TACU = $TACU + $linha2['VOL_ENTR'];
			
			}while($linha2 = odbc_fetch_array($consulta2));

	}


 //$programado = odbc_result($consulta, 'VOL_PROG');
 
 //echo $programado;
 



?>
<meta charset="utf-8"> 
<html>
	<head>
	<title>Diário</title>
	<link rel="stylesheet" type="text/css" href="/programacao/css/lista.css">
	<?php //header("Refresh: 10; url=patvel.php"); ?>
	
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
<body background="/programacao//img/concreto.jpg" bgproperties="fixed">
<div class="corpoF">
<br />
<p align="LEFT"><img id="rh2" src="/programacao//img/CABE_PATMED.png" ></p>

<!--<p align="LEFT" Class="joseT2"><b> TOTAL ACUMULADO MES:&nbsp;<font color=#01DF3A><?php// echo $TACU; ?> M3</font></b></p>-->

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
			<td style="border-style: solid; border-color: #848484;" WIDTH=80  cellspacing = "0">DT INCLUSAO</td>
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
			<td style="border-style: solid; border-color: #848484;" WIDTH=80  cellspacing = "0"><?php echo date("d/m/Y", strtotime($linha['DT_EMISSAO'])); ?></td>
			</tr>
			</table>
			
<?php
		
		
		
		
		$TPRO = $TPRO + $linha['TOT_PROG'];
		$TREA = $TREA + $linha['TOT_ENT'];
		
		// finaliza o loop que vai mostrar os dados
		}while($linha = odbc_fetch_array($consulta));
	// fim do if 
	}
	
?>
<br/>
<p align="center" class="joseT"><b>PROGRAMADO DIA: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;REALIZADO DIA:&nbsp;<font color=#01DF3A><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>TOTAL ACUMULADO MES:&nbsp;<font color=#0040FF><?php echo $TACU; ?> M3</p>

</body>
</html>
<?php
// tira o resultado da busca da memória
odbc_free_result($consulta);
?>
