<?php
session_start();
$_SESSION['logado'] = 0;
session_destroy();
session_abort();
echo "Deslogado";
echo "<a href='../../index.php'>Voltar</a>";

?>