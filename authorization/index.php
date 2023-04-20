<?php
session_start();
if ($_SESSION['user']) {
    header('Location: index.php?page=vhod');
}

?>
 <input type="hidden" name="id_usus" value="<?php echo $user['id']; ?>">

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="authorization/css/main.css">
</head>



<body>
<div class="login_body">
<div class="container py-3">
    <div class="row">

        <div class="col-lg-12 category-content">
            <h1 class="section-title">Авторизация</h1>
            
         

        <form action="authorization/handler_form/signin.php" class="row g-3"  method="post">

                      

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="login" class="form-control" id="login" placeholder="Введите логин" pattern="[A-Za-z-0-9]{6,}" required>
                        <div id="loginHelp" class="form-text">Введите минимум 6 символов, нужно использовать латинские буквы и(или) цифры.</div>
                        <label class="required" for="login" request>Логин</label>

                    </div>
                </div>

                

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Введите пароль" pattern="[A-Za-z-0-9]{6,}" required>
                        <label class="required" for="password">Пароль</label>
                    </div>
                </div>

                

                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-success"><a href=""></a>Войти</button>
                </div>
                          
                <p>
                <div class="col-md-6 offset-md-3">
           <mark>У вас нет аккаунта? - <a href="index.php?page=register">зарегистрируйтесь</a>!</mark> 
        </div></p>

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













