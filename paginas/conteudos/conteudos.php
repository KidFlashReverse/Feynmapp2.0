<?php
include_once '../paginas/conexoes/db_connect.php';

session_start();

$id = $_SERVER['QUERY_STRING'];
$materia = $_SESSION['mat'];
$_SESSION['id_mat'] = $id;

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

if($materia == "pt"){
    $materia2 = "Português";
}else if($materia == "mt"){
    $materia2 = "Matemática";
}else if($materia == "art"){
    $materia2 = "Artes";
}else if($materia == "edf"){
    $materia2 = "Educação Física";
}else if($materia == "es"){
    $materia2 = "Edspanhol";
}else if($materia == "red"){
    $materia2 = "Redação";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/conteudos.css">
    <title><?php echo $materia2;?></title>
</head>
<body>
    <section>
        <header>         
        </header>
        <article>
            <div class="tela_1" id="tela_1">
                <div class="titulo">
                    <h1><?php echo $row['Conteudo']?></h1>
                </div>
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
            <div class="tela_add" id="tela_add" style="display: none;">
            <div class="titul">
                <h1>Salvar Estudo</h1>
            </div>
                <form action="../paginas/conexoes/db_addconteudo.php" method="post" enctype="multipart/form-data">
                    <div class="titulo">
                        <h1><?php echo $row['Conteudo']?></h1>
                    </div>
                    <div class="topicos">
                        <textarea name="topicos" id="topicos" cols="30" rows="10" placeholder="Adicionar Tópicos"></textarea>
                    </div>
                    <div class="anot_foto">
                        <label for="arquivo"><img src="../imgs/adicionar-botao.png" alt="" class="add"></label>
                        <p>Adicionar Imagem</p>
                        <input style="display: none;" type="file" name="foto" id="arquivo" accept="image/png, image/jpg, image/jpeg"><br>
                        <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
                    </div>
                    <div class="anot_text">
                        <textarea name="texto" id="texto" cols="30" rows="10" placeholder="Anotar Resumo"></textarea>
                        <textarea name="links" id="links" cols="30" rows="10" placeholder="Salvar Links"></textarea>
                    </div>
                    <div class="adic">
                    <input type="submit" value="Adicionar">
                    </div>
                </form>
            </div>
        </article>
        <aside>
            <div class="add">
                <button onclick="mudar()" id="mud">+</button>
            </div>
        </aside>
    </section>

    <script src="../js/conteudos.js"></script>
</body>
</html>
