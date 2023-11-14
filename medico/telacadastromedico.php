<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/styleHome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <title>Cadastro de Usuário</title>
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
                <li> <a href="../usuario/horarios.php">Cadastro de horários</a> </li>
                <li> <a class="btn btn-outline-danger" href="../usuario/logout.php">Sair</a> </li>               
            </ul>
        </div>
    </nav>

    <div class="container">
        <div style="background-color:#FFF; padding-bottom:80px; ">
            <div class="container" >
                <div class="login">
            <form method="post" action="cadastromedico.php">
                <br>
                <div class="container text-center">
                <h1>Cadastro de Médico</h1>
                </div>
                <br>
                <div class="form-group">
                    <label for="email">Nome:</label>
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-user"></i>
                        </div>
                    
                        <input id="nome" name="nome" placeholder="Informe seu nome completo" type="text" required="required"
                        class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nome">CPF:</label>
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-id-card-o"></i>
                        </div>
                    
                        <input id="cpf" name="cpf" placeholder="Informe seu CPF" maxLength="14" type="text" required="required"
                        class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nome">CRM:</label>
                    <div class="input-group-prepend">
                    
                        <div class="input-group-text">
                            <i class="bi bi-person-vcard-fill"></i>
                        </div>
                    
                        <input id="crm" name="crm"  placeholder="Informe seu CRM"  type="text" required="required"
                        class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nome">Especialidade:</label>
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="bi bi-building-fill-add"></i>
                        </div>
                    
                        <input id="especialidade" name="especialidade" placeholder="Informe sua especialidade" type="text" required="required"
                        class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nome">Contato:</label>
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="bi bi-telephone-forward-fill"></i>
                        </div>
                    
                        <input id="contato" name="contato" placeholder="Informe seu numero de contato"  type="text" required="required"
                        class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="bi bi-envelope-open-fill"></i>
                        </div>
                    
                        <input id="email" name="email" placeholder="Informe seu numero de contato" type="text" required="required"
                        class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Endereço:</label>
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                    
                        <input id="endereco" name="endereco" placeholder="Informe seu numero de contato" type="text" required="required"
                        class="form-control">
                    </div>
                </div>
                <br>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button name="submit" type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>

            </div>

        </div>
    </div>

</div>

    <script src="../js/script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var cpfInput = document.getElementById("cpf");

            cpfInput.addEventListener("input", function() {
                var value = cpfInput.value.replace(/\D/g, "");
                if (value.length > 3) {
                    value = value.substring(0, 3) + "." + value.substring(3);
                }
                if (value.length > 7) {
                    value = value.substring(0, 7) + "." + value.substring(7);
                }
                if (value.length > 11) {
                    value = value.substring(0, 11) + "-" + value.substring(11);
                }
                cpfInput.value = value;
            });
        });
    </script>    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</body>

</html>