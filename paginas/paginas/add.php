<?php
include_once "conexoes/db_connect.php";

session_start();

$url = $_SERVER['QUERY_STRING'];
$materia;
$_SESSION['url'] = $url;

if($url == "pt"){
    $materia = "Português";
    $_SESSION['pagina'] = "linguagem";
    $_SESSION['materia'] = "portugues";

    $divisao = "SELECT * from pt_divisao where Id_usu = 0 or Id_usu = ".$_SESSION['Id']."";
    $conn = mysqli_query($conexao, $divisao); 
    $dados = mysqli_fetch_assoc($conn);
    $total = mysqli_num_rows($conn);
}else if($url == "mt"){
    $materia = "Matemática";
    $_SESSION['pagina'] = "exatas";
    $_SESSION['materia'] = "matematica";

    $divisao = "SELECT * from mt_divisao where Id_usu = 0 or Id_usu = ".$_SESSION['Id']."";
    $conn = mysqli_query($conexao, $divisao); 
    $dados = mysqli_fetch_assoc($conn);
    $total = mysqli_num_rows($conn);
}else if($url == "art"){
    $materia = "Artes";
    $_SESSION['pagina'] = "linguagem";
    $_SESSION['materia'] = "artes";

    $divisao = "SELECT * from art_divisao where Id_usu = 0 or Id_usu = ".$_SESSION['Id']."";
    $conn = mysqli_query($conexao, $divisao); 
    $dados = mysqli_fetch_assoc($conn);
    $total = mysqli_num_rows($conn);
}else if($url == "edf"){
    $materia = "Educação Física";
    $_SESSION['pagina'] = "linguagem";
    $_SESSION['materia'] = "edfisica";

    $divisao = "SELECT * from edf_divisao where Id_usu = 0 or Id_usu = ".$_SESSION['Id']."";
    $conn = mysqli_query($conexao, $divisao); 
    $dados = mysqli_fetch_assoc($conn);
    $total = mysqli_num_rows($conn);
}else if($url == "es"){
    $materia = "Edspanhol";
    $_SESSION['pagina'] = "linguagem";
    $_SESSION['materia'] = "espanhol";

    $divisao = "SELECT * from es_divisao where Id_usu = 0 or Id_usu = ".$_SESSION['Id']."";
    $conn = mysqli_query($conexao, $divisao); 
    $dados = mysqli_fetch_assoc($conn);
    $total = mysqli_num_rows($conn);
}else if($url == "red"){
    $materia = "Redação";
    $_SESSION['pagina'] = "linguagem";
    $_SESSION['materia'] = "redacao";

    $divisao = "SELECT * from red_divisao where Id_usu = 0 or Id_usu = ".$_SESSION['Id']."";
    $conn = mysqli_query($conexao, $divisao); 
    $dados = mysqli_fetch_assoc($conn);
    $total = mysqli_num_rows($conn);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/add.css">
    <title><?php echo $materia;?></title>
</head>
<body>
    <section>
        <header>
            <div class="titul-mate"><h1><?php echo $materia;?></h1></div>
        </header>
        <div class="adci">
        <article>
            <div class="cont">
            <form action="conexoes/db_addcont.php?<?php echo $url?>" method="post" name="tabela">
                <input type="text" name="conteudo" id="cont" placeholder="Conteúdo" required>
            </div>
                <select name="tipo" id="tipo" required>
                    <?php
                        if($total > 0){
                            do{
                                echo $dados['Id'];
                    ?>
                            <option value="<?php echo $dados['Id'];?>"><?php echo $dados['Divisao'];?></option>
                    <?php
                            }while($dados = mysqli_fetch_assoc($conn));
                        }
                    ?>
                </select>
                <input type="button" value="Adicionar Nova Divisão" onclick="novadiv()" id="botao">
                <br>
                <input type="submit" value="Adicionar">
            </form>
            <div  style="display: none;" id="novadiv">
                <form method="post" action="conexoes/db_adddivisao.php">
                    <input type="text" name="novadiv" placeholder="Adicionar Nova Divisao" required>
                    <input type="submit" name="button1" value="Adicionar Divisao">
                </form>
            </div>
                    </div>
        </article>

        <aside>  
        </aside>
    </section>

    <script src="../js/js_add_conteudo.js"></script>
</body>
</html>