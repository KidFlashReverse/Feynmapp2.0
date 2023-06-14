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

$url = $_SERVER['QUERY_STRING'];
$login = 0;
$horario = 0;
$diferente = 0;
$videos = 0;

if($url == "pt"){
    $materia = "Português";
}else if($url == "mt"){
    $materia = "Matemática";
}else if($url == "art"){
    $materia = "Artes";
}else if($url == "edf"){
    $materia = "Educação Física";
}else if($url == "es"){
    $materia = "Edspanhol";
}else if($url == "red"){
    $materia = "Redação";
}else if($url == "ing"){
    $materia = "Inglês";
}else if($url == "soc"){
    $materia = "Sociologia";
}else if($url == "fil"){
    $materia = "Filosofia";
}else if($url == "his"){
    $materia = "História";
}else if($url == "geo"){
    $materia = "Geografia";
}else if($url == "bio"){
    $materia = "Biologia";
}else if($url == "qui"){
    $materia = "Química";
}else if($url == "fis"){
    $materia = "Física";
}else if($url == "horario"){
    $diferente = 1;
    $horario = 1;
    $materia = "Horário";
}else if($url == "login"){
    $diferente = 1;
    $login = 1;
    $materia = "Login";
}else if($url == "videos"){
    $diferente = 1;
    $videos = 1;
    $materia = "Videos";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/revisao.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title><?php echo $materia;?></title>
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
            <a href="adm.php"><img src="../imgs/voltar.png" class="media-object  img-responsive img-thumbnail" width="30px"></a>
        </div>
        <h1><span style="font-size: 0.7em;">Banco de Dados</span><br><span style="font-weight: bolder;"><?php echo $materia;?></span></h1>
        <br>
        <?php
            if($diferente == 1){
        ?>
            <fieldset>
                <div class="table">
                    <?php
                        if($login == 1){
                            $sql = "SELECT * FROM login";
                            $query = mysqli_query($conexao, $sql);
                    ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col">Matéria Favorita</th>
                                    <th scope="col">Funções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($valor = mysqli_fetch_assoc($query)){
                                ?>
                                    <tr class="linha">
                                        <td><?php echo $valor['Id']?></td>
                                        <td><?php echo $valor['Nome']?></td>
                                        <td><?php echo $valor['Email']?></td>
                                        <td><?php echo $valor['Telefone']?></td>
                                        <td><?php echo $valor['materiaFavorita']?></td>
                                        <td><button><a class="btn_func" href="conexoes/db_editarbanco.php?<?php echo $url;?>">Editar</a></button></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table> 
                    <?php  
                        }else if($horario == 1){
                            $sql = "SELECT * FROM horario";
                            $query = mysqli_query($conexao, $sql);
                    ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Horario</th>
                                    <th scope="col">Materia</th>
                                    <th scope="col">Funções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($valor = mysqli_fetch_assoc($query)){
                                        $sql_usuario = "SELECT * FROM login WHERE Id = ".$valor['Id_usuario']."";
                                        $query_usuario = mysqli_query($conexao, $sql_usuario);
                                        $list = mysqli_fetch_assoc($query_usuario);
                                ?>
                                    <tr class="linha">
                                        <td><?php echo $valor['Id_horario']?></td>
                                        <td><?php echo $list['Nome']?></td>
                                        <td><?php echo $valor['Horario']?></td>
                                        <td><?php echo $valor['Materia']?></td>
                                        <td><button><a class="btn_func" href="conexoes/db_apagarbanco.php?<?php echo $url;?>">Apagar</a></button></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table> 
                        <?php  
                        }else if($videos == 1){
                            $sql = "SELECT * FROM videos";
                            $query = mysqli_query($conexao, $sql);
                    ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Materia</th>
                                    <th scope="col">Funções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($valor = mysqli_fetch_assoc($query)){
                                        $sql_usuario = "SELECT * FROM login WHERE Id = ".$valor['Id_usuario']."";
                                        $query_usuario = mysqli_query($conexao, $sql_usuario);
                                        $list = mysqli_fetch_assoc($query_usuario);
                                ?>
                                    <tr class="linha">
                                        <td><?php echo $valor['Id']?></td>
                                        <td><?php echo $list['Nome']?></td>
                                        <td><?php echo $valor['Titulo']?></td>
                                        <td><a href="<? echo $valor['Anot_foto'];?>"></a></td>
                                        <td><?php echo $valor['Anot_texto']?></td>
                                        <td><?php echo $valor['Link']?></td>
                                        <td><button><a class="btn_func" href="conexoes/db_apagarbanco.php?<?php echo $url;?>">Apagar</a></button></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table> 
                    <?php  
                        }else{
                            $sql = "SELECT * FROM `'$url'_conteudo`";
                            $query = mysqli_query($conexao, $sql);
                    ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nome Usuario</th>
                                    <th scope="col">Titulo</th>
                                    <th scope="col">Topicos</th>
                                    <th scope="col">Anot_foto</th>
                                    <th scope="col">Anot_texto</th>
                                    <th scope="col">Link</th>
                                    <th scope="col">Funções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($valor = mysqli_fetch_assoc($query)){
                                ?>
                                    <tr class="linha">
                                        <td><?php echo $valor['Id']?></td>
                                        <td><a href="<?php echo $valor['Link']?>"><?php echo $valor['Link']?></a></td>
                                        <td><?php echo $valor['Titulo']?></td>
                                        <td><?php echo $valor['Materia']?></td>
                                        <td><button><a class="btn_func" href="conexoes/db_apagarbanco.php?<?php echo $url;?>">Apagar</a></button></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table> 
                    <?php
                        }
                    ?>
                </div>
            </fieldset>
        <?php
            }
        ?>
        
    </article>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="../js/horario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>