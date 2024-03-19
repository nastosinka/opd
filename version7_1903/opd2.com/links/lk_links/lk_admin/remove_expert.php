<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Удаление эксперта</title>
    <link rel="stylesheet" href="../../../assets/css/lk_css/lk_adm_css/remove_expert.css">
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
                <form action="remove_expert.php?id=<?php echo $id; ?>" id="addform" method="post" name="addform">
                    <h1>Удаление эксперта</h1>
                    <div class="input__box">
                         <input type="text" id="name" name="name" placeholder="Логин" required>
                     </div>
                     <button type="submit" id='remove' name='remove' class="btn">Удалить эксперта</button>        
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
	if(isset($_POST['remove'])){
	if(!empty($_POST['name'])) {
        $name= htmlspecialchars($_POST['name']);
        $result = $con -> query("SELECT * FROM user WHERE flag='e'");
        if ($result){
        $sql="UPDATE user SET flag='u', achievements='Достижений нет' WHERE login='".$name."'";
  $result=$con -> query($sql);
 if($result){
	$message = "Эксперт удалён";
} else {
 $message = "Произошла ошибка";
  }
  echo $message;}
} else {
    echo "Такого пользователя нет";
}
}
?>