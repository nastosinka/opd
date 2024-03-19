<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление профессии</title>
    <link rel="stylesheet" href="../../../assets/css/lk_css/lk_adm_css/add_prof.css">
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
                <h2>Профессии в архиве:</h2>
                <div class="spis__prof"> <p>
                <?php 
                    $result = $con -> query("SELECT * FROM profession WHERE can_display=2");
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
            <form action="add_prof.php?id=<?php echo $id; ?>" id="addform" method="post" name="addform">
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
        $sql="INSERT INTO profession (name, description, photo) VALUES ('$name', '$description', '$photo')";
  $result=$con -> query($sql);
 if($result){
	$message = "Профессия добавлен/обновлён";
} else {
 $message = "Произошла ошибка";
  }
  echo $message;
}}