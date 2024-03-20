<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Изменение описания</title>
    <link rel="stylesheet" href="../../../assets/css/lk_css/lk_adm_css/change_description.css">
</head>
<?php 
$id = $_GET['id'];
require_once("../../connection.php"); 
?>
<body>
<header class="header">
<div class="container"> 
    <div class="header__inner">
    <nav class="navigation_left">
        <a class="nav__link" href="../lk_adm.php?id=<?php echo $id; ?>">Личный кабинет</a>
    </nav>    
    <nav class="navigation_right">
    </nav>
    </div>
</div>
</header>
    <div class="container">
        <div class="wrapper">
        <form action="change_descr.php?id=<?php echo $id; ?>" id="form" method="post" name="form">
         <h1>Изменение описания профессии</h1>
           <div class="input__box">
                <input type="text" id="name" name="name" placeholder="Название профессии" required>
            </div>
            <div class="input__box">
                <input type="text" id="description" name="description" placeholder="Описание" required>
            </div>
            <button type="submit" id='change' name='change' class="btn">Изменить описание профессии</button>
        </form>
    </div>
    </div>
</body>
</html>

<?php
	
	if(isset($_POST["change"])){
	
	if(!empty($_POST['name']) && !empty($_POST['description'])) {
        $name= htmlspecialchars($_POST['name']);
        $description= htmlspecialchars($_POST['description']);
        $sql="UPDATE profession SET description='".$description."' WHERE name='".$name."'";
  $result=$con -> query($sql);
 if($result){
	$message = "Профессия обновлена";
} else {
 $message = "Произошла ошибка";
  }
  echo $message;
}}