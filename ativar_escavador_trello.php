<?php
 error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
 session_start();
?>
<?php  if(isset($_SESSION['logado'])):    ?>

<?php endif;

if (!($_SESSION['logado'])) {

   header("location:index.html");
}
//header("location:index.html");
//Warning: Cannot modify header information - headers already sent by (output started at C:\xampp\htdocs\Knivet\resumo.php:86) in C:\xampp\htdocs\Knivet\resumo.php on line 587
?>

<?php

$conn = new  mysqli("mysql762.umbler.com:41890","knivet","knivet2017","knivet");
 if ($conn->connect_erro){
 	die($conn->connect_erro);
 	echo "Erro ao conectar";
 }

 $check = $_POST['escavador_trello_cb'];
  $id = $_SESSION['id_usuario'];
  $id_automacao = 0;
 
 if ($check == TRUE) {
 	
 	// inserir uma linha em automação ativas com id do usuário e id da automação == a 0;
 	 $sql = "INSERT INTO  automacoes_ativas WHERE (id_usuario,id_automacao) VALUES ('$id','$$id_automacao')";
 	 if ($conn->query($sql)===true) {
 		echo "sucesso";
 		header("location:disponiveis.php");

	}else{
 		echo "failed";
 	}

 }else{
 	if ($check == FALSE){

 		$sql = "DELETE FROM automacoes_ativas WHERE id_usuario = 'id' AND $id_automacao = 'id_automacao' ";
 			 if ($conn->query($sql)===true) {
 				echo "sucesso";
				header("location:disponiveis.php");
			}else{
 				echo "failed";
 			}
 	}else{
 		echo "Não é FALSE NEM TRUE";
 	}

 }

 $conn->close();

?>
