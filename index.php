<?php
include_once "paginas/conexoes/db_connect.php";

session_start();
$logado = 1; 

if(isset($_SESSION['logado']) == false){
    $logado = 0;
    session_abort();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Feynmapp</title>
</head>
<body>
    <section>
        <header>
                <ul> 
                    <li class="nada">
                    <ul class="barra">
                    </ul>                
                    <nav>
                        <ul class="menu">
                            <li><a href="#">MATERIA:</a></li>
                            <li><a href="#">LINGUAGENS</a>   
                                <ul>
                                    <li><a href="conteudos/linguagem/portugues.php">PORTUGUÊS</a></li>
                                    <li><a href="conteudos/linguagem/redacao.php">REDAÇÃO</a></li>
                                    <li><a href="conteudos/linguagem/artes.php">ARTES</a></li>
                                    <li><a href="conteudos/linguagem/edfisica.php">ED.FISICA</a></li>
                                    <li><a href="#">LINGUA ESTRANGEIRA</a>
                                        <ul>
                                            <li><a href="conteudos/linguagem/espanhol.php">ESPANHOL</a></li>
                                            <li><a href="linguagens/ingles.html">INGLES</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">HUMANAS</a>
                                <ul>
                                    <li><a href="materias/humanas/historia.html">HISTORIA</a></li>
                                    <li><a href="materias/humanas/geografia.html">GEOGRAFIA</a></li>
                                    <li><a href="materias/humanas/filosofia.html">FILOSOFIA</a></li>
                                    <li><a href="materias/humanas/sociologia.html">SOCIOLOGIA</a></li>  
                                </ul>
                            </li>
                            <li><a href="#">NATUREZA</a>
                                <ul>
                                    <li><a href="materias/natureza/biologia.html">BIOLOGIA</a></li>
                                    <li><a href="materias/natureza/quimica.html">QUIMICA</a></li>
                                    <li><a href="materias/natureza/fisica.html">FISICA</a></li>   
                                </ul>
                            </li>
                            <li><a href="#">EXATAS</a>
                                <ul>
                                    <li><a href="conteudos/exatas/matematica.php">MATEMATICA</a></li>
                                </ul>
                            </li> 
                        </ul>
                    </nav>
                </ul>
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

            </article>
            <aside>

            </aside>
            <nav>

            </nav>
        </form>
    </section>

    <footer>
    </footer>
</body>
</html>