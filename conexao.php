<?php 

    $servidor = "localhost";
    $usuario = "Kayque";
    $senha = "123456";
    $banco = "Skate_Shop";

    $cn = new PDO ("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    

?>