<?php
	
	
	$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");
	
	$date = date('Y-m-d');
	
	$sql = "SELECT SB1.B1_DESC, SB2.B2_COD, SB2.B2_QATU, SB2.B2_QEMP, SB2.B2_RESERVA
			FROM SB2010 SB2
			INNER JOIN SB1010 SB1 ON SB1.B1_COD = SB2.B2_COD
			WHERE B2_FILIAL = '01IND01' AND B2_LOCAL != '' AND B2_COD IN ('10010100100003','10010100100004', '10010100100005', '10010100100006', '10010100100007', '10010100100008', '10010200100001', '10010200100002', '10010200100002', '10010200100003', '10010200100004', '10010200100005', '10010300100001', '10010400100001', '10010400100002', '10010400100003', '10010400100007', '10010500100042', '10010500100014', '10010500100029', '10010500100036', '10010500200001', '10010500200002', '10010500200003', '10010500800001', '10010501100001', '10010500100025', '10010500100041' ) ORDER BY B2_COD
			";
		
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
	<title>Diário</title>
	<link rel="stylesheet" type="text/css" href="lista.css">
	<?php// header("Refresh: 10;); ?>
	
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
<body background="/PROGRAMACAO/img/concreto.jpg" bgproperties="fixed">
<div class="corpoF">
<br />
<!--<p align="LEFT"><img id="rh2" src="./img/CABE_PATMED.png" ></p>-->


<p align="center" class="jose2">Valor Atualizado em <font color=#088A29><b><script>EscreveData(); </script></font> 

as <font color=#088A29 ><script>EscreveHora();</script></font> &nbsp; FILIAL PATMED</b></p>
			<table class="jose2"  cellspacing="0">
			<tr>
			<td WIDTH=150   class=""    style="border-width:1px; border-style:solid; border-collapse: collapse;">PRODUTO</td>
			<td WIDTH=150   class=""    style="border-width:1px; border-style:solid; border-collapse: collapse;">CODIGO</td>
			<td WIDTH=150   class=""    style="border-width:1px; border-style:solid; border-collapse: collapse;">QUANTIDADE (KG)</td>
			<td WIDTH=150   class=""    style="border-width:1px; border-style:solid; border-collapse: collapse;">EMPENHADO(KG)</td>
			<td WIDTH=150   class=""    style="border-width:1px; border-style:solid; border-collapse: collapse;">RESERVADO(KG)</td>
			<td WIDTH=150   class=""    style="border-width:1px; border-style:solid; border-collapse: collapse;">REAL(KG)</td>
			</tr>
			</table>
<?php
	
	$TPRO = 0;
	$TREA = 0;
	
	
	
	// se o número de resultados for maior que zero, mostra os dados
	if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
			
			$REAL = $linha['B2_QATU'] - ($linha['B2_QEMP'] + $linha['B2_RESERVA'])
						
?>
			
			<table class="jose2"  cellspacing="0">
			<tr>
			<td style="border-width:1px; border-style:solid; border-collapse: collapse;"     class="jose3"   WIDTH=150 ><?=$linha['B1_DESC']?></td>
			<td style="border-width:1px; border-style:solid; border-collapse: collapse;"      class="jose3"   WIDTH=150 ><?=$linha['B2_COD']?></td>
			<td style="border-width:1px; border-style:solid; border-collapse: collapse;"     class="joseVV"  WIDTH=150><?php echo '&nbsp;' . number_format($linha['B2_QATU'], 2, ',', '.');?></td> 
			<td style="border-width:1px; border-style:solid; border-collapse: collapse;"     class="joseA"   WIDTH=150><?php echo '&nbsp;' . number_format($linha['B2_QEMP'], 2, ',', '.');?></td>
			<td style="border-width:1px; border-style:solid; border-collapse: collapse;"      class="joseA"   WIDTH=150><?php echo '&nbsp;' . number_format($linha['B2_RESERVA'], 2, ',', '.');?></td> 
    		<td style="border-width:1px; border-style:solid; border-collapse: collapse;"      class="joseVV"  WIDTH=150><?php echo '&nbsp;' . number_format($REAL, 2, ',', '.');?></td>
			</tr>
			</table>
			
<?php
				
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
