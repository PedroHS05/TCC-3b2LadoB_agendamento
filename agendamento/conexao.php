<?php
// Parâmetros da conexão
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bd = "bdagendamedico";

// Cria a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $bd);

// Checa a conexão
if (!$conn) {
  die("Falha de conexão: " . mysqli_connect_error());
}
?>


