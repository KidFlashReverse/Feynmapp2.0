<?php
include_once "db_connect.php";
session_start();

$link = $_POST['link'];
$titulo = $_POST['titulo'];
$materia = $_POST['materia'];

$link = str_replace("watch?v=", "embed/", $link);
$link_1 = explode("&", $link);
$link = $link_1[0];

$sql = "INSERT INTO videos values (null, '$link', '$titulo', '$materia')";
$query = mysqli_query($conexao, $sql);

echo "
    <script>
        alert ('Video Adicionado');
        window.location = '../adm.php';
    </script>
";
?>