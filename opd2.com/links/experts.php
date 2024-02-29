<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/experts.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> <title>Document</title>
</head>
<?php require_once("connection.php"); ?>
<body>
   <?php
   echo "<div class='cards'>";
   $result = $con->query('SELECT * FROM user WHERE flag="e"'); // запрос на выборку
while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
{
  if ($row["photo"] == null){
    $photo = '../assets/images/expert2.jpg';
  } else{
    $photo = $row['photo'];
  }
    echo "<div class='card'>
    <div class='card__top'>
    <div class='card__image'>
      <img src='".$photo."'";
        echo "alt='Фото эксперта'
      />
    </div>
    <div class='image__text'>
    <h1 class='card__title'>";
    echo $row['name'];
    echo "</h1>
    <h2>Достижения</h2>
    <p>";
    echo $row['achievements'];
    echo "</p>
</div>
</div>";
   }
  ?>
</div>
</body>
</html>