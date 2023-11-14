<?php
session_start();
if(isset($_SESSION['usuarios'])){
    if($_SESSION['tipo']!="a" && $_SESSION['tipo']!="m"){
        $erro ="Você tentou acessar uma área não permitida.";
    }
}else{
    $erro = "Usuario não autenticado.";
}
if(isset($erro)){
    header("location:telalogin.php?erro=".$erro);
}



// session_start();
// if($_SESSION['tipo']="a" || $_SESSION['tipo']="m"){
    
// }
// if(isset($_SESSION['usuarios'])){
//     if($_SESSION['tipo']="a"){
//         if(isset($_SESSION['usuarios'])){
//             if($_SESSION['tipo']!="a"){
//                 $erro ="Você tentou acessar uma área não permitida.";
//             }
//         }else{
//             $erro = "Usuario não autenticado.";
//         }
//         if(isset($erro)){
//             header("location:telalogin.php?erro=".$erro);
//         }
//     }
//     else if($_SESSION['tipo']="m"){
//         include_once("validarMedico.php");
//     }
//     else if($_SESSION['tipo']="u"){
//         $erro ="Você tentou acessar uma área não permitida.";
//     }
// }else{
//     $erro = "Usuario não autenticado.";

// }
// if(isset($erro)){
//     header("location:telalogin.php?erro=".$erro);
// }
?>