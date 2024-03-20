<!DOCTYPE html>
<html lang="ru">

<?php 
$id = $_GET['id'];
require_once("connection.php"); 
$result1 = $con -> query("SELECT * FROM user WHERE id='".$id."'");
$user = $result1->fetch_assoc();
?>
<head>
    <meta charset="UTF-8">
    <title>Создание нового пароля</title>
    <link rel="stylesheet" href="../assets/css/new_pass.css">
</head>
<body>
    <div class="container">
        <div class="wrapper">
        <form action="new_pass.php?id=<?php echo $id; ?>" id="newpassform" method="post" name="newpassform">
         <h1>Создание нового пароля</h1>
           <div class="input__box">
                <input type="password" id="pass1" name="pass1" placeholder="Новый пароль" required>
            </div>
            <div class="input__box">
                <input type="password" id="pass2" name="pass2" placeholder="Повторите пароль" required>
            </div>
            <button type="submit" id='add' name='add' class="btn">Сохранить пароль</button>

            <?php require_once("connection.php"); ?>
<?php
	
	if(isset($_POST["add"])){
	
	if(!empty($_POST['pass1']) && !empty($_POST['pass2'])) {
        $pas1=htmlspecialchars($_POST['pass1']);
        $pas2=htmlspecialchars($_POST['pass2']);
        if($pas1 == $pas2) {
            $sql="UPDATE user SET password = ".$pas1." WHERE id=".$id;
            $result=$con -> query($sql);
            if($result){
                $message = "Successfully";
            } else {
             $message = "Failed";
            }
            echo $message;
        } else {
            echo "Пароли не совпадают";
        }

    }
}

$con->close();
    ?>
        </form>
    </div>
    </div>
</body>
</html>