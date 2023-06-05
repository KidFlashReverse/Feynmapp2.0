<?php
include_once 'db_connect.php';

session_start();

$div = $_POST['novadiv'];
$url = $_SESSION['url'];

$sql = "INSERT INTO ".$url."_divisao values ('', '$div', ".$_SESSION["Id"].")";
$query = mysqli_query($conexao, $sql); 

echo "
    <script>
    window.location = '../add.php?".$url."';
    </script>
";
?>