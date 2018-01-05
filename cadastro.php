

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
//$senhaConfirm = $_POST['confirm'];

$result =  $conn->query("SELECT id FROM usuario") ;
$numMaior = 0;
while ($row=$result->fetch_assoc()) {
	$numMaior = $row['id'];
}
print($numMaior);

$numMaior = $numMaior + 1;

/*
if (condition) {
	# code...
}
*/

 $sql = "INSERT INTO usuario(id, email,senha,usuario,emailRec) VALUES ('$numMaior','$email','$senha','$usuario','$emailRec')";
 if ($conn->query($sql)===true) {
 	echo "sucesso";
 	header("location:index.html");
 }else{
 	echo "failed";
 }

 $conn->close();

?>
