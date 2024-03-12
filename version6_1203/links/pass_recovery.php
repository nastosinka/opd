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

