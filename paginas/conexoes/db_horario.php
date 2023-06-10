<?php
include_once "db_connect.php";
session_start();

$sql_checar = "SELECT * from horario WHERE Id_usuario = ".$_SESSION['Id']."";
$query_checar = mysqli_query($conexao, $sql_checar);
$row = mysqli_num_rows($query_checar);

$h[0] = $_POST['h_segunda'];
$h[1] = $_POST['h_terca'];
$h[2] = $_POST['h_quarta'];
$h[3] = $_POST['h_quinta'];
$h[4] = $_POST['h_sexta'];
$h[5] = $_POST['h_sabado'];
$h[6] = $_POST['h_domingo'];

for($i = 0; $i < 7; $i++){
    $_SESSION['h'.$i] = $h[$i];
    if($h[$i] == null){
        $h[$i] = "Não Definido";
    }
}

$m[0] = $_POST['segunda'];
$m[1] = $_POST['terca'];
$m[2] = $_POST['quarta'];
$m[3] = $_POST['quinta'];
$m[4] = $_POST['sexta'];
$m[5] = $_POST['sabado'];
$m[6] = $_POST['domingo'];

for($i = 0; $i < 7; $i++){
    $_SESSION['m'.$i] = $m[$i];
    if($m[$i] == null){
        $m[$i] = "Não Definido";
    }
}

for($i = 0; $i < 7; $i++){
    $dia = explode(";", $h[$i]);
    $mat = explode(";", $m[$i]);
    
    if(count($dia) != count($mat)){
        echo "
            <script>
                alert ('Quantidade de períodos e matérias não correspondem na coluna ".($i+1)."');
                window.location = '../horario.php';
            </script>
        ";
    }else{
        $_SESSION['h'.$i] = null;
        $_SESSION['m'.$i] = null;
    }
}

$horario = "S: $h[0], T: $h[1], Qa: $h[2], Qi: $h[3], Sex: $h[4], Sab: $h[5], D: $h[6]";
$materia = "S: $m[0], T: $m[1], Qa: $m[2], Qi: $m[3], Sex: $m[4], Sab: $m[5], D: $m[6]";
$Id_usu = $_SESSION['Id'];
$Data = date("Y/m/d");

$sql = "INSERT INTO horario VALUES (null, '$Id_usu', '$horario', '$materia', '$Data')";

if($row > 0){
    $sql_apagar = "DELETE FROM horario WHERE Id_usuario = $Id_usu";
    $query_apagar = mysqli_query($conexao, $sql_apagar);
    $query = mysqli_query($conexao, $sql);
    echo "
        <script>
            alert ('Horário Definido');
            window.location = '../horario.php';
        </script>
    ";
}else{
    $query = mysqli_query($conexao, $sql);
    echo "
        <script>
            alert ('Horário Definido');
            window.location = '../horario.php';
        </script>
    ";
}

?>