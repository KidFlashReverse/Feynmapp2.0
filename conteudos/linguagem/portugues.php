<?php
include_once "../../paginas/conexoes/db_connect.php";

session_start();

if(!isset($_SESSION['Id'])){
    $_SESSION['Id'] = 0; 
}

$divisao = "SELECT * from pt_divisao where Id_usu = 0 or Id_usu = ".$_SESSION['Id']."";
$conn = mysqli_query($conexao, $divisao); 
$dados = mysqli_fetch_assoc($conn);
$total = mysqli_num_rows($conn);

$_SESSION['mat'] = 'pt';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/linguagens.css">
    <title>Português</title>
</head>
<body>
    <section>
        <header>
        <div class="volte2">
            <a href="../../index.php">voltar</a>
        </div>
        <div class="titul2">
            <h1>Português</h1>
        </div>
        </header>
            Conteudos
            <?php
                if($total > 0){
                    do{
                        $mt = "SELECT * from pt where Divisao = ".$dados['Id']." and usuario = 0 or Divisao = ".$dados['Id']." and usuario = ".$_SESSION['Id']."";
                        $conn1 = mysqli_query($conexao, $mt);
                        $dados1 = mysqli_fetch_assoc($conn1);
                        $total1 = mysqli_num_rows($conn1);

            ?>
            <fieldset>
            <div class="content2">
                <legend><?php echo $dados['Divisao'];?></legend>
                    <ul class="conteudos">
                        <?php
                            if ($total1 > 0){       
                                do{
                                    $link = "?".$dados1['Id_cont'];
                        ?>
                                <li><a href='../conteudos.php<?php echo $link;?>'><?php if($dados1['Divisao'] == $dados['Id']){echo $dados1['Conteudo'];}?></a></li>
                        <?php
                                }while($dados1 = mysqli_fetch_assoc($conn1));
                            }
                        ?>
                    </ul>
            </fieldset>
            
            <?php
                    }while($dados = mysqli_fetch_assoc($conn));
                }    
            ?>
        <article>
        </article>
            <div class="add">
                <a href="../../paginas/add.php?pt">+</a>
            </div>
            </div>
        <aside>  
        </aside>
    </section>
</body>
</html>