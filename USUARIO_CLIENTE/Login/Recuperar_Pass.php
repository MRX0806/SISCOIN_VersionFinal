<?php
 require_once('../../conexion.php');

 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

 require '../PHPMailer/Exception.php';
 require '../PHPMailer/PHPMailer.php';
 require '../PHPMailer/SMTP.php';  

$email=$_POST('email');
$query="Select * from usuarios where Email='$email'";
$result=$pdo->query($query);

if($result->rowCount()>0)
    {
        $mail= new PHPMailer(true);
        
        try {
                $mail->isSMTP();                            
                $mail->Host       = 'smtp.example.com';             
                $mail->SMTPAuth   = true;                               
                $mail->Username   = 'angel.flexmami@gmail.com';                   
                $mail->Password   = 'bpmeocclhfbvxsol';                           
                $mail->Port       = 465;                                   
                //Recipients
                $mail->setFrom('angel.flexmami@gmail.com', 'Mailer');
                $mail->addAddress('lpalominodi@ucvvirtual.edu.pe', 'Daves');

                //Content
                $mail->isHTML(true);                        
                $mail->Subject = 'Recuperación de Contraseña';
                $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
                $mail->send();
                echo 'Message has been sent';
        } catch (Exception $e) 
            {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
       
    }


?>