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
include_once("validaradm.php");
// Conectar ao banco de dados
include_once("conexao.php");


// Função para listar todos os usuários
function listarUsuarios() {
    global $conn;
    $query = "SELECT * FROM tbusuarios";
    $result = $conn->query($query);
    
    $usuarios = [];
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
    
    return $usuarios;
}

// Função para buscar usuários por CPF, nome, tipo e ativo
function buscarUsuarios($cpf, $nome, $tipo, $ativo) {
    global $conn;
    
    $query = "SELECT * FROM tbusuarios WHERE 1";
    
    if (!empty($cpf)) {
        $query .= " AND cpf = '$cpf'";
    }
    
    if (!empty($nome)) {
        $query .= " AND nome LIKE '%$nome%'";
    }
    
    if (!empty($tipo)) {
        $query .= " AND tipo = '$tipo'";
    }
    
    if (!empty($ativo)) {
        $query .= " AND ativo = '$ativo'";
    }
    
    $result = $conn->query($query);
    
    $usuarios = [];
    while ($row = $result->fetch_assoc()) {
        $usuarios[] = $row;
    }
    
    return $usuarios;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerenciamento de Usuários</title>
    
</head>
<body style = "background-color: #C0C0C0;">

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="logo">
            <a href="home.html">Gerenciador de Usuários</a>
        </div>

        <ul class="menu-desktop">
            <li> <a href="tela_adm_usu.php">Usuários</a> </li>
            <li> <a href="../medico/tela_adm_med.php">Médicos</a> </li>
            <li> <a href="../agendamento/telacadastrohorarios.php">Adicionar novos horários</a> </li>            
            <li> <a class="btn btn-outline-danger" href="logout.php">Sair</a> </li>               
        </ul>
    </div>
</nav>
    
    <!-- Formulário de pesquisa -->
<div class="container">
    <div style="background-color:#FFF; padding-bottom:119px; ">
        <div class="container" >
            <div class="login">

                <br>

                <form method="POST">
                    <label>CPF: </label>
                    <input type="text" name="cpf">
                    <label>Nome: </label>
                    <input type="text" name="nome">
                    <label>Tipo: </label>
                    <input type="text" name="tipo">
                    <label>Ativo: </label>
                    <input type="text" name="ativo">
                    <input type="submit" value="Filtrar">
                    <input type="submit" value="Limpar Filtros">
                </form>
                
                
                <?php
                // Processar a pesquisa
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $cpf = $_POST["cpf"];
                    $nome = $_POST["nome"];
                    $tipo = $_POST["tipo"];
                    $ativo = $_POST["ativo"];
                    
                    $usuarios = buscarUsuarios($cpf, $nome, $tipo, $ativo);
                } else {
                    // Listar todos os usuários por padrão
                    $usuarios = listarUsuarios();
                }
                
                // Exibir os resultados da pesquisa
                if (!empty($usuarios)) {
                    echo "<h2>Resultados da pesquisa:</h2>";
                    echo "<table border='1'>";
                    echo "<tr><th>CPF</th><th>Nome</th><th>Contato</th><th>Tipo</th><th>Ativo</th><th style='text-align: center;'> <span style='float: left;''>Ações</span>  <a  href= 'telacadastrousuario_adm.php' class='btn btn-success' style='float: right;'>Adicionar usuário</a> </th></tr>";
                    
                    foreach ($usuarios as $usuario) {
                        echo "<tr>";
                        echo "<td>".$usuario['cpf']."</td>";
                        echo "<td>".$usuario['nome']."</td>";
                        echo "<td>".$usuario['contato']."</td>";
                        echo "<td>".$usuario['tipo']."</td>";
                        echo "<td>".$usuario['ativo']."</td>";
                        echo "<td>
                            <a href='telaeditar_adm.php?cpf=".$usuario['cpf']."' class='btn btn-success'><i class='bi bi-pencil'></i></a>  <!-- Botão Editar -->
                            <a onclick='confirmarExclusaoUsu(".$usuario['cpf'].")' class='btn btn-danger'><i class='bi bi-trash'></i></a>    <!-- Botão Apagar -->
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