<!DOCTYPE html>
<html lang="ru">

<?php

  $db = new PDO("mysql:host=localhost;dbname=opd",
  "root", "");

  $info = [];

  if ($query = $db->query("Select * from profession where can_display<>2")) {
    $info = $query->fetchAll(PDO::FETCH_ASSOC);} else {
        print_r($db->errorInfo());
    }

?>

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
            <form action="lk_exp.php?id=<?php echo $id; ?>" id="profform" method="post" name="profform">
            <div class="spis__prof"> <p>
            <?php foreach ($info as $data): ?>
                <label class="checkbox" for="<?php echo $data['id']; ?>">
                    <input class="checkbox__inp" type="radio" name="proff" value="<?php echo $data['id']; ?>">
                    <span class="checkbox__inner"> <?php echo $data['name']; ?> </span>
                </label> <br>
            <?php endforeach; ?>
            </p>
            </div>
            </div> 
            <button type="submit" id='golos' name='golos' class='btn' >Голосование за ПВК  </button>
            </div>
            </form>
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
<?php
	
	if(isset($_POST["golos"])){
	
	if(!empty($_POST['proff'])) {
        $prof=htmlspecialchars($_POST['proff']);
        header('Location: http://localhost/opd2.com/links/lk_links/vote.php?id='.$id.'&prof='.$prof);
    }
    else{
        echo "Профессия не введена";
    }
}
?>