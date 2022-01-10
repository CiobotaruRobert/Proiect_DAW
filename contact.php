<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    $mailTo = "dawp16555@gmail.com";
    $headers = "From: ".$mailFrom;
    $txt = "Ati primit un e-mail de la ".$name.".\n\n".$message;
    mail($mailTo, $subject, $txt, $headers);
}

?>