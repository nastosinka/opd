<?php

  $db = new PDO("mysql:host=localhost;dbname=opd",
  "root", "");

  $info = [];

  if ($query = $db->query("Select * from pvk")) {
    $info = $query->fetchAll(PDO::FETCH_ASSOC);} else {
        print_r($db->errorInfo());
    }

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Голосование за ПВК</title>
    <link rel="stylesheet" href="../../assets/css/lk_css/intermediate_page.css">
</head>
<body>
    <! там, где ### добавьте, пожалуйста, название профессии, за которую идёт голосование> 
    <h1>Выберите 5 ПВК, которые считаете наиболее важными для ###</h1>
    <div class="container">
        <?php foreach ($info as $data): ?>
        <label class="checkbox" for="<?php echo $data['id']; ?>">
            <input class="checkbox__inp" type="checkbox" id="<?php echo $data['id']; ?>">
            <span class="checkbox__inner">
            <?php echo $data['name']; ?> 
            </span>
        </label> <br>
        <?php endforeach; ?>
    </div>
    <div class="vote">
        <button type="submit" id="vote" name="vote" class="btn">Проголосовать</button> 
    </div>
</body>
</html>