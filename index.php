<?php
include_once "paginas/conexoes/db_connect.php";

session_start();
$logado = 1; 

if(isset($_SESSION['logado']) == false){
    $logado = 0;
    session_abort();
}
for($i = 0; $i < 7; $i++){
    $_SESSION['h'.$i] = null;
    $_SESSION['m'.$i] = null;
}

$row = 0;

if($logado == 1){
    $sql = "SELECT * from horario WHERE Id_usuario = ".$_SESSION['Id']."";
    $query = mysqli_query($conexao, $sql);
    $row = mysqli_num_rows($query);
    $list = mysqli_fetch_assoc($query);
}
if($row > 0){
    $separar = explode(",", $list['Horario']);
    $separar_mat = explode(",", $list['Materia']);
    $remover = array("S: ", "T: ", "Qa: ", "Qi: ", "Sex: ", "Sab: ", "D: ");
    for($i = 0; $i < 7; $i ++){
        $hor[$i] = str_replace($remover, "", $separar[$i]);
        $mat[$i] = str_replace($remover, "", $separar_mat[$i]);
    }
    $data = date('Y-m-d');
    
    $dia_semana = date('w', strtotime($data));
    
    $hoje = $dia_semana - 1;
    if($dia_semana == -1){
        $dia_semana = 6;
    }
    
    $hor_hoje = explode(";", $hor[$dia_semana]);
    $mat_hoje = explode(";", $mat[$dia_semana]);

    $hoje = date('Y-m-d');
    $ontem = date("Y-m-d",strtotime(date("Y-m-d")."-1 day"));

    $sql_ontem = "SELECT * from revisao WHERE Id_usu = ".$_SESSION['Id']." and Data = '$ontem'";
    $query_ontem = mysqli_query($conexao, $sql_ontem);
    $row_ontem = mysqli_num_rows($query_ontem);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Feynmapp</title>
</head>
<body>
    <section>
        <header>
            <div class="titul">
                <h1>Feynmapp</h1>
            </div>
                    <?php
                        if($logado == 0){
                        }else{
                    ?>           
                        <div class="centralizar">
                            <nav>
                                <ul class="menu">
                                    <?php 
                                        if($_SESSION['adm'] == 1){
                                    ?>
                                        <li><a href="paginas/adm.php">FUNÇÕES DE ADM</a></li>
                                    <?php
                                        }
                                    ?>
                                    <?php
                                        if($logado == 0){
                                        }else{
                                            echo "
                                                <li><a href='paginas/conta.php'>CONTA</a></li>
                                            ";
                                        }
                                    ?>
                                    <li><a href="paginas/horario.php">HORÁRIO</a></li>
                                    <li><a href="paginas/revisao.php">REVISÃO</a></li>
                                    <li><a href="#">MINHAS ANOTAÇÕES</a>   
                                        <ul class="dentro" id="dentro">
                                            <li><a href="#">LINGUAGEM</a>
                                                <ul class="dentro2">
                                                    <li><a href="conteudos/linguagem/portugues.php">PORTUGUÊS</a></li>
                                                    <li><a href="conteudos/linguagem/redacao.php">REDAÇÃO</a></li>
                                                    <li><a href="conteudos/linguagem/artes.php">ARTES</a></li>
                                                    <li><a href="conteudos/linguagem/edfisica.php">ED.FISICA</a></li>
                                                    <li><a href="#">LINGUA ESTRANGEIRA</a>
                                                        <ul class="dentro3">
                                                            <li><a href="conteudos/linguagem/espanhol.php">ESPANHOL</a></li>
                                                            <li><a href="conteudos/linguagem/ingles.php">INGLES</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#">HUMANAS</a>
                                                <ul class="dentro2">
                                                    <li><a href="conteudos/humanas/historia.php">HISTORIA</a></li>
                                                    <li><a href="conteudos/humanas/geografia.php">GEOGRAFIA</a></li>
                                                    <li><a href="conteudos/humanas/filosofia.php">FILOSOFIA</a></li>
                                                    <li><a href="conteudos/humanas/sociologia.php">SOCIOLOGIA</a></li>  
                                                </ul>
                                            </li>
                                            <li><a href="#">NATUREZA</a>
                                                <ul class="dentro2">
                                                    <li><a href="conteudos/natureza/biologia.php">BIOLOGIA</a></li>
                                                    <li><a href="conteudos/natureza/quimica.php">QUIMICA</a></li>
                                                    <li><a href="conteudos/natureza/fisica.php">FISICA</a></li>   
                                                </ul>
                                            </li>
                                            <li><a href="#">EXATAS</a>
                                                <ul class="dentro2">
                                                    <li><a href="conteudos/exatas/matematica.php">MATEMATICA</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>  
                    <?php
                        }
                    ?>
                <div class="login">
                    <?php
                        if($logado == 0){
                            echo "
                                <div class='log'>
                                    <a href='paginas/login.php'><button>Login</button></a>
                                </div>
                                <div class='cad'>
                                    <a href='paginas/cadastro.php'><button>Cadastro</button></a>
                                </div>
                            ";
                        }else{
                            echo "
                                <div class='deslog'>
                                    <a href='paginas/conexoes/db_deslog.php'><button>Deslogar</button></a>
                                </div>
                            ";
                        }
                    ?>
                </div>
            </header>
            <article>
                <div class="text">
                </div>
                <?php
                    if($logado == 1){
                ?>
                    <div class="horario">
                        <h1>Horário</h1>
                        <hr>
                        <br>
                        <?php if($row > 0){
                        ?>
                                <h4>O que você estudará hoje:</h4>
                        <?php
                            }else{
                                echo "<h4>Defina seu Horário</h4>";
                            }
                        ?>
                        <?php if($row > 0){
                        ?>
                        <div class="t">
                            <table class="table table-bordered">
                                <?php
                                    for($i = 0; $i < count($hor_hoje); $i++){
                                ?>
                                    <tr>
                                        <td style="font-weight: bolder;"><?php echo $hor_hoje[$i];?></td>
                                        <td><?php echo $mat_hoje[$i];?></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                                    <tr>
                                        <td style="font-weight: bolder;">Revisão</td>
                                        <td><?php 
                                            if($row_ontem == 0){
                                                echo "Sem Revisões Hoje";
                                            }else{
                                                while($valor = mysqli_fetch_assoc($query_ontem)){
                                                    echo $valor['Conteudo']."<br>";
                                                }
                                            }
                                        ?></td>
                                    </tr>
                            </table>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php
                    }
                ?>
                <?php
                    $sql_aleatorio = "SELECT * from videos";
                    $query_aleatorio = mysqli_query($conexao, $sql_aleatorio);
                    $row_vd = mysqli_num_rows($query_aleatorio);

                    $numb = rand(1, $row_vd);

                    $sql_vd1 = "SELECT * from videos where Id = $numb";
                    $query_vd1 = mysqli_query($conexao, $sql_vd1);
                    $list_vd1 = mysqli_fetch_assoc($query_vd1);

                    $numb2 = rand(1, $row_vd);
                    for($i= 1; $i > 0; $i++){
                        if($numb2 == $numb){
                            $numb2 = rand(1, $row_vd);
                        }else{
                            break;
                        }
                    }

                    $sql_vd2 = "SELECT * from videos where Id = $numb2";
                    $query_vd2 = mysqli_query($conexao, $sql_vd2);
                    $list_vd2 = mysqli_fetch_assoc($query_vd2);

                    $numb3 = rand(1, $row_vd);
                    for($i= 1; $i > 0; $i++){
                        if($numb3 == $numb2){
                            $numb3 = rand(1, $row_vd);
                        }else{
                            break;
                        }
                    }

                    $sql_vd3 = "SELECT * from videos where Id = $numb3";
                    $query_vd3 = mysqli_query($conexao, $sql_vd3);
                    $list_vd3 = mysqli_fetch_assoc($query_vd3);
                ?>
                    
                </video>
                <div class="videos" <?php if($row == 0){ echo 'style="margin-top: 20vh;"';}?>>
                    <h1>Videos Recomendados</h1>
                    <hr>
                    <div id="carouselExampleIndicators" class="carousel slide">
                        <div class="carousel-indicators" style="position: relative; top: 420px;">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                    <iframe src="<?php echo $list_vd1['Link'];?>"></iframe>
                            </div>
                            <div class="carousel-item">
                                <iframe src="<?php echo $list_vd2['Link'];?>"></iframe>
                            </div>
                            <div class="carousel-item">
                                    <iframe src="<?php echo $list_vd3['Link'];?>"></iframe>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        </div>
                </div>
            </article>
            <aside>
            </aside>
            <nav>
            </nav>
        </form>
    </section>
   </div>
    <footer>
    </footer>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>