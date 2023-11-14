<?php
$cpf = $_POST['cpf'];
$cpf = str_replace(".", "", $cpf); // Remove os pontos do CPF
$cpf = str_replace("-", "", $cpf); // Remove o hífen do CPF
$nome = $_POST['nome'];
$contato = $_POST['contato'];
$senha = trim(password_hash($_POST['senha'], PASSWORD_DEFAULT));

include_once("conexao.php");

$stmt = "insert into tbusuarios values ('$cpf','$nome','$contato', '$senha', 'u', 's');";

if (mysqli_query($conn, $stmt)) {
    header("location: telalogin.php");
} else {
    header("location: telacadastrousuario.php");
}
?>
