<?php
session_start();

// Verificar se o usuário logado é um administrador
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'a') {
    // Processo de cadastro 
    $cpf = $_POST['cpf'];
    $cpf = str_replace(".", "", $cpf); // Remove os pontos do CPF
    $cpf = str_replace("-", "", $cpf); // Remove o hífen do CPF
    $nome = $_POST['nome'];
    $contato = $_POST['contato'];
    $senha = trim(password_hash($_POST['senha'], PASSWORD_DEFAULT));

    include_once("conexao.php");

    // Consulta SQL para inserir dados na tabela tbusuarios
    $stmt = "INSERT INTO tbusuarios (cpf, nome, contato, senha, tipo, ativo) VALUES ('$cpf', '$nome', '$contato', '$senha', 'u', 's');";

    if (mysqli_query($conn, $stmt)) {
        // Redirecione para a página de login após o cadastro bem-sucedido
        header("location:tela_adm_usu.php");
    } else {
        // Em caso de erro, você pode redirecionar de volta ao formulário de cadastro
        // ou exibir uma mensagem de erro
        echo "Erro no banco de dados: " . mysqli_error($conn);
    }
} else {
    header("location:login.php");
}
