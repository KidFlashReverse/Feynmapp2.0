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
    <div class="menul1">
        <div class="locais1">
            <form action="conexoes/db_cadastro.php" method="post">
                <h1>Cadastro</h1>
                <input type="text" name="nome" id="nome" placeholder="Nome" required><p>
                <input type="email" name="email" id="email" placeholder="Email" required><p>
                <input type="password" name="senha" id="senha" placeholder="Senha" required><p>
                <input type="text" name="telefone" maxlength="13" id="tell" placeholder="(88)99999-9999" required><p>
                <input type="text" name="materia" id="mat" placeholder="Matéria Favorita" required><p>
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
</body>
<script src="../js/js_cadastro.js"></script>
</html>