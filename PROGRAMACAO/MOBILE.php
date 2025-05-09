<?php
session_start();
if(!isset($_SESSION['usuarioL'])){
    header("Location: ./LOGIN/index.php");
exit;
}
?>

<?php
		
		
		$cond = 0;
		$_SESSION['cond3'] = 0;
		
		$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");
	
		$MEDSEG = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR
					FROM [dbo].[vw_LP_PROGRAMACAO] 	
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '2' AND FILIAL = '01IND01' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conMED		= odbc_exec($con, $MEDSEG);
	
		$linhaMED	= odbc_fetch_array($conMED); // calcula quantos dados retornaram
		
		$dadosMED	= odbc_num_rows($conMED);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
		$TPRO = 0;
		$TREA = 0;
		
?>

<?php

		
		$MEDTER = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '3' AND FILIAL = '01IND01' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conMED2	= odbc_exec($con, $MEDTER);
	
		$linhaMED2	= odbc_fetch_array($conMED2); // calcula quantos dados retornaram
		
		$dadosMED2	= odbc_num_rows($conMED2);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$MEDQUA = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '4' AND FILIAL = '01IND01' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conMED3	= odbc_exec($con, $MEDQUA);
	
		$linhaMED3	= odbc_fetch_array($conMED3); // calcula quantos dados retornaram
		
		$dadosMED3	= odbc_num_rows($conMED3);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$MEDQUI = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '5' AND FILIAL = '01IND01' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conMED4	= odbc_exec($con, $MEDQUI);
	
		$linhaMED4	= odbc_fetch_array($conMED4); // calcula quantos dados retornaram
		
		$dadosMED4	= odbc_num_rows($conMED4);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$MEDSEX = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '6' AND FILIAL = '01IND01' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conMED5	= odbc_exec($con, $MEDSEX);
	
		$linhaMED5	= odbc_fetch_array($conMED5); // calcula quantos dados retornaram
		
		$dadosMED5	= odbc_num_rows($conMED5);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$MEDSAB = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '7' AND FILIAL = '01IND01' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conMED6	= odbc_exec($con, $MEDSAB);
	
		$linhaMED6	= odbc_fetch_array($conMED6); // calcula quantos dados retornaram
		
		$dadosMED6	= odbc_num_rows($conMED6);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>



<!DOCTYPE html>

<html>

		<head>
				
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

				<title>Calendario</title>
				<link rel="stylesheet" type="text/css" href="./css/calendarioM.css">
				<?php header("Refresh: 30;"); ?>
				
				
				
		</head>

		<body >
				
				
				<table>

						
						<thead class="th">

								<tr  id="legenda">

									<td id="legenda" >P A T M E D</td>
								
								</tr>

						</thead>
						
						<thead>

								<tr>

										
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >SEGUNDA (<?=$linhaMED['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosMED > 0) {
													
													do {
														
														$P = $linhaMED['TOT_PROG'];
														$E = $linhaMED['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														
														$VENDEDOR = $linhaMED['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><span title="<?php echo $VENDEDOR ?>"><?=$linhaMED['HORA']?></font></span></span>&nbsp;-&nbsp;<?=$linhaMED['NOME']?>&nbsp;<font color=#FF0040><?=$linhaMED['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaMED['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>
													
											<?php
													
														$TPRO = $TPRO + $linhaMED['TOT_PROG'];
														$TREA = $TREA + $linhaMED['TOT_ENT'];
																									
													}while($linhaMED = odbc_fetch_array($conMED));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >TERCA (<?=$linhaMED2['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosMED2 > 0) {
													
													do {
														$P = $linhaMED2['TOT_PROG'];
														$E = $linhaMED2['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaMED2['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaMED2['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaMED2['NOME']?>&nbsp;<font color=#FF0040><?=$linhaMED2['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaMED2['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
											<?php
													
														$TPRO = $TPRO + $linhaMED2['TOT_PROG'];
														$TREA = $TREA + $linhaMED2['TOT_ENT'];
														
																									
													}while($linhaMED2 = odbc_fetch_array($conMED2));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >QUARTA (<?=$linhaMED3['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosMED3 > 0) {
													
													do {
														
														$P = $linhaMED3['TOT_PROG'];
														$E = $linhaMED3['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaMED3['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaMED3['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaMED3['NOME']?>&nbsp;<font color=#FF0040><?=$linhaMED3['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaMED3['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
												
											<?php
													
														$TPRO = $TPRO + $linhaMED3['TOT_PROG'];
														$TREA = $TREA + $linhaMED3['TOT_ENT'];
																									
													}while($linhaMED3 = odbc_fetch_array($conMED3));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >QUINTA (<?=$linhaMED4['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosMED4 > 0) {
													
													do {
														$P = $linhaMED4['TOT_PROG'];
														$E = $linhaMED4['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaMED4['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaMED4['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaMED4['NOME']?>&nbsp;<font color=#FF0040><?=$linhaMED4['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaMED4['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
													
											<?php
													
														$TPRO = $TPRO + $linhaMED4['TOT_PROG'];
														$TREA = $TREA + $linhaMED4['TOT_ENT'];
																									
													}while($linhaMED4 = odbc_fetch_array($conMED4));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >SEXTA (<?=$linhaMED5['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosMED5 > 0) {
													
													do {
														$P = $linhaMED5['TOT_PROG'];
														$E = $linhaMED5['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaMED5['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaMED5['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaMED5['NOME']?>&nbsp;<font color=#FF0040><?=$linhaMED5['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaMED5['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
													
											<?php
													
														$TPRO = $TPRO + $linhaMED5['TOT_PROG'];
														$TREA = $TREA + $linhaMED5['TOT_ENT'];
																									
													}while($linhaMED5 = odbc_fetch_array($conMED5));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >SABADO (<?=$linhaMED6['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosMED6 > 0) {
													
													do {
														$P = $linhaMED6['TOT_PROG'];
														$E = $linhaMED6['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaMED6['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaMED6['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaMED6['NOME']?>&nbsp;<font color=#FF0040><?=$linhaMED6['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaMED6['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
													
											<?php
													
														$TPRO = $TPRO + $linhaMED6['TOT_PROG'];
														$TREA = $TREA + $linhaMED6['TOT_ENT'];
																									
													}while($linhaMED6 = odbc_fetch_array($conMED6));
											
												}
												
											?>	
												<p class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
																					
										</div>
										</td>
										</tr>
								</tr>


						</thead>
<?php
		
		
		$cond = 0;
		$_SESSION['cond3'] = 0;
		
		$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");
	
		$FOZSEG = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR
					FROM [dbo].[vw_LP_PROGRAMACAO] 	
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '2' AND FILIAL = '01IND08' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conFOZ		= odbc_exec($con, $FOZSEG);
	
		$linhaFOZ	= odbc_fetch_array($conFOZ); // calcula quantos dados retornaram
		
		$dadosFOZ	= odbc_num_rows($conFOZ);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
		$TPRO = 0;
		$TREA = 0;
		
?>

<?php

		
		$FOZTER = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '3' AND FILIAL = '01IND08' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conFOZ2	= odbc_exec($con, $FOZTER);
	
		$linhaFOZ2	= odbc_fetch_array($conFOZ2); // calcula quantos dados retornaram
		
		$dadosFOZ2	= odbc_num_rows($conFOZ2);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$FOZQUA = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '4' AND FILIAL = '01IND08' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conFOZ3	= odbc_exec($con, $FOZQUA);
	
		$linhaFOZ3	= odbc_fetch_array($conFOZ3); // calcula quantos dados retornaram
		
		$dadosFOZ3	= odbc_num_rows($conFOZ3);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$FOZQUI = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '5' AND FILIAL = '01IND08' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conFOZ4	= odbc_exec($con, $FOZQUI);
	
		$linhaFOZ4	= odbc_fetch_array($conFOZ4); // calcula quantos dados retornaram
		
		$dadosFOZ4	= odbc_num_rows($conFOZ4);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$FOZSEX = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '6' AND FILIAL = '01IND08' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conFOZ5	= odbc_exec($con, $FOZSEX);
	
		$linhaFOZ5	= odbc_fetch_array($conFOZ5); // calcula quantos dados retornaram
		
		$dadosFOZ5	= odbc_num_rows($conFOZ5);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$FOZSAB = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '7' AND FILIAL = '01IND08' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conFOZ6	= odbc_exec($con, $FOZSAB);
	
		$linhaFOZ6	= odbc_fetch_array($conFOZ6); // calcula quantos dados retornaram
		
		$dadosFOZ6	= odbc_num_rows($conFOZ6);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>


<thead class="th">

								<tr id="legenda">

									<td id="legenda">P A T F O Z</td>
								
								</tr>

						</thead>
						
						<thead>

								<tr>

										
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >SEGUNDA (<?=$linhaFOZ['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosFOZ > 0) {
													
													do {
														
														$P = $linhaFOZ['TOT_PROG'];
														$E = $linhaFOZ['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														
														$VENDEDOR = $linhaFOZ['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><span title="<?php echo $VENDEDOR ?>"><?=$linhaFOZ['HORA']?></font></span></span>&nbsp;-&nbsp;<?=$linhaFOZ['NOME']?>&nbsp;<font color=#FF0040><?=$linhaFOZ['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaFOZ['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>
													
											<?php
													
														$TPRO = $TPRO + $linhaFOZ['TOT_PROG'];
														$TREA = $TREA + $linhaFOZ['TOT_ENT'];
																									
													}while($linhaFOZ = odbc_fetch_array($conFOZ));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia"  text-align="center" >TERCA (<?=$linhaFOZ2['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosFOZ2 > 0) {
													
													do {
														$P = $linhaFOZ2['TOT_PROG'];
														$E = $linhaFOZ2['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaFOZ2['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaFOZ2['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaFOZ2['NOME']?>&nbsp;<font color=#FF0040><?=$linhaFOZ2['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaFOZ2['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
											<?php
													
														$TPRO = $TPRO + $linhaFOZ2['TOT_PROG'];
														$TREA = $TREA + $linhaFOZ2['TOT_ENT'];
														
																									
													}while($linhaFOZ2 = odbc_fetch_array($conFOZ2));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div  class="diaM semana">
										<span class="dia"  text-align="center" >QUARTA (<?=$linhaFOZ3['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosFOZ3 > 0) {
													
													do {
														
														$P = $linhaFOZ3['TOT_PROG'];
														$E = $linhaFOZ3['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaFOZ3['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaFOZ3['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaFOZ3['NOME']?>&nbsp;<font color=#FF0040><?=$linhaFOZ3['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaFOZ3['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
												
											<?php
													
														$TPRO = $TPRO + $linhaFOZ3['TOT_PROG'];
														$TREA = $TREA + $linhaFOZ3['TOT_ENT'];
																									
													}while($linhaFOZ3 = odbc_fetch_array($conFOZ3));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia"  text-align="center" >QUINTA (<?=$linhaFOZ4['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosFOZ4 > 0) {
													
													do {
														$P = $linhaFOZ4['TOT_PROG'];
														$E = $linhaFOZ4['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaFOZ4['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaFOZ4['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaFOZ4['NOME']?>&nbsp;<font color=#FF0040><?=$linhaFOZ4['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaFOZ4['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
													
											<?php
													
														$TPRO = $TPRO + $linhaFOZ4['TOT_PROG'];
														$TREA = $TREA + $linhaFOZ4['TOT_ENT'];
																									
													}while($linhaFOZ4 = odbc_fetch_array($conFOZ4));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia"  text-align="center" >SEXTA (<?=$linhaFOZ5['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosFOZ5 > 0) {
													
													do {
														$P = $linhaFOZ5['TOT_PROG'];
														$E = $linhaFOZ5['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaFOZ5['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaFOZ5['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaFOZ5['NOME']?>&nbsp;<font color=#FF0040><?=$linhaFOZ5['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaFOZ5['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
													
											<?php
													
														$TPRO = $TPRO + $linhaFOZ5['TOT_PROG'];
														$TREA = $TREA + $linhaFOZ5['TOT_ENT'];
																									
													}while($linhaFOZ5 = odbc_fetch_array($conFOZ5));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia"  text-align="center" >SABADO (<?=$linhaFOZ6['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosFOZ6 > 0) {
													
													do {
														$P = $linhaFOZ6['TOT_PROG'];
														$E = $linhaFOZ6['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaFOZ6['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaFOZ6['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaFOZ6['NOME']?>&nbsp;<font color=#FF0040><?=$linhaFOZ6['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaFOZ6['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
													
											<?php
													
														$TPRO = $TPRO + $linhaFOZ6['TOT_PROG'];
														$TREA = $TREA + $linhaFOZ6['TOT_ENT'];
																									
													}while($linhaFOZ6 = odbc_fetch_array($conFOZ6));
											
												}
												
											?>	
												<p class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											
																					
										</div>
										</td>
										</tr>
								</tr>


						</thead>						
						
<?php
		
		
		$cond = 0;
		$_SESSION['cond3'] = 0;
		
		$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");
	
		$VELSEG = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR
					FROM [dbo].[vw_LP_PROGRAMACAO] 	
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '2' AND FILIAL = '01IND06' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conVEL		= odbc_exec($con, $VELSEG);
	
		$linhaVEL	= odbc_fetch_array($conVEL); // calcula quantos dados retornaram
		
		$dadosVEL	= odbc_num_rows($conVEL);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
		$TPRO = 0;
		$TREA = 0;
		
?>

<?php

		
		$VELTER = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '3' AND FILIAL = '01IND06' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conVEL2	= odbc_exec($con, $VELTER);
	
		$linhaVEL2	= odbc_fetch_array($conVEL2); // calcula quantos dados retornaram
		
		$dadosVEL2	= odbc_num_rows($conVEL2);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$VELQUA = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '4' AND FILIAL = '01IND06' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conVEL3	= odbc_exec($con, $VELQUA);
	
		$linhaVEL3	= odbc_fetch_array($conVEL3); // calcula quantos dados retornaram
		
		$dadosVEL3	= odbc_num_rows($conVEL3);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$VELQUI = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '5' AND FILIAL = '01IND06' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conVEL4	= odbc_exec($con, $VELQUI);
	
		$linhaVEL4	= odbc_fetch_array($conVEL4); // calcula quantos dados retornaram
		
		$dadosVEL4	= odbc_num_rows($conVEL4);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$VELSEX = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '6' AND FILIAL = '01IND06' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conVEL5	= odbc_exec($con, $VELSEX);
	
		$linhaVEL5	= odbc_fetch_array($conVEL5); // calcula quantos dados retornaram
		
		$dadosVEL5	= odbc_num_rows($conVEL5);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$VELSAB = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '7' AND FILIAL = '01IND06' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conVEL6	= odbc_exec($con, $VELSAB);
	
		$linhaVEL6	= odbc_fetch_array($conVEL6); // calcula quantos dados retornaram
		
		$dadosVEL6	= odbc_num_rows($conVEL6);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<thead class="th">

								<tr id="legenda">

									<td id="legenda">P A T V E L</td>
								
								</tr>

						</thead>
						
						<thead>

								<tr>

										
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >SEGUNDA (<?=$linhaVEL['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosVEL > 0) {
													
													do {
														
														$P = $linhaVEL['TOT_PROG'];
														$E = $linhaVEL['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														
														$VENDEDOR = $linhaVEL['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><span title="<?php echo $VENDEDOR ?>"><?=$linhaVEL['HORA']?></font></span></span>&nbsp;-&nbsp;<?=$linhaVEL['NOME']?>&nbsp;<font color=#FF0040><?=$linhaVEL['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaVEL['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>
													
											<?php
													
														$TPRO = $TPRO + $linhaVEL['TOT_PROG'];
														$TREA = $TREA + $linhaVEL['TOT_ENT'];
																									
													}while($linhaVEL = odbc_fetch_array($conVEL));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >TERCA (<?=$linhaVEL2['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosVEL2 > 0) {
													
													do {
														$P = $linhaVEL2['TOT_PROG'];
														$E = $linhaVEL2['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaVEL2['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaVEL2['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaVEL2['NOME']?>&nbsp;<font color=#FF0040><?=$linhaVEL2['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaVEL2['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
											<?php
													
														$TPRO = $TPRO + $linhaVEL2['TOT_PROG'];
														$TREA = $TREA + $linhaVEL2['TOT_ENT'];
														
																									
													}while($linhaVEL2 = odbc_fetch_array($conVEL2));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >QUARTA (<?=$linhaVEL3['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosVEL3 > 0) {
													
													do {
														
														$P = $linhaVEL3['TOT_PROG'];
														$E = $linhaVEL3['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaVEL3['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaVEL3['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaVEL3['NOME']?>&nbsp;<font color=#FF0040><?=$linhaVEL3['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaVEL3['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
												
											<?php
													
														$TPRO = $TPRO + $linhaVEL3['TOT_PROG'];
														$TREA = $TREA + $linhaVEL3['TOT_ENT'];
																									
													}while($linhaVEL3 = odbc_fetch_array($conVEL3));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >QUINTA (<?=$linhaVEL4['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosVEL4 > 0) {
													
													do {
														$P = $linhaVEL4['TOT_PROG'];
														$E = $linhaVEL4['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaVEL4['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaVEL4['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaVEL4['NOME']?>&nbsp;<font color=#FF0040><?=$linhaVEL4['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaVEL4['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
													
											<?php
													
														$TPRO = $TPRO + $linhaVEL4['TOT_PROG'];
														$TREA = $TREA + $linhaVEL4['TOT_ENT'];
																									
													}while($linhaVEL4 = odbc_fetch_array($conVEL4));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >SEXTA (<?=$linhaVEL5['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosVEL5 > 0) {
													
													do {
														$P = $linhaVEL5['TOT_PROG'];
														$E = $linhaVEL5['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaVEL5['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaVEL5['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaVEL5['NOME']?>&nbsp;<font color=#FF0040><?=$linhaVEL5['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaVEL5['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
													
											<?php
													
														$TPRO = $TPRO + $linhaVEL5['TOT_PROG'];
														$TREA = $TREA + $linhaVEL5['TOT_ENT'];
																									
													}while($linhaVEL5 = odbc_fetch_array($conVEL5));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >SABADO (<?=$linhaVEL6['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosVEL6 > 0) {
													
													do {
														$P = $linhaVEL6['TOT_PROG'];
														$E = $linhaVEL6['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaVEL6['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaVEL6['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaVEL6['NOME']?>&nbsp;<font color=#FF0040><?=$linhaVEL6['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaVEL6['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
													
											<?php
													
														$TPRO = $TPRO + $linhaVEL6['TOT_PROG'];
														$TREA = $TREA + $linhaVEL6['TOT_ENT'];
																									
													}while($linhaVEL6 = odbc_fetch_array($conVEL6));
											
												}
												
											?>	
												<p class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
																					
										</div>
										</td>
										</tr>
								</tr>


						</thead>
<?php
		
		
		$cond = 0;
		$_SESSION['cond3'] = 0;
		
		$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");
	
		$LEDOSEG = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR
					FROM [dbo].[vw_LP_PROGRAMACAO] 	
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '2' AND FILIAL = '01IND09' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conLEDO		= odbc_exec($con, $LEDOSEG);
	
		$linhaLEDO	= odbc_fetch_array($conLEDO); // calcula quantos dados retornaram
		
		$dadosLEDO	= odbc_num_rows($conLEDO);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
		$TPRO = 0;
		$TREA = 0;
		
?>

<?php

		
		$LEDOTER = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '3' AND FILIAL = '01IND09' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conLEDO2	= odbc_exec($con, $LEDOTER);
	
		$linhaLEDO2	= odbc_fetch_array($conLEDO2); // calcula quantos dados retornaram
		
		$dadosLEDO2	= odbc_num_rows($conLEDO2);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$LEDOQUA = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '4' AND FILIAL = '01IND09' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conLEDO3	= odbc_exec($con, $LEDOQUA);
	
		$linhaLEDO3	= odbc_fetch_array($conLEDO3); // calcula quantos dados retornaram
		
		$dadosLEDO3	= odbc_num_rows($conLEDO3);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$LEDOQUI = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '5' AND FILIAL = '01IND09' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conLEDO4	= odbc_exec($con, $LEDOQUI);
	
		$linhaLEDO4	= odbc_fetch_array($conLEDO4); // calcula quantos dados retornaram
		
		$dadosLEDO4	= odbc_num_rows($conLEDO4);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$LEDOSEX = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '6' AND FILIAL = '01IND09' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conLEDO5	= odbc_exec($con, $LEDOSEX);
	
		$linhaLEDO5	= odbc_fetch_array($conLEDO5); // calcula quantos dados retornaram
		
		$dadosLEDO5	= odbc_num_rows($conLEDO5);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$LEDOSAB = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '7' AND FILIAL = '01IND09' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conLEDO6	= odbc_exec($con, $LEDOSAB);
	
		$linhaLEDO6	= odbc_fetch_array($conLEDO6); // calcula quantos dados retornaram
		
		$dadosLEDO6	= odbc_num_rows($conLEDO6);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<thead class="th">

								<tr id="legenda">

									<td id="legenda">P A T L E D O</td>
								
								</tr>

						</thead>
						
						<thead>

								<tr>

										
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >SEGUNDA (<?=$linhaLEDO['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosLEDO > 0) {
													
													do {
														
														$P = $linhaLEDO['TOT_PROG'];
														$E = $linhaLEDO['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														
														$VENDEDOR = $linhaLEDO['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><span title="<?php echo $VENDEDOR ?>"><?=$linhaLEDO['HORA']?></font></span></span>&nbsp;-&nbsp;<?=$linhaLEDO['NOME']?>&nbsp;<font color=#FF0040><?=$linhaLEDO['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaLEDO['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>
													
											<?php
													
														$TPRO = $TPRO + $linhaLEDO['TOT_PROG'];
														$TREA = $TREA + $linhaLEDO['TOT_ENT'];
																									
													}while($linhaLEDO = odbc_fetch_array($conLEDO));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >TERCA (<?=$linhaLEDO2['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosLEDO2 > 0) {
													
													do {
														$P = $linhaLEDO2['TOT_PROG'];
														$E = $linhaLEDO2['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaLEDO2['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaLEDO2['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaLEDO2['NOME']?>&nbsp;<font color=#FF0040><?=$linhaLEDO2['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaLEDO2['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
											<?php
													
														$TPRO = $TPRO + $linhaLEDO2['TOT_PROG'];
														$TREA = $TREA + $linhaLEDO2['TOT_ENT'];
														
																									
													}while($linhaLEDO2 = odbc_fetch_array($conLEDO2));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >QUARTA (<?=$linhaLEDO3['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosLEDO3 > 0) {
													
													do {
														
														$P = $linhaLEDO3['TOT_PROG'];
														$E = $linhaLEDO3['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaLEDO3['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaLEDO3['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaLEDO3['NOME']?>&nbsp;<font color=#FF0040><?=$linhaLEDO3['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaLEDO3['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
												
											<?php
													
														$TPRO = $TPRO + $linhaLEDO3['TOT_PROG'];
														$TREA = $TREA + $linhaLEDO3['TOT_ENT'];
																									
													}while($linhaLEDO3 = odbc_fetch_array($conLEDO3));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >QUINTA (<?=$linhaLEDO4['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosLEDO4 > 0) {
													
													do {
														$P = $linhaLEDO4['TOT_PROG'];
														$E = $linhaLEDO4['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaLEDO4['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaLEDO4['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaLEDO4['NOME']?>&nbsp;<font color=#FF0040><?=$linhaLEDO4['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaLEDO4['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
													
											<?php
													
														$TPRO = $TPRO + $linhaLEDO4['TOT_PROG'];
														$TREA = $TREA + $linhaLEDO4['TOT_ENT'];
																									
													}while($linhaLEDO4 = odbc_fetch_array($conLEDO4));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >SEXTA (<?=$linhaLEDO5['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosLEDO5 > 0) {
													
													do {
														$P = $linhaLEDO5['TOT_PROG'];
														$E = $linhaLEDO5['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaLEDO5['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaLEDO5['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaLEDO5['NOME']?>&nbsp;<font color=#FF0040><?=$linhaLEDO5['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaLEDO5['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
													
											<?php
													
														$TPRO = $TPRO + $linhaLEDO5['TOT_PROG'];
														$TREA = $TREA + $linhaLEDO5['TOT_ENT'];
																									
													}while($linhaLEDO5 = odbc_fetch_array($conLEDO5));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >SABADO (<?=$linhaLEDO6['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosLEDO6 > 0) {
													
													do {
														$P = $linhaLEDO6['TOT_PROG'];
														$E = $linhaLEDO6['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaLEDO6['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaLEDO6['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaLEDO6['NOME']?>&nbsp;<font color=#FF0040><?=$linhaLEDO6['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaLEDO6['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
													
											<?php
													
														$TPRO = $TPRO + $linhaLEDO6['TOT_PROG'];
														$TREA = $TREA + $linhaLEDO6['TOT_ENT'];
																									
													}while($linhaLEDO6 = odbc_fetch_array($conLEDO6));
											
												}
												
											?>	
												<p class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
																					
										</div>
										</td>
										</tr>
								</tr>


						</thead>						


<?php
		
		
		$cond = 0;
		$_SESSION['cond3'] = 0;
		
		$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");
	
		$STHSEG = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR
					FROM [dbo].[vw_LP_PROGRAMACAO] 	
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '2' AND FILIAL = '01IND07' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conSTH		= odbc_exec($con, $STHSEG);
	
		$linhaSTH	= odbc_fetch_array($conSTH); // calcula quantos dados retornaram
		
		$dadosSTH	= odbc_num_rows($conSTH);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
		$TPRO = 0;
		$TREA = 0;
		
?>

<?php

		
		$STHTER = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '3' AND FILIAL = '01IND07' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conSTH2	= odbc_exec($con, $STHTER);
	
		$linhaSTH2	= odbc_fetch_array($conSTH2); // calcula quantos dados retornaram
		
		$dadosSTH2	= odbc_num_rows($conSTH2);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$STHQUA = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '4' AND FILIAL = '01IND07' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conSTH3	= odbc_exec($con, $STHQUA);
	
		$linhaSTH3	= odbc_fetch_array($conSTH3); // calcula quantos dados retornaram
		
		$dadosSTH3	= odbc_num_rows($conSTH3);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$STHQUI = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '5' AND FILIAL = '01IND07' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conSTH4	= odbc_exec($con, $STHQUI);
	
		$linhaSTH4	= odbc_fetch_array($conSTH4); // calcula quantos dados retornaram
		
		$dadosSTH4	= odbc_num_rows($conSTH4);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$STHSEX = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '6' AND FILIAL = '01IND07' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conSTH5	= odbc_exec($con, $STHSEX);
	
		$linhaSTH5	= odbc_fetch_array($conSTH5); // calcula quantos dados retornaram
		
		$dadosSTH5	= odbc_num_rows($conSTH5);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>

<?php

		
		$STHSAB = "	SELECT FILIAL, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, SUBSTRING(NOMECLI,1,CHARINDEX(' ',NOMECLI)-1) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR	
					FROM [dbo].[vw_LP_PROGRAMACAO] 
					WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+".$cond.")+6 AND DATEPART(DW,DT_ENTREGA) = '7' AND FILIAL = '01IND07' 
					GROUP BY FILIAL,DT_ENTREGA,NOMECLI, BOMBA, NOME_VEND, HORA_ENTREGA ORDER BY FILIAL,HORA_ENTREGA";
		
		$conSTH6	= odbc_exec($con, $STHSAB);
	
		$linhaSTH6	= odbc_fetch_array($conSTH6); // calcula quantos dados retornaram
		
		$dadosSTH6	= odbc_num_rows($conSTH6);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
				
?>						
<thead class="th">

								<tr id="legenda">

									<td id="legenda">P A T S T H</td>
								
								</tr>

</thead>
						
						
						
						
						
						
<thead>
								<tr>

										
										<td>
										<div class="diaM semana">
										<span class="dia" text-align="center" >SEGUNDA (<?=$linhaSTH['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosSTH > 0) {
													
													do {
														
														$P = $linhaSTH['TOT_PROG'];
														$E = $linhaSTH['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														
														$VENDEDOR = $linhaSTH['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><span title="<?php echo $VENDEDOR ?>"><?=$linhaSTH['HORA']?></font></span></span>&nbsp;-&nbsp;<?=$linhaSTH['NOME']?>&nbsp;<font color=#FF0040><?=$linhaSTH['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaSTH['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>
													
											<?php
													
														$TPRO = $TPRO + $linhaSTH['TOT_PROG'];
														$TREA = $TREA + $linhaSTH['TOT_ENT'];
																									
													}while($linhaSTH = odbc_fetch_array($conSTH));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia"  text-align="center" >TERCA (<?=$linhaSTH2['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosSTH2 > 0) {
													
													do {
														$P = $linhaSTH2['TOT_PROG'];
														$E = $linhaSTH2['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaSTH2['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaSTH2['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaSTH2['NOME']?>&nbsp;<font color=#FF0040><?=$linhaSTH2['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaSTH2['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
											<?php
													
														$TPRO = $TPRO + $linhaSTH2['TOT_PROG'];
														$TREA = $TREA + $linhaSTH2['TOT_ENT'];
														
																									
													}while($linhaSTH2 = odbc_fetch_array($conSTH2));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div  class="diaM semana">
										<span class="dia"  text-align="center" >QUARTA (<?=$linhaSTH3['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosSTH3 > 0) {
													
													do {
														
														$P = $linhaSTH3['TOT_PROG'];
														$E = $linhaSTH3['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaSTH3['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaSTH3['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaSTH3['NOME']?>&nbsp;<font color=#FF0040><?=$linhaSTH3['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaSTH3['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
												
											<?php
													
														$TPRO = $TPRO + $linhaSTH3['TOT_PROG'];
														$TREA = $TREA + $linhaSTH3['TOT_ENT'];
																									
													}while($linhaSTH3 = odbc_fetch_array($conSTH3));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia"  text-align="center" >QUINTA (<?=$linhaSTH4['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosSTH4 > 0) {
													
													do {
														$P = $linhaSTH4['TOT_PROG'];
														$E = $linhaSTH4['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaSTH4['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaSTH4['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaSTH4['NOME']?>&nbsp;<font color=#FF0040><?=$linhaSTH4['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaSTH4['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
													
											<?php
													
														$TPRO = $TPRO + $linhaSTH4['TOT_PROG'];
														$TREA = $TREA + $linhaSTH4['TOT_ENT'];
																									
													}while($linhaSTH4 = odbc_fetch_array($conSTH4));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia"  text-align="center" >SEXTA (<?=$linhaSTH5['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosSTH5 > 0) {
													
													do {
														$P = $linhaSTH5['TOT_PROG'];
														$E = $linhaSTH5['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaSTH5['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaSTH5['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaSTH5['NOME']?>&nbsp;<font color=#FF0040><?=$linhaSTH5['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaSTH5['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
													
											<?php
													
														$TPRO = $TPRO + $linhaSTH5['TOT_PROG'];
														$TREA = $TREA + $linhaSTH5['TOT_ENT'];
																									
													}while($linhaSTH5 = odbc_fetch_array($conSTH5));
											
												}
												
											?>	
												<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											<?php
												$TPRO = 0;
												$TREA = 0;
											?>
										
										</div>
										</td>
										</tr>
										
										<tr>
										<td>
										<div class="diaM semana">
										<span class="dia"  text-align="center" >SABADO (<?=$linhaSTH6['DATAD']?>)</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
											<?php	
													if($dadosSTH6 > 0) {
													
													do {
														$P = $linhaSTH6['TOT_PROG'];
														$E = $linhaSTH6['TOT_ENT'];
														
														
														If ($P != $E){
															
															
															$STATUS = 'P';
																														
														}
														Else{
															
															$STATUS = '';
														}	
														
														If ($STATUS == 'P'){
															
															$D = $P - $E;
															
															$DIF = "".$D." M3*";
															
														}
														Else{
															
															$DIF = '';
															
														}
														$VENDEDOR = $linhaSTH6['VENDEDOR'];
														
											?>
												<p ><font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?=$linhaSTH6['HORA']?></font></span>&nbsp;-&nbsp;<?=$linhaSTH6['NOME']?>&nbsp;<font color=#FF0040><?=$linhaSTH6['TOT_PROG']?></font> M3 -&nbsp;<font color=#045FB4><?=$linhaSTH6['BOMBA']?></font>&nbsp;&nbsp;<font color=#A901DB><span title="Quantidade Faltante"><?php ////echo $STATUS;?><?php echo $DIF;?></span></font></p>	
													
											<?php
													
														$TPRO = $TPRO + $linhaSTH6['TOT_PROG'];
														$TREA = $TREA + $linhaSTH6['TOT_ENT'];
																									
													}while($linhaSTH6 = odbc_fetch_array($conSTH6));
											
												}
												
											?>	
												<p class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font></p>

												</td>
											
											
											</tr>
											</table>
											
																					
										</div>
										
							
										
	<!-- COMECA SOMA PARA TOTAL GERAL ------------------------------------------------------------------------------------------>
	
	<?php
	
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



<?php 
     $usuarioL = $_SESSION['usuarioL'];
	 $query1 = @mysql_num_rows(mysql_query("SELECT * FROM login WHERE usuario = '$usuarioL' AND tipo = 'ADMIN'"));
		

// select * from tabela where coluna is null -- somente nulos
//select * from tabela where coluna not is null -- Não nulos
?>
<!-- TERMINA A SOMA DO TOTAL GERAL ------------------------------------------------------------->


										<div class="diaM semana">
										<span class="dia"  text-align="center" >------------------------------------------  TOTAL GERAL ------------------------------------------</span>
										
											<table class="up">
											<tr>
												<td class="conteudo">
												
												<div class="corpoF">
												<!--<p align="LEFT"><img id="rh3" src="./img/CABE_GERAL.png" ></p>-->
													<?php 
													if($query1 == 0){ 
													?>	
													<p align="left" class="joseT2">&nbsp;&nbsp;&nbsp;Valores atualizados:  <font color=#088A29><b><script>EscreveData(); </script></font></p>
													<br/>
													<p class="joseT1"><font face="Arial" color="#848484">TOTAL PRODUZIDO PATMED: &nbsp;<font color=#04B404><?php echo $TMEDI; ?> M3</font> </font></p>
													<p class="joseT1"><font face="Arial" color="#848484">TOTAL PRODUZIDO PATVEL: &nbsp;&nbsp;<font color=#FF0040><?php echo $TVELI; ?> M3</font> </font></font></p>
													<p class="joseT1"><font face="Arial" color="#848484">TOTAL PRODUZIDO PATFOZ: &nbsp;&nbsp;<font color=#A901DB><?php echo $TFOZI; ?> M3</font> </font></p>
													<p class="joseT1"><font face="Arial" color="#848484">TOTAL PRODUZIDO PATSTH: &nbsp;&nbsp;<font color=#00688B><?php echo $TSTH; ?> M3</font> </font></p>
													<br/>
													<br/>
													<br/>
													<p class="joseT3"><font face="Arial" color="#585858">TOTAL GERAL: <font color=#4000FF><?php echo $TGeral; ?> M3</font> </font></p>
													<?php 
													}; 
													?>	
												</div>
											
												</td>
											</tr>
											</table>
											
																					
										</div>
										</td>
										</tr>
								</tr>


						</thead>
																					
															
			</table>
		
				
		
    </tr>
	
</table>




<?php
if(@$_GET['go'] == 'proxima'){
	
					
				$_SESSION['cond3'] = $_SESSION['cond3'] + 7;
				
				echo "<meta http-equiv='refresh' content='0, url=/PROGRAMACAO/MES.php'>";
										
			}

if(@$_GET['go'] == 'anterior'){
	
					
				$_SESSION['cond3'] = $_SESSION['cond3'] -7;
				
				echo "<meta http-equiv='refresh' content='0, url=/PROGRAMACAO/MES.php'>";
										
			}			

?>


</html>