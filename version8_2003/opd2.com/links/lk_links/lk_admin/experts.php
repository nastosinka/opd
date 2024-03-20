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
    <link rel="stylesheet" href="../../../assets/css/lk_css/lk_adm_css/experts.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
    <title>Эксперты</title>
</head>
<?php 
$id = $_GET['id'];
?>
<body>
<header class="header">
<div class="container"> 
    <div class="header__inner">
    <a class="nav__link" href="../lk_adm.php?id=<?php echo $id; ?>">Личный кабинет</a>
    <a class="nav__link" href="remove_expert.php?id=<?php echo $id; ?>">Удалить эксперта</a>
    <nav class="navigation_left">
    <a class="nav__link" href="add_expert.php?id=<?php echo $id; ?>">Добавить эксперта</a>
    </nav>    
    <nav class="navigation_right">
    <a class="nav__link" href="remove_expert.php?id=<?php echo $id; ?>">Удалить эксперта</a>
    </nav>
    </div>
</div>
</header>
    <div class="cards">
    <?php foreach ($info as $data): ?>
  <div class="card">
    <div class="delete"></div>
    <div class="card__top">
    <div class="card__image">
      <?php if ($data['photo'] == null){
              $photo = '../../../assets/images/expert2.jpg';
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
