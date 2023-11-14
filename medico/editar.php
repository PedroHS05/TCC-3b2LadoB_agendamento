<?php
$nome = $_POST['nome'];
$especialidade = $_POST['especialidade'];
$crm = $_POST['crm'];
$cpf = $_POST['cpf'];
$contato = $_POST['contato'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];

include_once("conexao.php");

$stmt = "UPDATE tbmedicos SET nome = '$nome', especialidade = '$especialidade', crm = '$crm', contato = '$contato', email = '$email', endereco = '$endereco' WHERE cpf = '$cpf'";

if (mysqli_query($conn, $stmt)) {
    header('Location: tela_adm_med.php');
} else {
    echo "Erro ao alterar dados do médico.<br>" . mysqli_error($conn);
    echo "<br><a href='tela_adm_med.php'>Voltar</a>";
}

mysqli_close($conn);
?>
