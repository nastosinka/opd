<?php

  $db = new PDO("mysql:host=localhost;dbname=opd",
  "root", "");

  $info = [];

  if ($query = $db->query("Select * from user where flag='e'")) {
    $info = $query->fetchAll(PDO::FETCH_ASSOC);} else {
        print_r($db->errorInfo());
    }

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/experts.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> <title>Document</title>
</head>
<body>
    <div class="cards">
    <?php foreach ($info as $data): ?>
  <div class="card">
    <div class="card__top">
    <div class="card__image">
      <?php if ($data['photo'] == null){
              $photo = '../assets/images/expert2.jpg';
            } else{
              $photo = $data['photo'];
            }?>
      <img src=<?php echo $photo; ?>
        alt="Фото эксперта">/>
    </div>
    <div class="image__text">
        <h1><?php echo $data['name']; ?></h1>
        <h2><?php echo 'Достижения'; ?></h2>
        <p><?php echo $data['achievements']; ?></p>
    </div>
  </div>
  </div>
  <?php endforeach; ?>
  </div>
  </div>
</body>
</html>
