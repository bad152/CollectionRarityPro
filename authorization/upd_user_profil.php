<!-- Файл для изменения данных в профиле -->
<?php
session_start();
require_once 'connect.php';
$user_id = $_GET['id'];
$user_upd = mysqli_query($link, "SELECT * FROM `users` WHERE `id` = '$user_id'");
$user_upd = mysqli_fetch_assoc($user_upd);
?>
  <section class="main-content">
      <div class="modal-body">
       
<h3 align="center">Изменение данных профиля</h3>
<br><br>
        <form action="update_user_profil.php?id=<?php echo $user_upd['id'] ?>" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="id" value="<?php echo ($user_id) ?>">
          <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="full_name" class="form-control" id="full_name"   value="<?php echo $user_upd['full_name'] ?>" pattern="[A-Za-zА-Яа-яЁё]{2,}\s?[A-Za-zА-Яа-яЁё]{3,}\s?[A-Za-zА-Яа-яЁё]{4,}" required>
                        <div id="loginHelp" class="form-text">Введите ФИО </div>
                        <label class="required" for="full_name">ФИО</label>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="login" class="form-control" id="login"   value="<?php echo $user_upd['login'] ?>" pattern="[A-Za-z-0-9]{6,}" required>
                        <div id="loginHelp" class="form-text">Введите минимум 6 символов, нужно использовать латинские буквы и(или) цифры.</div>
                        <label class="required" for="login">Логин</label>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="email"  value="<?php echo $user_upd['email'] ?>"  pattern="[A-Za-z-0-9]{3,}[@][A-Za-z]{3,}[.][A-Za-z]{2,}" required>
                        <label class="required" for="email">Почта</label>
                    </div>
                </div>

                 <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <p>
                        <label class="required" for="avatar">Изображение профиля</label>
                        <input type="file" name="avatar" class="form-control" id="avatar" value="<?php echo $user_upd['avatar'] ?>">

                        
                        </p>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-success">Изменить</button>
                </div>
                <br>
                <div class="col-md-6 offset-md-3">
              <a href="index.php?page=login">Назад</a>
            </a>

     </form>
      </div>
</section>