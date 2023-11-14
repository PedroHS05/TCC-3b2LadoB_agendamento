<?php
$cpf = $_POST['cpf'];
$cpf = str_replace(".", "", $cpf);
$cpf = str_replace("-", "", $cpf);
$senha = $_POST['senha'];

include_once("conexao.php");

$stmt = "select * from tbusuarios where cpf = '$cpf';";

$resultado = mysqli_query($conn, $stmt);

if (mysqli_num_rows($resultado) > 0) {
    $usuarios = mysqli_fetch_assoc($resultado);

        if ($usuarios['ativo'] == "n") {
        $erro = "Usuário inativo, procure o administrador";
        } else if ($usuarios['ativo'] == "s") {
            if (password_verify($senha, $usuarios ['senha'])==FALSE) {
                $erro = "Senha incorreta";
        }
    }
}else {
    $erro = "Usuário não encontrado";
}

if(!isset($erro)) {
    session_start();
    $_SESSION['usuarios'] = $usuarios['cpf'];
    if ($usuarios['tipo'] == "a") {
        $_SESSION['tipo'] = "a";
        header("location:tela_adm_usu.php");
    }else if ($usuarios['tipo'] == "m") {
        $_SESSION['tipo'] = "m";
        header("location:horariosM.php");
    }
    else if ($usuarios['tipo'] == "u") {
        $_SESSION['tipo'] = "u";
        header("location:telausuario.php");
    }
}else{
    header("location:telalogin.php?erro=".$erro);
}

?>