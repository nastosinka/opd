<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Голосование за ПВК</title>
    <link rel="stylesheet" href="../../assets/css/lk_css/vote.css">
</head>
<?php 
$id = $_GET['id'];
$profession = $_GET['prof'];
require_once("../connection.php"); 
$result_ = $con -> query("SELECT * FROM user WHERE id='".$id."'");
$user = $result_->fetch_assoc();
$result_ = $con -> query("SELECT * FROM profession WHERE id='".$profession."'");
$prof = $result_->fetch_assoc();
?>

<?php

  $db = new PDO("mysql:host=localhost;dbname=opd",
  "root", "");

  $info = [];

  if ($query = $db->query("Select * from pvk")) {
    $info = $query->fetchAll(PDO::FETCH_ASSOC);} else {
        print_r($db->errorInfo());
    }

?>

<body>
<header class="header">
<div class="container"> 
    <div class="header__inner">
    <nav class="navigation_left">
        <a class="nav__link" href="lk_exp.php?id=<?php echo $id; ?>">ЛК</a>
    </nav>    
    <nav class="navigation_right">
    </nav>
    </div>
</div>
</header>
    <div class="container">
        <div class="wrapper">
        <form action=<?php  echo "'vote.php?id=".$id."&prof=".$profession."'"; ?> id="voteform" method="post" name="voteform">
         <h1><?php echo $prof['name']; ?></h1>
            <select class="input__box" name="1pvk" id="1pvk">
                <! "disabled" - нельзя выбрать, появляется сверху выпающего списка> 
                <! где написано БЭК, должны быть данные из БДшки>
                <option value="" disabled>Первое по значимости ПВК</option>
                <?php foreach ($info as $data): ?>
                    <option value=' <?php echo $data['id']; ?> '> <?php echo $data['name']; ?> </option>
            <?php endforeach; ?>
            </select>
            <select class="input__box" name="2pvk" id="2pvk">
                <option value="" disabled>Второе по значимости ПВК</option>
                <?php foreach ($info as $data): ?>
                    <option value=' <?php echo $data['id']; ?> '> <?php echo $data['name']; ?> </option>
            <?php endforeach; ?>
            </select>
            <select class="input__box" name="3pvk" id="3pvk">
                <option value="" disabled>Третье по значимости ПВК</option>
                <?php foreach ($info as $data): ?>
                    <option value=' <?php echo $data['id']; ?> '> <?php echo $data['name']; ?> </option>
            <?php endforeach; ?>
            </select>
            <select class="input__box" name="4pvk" id="4pvk">
                <option value="" disabled>Четвертое по значимости ПВК</option>
                <?php foreach ($info as $data): ?>
                    <option value=' <?php echo $data['id']; ?> '> <?php echo $data['name']; ?> </option>
            <?php endforeach; ?>
            </select>
            <select class="input__box" name="5pvk" id="5pvk">
                <option value="" disabled>Пятое по значимости ПВК</option>
                <?php foreach ($info as $data): ?>
                    <option value=' <?php echo $data['id']; ?> '> <?php echo $data['name']; ?> </option>
            <?php endforeach; ?>
            </select>
            <button type="submit" id="vote" name="vote" class="btn">Проголосовать</button>    
        </form>
    </div>
        </div>
</body>
</html>
<?php
	
	if(isset($_POST["vote"])){
	
	if(!empty($_POST['1pvk']) && !empty($_POST['2pvk']) && !empty($_POST['3pvk']) && !empty($_POST['4pvk']) && !empty($_POST['5pvk'])) {
 $pvk1=htmlspecialchars($_POST['1pvk']);
 $pvk2=htmlspecialchars($_POST['2pvk']);
 $pvk3=htmlspecialchars($_POST['3pvk']);
 $pvk4=htmlspecialchars($_POST['4pvk']);
 $pvk5=htmlspecialchars($_POST['5pvk']);
 if ($pvk1 == $pvk2 || $pvk3 == $pvk1 || $pvk1 == $pvk4 || $pvk1 == $pvk5 || $pvk2 == $pvk3 || $pvk2 == $pvk4 || $pvk2 == $pvk5 || $pvk3 == $pvk4 || $pvk3 == $pvk5 || $pvk5 == $pvk4){
    echo "ПВК не должны повторяться";
 } else {
    $flag = 0;
    $result = $con -> query("SELECT * FROM action WHERE id_user='".$id."' and id_profession='".$profession."'");
    if ($result != false){
    while ($row = $result->fetch_assoc()){
        $pvk = $row["id_pvk"];
        $result0 = $con -> query("SELECT * FROM point WHERE id_profession='".$profession."' and id_pvk='".$pvk."'");
        $row0 = $result0->fetch_assoc();
        $point = $row0['point'] - $row['point'];
        $con -> query("UPDATE point SET point=".$point." WHERE id_profession='".$profession."' and id_pvk='".$pvk."'");
    }
    $result = $con -> query("DELETE FROM action WHERE id_user='".$id."' and id_profession='".$profession."'");}



    $sql="INSERT INTO action
  (id_user, id_profession, id_pvk, point)
	VALUES('$id','$profession', '$pvk1', 5)";
    $result=$con -> query($sql);
    $result = $con -> query("SELECT * FROM point WHERE id_profession='".$profession."' and id_pvk='".$pvk1."'");
    $row = $result->fetch_assoc();
    if ($row != false){
        $point = $row['point'] + 5;
        if ($point > 10){
            $flag = 1;
        }
        $con -> query("UPDATE point SET point=".$point." WHERE id_profession='".$profession."' and id_pvk='".$pvk1."'");
    } else {
        $sql="INSERT INTO point (id_profession, id_pvk, point) VALUES('$profession','$pvk1', 5)";
        $con -> query($sql);
    }



    $sql="INSERT INTO action
  (id_user, id_profession, id_pvk, point)
	VALUES('$id','$profession', '$pvk2', 4)";
    $result=$con -> query($sql);
    $result = $con -> query("SELECT * FROM point WHERE id_profession='".$profession."' and id_pvk='".$pvk2."'");
    $row = $result->fetch_assoc();
    if ($row != false){
        $point = $row['point'] + 4;
        if ($point > 10){
            $flag = 1;
        }
        $con -> query("UPDATE point SET point=".$point." WHERE id_profession='".$profession."' and id_pvk='".$pvk2."'");
    } else {
        $sql="INSERT INTO point (id_profession, id_pvk, point) VALUES('$profession','$pvk2', 4)";
        $con -> query($sql);
    }



    $sql="INSERT INTO action
  (id_user, id_profession, id_pvk, point)
	VALUES('$id','$profession', '$pvk3', 3)";
    $result=$con -> query($sql);
    $result = $con -> query("SELECT * FROM point WHERE id_profession='".$profession."' and id_pvk='".$pvk3."'");
    $row = $result->fetch_assoc();
    if ($row != false){
        $point = $row['point'] + 3;
        if ($point > 10){
            $flag = 1;
        }
        $con -> query("UPDATE point SET point=".$point." WHERE id_profession='".$profession."' and id_pvk='".$pvk3."'");
    } else {
        $sql="INSERT INTO point (id_profession, id_pvk, point) VALUES('$profession','$pvk3', 3)";
        $con -> query($sql);
    }



    $sql="INSERT INTO action
  (id_user, id_profession, id_pvk, point)
	VALUES('$id','$profession', '$pvk4', 2)";
    $result=$con -> query($sql);
    $result = $con -> query("SELECT * FROM point WHERE id_profession='".$profession."' and id_pvk='".$pvk4."'");
    $row = $result->fetch_assoc();
    if ($row != false){
        $point = $row['point'] + 2;
        if ($point > 10){
            $flag = 1;
        }
        $con -> query("UPDATE point SET point=".$point." WHERE id_profession='".$profession."' and id_pvk='".$pvk4."'");
    } else {
        $sql="INSERT INTO point (id_profession, id_pvk, point) VALUES('$profession','$pvk4', 2)";
        $con -> query($sql);
    }



    $sql="INSERT INTO action
  (id_user, id_profession, id_pvk, point)
	VALUES('$id','$profession', '$pvk5', 1)";
  $result=$con -> query($sql);
  $result = $con -> query("SELECT * FROM point WHERE id_profession='".$profession."' and id_pvk='".$pvk5."'");
    $row = $result->fetch_assoc();
    if ($row != false){
        $point = $row['point'] + 1;
        if ($point > 10){
            $flag = 1;
        }
        $con -> query("UPDATE point SET point=".$point." WHERE id_profession='".$profession."' and id_pvk='".$pvk5."'");
    } else {
        $sql="INSERT INTO point (id_profession, id_pvk, point) VALUES('$profession','$pvk5', 1)";
        $con -> query($sql);
    }

    $result = $con -> query("SELECT * FROM point WHERE id_profession='".$profession."' ORDER BY point DESC LIMIT 5");
    $row = $result->fetch_assoc();
    $resul = $con -> query("SELECT * FROM pvk WHERE id='".$row['id_pvk']."'")->fetch_assoc()['name'];
    $con -> query("UPDATE profession SET pvk1='".$resul."' WHERE id='".$profession."'");

    $row = $result->fetch_assoc();
    $resul = $con -> query("SELECT * FROM pvk WHERE id='".$row['id_pvk']."'")->fetch_assoc()['name'];
    $con -> query("UPDATE profession SET pvk2='".$resul."' WHERE id='".$profession."'");

    $row = $result->fetch_assoc();
    $resul = $con -> query("SELECT * FROM pvk WHERE id='".$row['id_pvk']."'")->fetch_assoc()['name'];
    $con -> query("UPDATE profession SET pvk3='".$resul."' WHERE id='".$profession."'");

    $row = $result->fetch_assoc();
    $resul = $con -> query("SELECT * FROM pvk WHERE id='".$row['id_pvk']."'")->fetch_assoc()['name'];
    $con -> query("UPDATE profession SET pvk4='".$resul."' WHERE id='".$profession."'");

    $row = $result->fetch_assoc();
    $resul = $con -> query("SELECT * FROM pvk WHERE id='".$row['id_pvk']."'")->fetch_assoc()['name'];
    $con -> query("UPDATE profession SET pvk5='".$resul."' WHERE id='".$profession."'");

    $con -> query("UPDATE profession SET can_display='".$flag."' WHERE id='".$profession."'");
    


 }
}}
?>
