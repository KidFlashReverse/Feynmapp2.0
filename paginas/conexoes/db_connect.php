<?php
$dbname = "feynmapp";
$host = "localhost";
$user = "root";
$pass = "";

$conexao = mysqli_connect($host, $user, $pass, $dbname);

return $conexao;

?>