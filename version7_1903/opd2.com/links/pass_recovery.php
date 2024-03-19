<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/pass_recovery.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Восстановление пароля</title>
</head>
<body>
    <div class="wrapper">
        <form action="pass_recovery.php" id="loginform" method="post" name="loginform">
            <h1>Восстановление пароля</h1>
            <div class="input__box">
                <input type="text" id="email" name="email" placeholder="Почта" required>
                <i class='bx bxl-gmail'></i>
            </div>
            <button type="submit"   id="login" name= "login" class="btn">Восстановить пароль</button> 
        </form>
    </div>
</body>
</html>
<?php require_once("connection.php"); ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\opd2.com\links\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\opd2.com\links\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\opd2.com\links\PHPMailer\src\SMTP.php';

if(isset($_POST["login"])){
    $login=htmlspecialchars($_POST['email']);
    $result = $con -> query("SELECT * FROM user WHERE login='".$login."'");
    $row = $result->fetch_assoc();
    if ($row != false){

    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';

    $yourEmail = 'podderzhka.saitotsenkivakansy@yandex.ru'; 
    $password = 'kzlchleecntwgpvb'; 
    $mail->IsSMTP();
    $mail->Host = 'ssl://smtp.yandex.ru';
    $mail->SMTPAuth     = true;
    $mail->SMTPDebug = 0;
    $mail->Username     = 'podderzhka.saitotsenkivakansy@yandex.ru'; // Если почта для домена, то логин это полный адрес почты
    $mail->Password     = 'txzgqzghfdqldwav';
    $mail->Port         = 465;

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->setFrom($yourEmail, 'podderzhka.saitotsenkivakansy');		
 

    $mail->addAddress($login, $login);
    $mail->isHTML(true); 
    $mail->Subject = 'Восстановление пароля';
    $mail->Body = ('Здравствуйте '.$login.', для восстановления пароля перейдите по ссылке ниже
    http://localhost/opd2.com/links/new_pass.php?id='.$row['id']);


    if ($mail->send()) { 
        echo 'Письмо отправлено!'; // здесь надо сделать перенапрвление на страницу успешной отправки письма
    } else {
        echo 'Ошибка: ' . $mail->ErrorInfo;
    } 
}
    else{
        $message = "Пользователь с такой почтой не найден";
        echo $message;
    }
}

?>