<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Вход</title>
</head>
<body>
    <div class="wrapper">
        <form action="login.php" id="loginform" method="post" name="loginform">
            <h1>Вход</h1>
            <div class="input__box">
                <input type="text" id="username" name="username" placeholder="Логин" required>
                <i class='bx bx-user-circle'></i>
            </div>
            <div class="input__box">
                <input type="password" id="password" name="password" placeholder="Пароль" required>
                <i class='bx bx-lock'></i>
            </div>
            <button type="submit"   id="login" name= "login" class="btn">Войти</button>
            <div class="regis__link">
            <p>Нет аккаунта? <a href="record.html">Регистрация</a></p></div>   
        </form>
    </div>
</body>
</html>
<?php require_once("connection.php"); ?>
<?php
	
	if(isset($_POST["login"])){
	
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
 $login=htmlspecialchars($_POST['username']);
 echo 1;
 $password=htmlspecialchars($_POST['password']);
 $query= $con -> query("SELECT * FROM user WHERE login='".$login."' and password='".$password."'");

if($query!=false)
   {
	header('Location: http://localhost/opd2.com/links/lk.html');}
  else {
 $message = "Неверный пользователь или пароль";
 echo $message;
  }
    }}
?>
