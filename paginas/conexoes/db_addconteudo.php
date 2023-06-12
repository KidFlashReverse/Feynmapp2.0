<?php
include_once 'db_connect.php';

session_start();

$id_usu = $_SESSION['Id'];
$titulo = $_SESSION['Titulo'];
$topicos = $_POST['topicos'];
$foto = $_FILES['foto']['tmp_name'];
$tamanho = $_FILES['foto']['size'];
$texto = $_POST['texto'];
$link = $_POST['links'];
$data = date('Y/m/d');

$fp = fopen($foto, "rb");
$conteudo = fread($fp, $tamanho);
$conteudo = addslashes($conteudo);
fclose($fp);

$sql = "INSERT INTO ".$_SESSION["Save_materia"]."_conteudo values(null, '$id_usu', '$titulo', '$topicos', '$conteudo', '$texto', '$link', '$data')";
$query = mysqli_query($conexao, $sql);

echo "
    <script>
    alert ('Anotações Adicionadas');
    window.location = '../../conteudos/conteudos.php?".$_SESSION['id_mat']."';
    </script>
";
?>