<?php
include_once "db_connect.php";

session_start();

$url = $_SERVER['QUERY_STRING'];
$conteudo = $_POST['conteudo'];
$tipo = $_POST['tipo'];

$sql = "INSERT INTO ".$url." values ('', '$tipo', '$conteudo', ".$_SESSION['Id'].")";

mysqli_query($conexao, $sql);
mysqli_close($conexao);

echo "Adicionado";
echo "<a href='../../conteudos/".$_SESSION['pagina']."/".$_SESSION['materia'].".php'>Voltar</a>";
?>