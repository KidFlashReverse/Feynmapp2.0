<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="volte">
        <a href="../index.php"><img src="../imgs/voltar.png" class="media-object  img-responsive img-thumbnail" width="20px"></a>
    </div>
    <div class="menul">
        <div class="locais">
            <form action="conexoes/db_login.php" method="post">
                <h1>Login</h1>
                <input type="email" name="email" id="email" placeholder="E-mail"><p>
                <input type="password" name="senha" id="senha" placeholder="Senha"><p>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>