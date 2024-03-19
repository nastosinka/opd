<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление эксперта</title>
    <link rel="stylesheet" href="../../../assets/css/lk_css/lk_adm_css/add_expert.css">
</head>

<?php 
$id = $_GET['id'];
require_once("../../connection.php"); 
?>
<body>
    <div class="container">
        <div class="main">
            <div class="main__left">
               <div class="text">
                    <h2>Эксперты, уже добавленные:</h2>
                    <div class="spis__prof"> <p>
                    <?php 
                    $result = $con -> query("SELECT * FROM user WHERE flag='e'");
                    if ($result != false){
                        while ($row = $result->fetch_assoc()){
                            echo $row['name'].' '.$row['login']."</br>";
                        }
                    }?>
                    </p>
                    </div>
                </div> 
            </div> 
            <div class="main__right">
                <div class="wrapper">
                <form action="add_expert.php?id=<?php echo $id; ?>" id="addform" method="post" name="addform">
                <h1>Добавление эксперта</h1>
                    <div class="input__box">
                        <input type="text" id='name' name='name' placeholder="Логин" required>
                    </div>
                    <div class="input__box">
                        <input type="text" id='description' name='description' placeholder="Достижения" required>
                    </div>
                    <div class="input__box">
                        <input type="text" id='photo' name='photo' placeholder="Фотография" required>
                    </div>
                    <button type="submit" id='add' name='add' class="btn">Добавить эксперта</button>    
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
	
	if(isset($_POST["add"])){
	
	if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['photo'])) {
        $name= htmlspecialchars($_POST['name']);
        $description= htmlspecialchars($_POST['description']);
        $photo= htmlspecialchars($_POST['photo']);
        $sql="UPDATE user SET flag='e', achievements='".$description."', photo='".$photo."' WHERE login='".$name."'";
  $result=$con -> query($sql);
 if($result){
	$message = "Эксперт добавлен/обновлён";
} else {
 $message = "Произошла ошибка";
  }
  echo $message;
}} ?>