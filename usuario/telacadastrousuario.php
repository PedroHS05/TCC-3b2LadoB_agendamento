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
    include_once("../navbarUsu.html");
    ?>


    <div class="container">
        <div style="background-color:#FFF; padding-left:4%;padding-right: 4%;padding:4%; ">
            <div class="container">
                <div class="login">
                    <form method="post" action="cadastrousuario.php">
                        <h1 class="text-center display-2" style="padding-top:40px;font-weight: bold" >Cadastro de Usuário</h1>
                        <div class="form-group">
                            <label class="fs-1" for="email">Nome:</label>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-user"></i>
                                </div>

                                <input class="fs-2" style="width: 100%" id="nome" name="nome" placeholder="Informe seu nome completo" type="text" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="fs-1" for="nome">CPF:</label>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fa fa-id-card-o"></i>
                                </div>

                                <input class="fs-2" style="width: 100%" id="cpf" name="cpf" placeholder="Informe seu cpf" maxLength="14" type="text" required="required" class="form-control">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="fs-1" for="nome">Contato:</label>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="bi bi-telephone-forward-fill"></i>
                                </div>

                                <input class="fs-2" style="width: 100%" id="contato" name="contato" placeholder="Informe seu número de contato" type="text" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="fs-1" for="senha">Senha:</label>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                                        <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z" />
                                    </svg>
                                </div>
                                <div class="input-group">
                                    <input class="fs-2" style="width: 100%" id="senha" name="senha" placeholder="Informe a sua senha" type="password" required="required" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="fs-1" for="repitSenha">Repita sua senha:</label>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock" viewBox="0 0 16 16">
                                        <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z" />
                                    </svg>
                                </div>
                                <input class="fs-2" style="width: 100%" id="ReptSenha" name="repitSenha" placeholder="Informe a sua senha" type="password" required="required" class="form-control">
                                <div class="input-group-append">
                                    <div class="input-group-text" id="olho">
                                        <i class="fa fa-eye-slash"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-6 mx-auto">
                            <button name="submit" type="submit" class="btn btn-primary fs-2">Cadastrar</button>
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