<?php
include_once "db_connect.php";

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$telefone = $_POST['telefone'];

$par = array("(", ")");
$tell = str_replace($par, "", $telefone);

$sql_verificar = "SELECT * from login where Email = '$email'";
$conn = mysqli_query($conexao, $sql_verificar);

if(mysqli_num_rows($conn) > 0){
    echo "Email já existente";
    mysqli_close($conexao);
    header('Location: ../cadastro.php');
    session_start();
    $_SESSION['email_existente'] = 1;
    die();
}

$sql = "INSERT INTO login values (null, '$nome', '$email', '$senha', '$tell', 0)";

mysqli_query($conexao, $sql);
mysqli_close($conexao);

echo "
    <script>
    alert ('Cadastro Realizado');
    window.location = '../login.php';
    </script>
";
?>