<?php 
session_start();

if(isset($_POST)){
     if($_POST["userMail"] && $_POST["userName"] && $_POST["subject"] && $_POST["content"]){
        require('class.phpmailer.php');
        $smtpuser = "yourmailadress@gmail.com";
        $smtphost = "smtp.gmail.com";
        $smtpport = 465;
        $smtppassword = "password";

        $mail = new PHPMailer();
        $name = $_POST["userName"];
        $email = $_POST["userMail"];
        $subject = $_POST["subject"];
        $content = $_POST["content"];

        $mail->SMTPDebug = 1;
        $mail->IsSMTP();
        $mail->Host     = $smtphost;
        $mail->SMTPAuth = true;
        $mail->Username = $smtpuser;
        $mail->Password = $smtppassword;
        $mail->Port     = $smtpport;  
        $mail->Mailer   = "smtp";
        $mail->Encoding = 'base64';
        $mail->CharSet = 'UTF-8';
        $mail->SMTPSecure = "ssl";
        
        $mail->SetFrom($email , $name);
        $mail->AddAddress( $smtpuser );

        $mail->IsHTML(true);
        $mail->Subject = '=?UTF-8?B?'.base64_encode($subject).'?='; //For turkish characters in subject
        $mail->Body = $content;

        if($mail->Send()){
            $alert = array(
                "message" => "Mail başarı ile gönderildi.",
                "type" => "success"
            );

        } else {
            $alert = array(
                 "message" => "Mail Gönderilemedi....",
                // "message" => "Mailer Error: ".$mail->ErrorInfo,
                "type" => "danger"
            );
        }

    } else {
        $alert = array(
            "message" => "Mail Gönderilemedi.",
            "type" => "danger"
        );
    }
    
    $_SESSION["alert"] = $alert;
    header("location: ../index.php");
}