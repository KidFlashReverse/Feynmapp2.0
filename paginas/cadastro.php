<?php
session_start();

if(isset($_SESSION['email_existente'])){
    if($_SESSION['email_existente'] == 1){
        echo "
            <script>
                alert('Email já existe no banco');
            </script>
        ";
        $_SESSION['email_existente'] = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
<form action="conexoes/db_cadastro.php" method="post">
        <div class="menul1">
        <div class="locais1">
        <input type="text" name="nome" id="nome" placeholder="Nome" required><p>
        <input type="email" name="email" id="email" placeholder="Email" required><p>
        <input type="password" name="senha" id="senha" placeholder="Senha" required><p>
        <input type="text" name="telefone" maxlength="13" id="tell" placeholder="(88)99999-9999" required><p>
        <input type="submit" value="Cadastrar">
        </div>
        </div>
    </form>
</body>
<script src="../js/js_cadastro.js"></script>
</html>