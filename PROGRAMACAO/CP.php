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
	<title>Diário</title>
	<link rel="stylesheet" type="text/css" href="/programacao/css/lista.css">
	<?php //header("Refresh: 10; url=patvel.php"); ?>
	</head>
	
<body background="/programacao//img/concreto.jpg" bgproperties="fixed">
<div class="corpoF">
	<iframe width="1750" height="1000" src="https://app.powerbi.com/reportEmbed?reportId=002bb21c-3561-4f93-a409-fcc6f6407170&groupId=680ea65f-1633-4b87-920c-8fd5df5eea24&autoAuth=true&ctid=b7c5de00-ddbe-4b2f-83ea-96b056d4c35e&config=eyJjbHVzdGVyVXJsIjoiaHR0cHM6Ly93YWJpLWJyYXppbC1zb3V0aC1yZWRpcmVjdC5hbmFseXNpcy53aW5kb3dzLm5ldC8ifQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe>
<div>
</body>
</html>
