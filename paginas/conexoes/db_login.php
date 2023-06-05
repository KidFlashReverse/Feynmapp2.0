<?php
include_once "db_connect.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql_email = "SELECT 'Email' FROM login where Email = '$email'";
$sql_senha = "SELECT 'Email', 'Senha' FROM login where Email = '$email' and Senha = '$senha'";

$email_sql = mysqli_query($conexao, $sql_email);
$senha_sql = mysqli_query($conexao, $sql_senha);

if (mysqli_num_rows($email_sql) > 0){
    if (mysqli_num_rows($senha_sql) > 0){
        $sql = "SELECT * from login where Email = '$email' and Senha = '$senha'";
        $connect = mysqli_query($conexao, $sql);

        while ($row = mysqli_fetch_assoc($connect)){
            session_start();
            $_SESSION['logado'] = 1;
            $_SESSION['Id'] = $row['Id'];
            $_SESSION['email'] = $row['Email'];
            $_SESSION['nome'] = $row['Nome'];
            $_SESSION['senha'] = $row['Senha'];
            $_SESSION['telefone'] = $row['Telefone'];
        }
        
        echo "logado";
        mysqli_close($conexao);
        echo "<a href='../../index.php'>Voltar</a>";
    }else{
        echo "Senha incorreta";
    }
}else{
    echo "Email Não Cadastrado";
}


?>