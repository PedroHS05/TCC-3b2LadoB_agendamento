<!DOCTYPE html>
<html>

<head>
    <title>Horários do Médico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/cssAdmin.css">
    <link rel="stylesheet" href="../css/styleHome.css">
    <!-- Inclua seus links para CSS e JavaScript personalizados, se necessário -->
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #343a40;
            color: #fff;
        }

        .container {
            background-color: #fff;
            margin-top: 20px;
            padding: 20px;
            border-radius: 5px;
        }

        h1 {
            color: #343a40;
            background-color: #fff;
        }

        .card {
            margin: 10px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-weight: bold;
        }

        .card-subtitle {
            color: #6c757d;
        }

        .card-text {
            margin-top: 10px;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="logo">
            <a href="home.html">Gerenciador de Médicos</a>
        </div>

        <ul class="menu-desktop">
            <li> <a href="horariosM_admin.php">Voltar</a> </li>
            <li> <a class="btn btn-outline-danger" href="logout.php">Sair</a> </li>               
        </ul>
    </div>
</nav>

    <div class="container">
        <h1>Horários Médicos</h1>
        <?php
        // Inclua o arquivo de configuração do banco de dados
        include_once("conexao.php");

        if (isset($_GET['cpf'])) {
            $cpfMedico = $_GET['cpf'];
        } else {
            echo "CPF do médico não fornecido.";
            exit;  // Encerrar a execução se o CPF não estiver disponível
        }

        // Inicialize as variáveis de filtro
        $filtro_nome = "";
        $filtro_data = "";

        if (isset($_POST['filtrar'])) {
            $filtro_nome = $_POST['nome'];
            $filtro_data = $_POST['data'];
        }

        // Consulta SQL com base nos filtros
        $query = "SELECT h.descricao, a.data, u.nome AS nome_paciente
                  FROM tbagendas a
                  INNER JOIN tbhorarios h ON a.numero_horario = h.numero
                  LEFT JOIN tbusuarios u ON a.cpf_usuario = u.cpf
                  WHERE a.cpf_medico = '$cpfMedico'";

        // Aplicar filtros
        if (!empty($filtro_nome)) {
            $query .= " AND u.nome LIKE '%$filtro_nome%'";
        }

        if (!empty($filtro_data)) {
            $query .= " AND a.data = '$filtro_data'";
        }

        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<form method='POST'>";
            echo "<label for='nome'>Filtrar por Nome:</label>";
            echo "<input type='text' name='nome' id='nome' value='$filtro_nome' placeholder='Digite o nome do paciente'>";

            echo "<label for='data'>Filtrar por Data:</label>";
            echo "<input type='date' name='data' id='data' value='$filtro_data'>";

            echo "<button type='submit' name='filtrar' class='btn btn-primary'>Filtrar</button>";
            echo "<a href='telahorariosMedico.php?cpf=".$cpfMedico."' class='btn btn-secondary'>Limpar Filtros</a>";
            echo "</form>";

            echo "<h2>Horários Agendados:</h2>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="card">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">Paciente: ' . $row['nome_paciente'] . '</h5>';
                echo '<h6 class="card-subtitle mb-2 text-muted">Data: ' . $row['data'] . '</h6>';
                echo '<p class="card-text">Horário: ' . $row['descricao'] . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "Erro ao recuperar os horários agendados.";
        }
        ?>
    </div>

    <!-- Seus links para CSS e JavaScript personalizados, se necessário -->

</body>

</html>