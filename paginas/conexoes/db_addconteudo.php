<?php
include_once 'db_connect.php';

session_start();


$materia = $_SESSION['mat'];
$id = $_SESSION['id_mat'];

$sql = "SELECT * FROM ".$materia." WHERE Id_cont = ".$id."";
$query_materia = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($query_materia);

$sql2 = 'SELECT * FROM '.$materia.'_conteudo WHERE Id_usuario = '.$_SESSION['Id'].' and Titulo = "'.$row['Conteudo'].'"';
$query_materia2 = mysqli_query($conexao, $sql2);
$row2 = mysqli_fetch_assoc($query_materia2);
$total = mysqli_num_rows($query_materia2);

$id_usu = $_SESSION['Id'];
$titulo = $_SESSION['Titulo'];
$topicos = $_POST['topicos'];
$foto = $_FILES['foto']['tmp_name'];
$tamanho = $_FILES['foto']['size'];
$texto = $_POST['texto'];
$link = $_POST['links'];
$data = date('Y/m/d');

$texto = str_replace("'", "&lsquo", $texto);

if(empty($foto)){
    
}else{
    $fp = fopen($foto, "rb");
    $conteudo = fread($fp, $tamanho);
    $conteudo = addslashes($conteudo);
    fclose($fp);
}

if($total > 0){
    if(empty($foto)){
        $sql = "UPDATE ".$_SESSION["Save_materia"]."_conteudo SET Titulo='$titulo',Topicos='$topicos',Anot_texto='$texto',Link='$link' WHERE Id = ".$row2['Id']."";
        $query = mysqli_query($conexao, $sql);

        echo "
            <script>
                alert ('Anotações Editadas');
                window.location = '../../conteudos/conteudos.php?".$_SESSION['id_mat']."';
            </script>
        ";
    }else{
        $sql = "UPDATE ".$_SESSION["Save_materia"]."_conteudo SET Titulo='$titulo',Topicos='$topicos',Anot_foto ='$conteudo', Anot_texto='$texto',Link='$link' WHERE Id = ".$row2['Id']."";
        $query = mysqli_query($conexao, $sql);
    
        echo "
            <script>
            alert ('Anotações Editadas');
            window.location = '../../conteudos/conteudos.php?".$_SESSION['id_mat']."';
            </script>
        ";
    }
}else{
    $sql = "INSERT INTO ".$_SESSION["Save_materia"]."_conteudo values(null, '$id_usu', '$titulo', '$topicos', '$conteudo', '$texto', '$link', '$data')";
    $query = mysqli_query($conexao, $sql);

    $sql_data = "INSERT INTO revisao values(null, '$id_usu', '$titulo', '$data')";
    $query_data = mysqli_query($conexao, $sql_data);
    
    echo "
        <script>
        alert ('Anotações Adicionadas');
        window.location = '../../conteudos/conteudos.php?".$_SESSION['id_mat']."';
        </script>
    ";
}
?>