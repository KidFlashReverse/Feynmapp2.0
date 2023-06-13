<?php
include_once "conexoes/db_connect.php";
session_start();

if(isset($_SESSION['logado']) == false){
    echo "
        <script>
            alert ('Você deve estar logado');
            window.location = '../index.php';
        </script>
    ";
}

$sql = "SELECT * from revisao WHERE Id_usu = ".$_SESSION['Id']."";
$query = mysqli_query($conexao, $sql);
$row = mysqli_num_rows($query);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/revisao.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Revisao</title>
</head>
<body>
    <div class="centralizar" id="tela_dica">
        <div class="tela_dica">
            <button onclick="voltar()">X</button>
            <h1>Como deve ser feito o Horário</h1>
            <img src="../imgs/exemplo.bmp" alt="">
            <p>Os períodos de estudo devem ser definidos desta forma: as horas no padrão 00:00, separando o começo de um período para o seu término por meio de um hífen (-). Para definir outro período, deve utilizar ponto e vírgula (;), A quatidade de matérias corresponde a quantidade de períodos. Caso você queira definir um conteúdo específico, basta utilizar o hífem.</p>
        </div>
    </div>
    <article id="article">
        <div class="volte">
            <a href="../index.php"><img src="../imgs/voltar.png" class="media-object  img-responsive img-thumbnail" width="30px"></a>
        </div>
        <h1>Futuras Revisões</h1>
        <div class="botoes">
            <button onclick="dica()">Como Registrar Horário</button>
        </div>
        <br>
        
    </article>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="../js/horario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>