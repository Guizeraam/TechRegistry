<?php
session_start();
if (!isset($_SESSION['usuarioL'])) {
	header("Location: ./LOGIN/index.php");
	exit;
}

$iphone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'], "iPad");
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'], "webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'], "BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");
$symbian = strpos($_SERVER['HTTP_USER_AGENT'], "Symbian");
if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true): /*Se este dispositivo for portátil, faça/escreva o seguinte */ ?>


	<meta http-equiv='refresh' content='0, url=/PROGRAMACAO/MOBILE.php'>";

<?php else: /* Caso contrário, faça/escreva o seguinte */ ?>

<?php endif; ?>


<?php
$bombaA = '';

$cond = 0;
$_SESSION['cond3'] = 0;

$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");

$MEDSEG = "	SELECT 2 TIPO, FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV
				FROM [dbo].[vw_LP_PROGRAMACAO]  	
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '2' AND FILIAL = '01IND01' 
				GROUP BY FILIAL , AOBRA,DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, OBS_FINALIZACAO, MUNICIPIO , APROV
				
				UNION
				
				SELECT 1 TIPO,'','','','',CONVERT(VARCHAR(10),DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-2),GETDATE()+" . $cond . "),103),'','',0,'','','','',''
			
				ORDER BY TIPO, BOMBA, HORA_ENTREGA";

$conMED = odbc_exec($con, $MEDSEG);

$linhaMED = odbc_fetch_array($conMED); // calcula quantos dados retornaram

$dadosMED = odbc_num_rows($conMED);  // CONSULTA PARA EXIBICAO PROGRAMACAO

$TPRO = 0;
$TREA = 0;

?>

<?php


$MEDTER = "			
				SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA, SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '3' AND FILIAL = '01IND01' 
				GROUP BY FILIAL , AOBRA,DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

$conMED2 = odbc_exec($con, $MEDTER);

$linhaMED2 = odbc_fetch_array($conMED2); // calcula quantos dados retornaram

$dadosMED2 = odbc_num_rows($conMED2);  // CONSULTA PARA EXIBICAO PROGRAMACAO ROUND(CAST (748.58 AS decimal (6,2)),-3)


?>

<?php


$MEDQUA = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '4' AND FILIAL = '01IND01' 
				GROUP BY FILIAL , AOBRA,DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

$conMED3 = odbc_exec($con, $MEDQUA);

$linhaMED3 = odbc_fetch_array($conMED3); // calcula quantos dados retornaram

$dadosMED3 = odbc_num_rows($conMED3);  // CONSULTA PARA EXIBICAO PROGRAMACAO


?>

<?php


$MEDQUI = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '5' AND FILIAL = '01IND01' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

$conMED4 = odbc_exec($con, $MEDQUI);

$linhaMED4 = odbc_fetch_array($conMED4); // calcula quantos dados retornaram

$dadosMED4 = odbc_num_rows($conMED4);  // CONSULTA PARA EXIBICAO PROGRAMACAO


?>

<?php


$MEDSEX = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '6' AND FILIAL = '01IND01' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

$conMED5 = odbc_exec($con, $MEDSEX);

$linhaMED5 = odbc_fetch_array($conMED5); // calcula quantos dados retornaram

$dadosMED5 = odbc_num_rows($conMED5);  // CONSULTA PARA EXIBICAO PROGRAMACAO


?>

<?php


$MEDSAB = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '7' AND FILIAL = '01IND01' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

$conMED6 = odbc_exec($con, $MEDSAB);

$linhaMED6 = odbc_fetch_array($conMED6); // calcula quantos dados retornaram

$dadosMED6 = odbc_num_rows($conMED6);  // CONSULTA PARA EXIBICAO PROGRAMACAO


?>



<!DOCTYPE html>

<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script src="/financeiro/jquery/jquery-2.1.3.js"></script>
	<title>Calendario</title>
	<link rel="stylesheet" type="text/css" href="./css/calendario.css">
	<?php header("Refresh: 30;"); ?>



</head>

<body background="./img/concreto.jpg" bgproperties="fixed">

	<?php

	$diaS = $linhaMED['DATAD'];
	$linhaMED = odbc_fetch_array($conMED);

	?>

	<table>


		<thead>

			<tr>
				<td colspan="7" id="legenda">BE1<font color=#045FB4>[ AJL-9855 ]</font>&nbsp;&nbsp;-&nbsp;&nbsp;BE2<font
						color=#045FB4>[ AQP-4I66 ]</font>&nbsp;&nbsp;-&nbsp;&nbsp;BE3<font color=#045FB4>[ AVT-2C19 ]
					</font>&nbsp;&nbsp;-&nbsp;&nbsp;BL4<font color=#045FB4>[ BAA-2B50 ]</font>
					&nbsp;&nbsp;-&nbsp;&nbsp;BL5<font color=#045FB4>[ EQW-9E10 ]</font>&nbsp;&nbsp;-&nbsp;&nbsp;BL6<font
						color=#045FB4>[ OXC-7023 ]</font>-&nbsp;&nbsp;BL7<font color=#045FB4>[ ARK-2974 ]-</font>
					&nbsp;&nbsp;BE8<font color=#045FB4>[ BDD-8C83 ]</font>&nbsp;&nbsp;-&nbsp;&nbsp;BET9<font
						color=#045FB4>[ AKQ-8995 ]</font>&nbsp;&nbsp;-&nbsp;&nbsp;BET10<font color=#045FB4>[ AKV-0962 ]
					</font>&nbsp;&nbsp;-&nbsp;&nbsp;BL11<font color=#045FB4>[ EBO-2D99 ]</font>
					&nbsp;&nbsp;-&nbsp;&nbsp;BL12<font color=#045FB4>[ SFI-4D68 ]</font>

				</td>
			</tr>

		</thead>

		<thead>

			<tr>

				<td>
					<div class="filial">
						<br /><b>
							<p>P</p>
							<p>T</p>
							<p>A</p>
							<p>M</p>
							<p>E</p>
							<p>D</p>
						</b>
					</div>
				</td>
				<td>
					<div class="diaM semana">
						<span text-align="center">SEGUNDA (<?php echo $diaS; ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php




									if ($dadosMED > 1) {

										do {

											$P = $linhaMED['TOT_PROG'];
											$E = $linhaMED['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}

											$VENDEDOR = $linhaMED['VENDEDOR'];
											$MOTIVO = $linhaMED['MOTIVO'];
											$MUNICIPIO = $linhaMED['MUNICIPIO'];
											$APROV = $linhaMED['APROV'];
											$OBRA = $linhaMED['AOBRA'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaMED['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}



											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaMED['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaMED['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaMED['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaMED['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB>
													<span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>
											<?php

											$TPRO = $TPRO + $linhaMED['TOT_PROG'];
											$TREA = $TREA + $linhaMED['TOT_ENT'];

										} while ($linhaMED = odbc_fetch_array($conMED));

										echo $pula;
									}

									?>

									<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431>
												<?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>
						<?php
						$TPRO = 0;
						$TREA = 0;
						?>

					</div>
				</td>

				<td>
					<div class="diaM semana">



						<span text-align="center">TERCA
							(<?php $data = str_replace("/", "-", $diaS);
							echo date('d/m/Y', strtotime('+1 day', strtotime($data))); ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php
									if ($dadosMED2 > 0) {

										do {
											$P = $linhaMED2['TOT_PROG'];
											$E = $linhaMED2['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}
											$VENDEDOR = $linhaMED2['VENDEDOR'];
											$MOTIVO = $linhaMED2['MOTIVO'];
											$MUNICIPIO = $linhaMED2['MUNICIPIO'];
											$APROV = $linhaMED2['APROV'];
											$OBRA = $linhaMED2['AOBRA'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaMED2['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
									
											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}



											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaMED2['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaMED2['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaMED2['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaMED2['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB><span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>
											<?php

											$TPRO = $TPRO + $linhaMED2['TOT_PROG'];
											$TREA = $TREA + $linhaMED2['TOT_ENT'];


										} while ($linhaMED2 = odbc_fetch_array($conMED2));

										echo $pula;
									}

									?>
									<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431>
												<?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>
						<?php
						$TPRO = 0;
						$TREA = 0;
						?>

					</div>
				</td>

				<td>
					<div class="diaM semana">
						<span text-align="center">QUARTA
							(<?php $data = str_replace("/", "-", $diaS);
							echo date('d/m/Y', strtotime('+2 day', strtotime($data))); ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php
									if ($dadosMED3 > 0) {

										do {

											$P = $linhaMED3['TOT_PROG'];
											$E = $linhaMED3['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}
											$VENDEDOR = $linhaMED3['VENDEDOR'];
											$MOTIVO = $linhaMED3['MOTIVO'];
											$MUNICIPIO = $linhaMED3['MUNICIPIO'];
											$APROV = $linhaMED3['APROV'];
											$OBRA = $linhaMED3['AOBRA'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaMED3['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
									
											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}

											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaMED3['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaMED3['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaMED3['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaMED3['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB><span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>

											<?php

											$TPRO = $TPRO + $linhaMED3['TOT_PROG'];
											$TREA = $TREA + $linhaMED3['TOT_ENT'];

										} while ($linhaMED3 = odbc_fetch_array($conMED3));
										echo $pula;
									}

									?>
									<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431>
												<?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>
						<?php
						$TPRO = 0;
						$TREA = 0;
						?>

					</div>
				</td>

				<td>
					<div class="diaM semana">
						<span text-align="center">QUINTA
							(<?php $data = str_replace("/", "-", $diaS);
							echo date('d/m/Y', strtotime('+3 day', strtotime($data))); ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php
									if ($dadosMED4 > 0) {

										do {
											$P = $linhaMED4['TOT_PROG'];
											$E = $linhaMED4['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}
											$VENDEDOR = $linhaMED4['VENDEDOR'];
											$MOTIVO = $linhaMED4['MOTIVO'];
											$MUNICIPIO = $linhaMED4['MUNICIPIO'];
											$APROV = $linhaMED4['APROV'];
											$OBRA = $linhaMED4['AOBRA'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaMED4['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
									
											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}

											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaMED4['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaMED4['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaMED4['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaMED4['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB><span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>

											<?php

											$TPRO = $TPRO + $linhaMED4['TOT_PROG'];
											$TREA = $TREA + $linhaMED4['TOT_ENT'];

										} while ($linhaMED4 = odbc_fetch_array($conMED4));
										echo $pula;
									}

									?>
									<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431>
												<?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>
						<?php
						$TPRO = 0;
						$TREA = 0;
						?>

					</div>
				</td>

				<td>
					<div class="diaM semana">
						<span text-align="center">SEXTA
							(<?php $data = str_replace("/", "-", $diaS);
							echo date('d/m/Y', strtotime('+4 day', strtotime($data))); ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php
									if ($dadosMED5 > 0) {

										do {
											$P = $linhaMED5['TOT_PROG'];
											$E = $linhaMED5['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}
											$VENDEDOR = $linhaMED5['VENDEDOR'];
											$MOTIVO = $linhaMED5['MOTIVO'];
											$MUNICIPIO = $linhaMED5['MUNICIPIO'];
											$APROV = $linhaMED5['APROV'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaMED5['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
									
											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}

											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaMED5['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaMED5['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaMED5['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaMED5['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB><span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>

											<?php

											$TPRO = $TPRO + $linhaMED5['TOT_PROG'];
											$TREA = $TREA + $linhaMED5['TOT_ENT'];

										} while ($linhaMED5 = odbc_fetch_array($conMED5));
										echo $pula;
									}

									?>
									<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431>
												<?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>
						<?php
						$TPRO = 0;
						$TREA = 0;
						?>

					</div>
				</td>

				<td>
					<div class="diaM semana">
						<span text-align="center">SABADO
							(<?php $data = str_replace("/", "-", $diaS);
							echo date('d/m/Y', strtotime('+5 day', strtotime($data))); ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php
									if ($dadosMED6 > 0) {

										do {
											$P = $linhaMED6['TOT_PROG'];
											$E = $linhaMED6['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}
											$VENDEDOR = $linhaMED6['VENDEDOR'];
											$MOTIVO = $linhaMED6['MOTIVO'];
											$MUNICIPIO = $linhaMED6['MUNICIPIO'];
											$APROV = $linhaMED6['APROV'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaMED6['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
									
											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}

											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaMED6['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaMED6['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaMED6['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaMED6['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB><span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>

											<?php

											$TPRO = $TPRO + $linhaMED6['TOT_PROG'];
											$TREA = $TREA + $linhaMED6['TOT_ENT'];

										} while ($linhaMED6 = odbc_fetch_array($conMED6));
										echo $pula;
									}

									?>
									<p class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3
											</font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?>
												M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>

					</div>
				</td>

			</tr>

		</thead>
		<?php

		$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");

		$FOZSEG = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '2' AND FILIAL = '01IND08' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

		$conFOZ = odbc_exec($con, $FOZSEG);

		$linhaFOZ = odbc_fetch_array($conFOZ); // calcula quantos dados retornaram
		
		$dadosFOZ = odbc_num_rows($conFOZ);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
		$TPRO = 0;
		$TREA = 0;

		?>

		<?php


		$FOZTER = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '3' AND FILIAL = '01IND08' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

		$conFOZ2 = odbc_exec($con, $FOZTER);

		$linhaFOZ2 = odbc_fetch_array($conFOZ2); // calcula quantos dados retornaram
		
		$dadosFOZ2 = odbc_num_rows($conFOZ2);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		

		?>

		<?php


		$FOZQUA = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '4' AND FILIAL = '01IND08' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

		$conFOZ3 = odbc_exec($con, $FOZQUA);

		$linhaFOZ3 = odbc_fetch_array($conFOZ3); // calcula quantos dados retornaram
		
		$dadosFOZ3 = odbc_num_rows($conFOZ3);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		

		?>

		<?php


		$FOZQUI = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '5' AND FILIAL = '01IND08' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

		$conFOZ4 = odbc_exec($con, $FOZQUI);

		$linhaFOZ4 = odbc_fetch_array($conFOZ4); // calcula quantos dados retornaram
		
		$dadosFOZ4 = odbc_num_rows($conFOZ4);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		

		?>

		<?php


		$FOZSEX = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '6' AND FILIAL = '01IND08' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

		$conFOZ5 = odbc_exec($con, $FOZSEX);

		$linhaFOZ5 = odbc_fetch_array($conFOZ5); // calcula quantos dados retornaram
		
		$dadosFOZ5 = odbc_num_rows($conFOZ5);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		

		?>

		<?php


		$FOZSAB = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '7' AND FILIAL = '01IND08' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

		$conFOZ6 = odbc_exec($con, $FOZSAB);

		$linhaFOZ6 = odbc_fetch_array($conFOZ6); // calcula quantos dados retornaram
		
		$dadosFOZ6 = odbc_num_rows($conFOZ6);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		

		?>



		<thead>

			<tr>

				<td>
					<div class="filial">
						<br /><b>
							<p>P</p>
							<p>A</p>
							<p>T</p>
							<p>F</p>
							<p>O</p>
							<p>Z</p>
						</b>
					</div>
				</td>
				<td>
					<div class="diaM semana">
						<span text-align="center">SEGUNDA (<?php echo $diaS; ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php
									if ($dadosFOZ > 0) {

										do {

											$P = $linhaFOZ['TOT_PROG'];
											$E = $linhaFOZ['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}
											$VENDEDOR = $linhaFOZ['VENDEDOR'];
											$MOTIVO = $linhaFOZ['MOTIVO'];
											$MUNICIPIO = $linhaFOZ['MUNICIPIO'];
											$APROV = $linhaFOZ['APROV'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaFOZ['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
									
											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}

											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaFOZ['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaFOZ['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaFOZ['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaFOZ['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB>
													<span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>

											<?php

											$TPRO = $TPRO + $linhaFOZ['TOT_PROG'];
											$TREA = $TREA + $linhaFOZ['TOT_ENT'];


										} while ($linhaFOZ = odbc_fetch_array($conFOZ));
										echo $pula;
									}

									?>
									<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431>
												<?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>
						<?php
						$TPRO = 0;
						$TREA = 0;
						?>

					</div>
				</td>

				<td>
					<div class="diaM semana">
						<span text-align="center">TERCA
							(<?php $data = str_replace("/", "-", $diaS);
							echo date('d/m/Y', strtotime('+1 day', strtotime($data))); ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php
									if ($dadosFOZ2 > 0) {

										do {
											$P = $linhaFOZ2['TOT_PROG'];
											$E = $linhaFOZ2['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}
											$VENDEDOR = $linhaFOZ2['VENDEDOR'];
											$MOTIVO = $linhaFOZ2['MOTIVO'];
											$MUNICIPIO = $linhaFOZ2['MUNICIPIO'];
											$APROV = $linhaFOZ2['APROV'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaFOZ2['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
									
											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}

											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaFOZ2['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaFOZ2['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaFOZ2['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaFOZ2['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB><span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>
											<?php

											$TPRO = $TPRO + $linhaFOZ2['TOT_PROG'];
											$TREA = $TREA + $linhaFOZ2['TOT_ENT'];


										} while ($linhaFOZ2 = odbc_fetch_array($conFOZ2));
										echo $pula;
									}

									?>
									<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431>
												<?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>
						<?php
						$TPRO = 0;
						$TREA = 0;
						?>

					</div>
				</td>

				<td>
					<div class="diaM semana">
						<span text-align="center">QUARTA
							(<?php $data = str_replace("/", "-", $diaS);
							echo date('d/m/Y', strtotime('+2 day', strtotime($data))); ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php
									if ($dadosFOZ3 > 0) {

										do {

											$P = $linhaFOZ3['TOT_PROG'];
											$E = $linhaFOZ3['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}
											$VENDEDOR = $linhaFOZ3['VENDEDOR'];
											$MOTIVO = $linhaFOZ3['MOTIVO'];
											$MUNICIPIO = $linhaFOZ3['MUNICIPIO'];
											$APROV = $linhaFOZ3['APROV'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaFOZ3['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
									
											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}

											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaFOZ3['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaFOZ3['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaFOZ3['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaFOZ3['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB><span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>

											<?php

											$TPRO = $TPRO + $linhaFOZ3['TOT_PROG'];
											$TREA = $TREA + $linhaFOZ3['TOT_ENT'];

										} while ($linhaFOZ3 = odbc_fetch_array($conFOZ3));
										echo $pula;
									}

									?>
									<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431>
												<?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>
						<?php
						$TPRO = 0;
						$TREA = 0;
						?>

					</div>
				</td>

				<td>
					<div class="diaM semana">
						<span text-align="center">QUINTA
							(<?php $data = str_replace("/", "-", $diaS);
							echo date('d/m/Y', strtotime('+3 day', strtotime($data))); ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php
									if ($dadosFOZ4 > 0) {

										do {
											$P = $linhaFOZ4['TOT_PROG'];
											$E = $linhaFOZ4['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}
											$VENDEDOR = $linhaFOZ4['VENDEDOR'];
											$MOTIVO = $linhaFOZ4['MOTIVO'];
											$MUNICIPIO = $linhaFOZ4['MUNICIPIO'];
											$APROV = $linhaFOZ4['APROV'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaFOZ4['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
									
											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}

											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaFOZ4['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaFOZ4['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaFOZ4['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaFOZ4['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB><span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>

											<?php

											$TPRO = $TPRO + $linhaFOZ4['TOT_PROG'];
											$TREA = $TREA + $linhaFOZ4['TOT_ENT'];

										} while ($linhaFOZ4 = odbc_fetch_array($conFOZ4));
										echo $pula;
									}

									?>
									<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431>
												<?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>
						<?php
						$TPRO = 0;
						$TREA = 0;
						?>

					</div>
				</td>

				<td>
					<div class="diaM semana">
						<span text-align="center">SEXTA
							(<?php $data = str_replace("/", "-", $diaS);
							echo date('d/m/Y', strtotime('+4 day', strtotime($data))); ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php
									if ($dadosFOZ5 > 0) {

										do {
											$P = $linhaFOZ5['TOT_PROG'];
											$E = $linhaFOZ5['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}
											$VENDEDOR = $linhaFOZ5['VENDEDOR'];
											$MOTIVO = $linhaFOZ5['MOTIVO'];
											$MUNICIPIO = $linhaFOZ5['MUNICIPIO'];
											$APROV = $linhaFOZ5['APROV'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaFOZ5['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
									
											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}

											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaFOZ5['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaFOZ5['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaFOZ5['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaFOZ5['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB><span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>

											<?php

											$TPRO = $TPRO + $linhaFOZ5['TOT_PROG'];
											$TREA = $TREA + $linhaFOZ5['TOT_ENT'];

										} while ($linhaFOZ5 = odbc_fetch_array($conFOZ5));
										echo $pula;
									}

									?>
									<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431>
												<?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>
						<?php
						$TPRO = 0;
						$TREA = 0;
						?>

					</div>
				</td>

				<td>
					<div class="diaM semana">
						<span text-align="center">SABADO
							(<?php $data = str_replace("/", "-", $diaS);
							echo date('d/m/Y', strtotime('+5 day', strtotime($data))); ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php
									if ($dadosFOZ6 > 0) {

										do {
											$P = $linhaFOZ6['TOT_PROG'];
											$E = $linhaFOZ6['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}
											$VENDEDOR = $linhaFOZ6['VENDEDOR'];
											$MOTIVO = $linhaFOZ6['MOTIVO'];
											$MUNICIPIO = $linhaFOZ6['MUNICIPIO'];
											$APROV = $linhaFOZ6['APROV'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaFOZ6['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
									
											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}

											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaFOZ6['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaFOZ6['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaFOZ6['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaFOZ6['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB><span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>

											<?php

											$TPRO = $TPRO + $linhaFOZ6['TOT_PROG'];
											$TREA = $TREA + $linhaFOZ6['TOT_ENT'];

										} while ($linhaFOZ6 = odbc_fetch_array($conFOZ6));
										echo $pula;
									}

									?>
									<p class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3
											</font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?>
												M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>

					</div>
				</td>

			</tr>

		</thead>

		<?php

		$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");

		$VELSEG = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '2' AND FILIAL = '01IND06' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV 
				ORDER BY BOMBA ,HORA_ENTREGA";

		$conVEL = odbc_exec($con, $VELSEG);

		$linhaVEL = odbc_fetch_array($conVEL); // calcula quantos dados retornaram
		
		$dadosVEL = odbc_num_rows($conVEL);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		
		$TPRO = 0;
		$TREA = 0;

		?>

		<?php


		$VELTER = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '3' AND FILIAL = '01IND06' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

		$conVEL2 = odbc_exec($con, $VELTER);

		$linhaVEL2 = odbc_fetch_array($conVEL2); // calcula quantos dados retornaram
		
		$dadosVEL2 = odbc_num_rows($conVEL2);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		

		?>

		<?php


		$VELQUA = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '4' AND FILIAL = '01IND06' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

		$conVEL3 = odbc_exec($con, $VELQUA);

		$linhaVEL3 = odbc_fetch_array($conVEL3); // calcula quantos dados retornaram
		
		$dadosVEL3 = odbc_num_rows($conVEL3);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		

		?>

		<?php


		$VELQUI = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '5' AND FILIAL = '01IND06' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

		$conVEL4 = odbc_exec($con, $VELQUI);

		$linhaVEL4 = odbc_fetch_array($conVEL4); // calcula quantos dados retornaram
		
		$dadosVEL4 = odbc_num_rows($conVEL4);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		

		?>

		<?php


		$VELSEX = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '6' AND FILIAL = '01IND06' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

		$conVEL5 = odbc_exec($con, $VELSEX);

		$linhaVEL5 = odbc_fetch_array($conVEL5); // calcula quantos dados retornaram
		
		$dadosVEL5 = odbc_num_rows($conVEL5);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		

		?>

		<?php


		$VELSAB = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()) AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '7' AND FILIAL = '01IND06' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

		$conVEL6 = odbc_exec($con, $VELSAB);

		$linhaVEL6 = odbc_fetch_array($conVEL6); // calcula quantos dados retornaram
		
		$dadosVEL6 = odbc_num_rows($conVEL6);  // CONSULTA PARA EXIBICAO PROGRAMACAO
		

		?>










		<thead>

			<tr>

				<td>
					<div class="filial">
						<br /><b>
							<p>P</p>
							<p>A</p>
							<p>T</p>
							<p>V</p>
							<p>E</p>
							<p>L</p>
						</b>
					</div>
				</td>
				<td>
					<div class="diaM semana">
						<span text-align="center">SEGUNDA (<?php echo $diaS; ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php
									if ($dadosVEL > 0) {



										do {

											$P = $linhaVEL['TOT_PROG'];
											$E = $linhaVEL['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}
											$VENDEDOR = $linhaVEL['VENDEDOR'];
											$MOTIVO = $linhaVEL['MOTIVO'];
											$MUNICIPIO = $linhaVEL['MUNICIPIO'];
											$APROV = $linhaVEL['APROV'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaVEL['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
									

											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}

											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaVEL['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaVEL['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaVEL['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaVEL['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB>
													<span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>

											<?php




											$TPRO = $TPRO + $linhaVEL['TOT_PROG'];
											$TREA = $TREA + $linhaVEL['TOT_ENT'];




										} while ($linhaVEL = odbc_fetch_array($conVEL));

										echo $pula;
									}
									?>
									<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431>
												<?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>
						<?php
						$TPRO = 0;
						$TREA = 0;
						?>

					</div>
				</td>

				<td>
					<div class="diaM semana">
						<span text-align="center">TERCA
							(<?php $data = str_replace("/", "-", $diaS);
							echo date('d/m/Y', strtotime('+1 day', strtotime($data))); ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php
									if ($dadosVEL2 > 0) {

										do {
											$P = $linhaVEL2['TOT_PROG'];
											$E = $linhaVEL2['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}
											$VENDEDOR = $linhaVEL2['VENDEDOR'];
											$MOTIVO = $linhaVEL2['MOTIVO'];
											$MUNICIPIO = $linhaVEL2['MUNICIPIO'];
											$APROV = $linhaVEL2['APROV'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaVEL2['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
									
											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}

											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaVEL2['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaVEL2['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaVEL2['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaVEL2['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB><span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>
											<?php

											$TPRO = $TPRO + $linhaVEL2['TOT_PROG'];
											$TREA = $TREA + $linhaVEL2['TOT_ENT'];


										} while ($linhaVEL2 = odbc_fetch_array($conVEL2));
										echo $pula;
									}

									?>
									<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431>
												<?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>
						<?php
						$TPRO = 0;
						$TREA = 0;
						?>

					</div>
				</td>

				<td>
					<div class="diaM semana">
						<span text-align="center">QUARTA
							(<?php $data = str_replace("/", "-", $diaS);
							echo date('d/m/Y', strtotime('+2 day', strtotime($data))); ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php
									if ($dadosVEL3 > 0) {

										do {

											$P = $linhaVEL3['TOT_PROG'];
											$E = $linhaVEL3['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}
											$VENDEDOR = $linhaVEL3['VENDEDOR'];
											$MOTIVO = $linhaVEL3['MOTIVO'];
											$MUNICIPIO = $linhaVEL3['MUNICIPIO'];
											$APROV = $linhaVEL3['APROV'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaVEL3['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
									
											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}

											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaVEL3['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaVEL3['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaVEL3['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaVEL3['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB><span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>

											<?php

											$TPRO = $TPRO + $linhaVEL3['TOT_PROG'];
											$TREA = $TREA + $linhaVEL3['TOT_ENT'];

										} while ($linhaVEL3 = odbc_fetch_array($conVEL3));
										echo $pula;
									}

									?>
									<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431>
												<?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>
						<?php
						$TPRO = 0;
						$TREA = 0;
						?>

					</div>
				</td>

				<td>
					<div class="diaM semana">
						<span text-align="center">QUINTA
							(<?php $data = str_replace("/", "-", $diaS);
							echo date('d/m/Y', strtotime('+3 day', strtotime($data))); ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php
									if ($dadosVEL4 > 0) {

										do {
											$P = $linhaVEL4['TOT_PROG'];
											$E = $linhaVEL4['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}
											$VENDEDOR = $linhaVEL4['VENDEDOR'];
											$MOTIVO = $linhaVEL4['MOTIVO'];
											$MUNICIPIO = $linhaVEL4['MUNICIPIO'];
											$APROV = $linhaVEL4['APROV'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaVEL4['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
									
											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}

											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaVEL4['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaVEL4['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaVEL4['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaVEL4['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB><span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>

											<?php

											$TPRO = $TPRO + $linhaVEL4['TOT_PROG'];
											$TREA = $TREA + $linhaVEL4['TOT_ENT'];

										} while ($linhaVEL4 = odbc_fetch_array($conVEL4));
										echo $pula;
									}

									?>
									<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431>
												<?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>
						<?php
						$TPRO = 0;
						$TREA = 0;
						?>

					</div>
				</td>

				<td>
					<div class="diaM semana">
						<span text-align="center">SEXTA
							(<?php $data = str_replace("/", "-", $diaS);
							echo date('d/m/Y', strtotime('+4 day', strtotime($data))); ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php
									if ($dadosVEL5 > 0) {

										do {
											$P = $linhaVEL5['TOT_PROG'];
											$E = $linhaVEL5['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}
											$VENDEDOR = $linhaVEL5['VENDEDOR'];
											$MOTIVO = $linhaVEL5['MOTIVO'];
											$MUNICIPIO = $linhaVEL5['MUNICIPIO'];
											$APROV = $linhaVEL5['APROV'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaVEL5['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
									
											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}

											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaVEL5['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaVEL5['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaVEL5['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaVEL5['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB><span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>

											<?php

											$TPRO = $TPRO + $linhaVEL5['TOT_PROG'];
											$TREA = $TREA + $linhaVEL5['TOT_ENT'];

										} while ($linhaVEL5 = odbc_fetch_array($conVEL5));
										echo $pula;
									}

									?>
									<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431>
												<?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>
						<?php
						$TPRO = 0;
						$TREA = 0;
						?>

					</div>
				</td>

				<td>
					<div class="diaM semana">
						<span text-align="center">SABADO
							(<?php $data = str_replace("/", "-", $diaS);
							echo date('d/m/Y', strtotime('+5 day', strtotime($data))); ?>)</span>

						<table class="up">
							<tr>
								<td class="conteudo">

									<?php
									if ($dadosVEL6 > 0) {

										do {
											$P = $linhaVEL6['TOT_PROG'];
											$E = $linhaVEL6['TOT_ENT'];


											if ($P != $E) {


												$STATUS = 'P';

											} else {

												$STATUS = '';
											}

											if ($STATUS == 'P') {

												$D = $P - $E;

												$DIF = "" . $D . " M3*";

											} else {

												$DIF = '';

											}
											$VENDEDOR = $linhaVEL6['VENDEDOR'];
											$MOTIVO = $linhaVEL6['MOTIVO'];
											$MUNICIPIO = $linhaVEL6['MUNICIPIO'];
											$APROV = $linhaVEL6['APROV'];

											//SEPARACAO POR BOMBA
											$bombaN = $linhaVEL6['BOMBA'];

											if ($bombaA <> $bombaN) {

												$pula = "<hr>";

												echo $pula;

											}

											$bombaA = $bombaN;
											//FIM DA SEPARACAO
									
											?>
											<p><?php
											if ($APROV == 'S' and $OBRA == '2') {
												echo "<img src='./IMG/verde.png' width=10 height=10 />";
											} else {
												echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
											}

											?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaVEL6['HORA'] ?></font>
												</span>&nbsp;-&nbsp;<span
													title="<?php echo $MUNICIPIO ?>"><?= $linhaVEL6['NOME'] ?></span>&nbsp;<font
													color=#FF0040><?= $linhaVEL6['TOT_PROG'] ?></font> M3 -&nbsp;<font
													color=#045FB4><?= $linhaVEL6['BOMBA'] ?></font>&nbsp;&nbsp;<font
													color=#A901DB><span
														title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
												</font>
											</p>

											<?php

											$TPRO = $TPRO + $linhaVEL6['TOT_PROG'];
											$TREA = $TREA + $linhaVEL6['TOT_ENT'];

										} while ($linhaVEL6 = odbc_fetch_array($conVEL6));
										echo $pula;
									}

									?>
									<p class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3
											</font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?>
												M3 &nbsp;&nbsp;</font>
									</p>

								</td>


							</tr>
						</table>

					</div>
				</td>

			</tr>



			<?php
			$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");

			$LEDOSEG = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '2' AND FILIAL = '01IND09' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conLEDO = odbc_exec($con, $LEDOSEG);

			$linhaLEDO = odbc_fetch_array($conLEDO); // calcula quantos dados retornaram
			
			$dadosLEDO = odbc_num_rows($conLEDO);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			
			$TPRO = 0;
			$TREA = 0;

			?>

			<?php


			$LEDOTER = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '3' AND FILIAL = '01IND09' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conLEDO2 = odbc_exec($con, $LEDOTER);

			$linhaLEDO2 = odbc_fetch_array($conLEDO2); // calcula quantos dados retornaram
			
			$dadosLEDO2 = odbc_num_rows($conLEDO2);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			

			?>

			<?php


			$LEDOQUA = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '4' AND FILIAL = '01IND09' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conLEDO3 = odbc_exec($con, $LEDOQUA);

			$linhaLEDO3 = odbc_fetch_array($conLEDO3); // calcula quantos dados retornaram
			
			$dadosLEDO3 = odbc_num_rows($conLEDO3);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			

			?>

			<?php


			$LEDOQUI = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '5' AND FILIAL = '01IND09' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conLEDO4 = odbc_exec($con, $LEDOQUI);

			$linhaLEDO4 = odbc_fetch_array($conLEDO4); // calcula quantos dados retornaram
			
			$dadosLEDO4 = odbc_num_rows($conLEDO4);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			

			?>

			<?php


			$LEDOSEX = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '6' AND FILIAL = '01IND09' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conLEDO5 = odbc_exec($con, $LEDOSEX);

			$linhaLEDO5 = odbc_fetch_array($conLEDO5); // calcula quantos dados retornaram
			
			$dadosLEDO5 = odbc_num_rows($conLEDO5);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			

			?>

			<?php


			$LEDOSAB = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '7' AND FILIAL = '01IND09' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conLEDO6 = odbc_exec($con, $LEDOSAB);

			$linhaLEDO6 = odbc_fetch_array($conLEDO6); // calcula quantos dados retornaram
			
			$dadosLEDO6 = odbc_num_rows($conLEDO6);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			

			?>

			<thead>

				<tr>

					<td>
						<div class="filial">
							<br /><b>
								<p>P</p>
								<p>A</p>
								<p>T</p>
								<p>L</p>
								<p>E</p>
								<p>D</p>
								<p>O</p>
							</b>
						</div>
					</td>
					<td>
						<div class="diaM semana">
							<span text-align="center">SEGUNDA (<?php echo $diaS; ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosLEDO > 0) {

											do {

												$P = $linhaLEDO['TOT_PROG'];
												$E = $linhaLEDO['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaLEDO['VENDEDOR'];
												$MOTIVO = $linhaLEDO['MOTIVO'];
												$MUNICIPIO = $linhaLEDO['MUNICIPIO'];
												$APROV = $linhaLEDO['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaLEDO['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaLEDO['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<span
														title="<?php echo $MUNICIPIO ?>"><?= $linhaLEDO['NOME'] ?></span>&nbsp;
													<font color=#FF0040><?= $linhaLEDO['TOT_PROG'] ?></font> M3 -&nbsp;<font
														color=#045FB4><?= $linhaLEDO['BOMBA'] ?></font>&nbsp;&nbsp;<font
														color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>

												<?php

												$TPRO = $TPRO + $linhaLEDO['TOT_PROG'];
												$TREA = $TREA + $linhaLEDO['TOT_ENT'];


											} while ($linhaLEDO = odbc_fetch_array($conLEDO));
											echo $pula;
										}

										?>
										<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font
													color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>
							<?php
							$TPRO = 0;
							$TREA = 0;
							?>

						</div>
					</td>

					<td>
						<div class="diaM semana">
							<span text-align="center">TERCA
								(<?php $data = str_replace("/", "-", $diaS);
								echo date('d/m/Y', strtotime('+1 day', strtotime($data))); ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosLEDO2 > 0) {

											do {
												$P = $linhaLEDO2['TOT_PROG'];
												$E = $linhaLEDO2['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaLEDO2['VENDEDOR'];
												$MOTIVO = $linhaLEDO2['MOTIVO'];
												$MUNICIPIO = $linhaLEDO2['MUNICIPIO'];
												$APROV = $linhaLEDO2['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaLEDO2['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaLEDO2['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<span
														title="<?php echo $MUNICIPIO ?>"><?= $linhaLEDO2['NOME'] ?></span>&nbsp;
													<font color=#FF0040><?= $linhaLEDO2['TOT_PROG'] ?></font> M3 -&nbsp;<font
														color=#045FB4><?= $linhaLEDO2['BOMBA'] ?></font>&nbsp;&nbsp;<font
														color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>
												<?php

												$TPRO = $TPRO + $linhaLEDO2['TOT_PROG'];
												$TREA = $TREA + $linhaLEDO2['TOT_ENT'];


											} while ($linhaLEDO2 = odbc_fetch_array($conLEDO2));
											echo $pula;
										}

										?>
										<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font
													color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>
							<?php
							$TPRO = 0;
							$TREA = 0;
							?>

						</div>
					</td>

					<td>
						<div class="diaM semana">
							<span text-align="center">QUARTA
								(<?php $data = str_replace("/", "-", $diaS);
								echo date('d/m/Y', strtotime('+2 day', strtotime($data))); ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosLEDO3 > 0) {

											do {

												$P = $linhaLEDO3['TOT_PROG'];
												$E = $linhaLEDO3['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaLEDO3['VENDEDOR'];
												$MOTIVO = $linhaLEDO3['MOTIVO'];
												$MUNICIPIO = $linhaLEDO3['MUNICIPIO'];
												$APROV = $linhaLEDO3['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaLEDO3['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaLEDO3['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<span
														title="<?php echo $MUNICIPIO ?>"><?= $linhaLEDO3['NOME'] ?></span>&nbsp;
													<font color=#FF0040><?= $linhaLEDO3['TOT_PROG'] ?></font> M3 -&nbsp;<font
														color=#045FB4><?= $linhaLEDO3['BOMBA'] ?></font>&nbsp;&nbsp;<font
														color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>

												<?php

												$TPRO = $TPRO + $linhaLEDO3['TOT_PROG'];
												$TREA = $TREA + $linhaLEDO3['TOT_ENT'];

											} while ($linhaLEDO3 = odbc_fetch_array($conLEDO3));
											echo $pula;
										}

										?>
										<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font
													color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>
							<?php
							$TPRO = 0;
							$TREA = 0;
							?>

						</div>
					</td>

					<td>
						<div class="diaM semana">
							<span text-align="center">QUINTA
								(<?php $data = str_replace("/", "-", $diaS);
								echo date('d/m/Y', strtotime('+3 day', strtotime($data))); ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosLEDO4 > 0) {

											do {
												$P = $linhaLEDO4['TOT_PROG'];
												$E = $linhaLEDO4['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaLEDO4['VENDEDOR'];
												$MOTIVO = $linhaLEDO4['MOTIVO'];
												$MUNICIPIO = $linhaLEDO4['MUNICIPIO'];
												$APROV = $linhaLEDO4['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaLEDO4['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaLEDO4['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<span
														title="<?php echo $MUNICIPIO ?>"><?= $linhaLEDO4['NOME'] ?></span>&nbsp;
													<font color=#FF0040><?= $linhaLEDO4['TOT_PROG'] ?></font> M3 -&nbsp;<font
														color=#045FB4><?= $linhaLEDO4['BOMBA'] ?></font>&nbsp;&nbsp;<font
														color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>

												<?php

												$TPRO = $TPRO + $linhaLEDO4['TOT_PROG'];
												$TREA = $TREA + $linhaLEDO4['TOT_ENT'];

											} while ($linhaLEDO4 = odbc_fetch_array($conLEDO4));
											echo $pula;
										}

										?>
										<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font
													color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>
							<?php
							$TPRO = 0;
							$TREA = 0;
							?>

						</div>
					</td>

					<td>
						<div class="diaM semana">
							<span text-align="center">SEXTA
								(<?php $data = str_replace("/", "-", $diaS);
								echo date('d/m/Y', strtotime('+4 day', strtotime($data))); ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosLEDO5 > 0) {

											do {
												$P = $linhaLEDO5['TOT_PROG'];
												$E = $linhaLEDO5['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaLEDO5['VENDEDOR'];
												$MOTIVO = $linhaLEDO5['MOTIVO'];
												$MUNICIPIO = $linhaLEDO5['MUNICIPIO'];
												$APROV = $linhaLEDO5['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaLEDO5['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaLEDO5['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<span
														title="<?php echo $MUNICIPIO ?>"><?= $linhaLEDO5['NOME'] ?></span>&nbsp;
													<font color=#FF0040><?= $linhaLEDO5['TOT_PROG'] ?></font> M3 -&nbsp;<font
														color=#045FB4><?= $linhaLEDO5['BOMBA'] ?></font>&nbsp;&nbsp;<font
														color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>

												<?php

												$TPRO = $TPRO + $linhaLEDO5['TOT_PROG'];
												$TREA = $TREA + $linhaLEDO5['TOT_ENT'];

											} while ($linhaLEDO5 = odbc_fetch_array($conLEDO5));
											echo $pula;
										}

										?>
										<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font
													color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>
							<?php
							$TPRO = 0;
							$TREA = 0;
							?>

						</div>
					</td>

					<td>
						<div class="diaM semana">
							<span text-align="center">SABADO
								(<?php $data = str_replace("/", "-", $diaS);
								echo date('d/m/Y', strtotime('+5 day', strtotime($data))); ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosLEDO6 > 0) {

											do {
												$P = $linhaLEDO6['TOT_PROG'];
												$E = $linhaLEDO6['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaLEDO6['VENDEDOR'];
												$MOTIVO = $linhaLEDO6['MOTIVO'];
												$MUNICIPIO = $linhaLEDO6['MUNICIPIO'];
												$APROV = $linhaLEDO6['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaLEDO6['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaLEDO6['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<span
														title="<?php echo $MUNICIPIO ?>"><?= $linhaLEDO6['NOME'] ?></span>&nbsp;
													<font color=#FF0040><?= $linhaLEDO6['TOT_PROG'] ?></font> M3 -&nbsp;<font
														color=#045FB4><?= $linhaLEDO6['BOMBA'] ?></font>&nbsp;&nbsp;<font
														color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>

												<?php

												$TPRO = $TPRO + $linhaLEDO6['TOT_PROG'];
												$TREA = $TREA + $linhaLEDO6['TOT_ENT'];

											} while ($linhaLEDO6 = odbc_fetch_array($conLEDO6));
											echo $pula;
										}

										?>
										<p class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?>
													M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>

						</div>
					</td>

				</tr>

			</thead>







			<?php

			$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");

			$STHSEG = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '2' AND FILIAL = '01IND07' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conSTH = odbc_exec($con, $STHSEG);

			$linhaSTH = odbc_fetch_array($conSTH); // calcula quantos dados retornaram
			
			$dadosSTH = odbc_num_rows($conSTH);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			
			$TPRO = 0;
			$TREA = 0;

			?>

			<?php


			$STHTER = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '3' AND FILIAL = '01IND07' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conSTH2 = odbc_exec($con, $STHTER);

			$linhaSTH2 = odbc_fetch_array($conSTH2); // calcula quantos dados retornaram
			
			$dadosSTH2 = odbc_num_rows($conSTH2);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			

			?>

			<?php


			$STHQUA = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '4' AND FILIAL = '01IND07' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conSTH3 = odbc_exec($con, $STHQUA);

			$linhaSTH3 = odbc_fetch_array($conSTH3); // calcula quantos dados retornaram
			
			$dadosSTH3 = odbc_num_rows($conSTH3);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			

			?>

			<?php


			$STHQUI = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '5' AND FILIAL = '01IND07' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conSTH4 = odbc_exec($con, $STHQUI);

			$linhaSTH4 = odbc_fetch_array($conSTH4); // calcula quantos dados retornaram
			
			$dadosSTH4 = odbc_num_rows($conSTH4);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			

			?>

			<?php


			$STHSEX = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '6' AND FILIAL = '01IND07' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conSTH5 = odbc_exec($con, $STHSEX);

			$linhaSTH5 = odbc_fetch_array($conSTH5); // calcula quantos dados retornaram
			
			$dadosSTH5 = odbc_num_rows($conSTH5);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			

			?>

			<?php


			$STHSAB = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '7' AND FILIAL = '01IND07' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conSTH6 = odbc_exec($con, $STHSAB);

			$linhaSTH6 = odbc_fetch_array($conSTH6); // calcula quantos dados retornaram
			
			$dadosSTH6 = odbc_num_rows($conSTH6);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			

			?>
			<thead>

				<tr>

					<td>
						<div class="filial">
							<br /><b>
								<p>P</p>
								<p>A</p>
								<p>T</p>
								<p>S</p>
								<p>T</p>
								<p>H</p>
							</b>
						</div>
					</td>
					<td>
						<div class="diaM semana">
							<span text-align="center">SEGUNDA (<?php echo $diaS; ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosSTH > 0) {

											do {

												$P = $linhaSTH['TOT_PROG'];
												$E = $linhaSTH['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaSTH['VENDEDOR'];
												$MOTIVO = $linhaSTH['MOTIVO'];
												$MUNICIPIO = $linhaSTH['MUNICIPIO'];
												$APROV = $linhaSTH['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaSTH['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaSTH['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<span
														title="<?php echo $MUNICIPIO ?>"><?= $linhaSTH['NOME'] ?></span>&nbsp;
													<font color=#FF0040><?= $linhaSTH['TOT_PROG'] ?></font> M3 -&nbsp;<font
														color=#045FB4><?= $linhaSTH['BOMBA'] ?></font>&nbsp;&nbsp;<font
														color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>

												<?php

												$TPRO = $TPRO + $linhaSTH['TOT_PROG'];
												$TREA = $TREA + $linhaSTH['TOT_ENT'];


											} while ($linhaSTH = odbc_fetch_array($conSTH));
											echo $pula;
										}

										?>
										<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font
													color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>
							<?php
							$TPRO = 0;
							$TREA = 0;
							?>

						</div>
					</td>

					<td>
						<div class="diaM semana">
							<span text-align="center">TERCA
								(<?php $data = str_replace("/", "-", $diaS);
								echo date('d/m/Y', strtotime('+1 day', strtotime($data))); ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosSTH2 > 0) {

											do {
												$P = $linhaSTH2['TOT_PROG'];
												$E = $linhaSTH2['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaSTH2['VENDEDOR'];
												$MOTIVO = $linhaSTH2['MOTIVO'];
												$MUNICIPIO = $linhaSTH2['MUNICIPIO'];
												$APROV = $linhaSTH2['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaSTH2['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaSTH2['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<span
														title="<?php echo $MUNICIPIO ?>"><?= $linhaSTH2['NOME'] ?></span>&nbsp;
													<font color=#FF0040><?= $linhaSTH2['TOT_PROG'] ?></font> M3 -&nbsp;<font
														color=#045FB4><?= $linhaSTH2['BOMBA'] ?></font>&nbsp;&nbsp;<font
														color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>
												<?php

												$TPRO = $TPRO + $linhaSTH2['TOT_PROG'];
												$TREA = $TREA + $linhaSTH2['TOT_ENT'];


											} while ($linhaSTH2 = odbc_fetch_array($conSTH2));
											echo $pula;
										}

										?>
										<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font
													color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>
							<?php
							$TPRO = 0;
							$TREA = 0;
							?>

						</div>
					</td>

					<td>
						<div class="diaM semana">
							<span text-align="center">QUARTA
								(<?php $data = str_replace("/", "-", $diaS);
								echo date('d/m/Y', strtotime('+2 day', strtotime($data))); ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosSTH3 > 0) {

											do {

												$P = $linhaSTH3['TOT_PROG'];
												$E = $linhaSTH3['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaSTH3['VENDEDOR'];
												$MOTIVO = $linhaSTH3['MOTIVO'];
												$MUNICIPIO = $linhaSTH3['MUNICIPIO'];
												$APROV = $linhaSTH3['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaSTH3['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaSTH3['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<span
														title="<?php echo $MUNICIPIO ?>"><?= $linhaSTH3['NOME'] ?></span>&nbsp;
													<font color=#FF0040><?= $linhaSTH3['TOT_PROG'] ?></font> M3 -&nbsp;<font
														color=#045FB4><?= $linhaSTH3['BOMBA'] ?></font>&nbsp;&nbsp;<font
														color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>

												<?php

												$TPRO = $TPRO + $linhaSTH3['TOT_PROG'];
												$TREA = $TREA + $linhaSTH3['TOT_ENT'];

											} while ($linhaSTH3 = odbc_fetch_array($conSTH3));
											echo $pula;
										}

										?>
										<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font
													color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>
							<?php
							$TPRO = 0;
							$TREA = 0;
							?>

						</div>
					</td>

					<td>
						<div class="diaM semana">
							<span text-align="center">QUINTA
								(<?php $data = str_replace("/", "-", $diaS);
								echo date('d/m/Y', strtotime('+3 day', strtotime($data))); ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosSTH4 > 0) {

											do {
												$P = $linhaSTH4['TOT_PROG'];
												$E = $linhaSTH4['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaSTH4['VENDEDOR'];
												$MOTIVO = $linhaSTH4['MOTIVO'];
												$MUNICIPIO = $linhaSTH4['MUNICIPIO'];
												$APROV = $linhaSTH4['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaSTH4['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaSTH4['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<span
														title="<?php echo $MUNICIPIO ?>"><?= $linhaSTH4['NOME'] ?></span>&nbsp;
													<font color=#FF0040><?= $linhaSTH4['TOT_PROG'] ?></font> M3 -&nbsp;<font
														color=#045FB4><?= $linhaSTH4['BOMBA'] ?></font>&nbsp;&nbsp;<font
														color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>

												<?php

												$TPRO = $TPRO + $linhaSTH4['TOT_PROG'];
												$TREA = $TREA + $linhaSTH4['TOT_ENT'];

											} while ($linhaSTH4 = odbc_fetch_array($conSTH4));
											echo $pula;
										}

										?>
										<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font
													color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>
							<?php
							$TPRO = 0;
							$TREA = 0;
							?>

						</div>
					</td>

					<td>
						<div class="diaM semana">
							<span text-align="center">SEXTA
								(<?php $data = str_replace("/", "-", $diaS);
								echo date('d/m/Y', strtotime('+4 day', strtotime($data))); ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosSTH5 > 0) {

											do {
												$P = $linhaSTH5['TOT_PROG'];
												$E = $linhaSTH5['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaSTH5['VENDEDOR'];
												$MOTIVO = $linhaSTH5['MOTIVO'];
												$MUNICIPIO = $linhaSTH5['MUNICIPIO'];
												$APROV = $linhaSTH5['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaSTH5['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaSTH5['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<span
														title="<?php echo $MUNICIPIO ?>"><?= $linhaSTH5['NOME'] ?></span>&nbsp;
													<font color=#FF0040><?= $linhaSTH5['TOT_PROG'] ?></font> M3 -&nbsp;<font
														color=#045FB4><?= $linhaSTH5['BOMBA'] ?></font>&nbsp;&nbsp;<font
														color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>

												<?php

												$TPRO = $TPRO + $linhaSTH5['TOT_PROG'];
												$TREA = $TREA + $linhaSTH5['TOT_ENT'];

											} while ($linhaSTH5 = odbc_fetch_array($conSTH5));
											echo $pula;
										}

										?>
										<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font
													color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>
							<?php
							$TPRO = 0;
							$TREA = 0;
							?>

						</div>
					</td>

					<td>
						<div class="diaM semana">
							<span text-align="center">SABADO
								(<?php $data = str_replace("/", "-", $diaS);
								echo date('d/m/Y', strtotime('+5 day', strtotime($data))); ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosSTH6 > 0) {

											do {
												$P = $linhaSTH6['TOT_PROG'];
												$E = $linhaSTH6['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaSTH6['VENDEDOR'];
												$MOTIVO = $linhaSTH6['MOTIVO'];
												$MUNICIPIO = $linhaSTH6['MUNICIPIO'];
												$APROV = $linhaSTH6['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaSTH6['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaSTH6['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<span
														title="<?php echo $MUNICIPIO ?>"><?= $linhaSTH6['NOME'] ?></span>&nbsp;
													<font color=#FF0040><?= $linhaSTH6['TOT_PROG'] ?></font> M3 -&nbsp;<font
														color=#045FB4><?= $linhaSTH6['BOMBA'] ?></font>&nbsp;&nbsp;<font
														color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>

												<?php

												$TPRO = $TPRO + $linhaSTH6['TOT_PROG'];
												$TREA = $TREA + $linhaSTH6['TOT_ENT'];

											} while ($linhaSTH6 = odbc_fetch_array($conSTH6));
											echo $pula;
										}

										?>
										<p class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?>
													M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>

						</div>
					</td>

				</tr>



			</thead>


			<?php

			$con = odbc_connect("DBPROD", "usrConsulta", "totvs@123") or die("Banco de dados no localizado!");

			$SMISEG = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '2' AND FILIAL = '01IND05' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conSMI = odbc_exec($con, $SMISEG);

			$linhaSMI = odbc_fetch_array($conSMI); // calcula quantos dados retornaram
			
			$dadosSMI = odbc_num_rows($conSMI);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			
			$TPRO = 0;
			$TREA = 0;

			?>

			<?php


			$SMITER = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '3' AND FILIAL = '01IND05' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conSMI2 = odbc_exec($con, $SMITER);

			$linhaSMI2 = odbc_fetch_array($conSMI2); // calcula quantos dados retornaram
			
			$dadosSMI2 = odbc_num_rows($conSMI2);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			

			?>

			<?php


			$SMIQUA = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '4' AND FILIAL = '01IND05' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conSMI3 = odbc_exec($con, $SMIQUA);

			$linhaSMI3 = odbc_fetch_array($conSMI3); // calcula quantos dados retornaram
			
			$dadosSMI3 = odbc_num_rows($conSMI3);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			

			?>

			<?php


			$SMIQUI = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '5' AND FILIAL = '01IND05' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conSMI4 = odbc_exec($con, $SMIQUI);

			$linhaSMI4 = odbc_fetch_array($conSMI4); // calcula quantos dados retornaram
			
			$dadosSMI4 = odbc_num_rows($conSMI4);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			

			?>

			<?php


			$SMISEX = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '6' AND FILIAL = '01IND05' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conSMI5 = odbc_exec($con, $SMISEX);

			$linhaSMI5 = odbc_fetch_array($conSMI5); // calcula quantos dados retornaram
			
			$dadosSMI5 = odbc_num_rows($conSMI5);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			

			?>

			<?php


			$SMISAB = "	SELECT FILIAL , AOBRA, OBS_FINALIZACAO AS MOTIVO, HORA_ENTREGA AS HORA, CONVERT(VARCHAR(5),CAST(DT_ENTREGA AS DATE),103) AS DATAD, LEFT(NOME_OBRA, 12) AS NOME, BOMBA, DATEPART(DW,DT_ENTREGA) AS DIAS_SEMANA,SUBSTRING(CAST(SUM(VOL_PROG) AS VARCHAR),1,4) AS TOT_PROG ,SUBSTRING(CAST(SUM(VOL_ENTR) AS VARCHAR),1,4) AS TOT_ENT, SUBSTRING(NOME_VEND,1,CHARINDEX(' ',NOME_VEND)-1) AS VENDEDOR, MUNICIPIO, APROV		
				FROM [dbo].[vw_LP_PROGRAMACAO] 
				WHERE DT_ENTREGA BETWEEN DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ") AND DATEADD(DW,-(DATEPART(WEEKDAY,GETDATE())-1),GETDATE()+" . $cond . ")+6 AND DATEPART(DW,DT_ENTREGA) = '7' AND FILIAL = '01IND05' 
				GROUP BY FILIAL , AOBRA, DT_ENTREGA,NOME_OBRA, BOMBA, NOME_VEND, HORA_ENTREGA, OBS_FINALIZACAO, MUNICIPIO, APROV ORDER BY BOMBA ,HORA_ENTREGA";

			$conSMI6 = odbc_exec($con, $SMISAB);

			$linhaSMI6 = odbc_fetch_array($conSMI6); // calcula quantos dados retornaram
			
			$dadosSMI6 = odbc_num_rows($conSMI6);  // CONSULTA PARA EXIBICAO PROGRAMACAO
			

			?>


			<thead>

				<tr>

					<td>
						<div class="filial">
							<br /><b>
								<p>P</p>
								<p>A</p>
								<p>T</p>
								<p>S</p>
								<p>M</p>
								<p>I</p>
							</b>
						</div>
					</td>
					<td>
						<div class="diaM semana">
							<span text-align="center">SEGUNDA (<?php echo $diaS; ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosSMI > 0) {

											do {

												$P = $linhaSMI['TOT_PROG'];
												$E = $linhaSMI['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaSMI['VENDEDOR'];
												$MOTIVO = $linhaSMI['MOTIVO'];
												$MUNICIPIO = $linhaSMI['MUNICIPIO'];
												$APROV = $linhaSMI['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaSMI['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaSMI['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<?= $linhaSMI['NOME'] ?>&nbsp;<font color=#FF0040>
														<?= $linhaSMI['TOT_PROG'] ?></font> M3 -&nbsp;<font color=#045FB4>
														<?= $linhaSMI['BOMBA'] ?></font>&nbsp;&nbsp;<font color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>

												<?php

												$TPRO = $TPRO + $linhaSMI['TOT_PROG'];
												$TREA = $TREA + $linhaSMI['TOT_ENT'];


											} while ($linhaSMI = odbc_fetch_array($conSMI));
											echo $pula;
										}

										?>
										<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font
													color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>
							<?php
							$TPRO = 0;
							$TREA = 0;
							?>

						</div>
					</td>

					<td>
						<div class="diaM semana">
							<span text-align="center">TERCA
								(<?php $data = str_replace("/", "-", $diaS);
								echo date('d/m/Y', strtotime('+1 day', strtotime($data))); ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosSMI2 > 0) {

											do {
												$P = $linhaSMI2['TOT_PROG'];
												$E = $linhaSMI2['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaSMI2['VENDEDOR'];
												$MOTIVO = $linhaSMI2['MOTIVO'];
												$MUNICIPIO = $linhaSMI2['MUNICIPIO'];
												$APROV = $linhaSMI2['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaSMI2['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaSMI2['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<span
														title="<?php echo $MUNICIPIO ?>"><?= $linhaSMI2['NOME'] ?></span>&nbsp;
													<font color=#FF0040><?= $linhaSMI2['TOT_PROG'] ?></font> M3 -&nbsp;<font
														color=#045FB4><?= $linhaSMI2['BOMBA'] ?></font>&nbsp;&nbsp;<font
														color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>
												<?php

												$TPRO = $TPRO + $linhaSMI2['TOT_PROG'];
												$TREA = $TREA + $linhaSMI2['TOT_ENT'];


											} while ($linhaSMI2 = odbc_fetch_array($conSMI2));
											echo $pula;
										}

										?>
										<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font
													color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>
							<?php
							$TPRO = 0;
							$TREA = 0;
							?>

						</div>
					</td>

					<td>
						<div class="diaM semana">
							<span text-align="center">QUARTA
								(<?php $data = str_replace("/", "-", $diaS);
								echo date('d/m/Y', strtotime('+2 day', strtotime($data))); ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosSMI3 > 0) {

											do {

												$P = $linhaSMI3['TOT_PROG'];
												$E = $linhaSMI3['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaSMI3['VENDEDOR'];
												$MOTIVO = $linhaSMI3['MOTIVO'];
												$MUNICIPIO = $linhaSMI3['MUNICIPIO'];
												$APROV = $linhaSMI3['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaSMI3['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaSMI3['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<span
														title="<?php echo $MUNICIPIO ?>"><?= $linhaSMI3['NOME'] ?></span>&nbsp;
													<font color=#FF0040><?= $linhaSMI3['TOT_PROG'] ?></font> M3 -&nbsp;<font
														color=#045FB4><?= $linhaSMI3['BOMBA'] ?></font>&nbsp;&nbsp;<font
														color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>

												<?php

												$TPRO = $TPRO + $linhaSMI3['TOT_PROG'];
												$TREA = $TREA + $linhaSMI3['TOT_ENT'];

											} while ($linhaSMI3 = odbc_fetch_array($conSMI3));
											echo $pula;
										}

										?>
										<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font
													color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>
							<?php
							$TPRO = 0;
							$TREA = 0;
							?>

						</div>
					</td>

					<td>
						<div class="diaM semana">
							<span text-align="center">QUINTA
								(<?php $data = str_replace("/", "-", $diaS);
								echo date('d/m/Y', strtotime('+3 day', strtotime($data))); ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosSMI4 > 0) {

											do {
												$P = $linhaSMI4['TOT_PROG'];
												$E = $linhaSMI4['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaSMI4['VENDEDOR'];
												$MOTIVO = $linhaSMI4['MOTIVO'];
												$MUNICIPIO = $linhaSMI4['MUNICIPIO'];
												$APROV = $linhaSMI4['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaSMI4['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaSMI4['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<span
														title="<?php echo $MUNICIPIO ?>"><?= $linhaSMI4['NOME'] ?></span>&nbsp;
													<font color=#FF0040><?= $linhaSMI4['TOT_PROG'] ?></font> M3 -&nbsp;<font
														color=#045FB4><?= $linhaSMI4['BOMBA'] ?></font>&nbsp;&nbsp;<font
														color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>

												<?php

												$TPRO = $TPRO + $linhaSMI4['TOT_PROG'];
												$TREA = $TREA + $linhaSMI4['TOT_ENT'];

											} while ($linhaSMI4 = odbc_fetch_array($conSMI4));
											echo $pula;
										}

										?>
										<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font
													color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>
							<?php
							$TPRO = 0;
							$TREA = 0;
							?>

						</div>
					</td>

					<td>
						<div class="diaM semana">
							<span text-align="center">SEXTA
								(<?php $data = str_replace("/", "-", $diaS);
								echo date('d/m/Y', strtotime('+4 day', strtotime($data))); ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosSMI5 > 0) {

											do {
												$P = $linhaSMI5['TOT_PROG'];
												$E = $linhaSMI5['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaSMI5['VENDEDOR'];
												$MOTIVO = $linhaSMI5['MOTIVO'];
												$MUNICIPIO = $linhaSMI5['MUNICIPIO'];
												$APROV = $linhaSMI5['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaSMI5['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaSMI5['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<span
														title="<?php echo $MUNICIPIO ?>"><?= $linhaSMI5['NOME'] ?></span>&nbsp;
													<font color=#FF0040><?= $linhaSMI5['TOT_PROG'] ?></font> M3 -&nbsp;<font
														color=#045FB4><?= $linhaSMI5['BOMBA'] ?></font>&nbsp;&nbsp;<font
														color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>

												<?php

												$TPRO = $TPRO + $linhaSMI5['TOT_PROG'];
												$TREA = $TREA + $linhaSMI5['TOT_ENT'];

											} while ($linhaSMI5 = odbc_fetch_array($conSMI5));
											echo $pula;
										}

										?>
										<p align="center" class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?> M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font
													color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>
							<?php
							$TPRO = 0;
							$TREA = 0;
							?>

						</div>
					</td>

					<td>
						<div class="diaM semana">
							<span text-align="center">SABADO
								(<?php $data = str_replace("/", "-", $diaS);
								echo date('d/m/Y', strtotime('+5 day', strtotime($data))); ?>)</span>

							<table class="up">
								<tr>
									<td class="conteudo">

										<?php
										if ($dadosSMI6 > 0) {

											do {
												$P = $linhaSMI6['TOT_PROG'];
												$E = $linhaSMI6['TOT_ENT'];


												if ($P != $E) {


													$STATUS = 'P';

												} else {

													$STATUS = '';
												}

												if ($STATUS == 'P') {

													$D = $P - $E;

													$DIF = "" . $D . " M3*";

												} else {

													$DIF = '';

												}
												$VENDEDOR = $linhaSMI6['VENDEDOR'];
												$MOTIVO = $linhaSMI6['MOTIVO'];
												$MUNICIPIO = $linhaSMI6['MUNICIPIO'];
												$APROV = $linhaSMI6['APROV'];

												//SEPARACAO POR BOMBA
												$bombaN = $linhaSMI6['BOMBA'];

												if ($bombaA <> $bombaN) {

													$pula = "<hr>";

													echo $pula;

												}

												$bombaA = $bombaN;
												//FIM DA SEPARACAO
										
												?>
												<p><?php
												if ($APROV == 'S' and $OBRA == '2') {
													echo "<img src='./IMG/verde.png' width=10 height=10 />";
												} else {
													echo "<img src='./IMG/vermelha.png' width=10 height=10 />";
												}

												?>&nbsp;<font color=#8A0808><span title="<?php echo $VENDEDOR ?>"><?= $linhaSMI6['HORA'] ?></font>
													</span>&nbsp;-&nbsp;<span
														title="<?php echo $MUNICIPIO ?>"><?= $linhaSMI6['NOME'] ?></span>&nbsp;
													<font color=#FF0040><?= $linhaSMI6['TOT_PROG'] ?></font> M3 -&nbsp;<font
														color=#045FB4><?= $linhaSMI6['BOMBA'] ?></font>&nbsp;&nbsp;<font
														color=#A901DB><span
															title="<?php echo $MOTIVO ?>"><?php ////echo $STATUS; ?><?php echo $DIF; ?></span>
													</font>
												</p>

												<?php

												$TPRO = $TPRO + $linhaSMI6['TOT_PROG'];
												$TREA = $TREA + $linhaSMI6['TOT_ENT'];

											} while ($linhaSMI6 = odbc_fetch_array($conSMI6));
											echo $pula;
										}

										?>
										<p class="rodape"><b>&nbsp;PROG: <font color=#FF0040>&nbsp;<?php echo $TPRO; ?>
													M3 </font>&nbsp;&nbsp;&nbsp;ENT:&nbsp;<font color=#04B431><?php echo $TREA; ?> M3 &nbsp;&nbsp;</font>
										</p>

									</td>


								</tr>
							</table>

						</div>
					</td>

				</tr>
				<tr>
					<td colspan="4">
						<form method="post" action="?go=anterior"><input type="submit" value="Anterior" id="btnCad"
								name="cond2"></form>
					</td>
					<td colspan="3">
						<form method="post" action="?go=proxima"><input type="submit" value="Proxima" id="btnCad"
								name="cond1"></form>
					</td>
				</tr>


			</thead>


		<tbody>



		</tbody>





	</table>



	</tr>

	</table>




	<?php
	if (@$_GET['go'] == 'proxima') {


		$_SESSION['cond3'] = $_SESSION['cond3'] + 7;

		echo "<meta http-equiv='refresh' content='0, url=/PROGRAMACAO/MES.php'>";

	}

	if (@$_GET['go'] == 'anterior') {


		$_SESSION['cond3'] = $_SESSION['cond3'] - 7;

		echo "<meta http-equiv='refresh' content='0, url=/PROGRAMACAO/MES.php'>";

	}

	?>

</body>

</html>