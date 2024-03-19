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
            </h2>
            <p>Администратор</p>
            <div class="items_in_line">
                <a class="btn" href="lk_admin/experts.php?id=<?php echo $id; ?>">Список экспертов</a>
                <a class="btn" href="lk_admin/professions.php?id=<?php echo $id; ?>">Список профессий</a>
            </div>
        </div>
        </div>
    </div>
</body>
</html>