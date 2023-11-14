<?php
session_start();

if (isset($_SESSION['usuarios'])) {
    if ($_SESSION['tipo'] !== "m") {
        $erro = "Você tentou acessar uma área não permitida.";
        $_SESSION['erro'] = $erro;
        header("location: telalogin.php");
        exit(); // Encerre o script após o redirecionamento.
    }
} else {
    $erro = "Médico não autenticado.";
    $_SESSION['erro'] = $erro;
    header("location: telalogin.php");
    exit(); // Encerre o script após o redirecionamento.
}
?>
