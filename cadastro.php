

<?php

//https://www.youtube.com/watch?v=I6QxCHWviAI
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

//  $conecta = mysql_connect("localhost", "MoorG", "AnnaBeth10");
 // $conn = new  mysqli("localhost", "root","","projeto_html");
	$conn = new  mysqli("mysql762.umbler.com:41890","knivet","knivet2017","knivet");
 if ($conn->connect_erro){
 	die($conn->connect_erro);
 	echo "Erro ao conectar";
 }

$email = $_POST['email'];
$senha = $_POST['senha'];
$usuario =$_POST['usuario'];
$emailRec =$_POST['emailRec'];


 $sql = "INSERT INTO usuario(email,senha,usuario,emailRec) VALUES ('$email','$senha','$usuario','$emailRec')";
 if ($conn->query($sql)===true) {
 	echo "sucesso";
 }else{
 	echo "failed";
 }

 $conn->close();

?>
