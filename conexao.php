<?php 

    $servidor = "localhost";
    $usuario = "KayqueRFT";
    $senha = "12345678";
    $banco = "Skate_Shop";

    $cn = new PDO ("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    

?>
