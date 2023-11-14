<?php
session_start();
$data = $_GET['data'];
$horario = $_GET['horario'];
$cliente = $_SESSION['usuarios'];
$servico = $_GET['servico'];
include_once("conexao.php");
$stmt = "insert into tbagendas values ('$data',$horario,'$cliente',$servico);";

if(mysqli_query($conn,$stmt)){
    header("location:../usuario/telausuario.php");
}else{
    echo "Erro ao agendar horário";
}
mysqli_close($conn);

?>