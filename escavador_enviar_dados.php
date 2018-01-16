<?php
 error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
 session_start();
?>

<?php  if(isset($_SESSION['logado'])):    ?>

<?php endif;

if (!($_SESSION['logado'])) {

   header("location:index.html");
}

?>

<?php 
//  $conecta = mysql_connect("localhost", "MoorG", "AnnaBeth10");
 // $conn = new  mysqli("localhost", "root","","projeto_html");
	$conn = new  mysqli("mysql762.umbler.com:41890","knivet","knivet2017","knivet");
 if ($conn->connect_erro){
 	die($conn->connect_erro);
 	echo "Erro ao conectar";
 }


$email = $_POST['email_escavador'];
$senha = $_POST['senha_escavador'];
$token = $_POST['token_trello'];
$key = $_POST['key_trello'];
$id = $_SESSION['id_usuario'];

$token = trim($token);
$key = trim($key);

print($token);


if(isset($_POST['monitoramentos_antigos']))
{
    $monitoramentos_antigos = 1;
}
else
{
  $monitoramentos_antigos = 0;  
}
		$id = $_SESSION['id_usuario'];
		$id_automacao = 0;

	$result =  $conn->query("SELECT * FROM automacoes_ativas WHERE id_usuario = '$id' ") ;

	//$cont = mysqli_num_rows($result);
	//if ($cont <=0) {

		$cont = mysqli_num_rows($result);
		if ($cont <=0) {
			
			$sql = " INSERT INTO automacoes_ativas(id_usuario,id_automacao) VALUES ('$id','$id_automacao') ";
			if ($conn->query($sql)===true) {
 				echo "sucesso primerio INSERT";

 				$sql = "INSERT INTO escavador_usuario(id_usuario,email,senha,antigas_movimentacoes) VALUES ('$id','$email','$senha','$monitoramentos_antigos')";
			
				if ($conn->query($sql)===true) {
 					echo "sucesso segundo INSERT";
					
					$sql = "INSERT INTO trello_usuario(id_usuario,keyT,token) VALUES ('$id','$key','$token')";

			
					if ($conn->query($sql)===true) {
 						echo "sucesso  INSERT trello";
 						

						$result =  $conn->query("SELECT * FROM usuario WHERE id = '$id' ") ;

						$cont = mysqli_num_rows($result);
						if ($cont <=0) {
							echo "erro";
						}else{

							echo "conectado";
							if ($cont == 1) {
								while ($row=$result->fetch_assoc()) {

									$automacoes_ativas = $row['automacoes_ativas'] + 1;
									$id = $row['id'];
									$email = $row['email'];
									$senha = $row['senha'];
									$usuario = $row['usuario'];
									$emailRec = $row['emailRec'];
									$autMax = $row['automacoes_max'];
									$nat = $row['num_automatizacoes_total'];
									$mst = $row['minutos_salvos_total'];
									$et = $row ['erros_total'];

									$sql = " UPDATE usuario SET id='$id', email='$email', senha ='$senha', usuario = '$usuario', emailRec = '$emailRec', automacoes_ativas = '$automacoes_ativas', automacoes_max = '$autMax', num_automatizacoes_total = '$nat', minutos_salvos_total = '$mst', erros_total = '$et' WHERE id ='$id' ";

									if ($conn->query($sql)===true) {
 										echo "sucesso UPDATE usuario";
 										header("location:resumo.php");

 									}else{
 										echo "erro UPDATE usuario";
 									}		
								}
							}
						}

 						
					}else{
						echo "failed  INSERT trello";
					}


				}else{
 					echo "failed segundo INSERT";
				}


			}else{
 				echo "failed primeiro INSERT";
			}
			




			
		
		}else{
			$sql = " UPDATE escavador_usuario SET id_usuario='$id', email='$email', senha ='$senha' WHERE id_usuario ='$id' ";

			if ($conn->query($sql)===true) {
 				echo "sucesso";
 				
 				$sql = "INSERT INTO trello_usuario(id_usuario,keyT,token) VALUES ('$id','$key','$token')";

				if ($conn->query($sql)===true) {
 					echo "sucesso  INSERT trello";
 					header("location:disponiveis.php");
				}else{
 					echo "failed  INSERT trello";
					$sql = " UPDATE trello_usuario SET id_usuario='$id', keyT='$key', token ='$token' WHERE id_usuario ='$id' ";
					if ($conn->query($sql)===true) {

						header("location:resumo.php");
					}else{

						echo "failed  UPDATE trello";
					}
					

				}

			}else{
 				echo "failed";
			}
		}


	$conn->close();


 ?>