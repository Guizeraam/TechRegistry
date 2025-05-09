<?php
session_start();
if(!isset($_SESSION['usuarioL'])){
    header("Location: ./LOGIN/index.php");
exit;
}
	
	$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");	
	
	$tmed = "SELECT * FROM [dbo].[vw_LP_PROGRAMACAO] WHERE MONTH(DT_ENTREGA) = MONTH(GETDATE()) and YEAR(DT_ENTREGA) = YEAR(GETDATE()) AND FILIAL = '01IND01' ";
	$cmed = odbc_exec($con, $tmed);
	
	$linhaM  = odbc_fetch_array($cmed);
	$totalM = odbc_num_rows($cmed);//CONSULTA PARA TOTAL MES
	//$totalmes = "SELECT * FROM [dbo].[vw_LP_PROGRAMACAO] WHERE MONTH(DT_ENTREGA) = MONTH(GETDATE()) and YEAR(DT_ENTREGA) = YEAR(GETDATE()) AND FILIAL = '01IND01' ";

	$TMEDI = 0;

		if($totalM > 0) {
				do {
					
					$TMEDI = $TMEDI + $linhaM['VOL_ENTR'];
					
					}while($linhaM = odbc_fetch_array($cmed));
			}
?>

<?php
		
	$tvel = "SELECT * FROM [dbo].[vw_LP_PROGRAMACAO] WHERE MONTH(DT_ENTREGA) = MONTH(GETDATE()) and YEAR(DT_ENTREGA) = YEAR(GETDATE()) AND FILIAL = '01IND06' ";
	$cvel = odbc_exec($con, $tvel);
	
	$linhaC  = odbc_fetch_array($cvel);
	$totalC = odbc_num_rows($cvel);//CONSULTA PARA TOTAL MES

	$TVELI = 0;

		if($totalC > 0) {
				do {
					
					$TVELI = $TVELI + $linhaC['VOL_ENTR'];
					
					}while($linhaC = odbc_fetch_array($cvel));
			}
?>

<?php
		
	$tfoz = "SELECT * FROM [dbo].[vw_LP_PROGRAMACAO] WHERE MONTH(DT_ENTREGA) = MONTH(GETDATE()) and YEAR(DT_ENTREGA) = YEAR(GETDATE()) AND FILIAL = '01IND08' ";
	$cfoz = odbc_exec($con, $tfoz);
	
	$linhaF  = odbc_fetch_array($cfoz);
	$totalF = odbc_num_rows($cfoz);//CONSULTA PARA TOTAL MES

	$TFOZI = 0;

		if($totalF > 0) {
				do {
					
					$TFOZI = $TFOZI + $linhaF['VOL_ENTR'];
					
					}while($linhaF = odbc_fetch_array($cfoz));
			}
?>

<?php
		
	$tSTH = "SELECT * FROM [dbo].[vw_LP_PROGRAMACAO] WHERE MONTH(DT_ENTREGA) = MONTH(GETDATE()) and YEAR(DT_ENTREGA) = YEAR(GETDATE()) AND FILIAL = '01IND07' ";
	$cSTH = odbc_exec($con, $tSTH);
	
	$linhaST  = odbc_fetch_array($cSTH);
	$totalST = odbc_num_rows($cSTH);//CONSULTA PARA TOTAL MES

	$TSTH = 0;

		if($totalST > 0) {
				do {
					
					$TSTH = $TSTH + $linhaST['VOL_ENTR'];
					
					}while($linhaST = odbc_fetch_array($cSTH));
			}
?>

<?php

	$TGeral = $TMEDI + $TVELI + $TFOZI + $TSTH;

?>


<meta charset="utf-8"> 
<html>
		<head>
			<title>GERAL</title>
				<link rel="stylesheet" type="text/css" href="./css/lista.css">	
				<?php header("Refresh: 15; url=PATMED.php"); ?>
		</head>
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
					var montharray=new
						Array("Jaineiro","Fevereiro","Março","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro")
						document.write(""+daym+" de "+montharray[month]+" de "+year+"</b></font></small>")
				}
</script>
	<body background="./img/concreto.jpg" bgproperties="fixed">
		<div class="corpoF">
		<p align="LEFT"><img id="rh3" src="./img/CABE_GERAL.png" ></p>
				
			<p align="left" class="joseT2">&nbsp;&nbsp;&nbsp;Valores atualizados:  <font color=#088A29><b><script>EscreveData(); </script></font></p>
			
			<p class="joseT1"><font face="Arial" color="#848484">TOTAL PRODUZIDO PATMED: &nbsp;<font color=#04B404><?php echo $TMEDI; ?> M3</font> </font></p>
			<p class="joseT1"><font face="Arial" color="#848484">TOTAL PRODUZIDO PATVEL: &nbsp;&nbsp;<font color=#FF0040><?php echo $TVELI; ?> M3</font> </font></font></p>
			<p class="joseT1"><font face="Arial" color="#848484">TOTAL PRODUZIDO PATFOZ: &nbsp;&nbsp;<font color=#A901DB><?php echo $TFOZI; ?> M3</font> </font></p>
			<p class="joseT1"><font face="Arial" color="#848484">TOTAL PRODUZIDO PATSTH: &nbsp;&nbsp;<font color=#00688B><?php echo $TSTH; ?> M3</font> </font></p>
			<br/>
			<br/>
			<br/>
			<p class="joseT3"><font face="Arial" color="#585858">TOTAL GERAL: <font color=#4000FF><?php echo $TGeral; ?> M3</font> </font></p>
		
		</div>
	</body>

</html>

