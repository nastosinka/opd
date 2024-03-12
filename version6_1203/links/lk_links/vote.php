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
<body>
    
    <div class="container">
        <div class="wrapper">
        <form action=<?php  echo "'vote.php?id=".$id."&prof=".$profession."'"; ?> id="voteform" method="post" name="voteform">
         <h1><?php echo $prof['name']; ?></h1>
            <select class="input__box" name="" id="">
                <! "disabled" - нельзя выбрать, появляется сверху выпающего списка> 
                <! где написано БЭК, должны быть данные из БДшки>
                <option value="" disabled>Первое по значимости ПВК</option>
                <option value="">БЭК1</option>
                <option value="">БЭК2</option>
                <option value="">БЭК3</option>
            </select>
            <select class="input__box" name="" id="">
                <option value="" disabled>Второе по значимости ПВК</option>
                <option value="">БЭК1</option>
                <option value="">БЭК2</option>
                <option value="">БЭК3</option>
            </select>
            <select class="input__box" name="" id="">
                <option value="" disabled>Третье по значимости ПВК</option>
                <option value="">БЭК1</option>
                <option value="">БЭК2</option>
                <option value="">БЭК3</option>
            </select>
            <select class="input__box" name="" id="">
                <option value="" disabled>Четвертое по значимости ПВК</option>
                <option value="">БЭК1</option>
                <option value="">БЭК2</option>
                <option value="">БЭК3</option>
            </select>
            <select class="input__box" name="" id="">
                <option value="" disabled>Пятое по значимости ПВК</option>
                <option value="">БЭК1</option>
                <option value="">БЭК2</option>
                <option value="">БЭК3</option>
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
 $flag = 0;
 $result1 = $con -> query("SELECT * FROM pvk WHERE name='".$pvk1."'");
 $row1 = $result1->fetch_assoc();
 $result2 = $con -> query("SELECT * FROM pvk WHERE name='".$pvk2."'");
 $row2 = $result2->fetch_assoc();
 $result3 = $con -> query("SELECT * FROM pvk WHERE name='".$pvk3."'");
 $row3 = $result3->fetch_assoc();
 $result4 = $con -> query("SELECT * FROM pvk WHERE name='".$pvk4."'");
 $row4 = $result4->fetch_assoc();
 $result5 = $con -> query("SELECT * FROM pvk WHERE name='".$pvk5."'");
 $row5 = $result5->fetch_assoc();
 if ($row1 != false && $row2 != false && $row3 != false && $row4 != false && $row5 != false){
    $result = $con -> query("SELECT * FROM action WHERE id_user='".$id."' and id_profession='".$profession."'");
    if ($result != false){
    while ($row = $result->fetch_assoc()){
        $pvk = $row["id_pvk"];
        $result0 = $con -> query("SELECT * FROM point WHERE id_profession='".$profession."' and id_pvk='".$pvk."'");
        $row0 = $result0->fetch_assoc();
        $point = $row0['point'] - 1;
        $con -> query("UPDATE point SET point=".$point." WHERE id_profession='".$profession."' and id_pvk='".$pvk."'");
    }
    $result = $con -> query("DELETE FROM action WHERE id_user='".$id."' and id_profession='".$profession."'");}



    $id1 = $row1['id'];
    $sql="INSERT INTO action
  (id_user, id_profession, id_pvk, point)
	VALUES('$id','$profession', '$id1', 1)";
    $result=$con -> query($sql);
    $result = $con -> query("SELECT * FROM point WHERE id_profession='".$profession."' and id_pvk='".$id1."'");
    $row = $result->fetch_assoc();
    if ($row != false){
        $point = $row['point'] + 1;
        if ($point > 5){
            $flag = 1;
        }
        $con -> query("UPDATE point SET point=".$point." WHERE id_profession='".$profession."' and id_pvk='".$id1."'");
    } else {
        $sql="INSERT INTO point (id_profession, id_pvk, point) VALUES('$profession','$id1', 1)";
        $con -> query($sql);
    }



    $id2 = $row2['id'];
    $sql="INSERT INTO action
  (id_user, id_profession, id_pvk, point)
	VALUES('$id','$profession', '$id2', 1)";
    $result=$con -> query($sql);
    $result = $con -> query("SELECT * FROM point WHERE id_profession='".$profession."' and id_pvk='".$id2."'");
    $row = $result->fetch_assoc();
    if ($row != false){
        $point = $row['point'] + 1;
        if ($point > 5){
            $flag = 1;
        }
        $con -> query("UPDATE point SET point=".$point." WHERE id_profession='".$profession."' and id_pvk='".$id2."'");
    } else {
        $sql="INSERT INTO point (id_profession, id_pvk, point) VALUES('$profession','$id2', 1)";
        $con -> query($sql);
    }



    $id3 = $row3['id'];
    $sql="INSERT INTO action
  (id_user, id_profession, id_pvk, point)
	VALUES('$id','$profession', '$id3', 1)";
    $result=$con -> query($sql);
    $result = $con -> query("SELECT * FROM point WHERE id_profession='".$profession."' and id_pvk='".$id3."'");
    $row = $result->fetch_assoc();
    if ($row != false){
        $point = $row['point'] + 1;
        if ($point > 5){
            $flag = 1;
        }
        $con -> query("UPDATE point SET point=".$point." WHERE id_profession='".$profession."' and id_pvk='".$id3."'");
    } else {
        $sql="INSERT INTO point (id_profession, id_pvk, point) VALUES('$profession','$id3', 1)";
        $con -> query($sql);
    }



    $id4 = $row4['id'];
    $sql="INSERT INTO action
  (id_user, id_profession, id_pvk, point)
	VALUES('$id','$profession', '$id4', 1)";
    $result=$con -> query($sql);
    $result = $con -> query("SELECT * FROM point WHERE id_profession='".$profession."' and id_pvk='".$id4."'");
    $row = $result->fetch_assoc();
    if ($row != false){
        $point = $row['point'] + 1;
        if ($point > 5){
            $flag = 1;
        }
        $con -> query("UPDATE point SET point=".$point." WHERE id_profession='".$profession."' and id_pvk='".$id4."'");
    } else {
        $sql="INSERT INTO point (id_profession, id_pvk, point) VALUES('$profession','$id4', 1)";
        $con -> query($sql);
    }



    $id5 = $row5['id'];
    $sql="INSERT INTO action
  (id_user, id_profession, id_pvk, point)
	VALUES('$id','$profession', '$id5', 1)";
  $result=$con -> query($sql);
  $result = $con -> query("SELECT * FROM point WHERE id_profession='".$profession."' and id_pvk='".$id5."'");
    $row = $result->fetch_assoc();
    if ($row != false){
        $point = $row['point'] + 1;
        if ($point > 5){
            $flag = 1;
        }
        $con -> query("UPDATE point SET point=".$point." WHERE id_profession='".$profession."' and id_pvk='".$id5."'");
    } else {
        $sql="INSERT INTO point (id_profession, id_pvk, point) VALUES('$profession','$id5', 1)";
        $con -> query($sql);
    }

    $result = $con -> query("SELECT * FROM point WHERE id_profession='".$profession."' ORDER BY point DESC LIMIT 5");
    $row = $result->fetch_assoc();
    $con -> query("UPDATE profession SET pvk1='".$row1['name']."' WHERE id='".$profession."'");
    $row = $result->fetch_assoc();
    $con -> query("UPDATE profession SET pvk2='".$row2['name']."' WHERE id='".$profession."'");
    $row = $result->fetch_assoc();
    $con -> query("UPDATE profession SET pvk3='".$row3['name']."' WHERE id='".$profession."'");
    $row = $result->fetch_assoc();
    $con -> query("UPDATE profession SET pvk4='".$row4['name']."' WHERE id='".$profession."'");
    $row = $result->fetch_assoc();
    $con -> query("UPDATE profession SET pvk5='".$row5['name']."' WHERE id='".$profession."'");
    $con -> query("UPDATE profession SET can_display='".$flag."' WHERE id='".$profession."'");
    


 } else{
    $message = "Неверно записаны пвк";
    echo $message;  // ошибка (сделать норм вывод?)
}
}}
?>
