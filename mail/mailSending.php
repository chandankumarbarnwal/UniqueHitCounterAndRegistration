<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'library/vendor/autoload.php';

function send_mail($body='hello chandan',$to='chandanbarnwal111@gmail.com', $from="artibarnwal111@gmail.com") {
       $date = date('Y-m-d');
       $mail = new PHPMailer;
       try{
       $mail->IsSMTP();
       //$mail->SMTPDebug = 2;
       $mail->Mailer = 'smtp';
       //$mail->Host = 'email-smtp.us-west-2.amazonaws.com';  // Specify main and backup SMTP servers
       $mail->Host = 'smtp.gmail.com';
       $mail->SMTPAuth = true;                               // Enable SMTP authentication
                      // SMTP username
       $mail->Username = 'chandanletsservice@gmail.com';//$this->smtpUsername;                 // SMTP username
       $mail->Password = 'chandanlets1995';//                            // Enable TLS encryption, `ssl` also accepted
         
       $mail->SMTPSecure = 'ssl';
       $mail->Port = 465;
       //Recipients
       $mail->setFrom($from, 'check');
       $mail->addAddress($to);     // Add a recipient
       //$mail->addAddress('rahul.kannikulangara@letsservice.in');
       $mail->isHTML(true);                                  // Set email format to HTML
       $mail->Subject = 'Letsq Daily Report - '.$date;
       $mail->Body    = $body;

       //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

       if($mail->send())
           echo 'Message has been sent';
       else
           echo 'Message not sent';

       } catch (MailException $e) {
           echo 'Message could not be sent.';
           echo 'Mailer Error: ' . $mail->ErrorInfo;
       }
   }

send_mail('hello chandan','chandanbarnwal111@gmail.com', "artibarnwal111@gmail.com");
?>