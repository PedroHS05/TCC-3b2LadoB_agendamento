<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/cssAdmin.css">
    <link rel="stylesheet" href="../css/styleHome.css">
</head>

<?php
include_once("../usuario/validaradm.php");
// Conectar ao banco de dados
include_once("conexao.php");


// Função para listar todos os usuários
function listarUsuarios() {
    global $conn;
    $query = "SELECT * FROM tbmedicos";
    $result = $conn->query($query);
    
    $medicos = [];
    while ($row = $result->fetch_assoc()) {
        $medicos[] = $row;
    }
    
    return $medicos;
}

// Função para buscar usuários por CPF, nome, tipo e ativo
function buscarUsuarios($nome, $especialidade, $crm, $cpf) {
    global $conn;
    
    $query = "SELECT * FROM tbmedicos WHERE 1";
    
    if (!empty($cpf)) {
        $query .= " AND cpf = '$cpf'";
    }
    
    if (!empty($nome)) {
        $query .= " AND nome LIKE '%$nome%'";
    }
    
    if (!empty($especialidade)) {
        $query .= " AND especialidade = '$especialidade'";
    }
    
    if (!empty($crm)) {
        $query .= " AND ativo = '$crm'";
    }
    
    $result = $conn->query($query);
    
    $medicos = [];
    while ($row = $result->fetch_assoc()) {
        $medicos[] = $row;
    }
    
    return $medicos;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerenciamento de Médicos</title> 
</head>
<body style = "background-color: #C0C0C0;">

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="logo">
            <a href="">Gerenciador de Médicos</a>
        </div>

        <ul class="menu-desktop">
            <li> <a href="../usuario/tela_adm_usu.php">Usuários</a> </li>
            <li> <a href="tela_adm_med.php">Médicos</a> </li>            
            <li> <a href="../agendamento/telacadastrohorarios.php">Adicionar novos horários</a> </li>  
            <li> <a class="btn btn-outline-danger" href="../usuario/logout.php">Sair</a> </li>               
        </ul>
    </div>
</nav>

<div class="container">
    <div style="background-color:#FFF; padding-bottom:170px; ">
        <div class="container" >
            <div class="login">

                <br>
                <!-- Formulário de pesquisa -->
                <form method="POST">
                    <label>CPF:</label>
                    <input type="text" name="cpf">
                    <label>CRM:</label>
                    <input type="text" name="crm">
                    <label>Nome:</label>
                    <input type="text" name="nome">
                    <label>Especialidade:</label>
                    <input type="text" name="especialidade">
                    
                    <input type="submit" value="Filtrar">
                    <input type="submit" value="Limpar Filtros">
                </form>
                
                <?php
                // Processar a pesquisa
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $cpf = $_POST["cpf"];
                    $crm = $_POST["crm"];
                    $nome = $_POST["nome"];
                    $especialidade = $_POST["especialidade"];
                    
                    $medicos = buscarUsuarios($nome, $especialidade, $crm, $cpf);
                } else {
                    // Listar todos os usuários por padrão
                    $medicos = listarUsuarios();
                }
                
                // Exibir os resultados da pesquisa
                if (!empty($medicos)) {
                    echo "<h2>Resultados da pesquisa:</h2>";
                    echo "<table border='1'>";
                    echo "<tr><th>CPF</th><th>CRM</th><th>Nome</th><th>Especialidade</th><th>Contato</th><th>Email</th><th>Endereço</th><th style='text-align: center;'> <span style='float: left;''>Ações</span>  <a  href= 'telacadastromedico.php' class='btn btn-success' style='float: right;'>Adicionar Médico</a> </th></tr>";
                    
                    foreach ($medicos as $medico) {
                        echo "<tr>";
                        echo "<td>".$medico['cpf']."</td>";
                        echo "<td>".$medico['crm']."</td>";
                        echo "<td>".$medico['nome']."</td>";
                        echo "<td>".$medico['especialidade']."</td>";
                        echo "<td>".$medico['contato']."</td>";
                        echo "<td>".$medico['email']."</td>";
                        echo "<td>".$medico['endereco']."</td>";
                        echo "<td>
                            <a href='telaeditar.php?cpf=".$medico['cpf']."' class='btn btn-success'><i class='bi bi-pencil'></i></a>  <!-- Botão Editar -->
                            <a onclick='confirmarExclusao(".$medico['cpf'].")' class='btn btn-danger'><i class='bi bi-trash'></i></a>    <!-- Botão Apagar -->
                            <a href='../usuario/telahorariosMedico_admin.php?cpf=".$medico['cpf']."' class='btn btn-success'><i class='bi bi-calendar'></i></a>  <!-- Botão Acesso Agendas --> 
                            </td>";
                        echo "</tr>";
                    }
                    echo "</table>";   
                } else {
                    echo "<p>Nenhum resultado encontrado.</p>";
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</div>
<script src="../js/excluir.js"></script>    
</body>
</html>