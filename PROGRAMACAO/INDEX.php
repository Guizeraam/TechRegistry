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
	<title>Inicio</title>
	<link rel="stylesheet" type="text/css" href="./css/lista.css">
	</head>
	<script>
    var timeoutID;

    // Função para redirecionar após 5 minutos (300000 milissegundos)
   // Função para redirecionar após 1 hora (3600000 milissegundos)
    function startTimer() {
    timeoutID = window.setTimeout(logoutUser, 3600000); // 1 hora
}


   
    function resetTimer() {
        window.clearTimeout(timeoutID);
        startTimer();
    }

  
    function logoutUser() {
        window.location.href = 'logout.php';
    }

    // Monitora eventos de atividade do usuário
    window.onload = startTimer;
    window.onmousemove = resetTimer;   // Movimentos do mouse
    window.onkeydown = resetTimer;     // Teclas pressionadas
    window.onclick = resetTimer;       // Cliques
    window.onscroll = resetTimer;      // Scroll
</script>

<script>
	// Salvar informações no localStorage
localStorage.setItem('ultimoAcesso', new Date().toISOString());

// Recuperar informações
const ultimoAcesso = localStorage.getItem('ultimoAcesso');
console.log(ultimoAcesso);

</script>
<body background="./img/concreto.jpg" bgproperties="fixed">

	
<div>
		<p id="psel"><img id="sel" src="./img/sel.png"></p>
		<p><a href="./CONSULTA/busca.php" target="_blank"><img id="dia" src="./img/bbusca.png"></a>&nbsp;&nbsp;&nbsp;
		<a href="./DIARIAS/" target="_blank"><img id="dia" src="./img/bdiaria.png"></a>&nbsp;&nbsp;&nbsp;
		<a href="./CALENDARIO.php" target="_blank"><img id="sem" src="./img/bsemanal.png"></a>&nbsp;&nbsp;&nbsp;
		<a href="./ESTOQUE/INDEX.php" target="_blank"><img id="sem" src="./img/bestoque.png"></a>&nbsp;&nbsp;&nbsp;
		<a href="./CP.php" target="_blank"><img id="sem" src="./img/bCP.png"></a>&nbsp;&nbsp;&nbsp;
		<a href="./CONSULTA/GERAL_MENSAL.php" target="_blank"><img id="sem" src="./img/btotal.png"></a> &nbsp;&nbsp;&nbsp; 
	
	</div>
<div id="footer">
    <span>&nbsp;&nbsp;Precisa de ajuda?&nbsp;&nbsp;<a href="https://api.whatsapp.com/send?phone=5545991194829&text=Olá,%20Gostaria%20de%20ajuda%20com%20a%20programação." target="_blank"><img id="imgwpp" src="./img/wpp.png"></a></span> 
</div>

</body>
</html>

