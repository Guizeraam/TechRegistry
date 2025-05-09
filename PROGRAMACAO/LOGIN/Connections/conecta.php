<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conecta = "localhost";
$database_conecta = "lajes_patagonia";
$username_conecta = "root";
$password_conecta = "";
$conecta = mysqli_connect($hostname_conecta, $username_conecta, $password_conecta, $database_conecta) or trigger_error(mysqli_error(),E_USER_ERROR); 
?>