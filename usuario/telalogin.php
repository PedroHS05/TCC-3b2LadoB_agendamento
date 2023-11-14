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

<body style = "background-color: #C0C0C0;">

        <?php
            include_once("../navbarUsu.html");
        ?>

    <div class="container">
        <div style="background-color:#FFF; padding: 1% 2em 8% 2em;; margin: 0px 200px;">
        <div class="container">
            <div class="login">
                <form method="post" action="login.php">
                    <h1 class="text-center display-3" style="padding-top:40px;font-weight: bold" >Acessar minha conta</h1>
                    <br>
                    <div class="form-group">
                        <label class="fs-1" for="nome">CPF:</label>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-id-card-o"></i>
                            </div>
                        
                        <input id="cpf" name="cpf" placeholder="Informe seu cpf" maxLength="14" type="text" required="required"
                            class="form-control fs-2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="fs-1" for="senha">Senha:</label>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16">
                                <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2z"/>
                                </svg>
                            </div>
                            <div class="input-group">
                                <input id="senha" name="senha" placeholder="Informe a sua senha" type="password" required="required" class="form-control fs-2">
                                <div class="input-group-append">
                                <div class="input-group-text" id="olho">
                                <i class="fa fa-eye-slash"></i>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <br> 
                    <div class="d-grid gap-2 col-6 mx-auto">
                    <button name="submit" type="submit" class="btn btn-primary fs-3">Entrar</button>
                    </div>
                </form>

            </div>

            <?php
                if (isset($_GET['erro'])){
                    echo "
                        <div class='msg' style='text-align:center; color:red; font-weight:bold;'>
                            <p>".$_GET['erro']."</p>
                        </div>
                    ";
                }
            ?>

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