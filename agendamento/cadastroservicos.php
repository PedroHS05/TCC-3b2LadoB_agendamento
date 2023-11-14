<?php


$descricao = $_GET['descricao'];
$preco = $_GET['preco'];

include_once("conexao.php");

$stmt = "insert into tbservicos values (null, '$descricao', $preco);";

if(mysqli_query($conn,$stmt)){
    header("location:telacadastroservicos.php");
}else{
    echo "<p>Erro ao cadastrar serviço</p>";
}

mysqli_close($conn);

?>