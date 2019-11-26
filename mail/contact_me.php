<?php
  include("phpmailer/src/oAuth.php");
  include("phpmailer/src/Exception.php");
  include("phpmailer/src/POP3.php");
  include("phpmailer/src/PHPMailer.php");
  include("phpmailer/src/SMTP.php");
  
if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['message']))
   {
   echo "<script>alert('Erro, verifique se preencheu os dados e o email!');</script>";
	$url = '../index.php#contactos';
	echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
   return false;
   }
$mensagem = $_POST['message'];
$email = $_POST['email'];
$nome = $_POST['name'];
$phone = $_POST['phone'];
$mail = new PHPMailer\PHPMailer\PHPMailer(true);
$mail->IsSMTP();
$mail->SMTPDebug  = 0;                  
$mail->SMTPAuth   = true;        
$mail->SMTPSecure = "tls";                 
$mail->Host       = "smtp.gmail.com";    
$mail->Port       = 587;              
$mail->Username   = "espancaballspap@gmail.com"; 
$mail->Password   = "espancaballs";     
$mail->SetFrom('espancaballspap@gmail.com', 'Contactado por ' .$nome);
$address = "espancaballspap@gmail.com";
$mail->AddAddress($address, "EspancaBalls Club");
$mail->isHTML(true);
$mail->Subject = $email ." lhe contactou.";
$mail->Body = "<h1 style='text-align:center'>Mensagem</h1><br /><h3 style='text-align:center'>".$mensagem."</h3><br /><br /><br /><br /><spanstyle='text-align:center;color:#555'>Telefone: ".$phone." | email: ".$email." | nome:".$nome."</span>";

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
	echo "<script>alert('Mensagem enviada com successo!');</script>";
 $url = '../index.php';
echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
}

?>