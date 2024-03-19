<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Страница пользователя</title>
    <link rel="stylesheet" href="../../assets/css/lk_css/lk_common.css">
</head>
<?php 
$id = $_GET['id'];
require_once("../connection.php"); 
$result1 = $con -> query("SELECT * FROM user WHERE id='".$id."'");
$user = $result1->fetch_assoc();
?>
<body>
    <div class="header">
        <div class="container">
          <div class="text">
           <h1><?php
            echo $user['name'];
            ?></h1>
           <h2><?php
            echo $user['login'];
            ?></h2>
            <div class="panel">
                <p>Пользователь</p>
                <button class="btn_user" href="#">Прогресс тестов</button>
                <button class="btn_user" href="#">Рекомендации</button>
            </div>
        </div>
        </div>
    </div>
    <div class="end">
        <button class="btn" href="#">Тесты</button>
   </div>
</body>
</html>