<?php

$cpf = $_GET['cpf'];
include_once("conexao.php");
$stmt = "delete from tbmedicos where cpf = '$cpf';";

if(mysqli_query($conn,$stmt)){
    header("Location: tela_adm_med.php");
} else{
    echo "Erro ao apagar Médico.<br>".mysqli_error($conn);
    echo "<br><a href='tela_adm_med.php'>Voltar</a>";
}
mysqli_close($conn);
?>