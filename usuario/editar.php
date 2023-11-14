<?php
$cpf = $_GET['cpf'];
$nome = $_GET['nome'];
$contato = $_GET['contato'];

include_once("conexao.php");

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Use declarações preparadas para evitar injeção de SQL
$stmt = $conn->prepare("UPDATE tbusuarios SET nome = ?, contato = ? WHERE cpf = ?");
$stmt->bind_param("sss", $nome, $contato, $cpf);

if ($stmt->execute()) {
    header('Location: telausuario.php');
} else {
    echo "Erro ao alterar os dados.<br>" . $stmt->error;
    echo "<br><a href='tela_adm_usu.php'>Voltar</a>";
}

$stmt->close();
$conn->close();
?>
