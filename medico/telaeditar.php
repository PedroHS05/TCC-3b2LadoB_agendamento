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
    <title>Edição de  Médicos</title>
</head>



<body style = "background-color: #C0C0C0;">

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="logo">
                <a href="home.html">Gerenciador de Médicos</a>
            </div>

            <ul class="menu-desktop">
                <li> <a href="../usuario/tela_adm_usu.php">Usuários</a> </li>
                <li> <a href="tela_adm_med.php">Médicos</a> </li>
                <li> <a href="../usuario/horarios.php">Horário</a> </li>
                <li> <a class="btn btn-outline-danger" href="../usuario/logout.php">Sair</a> </li>               
            </ul>
        </div>
    </nav>

       

        

        <!-- COLOCAR AQUI OS CODIGOS PHP PARA BUSCAR OS DADOS DO PRODUTO -->
       
        <?php
            $cpf = $_GET['cpf'];

            $stmt = "select * from tbmedicos where cpf = $cpf;";
            include_once("conexao.php");
            $result = mysqli_query($conn,$stmt);
            $medico = mysqli_fetch_assoc($result);
        ?>



        <!-- FORMULÁRIO DE EDIÇÃO -->
<div class="container">
    <div style="background-color:#FFF; padding-bottom:80px; ">
        <div class="container" >
            <div class="login">
                <br>
                        <div class="container text-center">
                        <h1>EDIÇÃO DE MÉDICOS</H1>
                        </div>
                        <form method="post" action="editar.php">
                        <div class="form-group">
                            <div>
                                <label for="cpf">CPF:</label>
                                <input id="cpf" name="cpf" type="text" required="required" class="form-control" readonly 
                                value="<?php echo $cpf?>"> <!-- <--COLOCAR O CÓDIGO PHP PARA EXIBIR O CODPROD DA TABELA -->
                            </div>
                            <div>
                                <label for="crm">CRM:</label>
                                <input id="crm" name="crm" type="text" required="required" class="form-control" readonly 
                                value="<?php echo $medico['crm']; ?>"> <!-- <--COLOCAR O CÓDIGO PHP PARA EXIBIR O CODPROD DA TABELA -->
                            </div>
                            <div class="form-group">
                                <label for="nome">Nome</label>
                                <input id="nome" name="nome" placeholder="Informe o nome do médico!!" type="text" required="required" class="form-control" 
                                value="<?php echo $medico['nome']; ?>"> <!-- <--COLOCAR O CÓDIGO PHP PARA EXIBIR A DESCRICAO DA TABELA -->
                            </div>
                            <div class="form-group">
                                <label for="nome">Especialidade</label>
                                <input id="especialida" name="especialidade" placeholder="Informe o nome do médico!!" type="text" required="required" class="form-control" 
                                value="<?php echo $medico['especialidade']; ?>"> <!-- <--COLOCAR O CÓDIGO PHP PARA EXIBIR A DESCRICAO DA TABELA -->
                            </div>
                            <div class="form-group">
                                <label for="contato">Contato</label>
                                <input id="contato" name="contato" placeholder="Informe o contato do médico!!" type="text" required="required" class="form-control" 
                                value="<?php echo $medico['contato']; ?>"> <!-- <--COLOCAR O CÓDIGO PHP PARA EXIBIR A QUANTIDADE DA TABELA -->
                            </div>
                            <div class="form-group">
                                <label for="email">email</label>
                                <input id="email" name="email" placeholder="Informe o email do médico!!" type="email" required="required" class="form-control" 
                                value="<?php echo $medico['email']; ?>"> <!-- <--COLOCAR O CÓDIGO PHP PARA EXIBIR O PRECO DA TABELA -->
                            </div>
                            <div class="form-group">
                                <label for="endereco">Endereço</label>
                                <input id="endereco" name="endereco" placeholder="Informe o endereço do médico!!" type="text" required="required" class="form-control" 
                                value="<?php echo $medico['endereco']; ?>"> <!-- <--COLOCAR O CÓDIGO PHP PARA EXIBIR O PRECO DA TABELA -->
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button name="submit" type="post" class="btn btn-primary">Salvar Alterações</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>