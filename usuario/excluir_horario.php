<?php
// Inclua o arquivo de configuração do banco de dados
include_once("conexao.php");

// Verifique se o usuário está logado
include_once("validarUsuario.php");

if (isset($_SESSION['usuarios'])) {
    // Verifique se foi fornecido um número de horário para excluir
    if (isset($_GET['numero_horario'])) {
        $numeroHorario = $_GET['numero_horario'];
        
        // Certifique-se de que $numeroHorario é um número inteiro
        if (is_numeric($numeroHorario)) {
            $cpfUsuario = $_SESSION['usuarios'];
    
            // Consulta para excluir o horário agendado
            $query = "DELETE FROM tbagendas WHERE cpf_usuario = '$cpfUsuario' AND numero_horario = $numeroHorario";
    
            if (mysqli_query($conn, $query)) {
                // Horário excluído com sucesso, redirecione para a página de horários agendados
                header("location:telausuario.php");
            } else {
                echo "Erro ao excluir o horário agendado. Detalhes do erro: " . mysqli_error($conn);
            }
        } else {
            echo "Número de horário inválido.";
        }
    } else {
        echo "Número de horário não especificado.";
    }
} else {
    echo "Usuário não está logado.";
}
?>
