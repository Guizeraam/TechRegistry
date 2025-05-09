<?php
session_start();
if(!isset($_SESSION['usuarioL'])){
    header("Location: ./LOGIN/index.php");
exit;
}
?>
<meta charset="utf-8"> 
<html>
	<head>
	<title>Diarias</title>
	<link rel="stylesheet" type="text/css" href="./lista.css">
	</head>
	
<body background="./concreto.jpg" bgproperties="fixed">
	<div>
		<!--<img id="sel" src="./img/sel.png">-->
		<BR />
		<BR />
		<BR />
		<BR />
		<BR />
		<p><a href="./PATMED.php" target="_blank"><img id="dia" src="./bpatmed.png"></a>&nbsp;&nbsp;&nbsp;<a href="./PATVEL.php" target="_blank"><img id="dia" src="./bpatvel.png"></a>&nbsp;&nbsp;&nbsp;<a href="./PATFOZ.php" target="_blank"><img id="sem" src="./bpatfoz.png"></a>&nbsp;&nbsp;&nbsp;<a href="./PATLEDO.php" target="_blank"><img id="sem" src="./bpatledo.png"></a>&nbsp;&nbsp;&nbsp;<a href="./PATSTH.php" target="_blank"><img id="sem" src="./bpatsth.png"></a></p>
	</div>
</body>
</html>

