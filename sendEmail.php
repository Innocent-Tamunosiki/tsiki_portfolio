<?php
use PHPMailer\PHPMailer\PHPMailer;
if(isset($_POST["name"])) && isset($_POST["email"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $body = $_POST["body"];

    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    require_once "PHPMailer/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smpt.gamil.com"
    $mail->SMTPAuth = true;
    $mail->Username = "innocenttamunosiki@gmail.com";
    $mail->Username = "Tsiki@1995";
    $mail->port = 465;
    $mail->SMTPSecure = "Ss1";

    //email settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("innocenttamunosiki@gmail.com");
    $mail->subject = ($email ($subject));
    $mail->body = $body;

    if($mail-send()){
        $status = "success";
        $response = "Eamil is sent";
    }
    else{
        $status = "failed";
        $response = "something is wrong: <br>" . $mail->ErrorInfo;
    }
    exit(jason_encode(array("status" => $status, "response" => $response)));
}
?>
