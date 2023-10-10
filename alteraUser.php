<?php

include 'conexao.php';  

$Id_User = $_GET['IdUser']; 


$consulta = $cn->query("SELECT * FROM tbl_Usuario WHERE nm_Usuario='$Id_User'"); 
$exibe = $consulta->fetch(PDO::FETCH_ASSOC);


$nome = $_POST['txtnome'];  
$email = $_POST['txtemail'];  
$senha = $_POST['txtsenha'];
$endereço = $_POST['txtend'];
$cidade = $_POST['txtcidade'];
$CEP = $_POST['txtcep'];


try {
	
	$alterar = $cn->query("UPDATE tbl_Usuario SET  
	
	nm_Usuario = '$nome',
	ds_Email = '$email',
	ds_Senha = '$senha',
	ds_Endereço = '$endereço',
	ds_Cidade= '$cidade',
	no_Cep = '$CEP'
	WHERE nm_Usuario = '$Id_User' 	
	"); 
	
	echo '<script>alert("Usuário alterado com sucesso!");</script>';
    echo '<script>window.location.href = "index.php";</script>';
    exit();
	
} catch(PDOException $e) {  
	
	echo $e->getMessage();  
	
}



?>