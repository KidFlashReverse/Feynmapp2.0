<?php
session_start();
$_SESSION['logado'] = 0;
session_destroy();
echo "Deslogado";
echo "<a href='../../index.php'>Voltar</a>";

?>