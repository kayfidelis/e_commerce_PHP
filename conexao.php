<?php 

    $servidor = "localhost";
    $usuario = "root";
    $senha = "854531";
    $banco = "Skate_Shop";

    $cn = new mysqli ($servidor, $usuario, $senha, $banco);
    if($cn ->connect_error){
        echo "Falha ao conectar: (" . $cn->connect_error . ") " . $cn->connect_error;
    }  
    // .........

?>