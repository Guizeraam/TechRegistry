<?php
session_start();
if(!isset($_SESSION['usuarioL'])){
    header("Location: ./LOGIN/index.php");
exit;
}

	$CON = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");	
	
	$TMED = "SELECT * FROM [dbo].[vw_LP_PROGRAMACAO] WHERE MONTH(DT_ENTREGA) =  MONTH(GETDATE()) and YEAR(DT_ENTREGA) = YEAR(GETDATE()) AND FILIAL = '01IND01' ";
	$CMED = odbc_exec($CON, $TMED);
	
	$LMED  = odbc_fetch_array($CMED);
	$TCMED = odbc_num_rows($CMED);

	$TOMED = 0;

		if($TCMED > 0) {
				do {
					
					$TOMED = $TOMED + $LMED['VOL_ENTR'];
					
					}while($LMED = odbc_fetch_array($CMED));
			}
?>

<?php

	$CON = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");	
	
	$TCVEL = "SELECT * FROM [dbo].[vw_LP_PROGRAMACAO] WHERE MONTH(DT_ENTREGA) =  MONTH(GETDATE()) and YEAR(DT_ENTREGA) = YEAR(GETDATE()) AND FILIAL = '01IND06' ";
	$CCVEL = odbc_exec($CON, $TCVEL);
	
	$LCVEL  = odbc_fetch_array($CCVEL);
	$TCCVEL = odbc_num_rows($CCVEL);

	$TOCVEL = 0;

		if($TCCVEL > 0) {
				do {
					
					$TOCVEL = $TOCVEL + $LCVEL['VOL_ENTR'];
					
					}while($LCVEL = odbc_fetch_array($CCVEL));
			}
?>

<?php

	$CON = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");	
	
	$TFOZ = "SELECT * FROM [dbo].[vw_LP_PROGRAMACAO] WHERE MONTH(DT_ENTREGA) =  MONTH(GETDATE()) and YEAR(DT_ENTREGA) = YEAR(GETDATE()) AND FILIAL = '01IND08' ";
	$CFOZ = odbc_exec($CON, $TFOZ);
	
	$LFOZ  = odbc_fetch_array($CFOZ);
	$TCFOZ = odbc_num_rows($CFOZ);

	$TOFOZ = 0;

		if($TCFOZ > 0) {
				do {
					
					$TOFOZ = $TOFOZ + $LFOZ['VOL_ENTR'];
					
					}while($LFOZ = odbc_fetch_array($CFOZ));
			}
?>

<?php

	$CON = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");	
	
	$TSTH = "SELECT * FROM [dbo].[vw_LP_PROGRAMACAO] WHERE MONTH(DT_ENTREGA) =  MONTH(GETDATE()) and YEAR(DT_ENTREGA) = YEAR(GETDATE()) AND FILIAL = '01IND07' ";
	$CSTH = odbc_exec($CON, $TSTH);
	
	$LSTH  = odbc_fetch_array($CSTH);
	$TCSTH = odbc_num_rows($CSTH);

	$TOSTH = 0;

		if($TCSTH > 0) {
				do {
					
					$TOSTH = $TOSTH + $LSTH['VOL_ENTR'];
					
					}while($LSTH = odbc_fetch_array($CSTH));
			}
?>

<?php

	$CON = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");	
	
	$TSMI = "SELECT * FROM [dbo].[vw_LP_PROGRAMACAO] WHERE MONTH(DT_ENTREGA) =  MONTH(GETDATE()) and YEAR(DT_ENTREGA) = YEAR(GETDATE()) AND FILIAL = '01IND05' ";
	$CSMI = odbc_exec($CON, $TSMI);
	
	$LSMI  = odbc_fetch_array($CSMI);
	$TCSMI = odbc_num_rows($CSMI);

	$TOSMI = 0;

		if($TCSMI > 0) {
				do {
					
					$TOSMI = $TOSMI + $LSMI['VOL_ENTR'];
					
					}while($LSMI = odbc_fetch_array($CSMI));
			}
?>

<?php

	$CON = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");	
	
	$TTOL = "SELECT * FROM [dbo].[vw_LP_PROGRAMACAO] WHERE MONTH(DT_ENTREGA) =  MONTH(GETDATE()) and YEAR(DT_ENTREGA) = YEAR(GETDATE()) AND FILIAL = '01IND09' ";
	$CTOL = odbc_exec($CON, $TTOL);
	
	$LTOL  = odbc_fetch_array($CTOL);
	$TCTOL = odbc_num_rows($CTOL);

	$TOTOL = 0;

		if($TCTOL > 0) {
				do {
					
					$TOTOL = $TOTOL + $LTOL['VOL_ENTR'];
					
					}while($LTOL = odbc_fetch_array($CTOL));
			}
?>

<?php 

	$TGeral = ($TOMED+$TOCVEL+$TOSTH+$TOFOZ+$TOSMI+$TOTOL)

?>

<meta charset="utf-8"> 
<html>
		<head>
			<title>GERAL</title>
				<link rel="stylesheet" type="text/css" href="lista.css">	
				<?php header("Refresh: 15;"); ?>
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
	<body background="concreto.jpg" bgproperties="fixed">
		<div class="corpoF">
		<p align="LEFT"><img id="rh3" src="CABE_GERAL.png" ></p>
				
			<p align="left" class="joseT2">&nbsp;&nbsp;&nbsp;Valores atualizados:  <font color=#088A29><b><script>EscreveData(); </script></font></p>
			
			<p class="joseT1"><font face="Arial" color="#848484">TOTAL PRODUZIDO PATMED: &nbsp;&nbsp;<font color=#04B404><?php echo $TOMED; ?> M3</font> </font></p>
			<p class="joseT1"><font face="Arial" color="#848484">TOTAL PRODUZIDO PATVEL: &nbsp;&nbsp;<font color=#FF0040><?php echo $TOCVEL; ?> M3</font> </font></font></p>
			<p class="joseT1"><font face="Arial" color="#848484">TOTAL PRODUZIDO PATFOZ: &nbsp;&nbsp;<font color=#A901DB><?php echo $TOFOZ; ?> M3</font> </font></p>
			<p class="joseT1"><font face="Arial" color="#848484">TOTAL PRODUZIDO PATSTH: &nbsp;&nbsp;<font color=#00688B><?php echo $TOSTH; ?> M3</font> </font></p>
			<p class="joseT1"><font face="Arial" color="#848484">TOTAL PRODUZIDO PATSMI: &nbsp;&nbsp;<font color=#04B4AE><?php echo $TOSMI; ?> M3</font> </font></p>
			<p class="joseT1"><font face="Arial" color="#848484">TOTAL PRODUZIDO PATLEDO: &nbsp;&nbsp;<font color=#AEB404><?php echo $TOTOL; ?> M3</font> </font></p>
			<br/>
			<br/>
			<br/>
			<p class="joseT3"><font face="Arial" color="#585858">TOTAL GERAL ATUAL: <font color=#4000FF><?php echo $TGeral; ?> M3</font> </font></p>
		</div>
	</body>

</html>

