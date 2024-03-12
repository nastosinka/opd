<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление профессии</title>
    <link rel="stylesheet" href="../../assets/css/lk_css/add_prof.css">
</head>
<body>
<div class="container">
    <div class="main">
        <div class="main__left">
           <div class="text">
                <h2>Профессии, уже существующие:</h2>
                <div class="spis__prof"> <p>
                <! Тут должен быть список профессий>
                </p>
                </div>
            </div> 
        </div> 
        <div class="main__right">
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
    </div>
</div>
</body>
</html>
