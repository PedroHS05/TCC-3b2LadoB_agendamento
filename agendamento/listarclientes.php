<?php
session_start(); // Certifique-se de iniciar a sessão

$stmt = "select * from tbclientes;";
$resultado = mysqli_query($conn, $stmt);
if (mysqli_num_rows($resultado) > 0) {
    echo "<option value=''>Selecione um cliente</option>";
    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo "<option value='" . $linha['cpf'] . "'";
        
        // Verifique se o CPF do cliente é igual ao CPF do usuário logado
        if (isset($_SESSION['usuario_cpf']) && $_SESSION['usuario_cpf'] == $linha['cpf']) {
            echo " selected"; // Marque o cliente como selecionado (opcional)
        }
        
        echo ">" . $linha['nome'] . "</option>";
    }
} else {
    echo "<option value=''>Não há clientes cadastrados</option>";
}
?>
