<?php
include_once 'db_connect.php';

session_start();

$sql = "DELETE FROM nome_tabela WHERE Id = ".$_SESSION['Id']."";
$query = mysqli_query($conexao, $sql);

echo "
    <script>
        alert('Conta Excluida');
        window.location = ...;
    </script>
";
?>