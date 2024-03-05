<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Страница эксперта</title>
    <link rel="stylesheet" href="../../assets/css/lk_css/lk_exp.css">
</head>
<?php 
$id = $_GET['id'];
require_once("../connection.php"); 
$result1 = $con -> query("SELECT * FROM user WHERE id='".$id."'");
$user = $result1->fetch_assoc();
?>

<body>
    <div class="container">
    <div class="main">
        <div class="main__left">
           <div class="text">
            <h2>Профессии, доступные для голосования:</h2>
            <div class="spis__prof"> <p>
                <?php
                $result = $con -> query("SELECT * FROM profession");
                while ($row = $result->fetch_assoc()){
                    echo $row['name']."<br/>"; //вывод всех профессий
                    $prof = $row['id']; 
                }

                ?>
            </p>
            </div>
            </div> 
            <a class='btn' href=<?php  echo "'vote.php?id=".$id."&prof=".$prof."'"; ?> > Голосование за ПВК </a>
        </div>
        <div class="main__right">
        <div class="text_right">
        <h3>
            <?php
            echo $user['name'];
            ?>
        </h3>
           <h4>
           <?php
            echo $user['login'];
            ?>
           </h4>
           <div class="exp"><p>Эксперт</p>
           </div>
        </div>
        </div>
    </div>
    </div>
</body>
</html>