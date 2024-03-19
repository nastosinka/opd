
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/register.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Регистрация</title>
</head>
<body>
<header class="header">
<div class="container"> 
    <div class="header__inner">
    <nav class="navigation_left">
        <a class="nav__link" href="../index.html">Главная страница</a>
    </nav>    
    <nav class="navigation_right">
    </nav>
    </div>
</div>
</header>
    <div class="wrapper">
        <form action="register.php" id="registerform" method="post"name="registerform">
            <h1>Регистрация</h1>
            <div class="input__box">
                <input type="text" id="second_name" name="second_name" placeholder="Фамилия" required>
            </div>
            <div class="input__box">
                <input type="text" id="name" name="name" placeholder="Имя" required>
            </div>
            <div class="input__box">
                <input type="text"  id="age" name="age" placeholder="Возраст" required>
            </div>
            <div class="input__box">
                <input type="text"  id="gender" name="gender" placeholder="Год рождения" required>
            </div>
            <div class="input__box">
                <input type="text"  id="login" name="login" placeholder="Логин" required>
            </div>
            <div class="input__box">
                <input type="password" id="password" name="password" placeholder="Пароль" required>
            </div>
            <button type="submit" id="register" name= "register" class="btn">Зарегистироваться</button> 
            <div class="regis__link">
            <p>Уже есть аккаунт? <a href="login.php">Вход</a></p></div>  
            <div class="regis__link">
            <p>Забыли пароль? <a href="pass_recovery.php">Восстановить пароль</a></p></div>   
        </form>
    </div>
</body>
</html>
<?php require_once("connection.php"); ?>
<?php
	
	if(isset($_POST["register"])){
	
	if(!empty($_POST['second_name']) && !empty($_POST['name']) && !empty($_POST['login']) && !empty($_POST['password'])) {
  $second_name= htmlspecialchars($_POST['second_name']);
	$name=htmlspecialchars($_POST['name']);
    $full_name = $second_name . ' ' . $name;
 $username=htmlspecialchars($_POST['login']);
 $password=htmlspecialchars($_POST['password']);
 $year=htmlspecialchars($_POST['age']);
 $gender=htmlspecialchars($_POST['gender']);
 $query= $con -> query("SELECT * FROM user WHERE login=".$username);

if($query==false)
   {
	$sql="INSERT INTO user
  (name, achievements, flag, login, password, yearofbirth, gender)
	VALUES('$full_name','Достижений нет', 'u', '$username', '$password', '$year', '$gender')";
  $result=$con -> query($sql);
 if($result){
	$message = "Account Successfully Created";
} else {
 $message = "Failed to insert data information!";
  }
	} else {
	$message = "That username already exists! Please try another one!";
   }
	} else {
	$message = "All fields are required!";
	}
	}
	?>

	<?php if (!empty($message)) {echo "<p class='error'>" . "MESSAGE: ". $message . "</p>";} ?>