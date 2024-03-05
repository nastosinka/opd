<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Страница эксперта</title>
    <link rel="stylesheet" href="../assets/css/lk.css">
</head>
<?php require_once("connection.php"); ?>
<body>
<?php $id = $_GET['id']; ?>
    <header class="header">
        <div class="container">
           <h1>Страница эксперта</h1>
        </div>
    </header>
    <div class="container">
    <div class="main">
        <div class="main__left">
           <div class=text>
            <h2>Список доступных для голосования профессий:</h2>
            <div class="spis__prof">
                <?php 
                    $query= $con -> query("SELECT * FROM profession");
                    if($query!=false){
                        while($row = $query->fetch_assoc()){
                            echo $row['name']."\n0";
                        };
                    }
                    else {
                        $message = "Нет доступных профессий";
                        echo $message;}
                ?>
            </div>
            </div> 
            <button class="btn">Добавить профессию</button>
        </div>
        <div class="main__right">
        <div class="wrapper">
        <form action="">
         <h1>Голосование</h1>
           <div class="input__box">
                <input type="text" placeholder="Профессия" required>
            </div>
            <div class="input__box">
                <input type="text" placeholder="1 ПВК" required>
            </div>
            <div class="input__box">
                <input type="text" placeholder="2 ПВК" required>
            </div>
            <div class="input__box">
                <input type="text" placeholder="3 ПВК" required>
            </div>
            <div class="input__box">
                <input type="text" placeholder="4 ПВК" required>
            </div>
            <div class="input__box">
                <input type="text" placeholder="5 ПВК" required>
            </div>
            <button type="submit" class="btn">Проголосовать</button>    
        </form>
    </div>
        </div>
    </div>
    </div>
</body>
</html>