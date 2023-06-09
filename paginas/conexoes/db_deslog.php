<?php
session_start();
$_SESSION['logado'] = 0;
session_destroy();
session_abort();

echo "
        <script>
            alert ('Deslogado');
            window.location = '../../index.php';
        </script>
    ";

?>