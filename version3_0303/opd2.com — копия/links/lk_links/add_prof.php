<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление профессии</title>
    <link rel="stylesheet" href="../../assets/css/lk_css/add_prof.css">
</head>
<body>
    
    <div class="container">
        <div class="wrapper">
        <form action="add_prof.php" id="addform" method="post" name="addform">
         <h1>Добавление профессии</h1>
           <div class="input__box">
                <input type="text" id='name' name='name' placeholder="Название профессии" required>
            </div>
            <div class="input__box">
                <input type="text" id='description' name='description' placeholder="Описание" required>
            </div>
            <div class="input__box">
                <input type="text" id='photo' name='photo' placeholder="Фотография" required>
            </div>
            <button type="submit" id='add' name='add' class="btn">Добавить профессию</button>    
        </form>
    </div>
        </div>
</body>
</html>
<?php require_once("..\connection.php"); ?>
<?php
    if(isset($_POST["add"])){
	    if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['photo'])) {
            echo '32';
            $name=htmlspecialchars($_POST['name']);
            $description=htmlspecialchars($_POST['description']);
            $photo=htmlspecialchars($_POST['photo']);
            $result = $con -> query("INSERT INTO profession (`name`, `description`, `photo`) VALUES ('".$name."','".$description."','".$description."')");

        } else{
            echo 'Введены не все данные'; // ошибка (сделать норм вывод?)
        }
    }
?>