<html>
   
   <head>
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      
      <?php
      use PHPMailer\PHPMailer\PHPMailer; 
      use PHPMailer\PHPMailer\Exception; 
      // Include PHPMailer library files 
    require ('PHPMailer/Exception.php'); 
    require ('PHPMailer/PHPMailer.php'); 
    require ('PHPMailer/SMTP.php'); 
 
// Create an instance of PHPMailer class 
$mail = new PHPMailer;


      $phpmailer = new PHPMailer();
      $phpmailer->isSMTP();
      $mail->Host     = 'smtp.mailtrap.io';
      $mail->SMTPAuth = true;
      $mail->Username = 'd6d022bf9fd9d6';
      $mail->Password = '424422140f65fe';
      $mail->SMTPSecure = 'tls';
      $mail->Port     = 2525;


        // Sender info 
    $mail->setFrom('smtp.mailtrap.io', 'SenderName'); 
    $mail->addReplyTo('reply@example.com', 'SenderName'); 
    
    // Add a recipient 
    $mail->addAddress('smtp.mailtrap.io'); 
    
    // Add cc or bcc  
    $mail->addCC('cc@example.com'); 
    $mail->addBCC('bcc@example.com'); 
    
    // Email subject 
    $mail->Subject = 'Send Email via SMTP using PHPMailer'; 
    
    // Set email format to HTML 
    $mail->isHTML(true); 
    
    // Email body content 
    $mailContent = ' 
        <h2>Send HTML Email using SMTP Server in PHP</h2> 
        <p>It is a test email by CodexWorld, sent via SMTP server with PHPMailer using PHP.</p> 
        <p>Read the tutorial and download this script from <a href="https://www.codexworld.com/">CodexWorld</a>.</p>'; 
    $mail->Body = $mailContent; 
    
    // Send email 
    if(!$mail->send()){ 
        echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
    }else{ 
        echo 'Message has been sent.'; 
    }
      ?>
      
   </body>
</html>