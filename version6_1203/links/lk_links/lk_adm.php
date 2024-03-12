<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Страница администратора</title>
    <link rel="stylesheet" href="../../assets/css/lk_css/lk_adm.css">
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
           <h1>
            <?php
            echo $user['name'];
            ?>
            </h1>
           <h2>
            <?php
            echo $user['login'];
            ?>
            </h2><p>Администратор</p>
        </div>
        </div>
    </div>
    <div class="end">
   <a class="btn" href="add_prof.php">Добавить профессию</a>
   </div>
</body>
</html>