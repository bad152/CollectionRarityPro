<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: ../../index.php?page=profile');
    }
?>
    
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="authorization/css/main.css">
</head>
    



<body>
<div class="login_body">
<div class="container py-3">
    <div class="row">

        <div class="col-lg-12 category-content">
            <h1 class="section-title">Регистрация</h1>


        <form action="authorization/handler_form/signup.php" class="row g-3"  method="post" enctype="multipart/form-data">
<div class="modal-body">
                      
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Введите имя" pattern="[A-Za-zА-Яа-яЁё]{2,}\s?[A-Za-zА-Яа-яЁё]{3,}\s?[A-Za-zА-Яа-яЁё]{4,}" required>
                        <div id="loginHelp" class="form-text">Введите ФИО </div>
                        <label class="required" for="full_name">ФИО</label>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="login" class="form-control" id="login" placeholder="Введите свой логин" pattern="[A-Za-z-0-9]{6,}" required>
                        <div id="loginHelp" class="form-text">Введите минимум 6 символов, нужно использовать латинские буквы и(или) цифры.</div>
                        <label class="required" for="login">Логин</label>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="email" placeholder="Введите адрес эл.почты" pattern="[A-Za-z-0-9]{3,}[@][A-Za-z]{3,}[.][A-Za-z]{2,}" required>
                        <label class="required" for="email">Почта</label>
                    </div>
                </div>

                 <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <p>
                        <label class="" for="avatar">Изображение профиля</label>
                        <input type="file" name="avatar" class="form-control" id="avatar" >
                        
                        </p>
                    </div>
                </div>


                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Введите пароль" pattern="[A-Za-z-0-9]{6,}" required>
                        <div id="loginHelp" class="form-text">Введите минимум 6 символов, нужно использовать латинские буквы и(или) цифры.</div>
                        <label class="required" for="password">Пароль</label>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="password" name="password_confirm" class="form-control" id="password_confirm" placeholder="Введите свой логин" pattern="[A-Za-z-0-9]{6,}" required>
                        <label class="required" for="password_confirm">Подтверждение пароля</label>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-success">Зарегистрироваться</button>
                </div>
                          
                <br>
                 <div class="col-md-6 offset-md-3"><mark>
            
            У вас уже есть аккаунт? - <a href="index.php?page=login">авторизируйтесь</a>!
        </mark></div>
        <br>
    </div>

        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?> 

                
                    </form>



        </div>
    </div>
</div>
</div>



</body>

</html>
