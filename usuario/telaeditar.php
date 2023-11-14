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
    <title>Edição de  Usuario</title>
</head>



<body style = "background-color: #C0C0C0;">

        <?php
            include_once("../navbarUsuLogadoDadosPessoais.html");
        ?>

        <!-- COLOCAR AQUI OS CODIGOS PHP PARA BUSCAR OS DADOS DO PRODUTO -->
       
        <?php
            session_start();
            include_once("conexao.php");
            $cpf = $_SESSION['usuarios'];
            $stmt = "select * from tbusuarios where cpf = $cpf;";
            $result = mysqli_query($conn,$stmt);
            $usuario = mysqli_fetch_assoc($result);
        ?>



        <!-- FORMULÁRIO DE EDIÇÃO -->
<div class="container">
    
    <div style="background-color:#FFF; padding-bottom:80px; ">
        <div class="container" >
            <div class="login">
                <br>
                <div class="container text-center">
                <h1>Edição de dados pessoais</H1>
                </div>
                <br>
                <form method="get" action="editar.php">
                <div class="form-group">
                    <div>
                        <label class="fs-1" for="cpf">CPF:</label>
                        <input id="cpf" name="cpf" type="text" required="required" class="form-control fs-2" readonly 
                        value="<?php echo $cpf ?>"> <!-- <--COLOCAR O CÓDIGO PHP PARA EXIBIR O CODPROD DA TABELA -->
                    </div>
                    <div class="form-group">
                        <label class="fs-1" for="nome">Nome:</label>
                        <input id="nome" name="nome" placeholder="Informe o nome do usuário!!" type="text" required="required" class="form-control fs-2" 
                        value="<?php echo $usuario['nome']; ?>"> <!-- <--COLOCAR O CÓDIGO PHP PARA EXIBIR A DESCRICAO DA TABELA -->
                    </div>
                    <div class="form-group">
                        <label class="fs-1" for="contato">Contato:</label>
                        <input id="contato" name="contato" placeholder="Informe o contato do usuário!!" type="text" required="required" class=" fs-2 form-control" 
                        value="<?php echo $usuario['contato']; ?>"> <!-- <--COLOCAR O CÓDIGO PHP PARA EXIBIR A QUANTIDADE DA TABELA -->
                    </div>
                    <br>
                    <div class="d-grid gap-2 col-6 mx-auto">
                    <button name="submit" type="submit" class="btn btn-primary fs-4">Salvar Alterações</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>

    </div>

</body>

</html>