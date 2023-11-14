<?php
$nome = $_POST['nome'];
$especialidade = $_POST['especialidade'];
$crm = $_POST['crm'];
$cpf = $_POST['cpf'];
$cpf = str_replace(".", "", $cpf); // Remove os pontos do CPF
$cpf = str_replace("-", "", $cpf); // Remove o hífen do CPF
$contato = $_POST['contato'];
$email = $_POST['email'];
$endereco = $_POST['endereco'];

include_once("conexao.php");

$stmt = "insert into tbmedicos values ('$nome', '$especialidade', '$crm', '$contato', '$email', '$endereco', '$cpf');";

if (mysqli_query($conn, $stmt)) {
    header("location: tela_adm_med.php");
} else {
    header("location: telacadastromedico.php");
}
?>
