<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

/*$name = $_POST['name'];
$email = $_POST['email'];
$info = $_POST['info'];*/

$name = 'Giuseppe';
$email = 'caponegiuseppe91@gmail.com';
$info = 'Test';

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.caponegiuseppe.com';              // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'info@caponegiuseppe.com';            // SMTP username
    $mail->Password   = 'Password.132';                         // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('info@caponegiuseppe.com', 'Giuseppe Capone');
    $mail->addAddress('caponegiuseppe91@gmail.com');
    $mail->addAddress($email);


    // Content

    $message = "<b>Messaggio generato automaticamente, si prega di non rispondere</b>
                <br><br>
                Il tuo messaggio è stato ricevuto con successo. Verrà ricontattato entro il minor tempo possibile.
                <br>
                Grazie per avermi scelto.
                <br><br>
                <i>Nome: $name
                <br>
                Email: $email
                <br>
                Messaggio: $info</i>
                ";


    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $name;
    $mail->Body    = $message;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}