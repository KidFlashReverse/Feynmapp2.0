<?php
include_once "db_connect.php";

session_start();

$url = $_SERVER['QUERY_STRING'];
$conteudo = $_POST['conteudo'];
$tipo = $_POST['tipo'];

$sql = "INSERT INTO ".$url." values ('', '$tipo', '$conteudo', ".$_SESSION['Id'].")";

$query = mysqli_query($conexao, $sql);

$pagina = $_SESSION['pagina'];
$materia = $_SESSION['materia'];

echo "
    <script>
        alert ('Conteudo Adicionado');
        window.location = '../../conteudos/$pagina/$materia.php';
    </script>
";
?>