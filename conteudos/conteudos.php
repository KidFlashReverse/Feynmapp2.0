<?php
include_once '../paginas/conexoes/db_connect.php';

session_start();

$id = $_SERVER['QUERY_STRING'];
$materia = $_SESSION['mat'];
$_SESSION['id_mat'] = $id;
$url = $materia;

$sql = "SELECT * FROM ".$materia." WHERE Id_cont = ".$id."";
$query_materia = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($query_materia);

$sql2 = 'SELECT * FROM '.$materia.'_conteudo WHERE Id_usuario = '.$_SESSION['Id'].' and Titulo = "'.$row['Conteudo'].'"';
$query_materia2 = mysqli_query($conexao, $sql2);
$row2 = mysqli_fetch_assoc($query_materia2);
$total = mysqli_num_rows($query_materia2);

if($total == 0){
    $row2['Topicos'] = null;
    $row2["Anot_foto"] = null;
    $row2['Anot_texto'] = null;
    $row2['Link'] = null;
    $row2["Audio"] = null;
}

$id = $_SESSION['Id'];
$_SESSION['Titulo'] = $row['Conteudo'];
$_SESSION["Save_materia"] = $materia;

if($url == "pt"){
    $materia = "Português";
    $_SESSION['pagina'] = "linguagem";
    $_SESSION['materia'] = "portugues";
}else if($url == "mt"){
    $materia = "Matemática";
    $_SESSION['pagina'] = "exatas";
    $_SESSION['materia'] = "matematica";
}else if($url == "art"){
    $materia = "Artes";
    $_SESSION['pagina'] = "linguagem";
    $_SESSION['materia'] = "artes";
}else if($url == "edf"){
    $materia = "Educação Física";
    $_SESSION['pagina'] = "linguagem";
    $_SESSION['materia'] = "edfisica";
}else if($url == "es"){
    $materia = "Edspanhol";
    $_SESSION['pagina'] = "linguagem";
    $_SESSION['materia'] = "espanhol";
}else if($url == "red"){
    $materia = "Redação";
    $_SESSION['pagina'] = "linguagem";
    $_SESSION['materia'] = "redacao";
}else if($url == "ing"){
    $materia = "Inglês";
    $_SESSION['pagina'] = "linguagem";
    $_SESSION['materia'] = "ingles";
}else if($url == "soc"){
    $materia = "Sociologia";
    $_SESSION['pagina'] = "humanas";
    $_SESSION['materia'] = "sociologia";
}
else if($url == "fil"){
    $materia = "Filosofia";
    $_SESSION['pagina'] = "humanas";
    $_SESSION['materia'] = "filosofia";
}
else if($url == "his"){
    $materia = "História";
    $_SESSION['pagina'] = "humanas";
    $_SESSION['materia'] = "historia";
}else if($url == "geo"){
    $materia = "Geografia";
    $_SESSION['pagina'] = "humanas";
    $_SESSION['materia'] = "geografia";

}else if($url == "bio"){
    $materia = "Biologia";
    $_SESSION['pagina'] = "natureza";
    $_SESSION['materia'] = "biologia";
}else if($url == "qui"){
    $materia = "Química";
    $_SESSION['pagina'] = "natureza";
    $_SESSION['materia'] = "quimica";
}else if($url == "fis"){
    $materia = "Física";
    $_SESSION['pagina'] = "natureza";
    $_SESSION['materia'] = "fisica";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/conteudos.css">
    <title><?php echo $materia;?></title>
</head>
<body>
    <section>
        <header>         
        </header>
        <article>
            <div class="volte">
                <a href="<?php echo $_SESSION['pagina']."/".$_SESSION['materia'].".php"?>"><img src="../imgs/voltar.png" class="media-object  img-responsive img-thumbnail" width="   20px"></a>
            </div>
            <div class="tela_1" id="tela_1">
                <div class="titulo">
                    <h1><?php echo $row['Conteudo']?></h1>
                </div>
                <?php
                if($total == 0){
                    echo "<h1>Sem Anotação</h1>";
                }else{
                ?>
                    <div class="corpo">
                        <div class="topicos">
                            <p><?php echo $row2['Topicos']?></p>    
                        </div>
                        <div class="anot_foto">
                            <?php 
                                $byte = $row2["Anot_foto"];
                                echo '<img src="data:image/jpg;base64,' . base64_encode($byte) . '" />';
                            ?>
                        </div>
                        <div class="anot_text">
                            <p><?php echo $row2['Anot_texto']?></p>
                        </div>
                        <div class="links">
                            <p><?php echo $row2['Link']?></p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="tela_add" id="tela_add" style="display: none;">
            <div class="titul">
                <h5>Registrar Anotação</h5>
                <div class="titulo">
                    <h1><?php echo $row['Conteudo']?></h1>
                </div>
            </div>
                <form action="../paginas/conexoes/db_addconteudo.php" method="post" enctype="multipart/form-data">
                    <div class="topicos">
                        <h1>Topicos</h1>
                        <p>Separe os tópicos com um ponto e vírgula (;)</p>
                        <textarea name="topicos" id="topicos" cols="30" rows="10" placeholder="Adicionar Tópicos"></textarea>
                    </div>
                    <div class="anot_foto">
                        <label for="arquivo"><img src="../imgs/adicionar-botao.png" alt="" class="add2"></label>
                        <p>Adicionar Imagem da Anotação</p>
                        <input style="display: none;" type="file" name="foto" id="arquivo" accept="image/png, image/jpg, image/jpeg"><br>
                        <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
                    </div>
                    <div class="anot_text">
                        <h1>Salvar Anotação Em Texto e Links</h1>
                        <p>Separe os links com ponto e vírgula (;)</p>
                        <textarea name="texto" id="texto" cols="30" rows="10" placeholder="Anotar Resumo"></textarea>
                        <textarea name="links" id="links" cols="30" rows="10" placeholder="Salvar Links"></textarea>
                    </div>
                    <div class="adic">
                    <button type="submit" class="btn">Registrar</button>
                    </div>
                </form>
            </div>
        </article>
        <aside>
            <div class="add">
                <button onclick="mudar()" id="mud"><?php if($total == 0){ echo "Registrar Anotação";}else{ echo "Editar Anotação";}?></button>
            </div>
        </aside>
    </section>

    <script src="../js/conteudos.js"></script>
</body>
</html>
