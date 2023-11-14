<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/cssAdmin.css">
    <link rel="stylesheet" href="../css/styleHome.css">
    <title>Horários</title>
</head>
<body style = "background-color: #C0C0C0;">
    
    <?php
    include_once("validarhorario.php");
    ?>
   
   <nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="logo">
            <a href="">Horários</a>
        </div>

        <ul class="menu-desktop">
            <li> <a href="tela_adm_usu.php">Usuários</a> </li>
            <li> <a href="../medico/tela_adm_med.php">Médicos</a> </li>
            <li> <a href="horarios.php">Horário</a> </li>
            <li> <a class="btn btn-outline-danger" href="logout.php">Sair</a> </li>               
        </ul>
    </div>
</nav>
   
</body>
</html>