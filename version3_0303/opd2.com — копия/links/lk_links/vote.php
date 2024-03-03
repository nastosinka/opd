<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Голосование за ПВК</title>
    <link rel="stylesheet" href="../../assets/css/lk_css/vote.css">
</head>
<?php

  $db = new PDO("mysql:host=localhost;dbname=opd",
  "root", "");

  $info = []; //массив пвк id + name

  if ($query = $db->query("Select * from profession")) {
    $info = $query->fetchAll(PDO::FETCH_ASSOC);} else {
        print_r($db->errorInfo());
    }

?>
<body>
    
    <div class="container">
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
</body>
</html>