<?php
include_once "conexoes/db_connect.php";
session_start();

$sql = "SELECT * from horario WHERE Id_usuario = ".$_SESSION['Id']."";
$query = mysqli_query($conexao, $sql);
$row = mysqli_num_rows($query);

if($row > 0){
    $list = mysqli_fetch_assoc($query);
    $separar = explode(",", $list['Horario']);
    $separar_mat = explode(",", $list['Materia']);
    $remover = array("S: ", "T: ", "Qa: ", "Qi: ", "Sex: ", "Sab: ", "D: ");
    for($i = 0; $i < 7; $i ++){
        $hor[$i] = str_replace($remover, "", $separar[$i]);
        $mat[$i] = str_replace($remover, "", $separar_mat[$i]);
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/horario.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Horário</title>
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
        <h1>Organizar Horário</h1>
        <div class="botoes">
            <button>Gerar Horário por Ciclo</button>
            <button onclick="dica()">Como Registrar Horário</button>
        </div>
        <br>
        <fieldset>
            <form action="conexoes/db_horario.php" method="post">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Dias da Semana</th>
                            <th scope="col">Horários</th>
                            <th scope="col">Matérias</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="segunda">
                            <td class="dia">Segunda-Feira</td>
                            <td><textarea name="h_segunda" id="h_segunda" cols="30" rows="3"><?php if($_SESSION['h0'] != null){ echo $_SESSION['h0'];}else if($row > 0){ echo $hor[0];}?></textarea></td>
                            <td><textarea name="segunda" id="segunda" cols="30" rows="3"><?php if($_SESSION['m0'] != null){ echo $_SESSION['m0'];}else if($row > 0){ echo $mat[0];} ?></textarea></td>
                        </tr>
                        <tr class="terca">
                            <td class="dia">Terça-Feira</td>
                            <td><textarea name="h_terca" id="h_terca" cols="30" rows="3"><?php if($_SESSION['h1'] != null){ echo $_SESSION['h1'];}else if($row > 0){ echo $hor[1];} ?></textarea></td>
                            <td><textarea name="terca" id="terca" cols="30" rows="3"><?php if($_SESSION['m1'] != null){ echo $_SESSION['m1'];}else if($row > 0){ echo $mat[1];} ?></textarea></td>
                        </tr>
                        <tr class="quarta">
                            <td class="dia">Quarta-Feira</td>
                            <td><textarea name="h_quarta" id="h_quarta" cols="30" rows="3"><?php if(isset($_SESSION['h2'])){ echo $_SESSION['h2'];}else if($row > 0){ echo $hor[2];} ?></textarea></td>
                            <td><textarea name="quarta" id="quarta" cols="30" rows="3"><?php if($_SESSION['m2'] != null){ echo $_SESSION['m2'];}else if($row > 0){ echo $mat[2];} ?></textarea></td>
                        </tr>
                        <tr class="quinta">
                            <td class="dia">Quinta-Feira</td>
                            <td><textarea name="h_quinta" id="h_quinta" cols="30" rows="3"><?php if($_SESSION['h3'] != null){ echo $_SESSION['h3'];}else if($row > 0){ echo $hor[3];} ?></textarea></td>
                            <td><textarea name="quinta" id="quinta" cols="30" rows="3"><?php if($_SESSION['m3'] != null){ echo $_SESSION['m3'];}else if($row > 0){ echo $mat[3];} ?></textarea></td>
                        </tr>
                        <tr class="sexta">
                            <td class="dia">Sexta-Feira</td>
                            <td><textarea name="h_sexta" id="h_sexta" cols="30" rows="3"><?php if($_SESSION['h4'] != null){ echo $_SESSION['h4'];}else if($row > 0){ echo $hor[4];} ?></textarea></td>
                            <td><textarea name="sexta" id="sexta" cols="30" rows="3"><?php if($_SESSION['m4'] != null){ echo $_SESSION['m4'];}else if($row > 0){ echo $mat[4];} ?></textarea></td>
                        </tr>
                        <tr class="sabado">
                            <td class="dia">Sábado</td>
                            <td><textarea name="h_sabado" id="h_sabado" cols="30" rows="3"><?php if($_SESSION['h5'] != null){ echo $_SESSION['h5'];}else if($row > 0){ echo $hor[5];}?></textarea></td>
                            <td><textarea name="sabado" id="sabado" cols="30" rows="3"><?php if($_SESSION['m5'] != null){ echo $_SESSION['m5'];}else if($row > 0){ echo $mat[5];} ?></textarea></td>
                        </tr>
                        <tr class="domingo">
                            <td class="dia">Domingo</td>
                            <td><textarea name="h_domingo" id="h_domingo" cols="30" rows="3"><?php if($_SESSION['h6'] != null){ echo $_SESSION['h6'];}else if($row > 0){ echo $hor[5];} ?></textarea></td>
                            <td><textarea name="domingo" id="domingo" cols="30" rows="3"><?php if($_SESSION['m6'] != null){ echo $_SESSION['m6'];}else if($row > 0){ echo $mat[6];} ?></textarea></td>
                        </tr>
                    </tbody>
                </table> 
                <button type="submit" class="btn_env"><?php if($row > 0){ echo "Editar Horário";}else{ echo "Registrar Horário";}?></button>
            </form>
        </fieldset>   
    </article>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="../js/horario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>