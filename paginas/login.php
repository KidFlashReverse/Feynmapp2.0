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
    <form action="conexoes/db_login.php" method="post">
        <div class="menul">
        <div class="locais">
        <input type="email" name="email" id="email" placeholder="E-mail"><p>
        <input type="password" name="senha" id="senha" placeholder="Senha"><p>
        <input type="submit" value="Logar">
        </div>
        </div>
        </div>
    </form>
</body>
</html>