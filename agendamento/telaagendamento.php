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
    <title>Cadastro de Usuário</title>
</head>

<body style="background-color: #C0C0C0;">

    <?php
    include_once("../navbarUsuLogadoAgenda.html");
    ?>

    <div class="container">
        <div style="background-color:#FFF; padding-bottom:235px">
            <div class="container">
                <div class="login">
                    <?php
                    //include_once("navbar.html");
                    include_once("conexao.php");
                    ?>
                    <form method="get" action="agendamento.php">
                        <h1 class="text-center display-1" style="padding-top:40px;font-weight: bold;">Agende seu Horário</h1>
                        <div class="form-group">
                            <label class="fs-1" for="data">Data:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="font-size: 24px;"> <!-- Aumenta o tamanho do ícone -->
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                                <input id="data" name="data" type="date" required="required" class="form-control form-control-lg" value="<?php echo isset($_COOKIE['data']) ? $_COOKIE['data'] : ''; ?>">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="fs-1">Horários disponiveis:</label>
                            <div>
                                <?php
                                include_once("listarhorarios.php");
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="fs-2" for="servico">Médico:</label>
                            <div>
                                <select id="servico" name="servico" required="required" class="custom-select custom-select-lg">
                                    <?php
                                    include_once("listarmedicos.php");
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button name="submit" type="submit" class="btn btn-primary fs-2">Agendar Horário</button>
                        </div>
                    </form>
                </div>
                <script src="script.js"></script>

                <?php
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
    </div>
    <script src="script.js"></script>
</body>

</html>