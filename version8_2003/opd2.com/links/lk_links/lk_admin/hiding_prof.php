<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Архивирование профессии</title>
    <link rel="stylesheet" href="../../../assets/css/lk_css/lk_adm_css/hiding_prof.css">
</head>
<?php 
$id = $_GET['id'];
require_once("../../connection.php"); 
?>
<body>
<header class="header">
<div class="container1"> 
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
    <div class="main">
        <div class="main__left">
           <div class="text">
                <h2>Профессии, уже существующие:</h2>
                <div class="spis__prof"> <p>
                <?php 
                    $result = $con -> query("SELECT * FROM profession WHERE can_display<>2");
                    if ($result != false){
                        while ($row = $result->fetch_assoc()){
                            echo $row['name']."</br>";
                        }
                    }?>
                </p>
                </div>
            </div> 
        </div> 
        <div class="main__right">
            <div class="wrapper">
                <form action="hiding_prof.php?id=<?php echo $id; ?>" id="form" method="post" name="form">
                 <h1>Скрытие профессии</h1>
                   <div class="input__box">
                        <input type="text" id="name" name="name" placeholder="Название профессии" required>
                    </div>
                    <button type="submit" id='hid' name='hid' class="btn">Скрыть профессию</button> 
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php
	
	if(isset($_POST["hid"])){
	
	if(!empty($_POST['name'])) {
        $name= htmlspecialchars($_POST['name']);
        $sql="UPDATE profession SET can_display='2' WHERE name='".$name."'";
  $result=$con -> query($sql);
 if($result){
	$message = "Профессия обновлена";
} else {
 $message = "Произошла ошибка";
  }
  echo $message;
}}