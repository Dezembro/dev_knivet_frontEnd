

<?php

session_start();

//https://www.youtube.com/watch?v=I6QxCHWviAI
ini_set('display_errors', 1);
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
/*
$result =  $conn->query("SELECT id FROM usuario") ;
$numMaior = 0;
while ($row=$result->fetch_assoc()) {
	$numMaior = $row['id'];
}
print($numMaior);

$numMaior = $numMaior + 1;
*/

/*
if (condition) {
	# code...
}

 
$from = "morg.guilherme@gmail.com";
 
$to = "morg.guilherme@gmail.com";
 
$subject = "Testando enviar email";
 
$message = "O correio do PHP funciona bem";
 
//$headers = "De:". $from;
$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: Knivet <morg.guilherme@gmail.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
 
mail($to, $subject, $message, $headers);
 */

 $sql = "INSERT INTO usuario(email,senha,usuario,emailRec) VALUES ('$email','$senha','$usuario','$emailRec')";
 if ($conn->query($sql)===true) {
 	echo "sucesso";
 	$_SESSION['logado']=true;
 
 	$_SESSION['email'] = $email;
	$_SESSION['nome'] = $usuario;


	   $result =  $conn->query("SELECT * FROM usuario WHERE email = '$email' ");
       $cont = mysqli_num_rows($result);
         if ($cont <=0) {
           echo ("erro");
         }else{
             // echo "conectado";
             if ($cont == 1) {
                 while ($row=$result->fetch_assoc()) {
                    
                      $_SESSION['id_usuario']= $row['id'];
                       $id = $_SESSION['id_usuario'];

                       $sql = "INSERT INTO chamadas_feitas_temp(id_usuario,vl1,vl2,vl3,vl4,vl5,vl6,vl7) VALUES ('$id',0,0,0,0,0,0,0)";
                        if ($conn->query($sql)===true) {
                            echo "sucesso  chamadas_feitas_temp";
                        
                             $sql = "INSERT INTO horas_salvas_temp(id_usuario,vl1,vl2,vl3,vl4,vl5,vl6,vl7) VALUES ('$id',0,0,0,0,0,0,0)";
                             if ($conn->query($sql)===true) {
                                echo "sucesso horas_salvas_temp";
                                header("location:resumo.php");
                             }else{
                                 echo "erro horas_salvas_temp";
                            }

                        }else{
                            echo "erro chamadas_feitas_temp";
                        }

                   }
             }
        }
 }else{
 	echo "failed";
 }

 $conn->close();

?>
