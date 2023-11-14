<?php
session_start();
if(isset($_SESSION['usuarios'])){
    if($_SESSION['tipo']!="a"){
        $erro ="Você tentou acessar uma área não permitida.";
    }
}else{
    $erro = "Usuario não autenticado.";
}
if(isset($erro)){
    header("location:telalogin.php?erro=".$erro);
}
?>