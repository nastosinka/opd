<?php

  $db = new PDO("mysql:host=localhost;dbname=opd",
  "root", "");

  $info = [];

  if ($query = $db->query("Select * from profession where can_display=1")) {
    $info = $query->fetchAll(PDO::FETCH_ASSOC);} else {
        print_r($db->errorInfo());
    }
?>
<?php 
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../assets/css/lk_css/lk_adm_css/professions.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
    <title>Профессии</title>
</head>
<body>
<header class="header">
<div class="container"> 
    <div class="header__inner">
    <nav class="navigation_left">
    <a class="nav__link" href="change_descr.php?id=<?php echo $id; ?>">Изменить описание</a>
    <a class="nav__link" href="add_prof.php?id=<?php echo $id; ?>">Добавить профессию</a>
    </nav>    
    <nav class="navigation_right">
    <a class="nav__link" href="hiding_prof.php?id=<?php echo $id; ?>">Скрыть профессию</a>
    <a class="nav__link" href="uncover_prof.php?id=<?php echo $id; ?>">Открыть профессию</a>
    </nav>
    </div>
</div>
</header>
    <div class="cards">
    <?php foreach ($info as $data): ?>
  <div class="card">
    <div class="card__top">
    <div class="card__image">
      <img src="../../../assets/images/expert2.jpg"
        alt="Фото эксперта">/>
    </div>
    <div class="image__text">
        <h1> <i class='bx bx-star'></i>Описание</h1>
        <p><?php echo $data['description']; ?></p>
    </div>
  </div>
  <div class="card__bottom">
    <h1 class="card__title">
    <?php echo $data['name']; ?>
    </h1>
      <div class="pvk">
      ПВК: <br>. . . . . . . . . . . . . . . . . . . . . . . . . .<br>
      1)<?php echo $data['pvk1'];?><br> 2)<?php echo $data['pvk2']; ?><br> 3)<?php echo $data['pvk3']; ?><br>4)<?php echo $data['pvk4']; ?><br>5)<?php echo $data['pvk5']; ?></div>
  </div>
  </div>
  <?php endforeach; ?>
  </div>
  </div>
</body>
</html>