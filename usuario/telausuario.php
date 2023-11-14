<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./css/estilo.css">
    <link rel="stylesheet" href="../css/styleHome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
    <title>Tela Usuário</title>
</head>

<body style = "background-color: #C0C0C0;">

        <?php
            include_once("../navbarUsuLogado.html");
        ?>

<?php
    // Inclua o arquivo de configuração do banco de dados
    include_once("conexao.php");

    // Verifique se o usuário está logado
    include_once("validarUsuario.php");

    // Se o usuário estiver logado, recupere o CPF do usuário a partir da sessão
    if (isset($_SESSION['usuarios'])) {
        $cpfUsuario = $_SESSION['usuarios'];

        // Consulta para recuperar os horários agendados, data e nome do médico para o usuário logado
        $query = "SELECT h.descricao, a.data, m.nome AS nome_medico, a.numero_horario
        FROM tbagendas a
        INNER JOIN tbhorarios h ON a.numero_horario = h.numero
        LEFT JOIN tbmedicos m ON a.cpf_medico = m.cpf
        WHERE a.cpf_usuario = '$cpfUsuario'";

        $result = mysqli_query($conn, $query);
    
?> 
<div class="container">
    <div style="background-color:#FFF; padding-bottom:30px; ">
        <div class="container" >
            <div class=".login">

<?php
                        if ($result) {
                            echo '<br>';
                            echo "<h1  class='text-center display-2' style='font-weight: bold;'>Horários Agendados</h1>";
                            echo '<br>';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="card border-dark">';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title"><label class="fs-1">Médico:</label><label class="fs-1"> '. $row['nome_medico'] . ' </label></h5>';
                                echo '<hr>';
                                echo '<h6 class="card-title"> <label class="fs-2">Data:</label>  <label class="fs-2"> '. $row['data'] . ' </label> </h6>';
                                echo '<h6 class="card-text"><label class="fs-2">Horário:</label> <label class="fs-2"> ' . $row['descricao'] . '  </label> </h6>';
                                echo '<a href="excluir_horario.php?numero_horario=' . $row['numero_horario'] . '" class="btn btn-danger fs-2 ">Cancelar Horário</a>';
                                
                                // Verifique se 'numero_horario' está definido antes de criar o botão Excluir
                                if (isset($row['numero_horario'])) {
                                }
                                echo '</div>';
                                echo '</div>';
                                echo '<br>';
                            }
                        } else {
                            echo "Erro ao recuperar os horários agendados.";
                        }
                    } else {
                        echo "Usuário não está logado.";
                    }

    ?>
    </div>
</div>
</div>
</div>


</body>

</html>