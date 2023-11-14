<?php

$cpf = $_GET['cpf'];
include_once("conexao.php");
$stmt = "delete from tbusuarios where cpf = '$cpf';";

if(mysqli_query($conn,$stmt)){
    header("Location: tela_adm_usu.php");
} else{
    echo "Erro ao apagar Usuario.<br>".mysqli_error($conn);
    echo "<br><a href='tela_adm_usu.php'>Voltar</a>";
}
mysqli_close($conn);
?>


