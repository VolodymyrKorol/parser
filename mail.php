<?php
use PHPMailer\PHPMailer\PHPMailer;
function send_mail($count,$new_articles,$new_articles_link)
{



   // $project_name = "Parser";
    $form_subject = "New parsed articles";

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";

    $message = "<div class='message'>
<div class='message-title'><h2></h2>
</div>
<div class='message-text'>
<p>Parser.online has got <b>".$count."</b> new posts</p> <br>";

    for ($i =0;$i <count($new_articles);$i++){
        $message .= "<div><a href='".$new_articles_link[$i]."'>".$new_articles[$i]."</a></div>";

    }

        $message .= "</div></div>";

$mail = new PHPMailer();


//SMTP
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "volodymyr01korol@gmail.com";
$mail->Password = "1234djdf";
$mail->Port = "465";//587
$mail->SMTPSecure = "ssl";

//EMAIL

    $mail->isHTML(true);
    $mail->setFrom("peryjeky@gmail.com","Volodymyr");
    $mail->addAddress("peryjeky@gmail.com");
    $mail->Subject = $form_subject;
    $mail->Body = $message;
    if($mail->send())
        return true;
    else
        return false;





//    function adopt($text)
//    {
//        return '=?UTF-8?B?' . Base64_encode($text) . '?=';
//    }
//
////    $headers = "MIME-Version: 1.0" . PHP_EOL .
////        "Content-Type: text/html; charset=utf-8" . PHP_EOL .
////        'From: ' .$project_name . ' <' . $receiver . '>' . PHP_EOL .
////        'Reply-To: ' . $receiver . '' . PHP_EOL;
//
//
//
//    return mail($receiver, adopt($form_subject), $message);
}