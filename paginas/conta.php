<?php
include_once "conexoes/db_connect.php";
session_start();
$GLOBALS["conexao"] = $conexao;

$sql = "SELECT * FROM login WHERE Id = ".$_SESSION['Id']."";
$query = mysqli_query($conexao, $sql);
$list = mysqli_fetch_assoc($query);

$GLOBALS['Id'] = $_SESSION['Id'];

if(array_key_exists('button1', $_POST)){
    button1();
}
if(array_key_exists('button2', $_POST)){
    button2();
}
function button1(){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $materia = $_POST['materia'];

    $sql = "UPDATE `login` SET `Id`='".$GLOBALS['Id']."',`Nome`='$nome',`Email`='$email',`Senha`='$senha',`Telefone`='$telefone',`materiaFavorita`='$materia',`adm`='0  ' WHERE Id = ".$GLOBALS['Id']."";
    $query = mysqli_query($GLOBALS["conexao"], $sql);

    echo "
        <script>
            alert ('Informações editadas');
            window.location = 'conta.php';
        </script>
    ";
}
function button2(){
    $sql = "DELETE FROM `login` WHERE Id = ".$GLOBALS['Id']."";
    $query = mysqli_query($GLOBALS["conexao"], $sql);

    session_destroy();
    session_abort();

    echo "
        <script>
            alert ('Conta Excluida');
            window.location = '../index.php';
        </script>
    ";
}
?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/conta.css">
        <title>Conta</title>
    </head>
    <body> 
        <div class="volte">
            <a href="../index.php"><img src="../imgs/voltar.png" class="media-object  img-responsive img-thumbnail" width="20px"></a>
        </div>
        <div class="menul1">
            <div class="locais1">
                <form action="#" method="post">
                    <h1>Conta</h1>
                    <h5>Edite suas Informações</h5>
                    <input type="text" name="nome" id="nome" class="form__field" placeholder="Nome" value="<?php echo $list['Nome'];?>" ><p>
                    <input type="email" name="email" id="email" class="form__field" placeholder="Email" value="<?php echo $list['Email'];?>" ><p>
                    <input type="password" name="senha" id="senha" class="form__field" placeholder="Senha" value="<?php echo $list['Senha'];?>" ><img src="https://cdn.pixabay.com/photo/2017/06/09/18/06/eye-2387853_1280.png" id="ver" onclick="verr()" alt=""><p>
                    <input type="text" name="telefone" maxlength="13" id="tell" class="form__field" placeholder="Telefone" value="<?php echo $list['Telefone'];?>" ><p>
                    <input type="text" name="materia" id="mat" class="form__field" placeholder="Matéria Favorita" value="<?php echo $list['materiaFavorita'];?>" ><p>
                    <button type="submit" name="button1" id="btn1">Editar</button>
                    <button type="submit" name="button2" id="btn2">Excluir</button>
                </form>
            </div>
        </div>
    </body>
    <script src="../js/conta.js"></script>
</html>