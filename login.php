<?php

session_start();

error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

  $conn = new  mysqli("mysql762.umbler.com:41890","knivet","knivet2017","knivet");
 //$conecta = mysql_connect("localhost", "root", "aluno");
if ($conn->connect_erro){
 	die($conn->connect_erro);
 	echo "Erro ao conectar";
 }


$login = $_POST['email'];

//$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

 


$result =  $conn->query("SELECT * FROM usuario WHERE email = '$login' /*OR usuario = '$usuario'*/ AND senha ='$senha' ") ;

/*
while ($row=$result->fetch_assoc()) {
	print '<td>'.$row['email'].'<td>';
}
*/
$cont = mysqli_num_rows($result);
if ($cont <=0) {
	echo "erro";
}else{
	echo "conectado";
	if ($cont == 1) {
		while ($row=$result->fetch_assoc()) {

			$_SESSION['logado']=true;
			$_SESSION['email'] = $row['email'];
			
		//	print ($_SESSION['email']);
			$_SESSION['usuario'] = $row['usuario'];

		//	print($_SESSION['usuario']);
			header("location:index.html");
		}
	}
}