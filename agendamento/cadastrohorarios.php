<?php

$descricao = $_GET['descricao'];


include_once("conexao.php");

$stmt = "insert into tbhorarios values (null, '$descricao');";

if(mysqli_query($conn,$stmt)){
    header("location:telacadastrohorarios.php");
}else{
    echo "<p>Erro ao cadastrar horário</p>";
}

mysqli_close($conn);

?>