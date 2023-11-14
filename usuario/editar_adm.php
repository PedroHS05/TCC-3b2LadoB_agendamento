<?php
$cpf = $_GET['cpf'];
$nome = $_GET['nome'];
$contato = $_GET['contato'];
$tipo = $_GET['tipo'];
$ativo = $_GET['ativo'];

include_once("conexao.php");

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Use declarações preparadas para evitar injeção de SQL
$stmt = $conn->prepare("UPDATE tbusuarios SET nome = ?, contato = ?, tipo = ?, ativo = ? WHERE cpf = ?");
$stmt->bind_param("ssssi", $nome, $contato, $tipo, $ativo, $cpf);

if ($stmt->execute()) {
    header('Location: tela_adm_usu.php');
} else {
    echo "Erro ao alterar dados do Usuário.<br>" . $stmt->error;
    echo "<br><a href='tela_adm_usu.php'>Voltar</a>";
}

$stmt->close();
$conn->close();
?>
