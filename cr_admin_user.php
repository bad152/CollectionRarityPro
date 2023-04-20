<?php
session_start();
require_once 'connect.php';
?>

<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Создание нового пользователя</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

         <form action="create_user_admin.php" class="row g-3"  method="post" enctype="multipart/form-data">

                      
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="full_name" class="form-control" id="full_name" pattern="[A-Za-zА-Яа-яЁё]{2,}\s?[A-Za-zА-Яа-яЁё]{3,}\s?[A-Za-zА-Яа-яЁё]{4,}" required>
                        <div id="loginHelp" class="form-text">Введите ФИО </div>
                        <label class="required" for="full_name">Имя</label>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="login" class="form-control" id="login" pattern="[A-Za-z-0-9]{6,}" required>
                        <div id="loginHelp" class="form-text">Введите минимум 6 символов, нужно использовать латинские буквы и(или) цифры.</div>
                        <label class="required" for="login">Логин</label>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="email" pattern="[A-Za-z-0-9]{3,}[@][A-Za-z]{3,}[.][A-Za-z]{2,}" required>
                        <label class="required" for="email">Почта</label>
                    </div>
                </div>

                 <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <p>
                        <label class="required" for="avatar">Изображение профиля</label>
                        <input type="file" name="avatar" class="form-control" id="avatar" >
                        
                        </p>
                    </div>
                </div>


                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="password"  pattern="[A-Za-z-0-9]{6,}" required>
                        <div id="passHelp" class="form-text">Введите минимум 6 символов, нужно использовать латинские буквы и(или) цифры.</div>
                        <label class="required" for="password">Пароль</label>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="password" name="password_confirm" class="form-control" id="password_confirm" pattern="[A-Za-z-0-9]{6,}" required >
                        <label class="required" for="password_confirm">Подтверждение пароля</label>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="role" name="role" class="form-control" id="role"  pattern="[1-2]{1}" required>
                        <div id="rolHelp" class="form-text">Выберите роль для пользователя, где 1 - обычный пользователь, 2 - админ</div>
                        <label class="required" for="role">Роль</label>
                    </div>
                </div>
                

                    


      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Создать</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Создание новой категории товара</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

         <form action="create_cat_admin.php" class="row g-3"  method="post" enctype="multipart/form-data">

                      
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Введите название категории" pattern="[A-Za-zА-Яа-яЁё]{3,}\s?[0-9]?\s?[A-Za-zА-Яа-яЁё]?{3,}?" required>
                        <label class="required" for="name">Название категории</label>
                    </div>
                </div>

                
                 <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <p>
                        <label class="required" for="img">Изображение категории</label>
                        <input type="file" name="img" class="form-control" id="img" >
                        
                        </p>
                    </div>
                </div>
   

                
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Создать</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="createProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Создание нового товара</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="create_pro_admin.php" class="row g-3"  method="post" enctype="multipart/form-data">

                      
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="name_pro" class="form-control" id="name_pro" placeholder="Введите название товара"  required >
                        <label class="required" for="name_pro">Название товара</label>  
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                         <select class="form-select" aria-label="Default select example" name="id_category">
                            <option selected>Выберите категорию товара</option>
                            <?php
        $sql_cat = $link->query("select * from `category`");
        foreach ($sql_cat as $cat) :
        ?>
                <option value="<?php echo $cat['id_category']; ?>"><?php echo $cat['name']; ?></option>
          <?php endforeach;?>
 
                            </select>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="desc" class="form-control" id="desc" placeholder="Введите описание товара" required>
                        <label class="required" for="desc">Описание товара</label>
                    </div>
                </div>

                 <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <p>
                        <label class="required" for="imgs">Изображение товара</label>
                        <input type="file" name="imgs" class="form-control" id="imgs" >
                        
                        </p>
                    </div>
                </div>
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="price" class="form-control" id="price" placeholder="Введите описание товара" pattern="[0-9]{2,}" required >
                        <label class="required" for="price">Цена товара</label>
                    </div>
                </div>


      </div>
      

      <div class="modal-footer">

        <button type="submit" class="btn btn-success">Создать</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
      </div>
      </form>
    </div>
  </div>
</div>



    <div class="modal fade" id="createSupportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Создание обращения в поддрежку</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="create_support.php" class="row g-3"  method="post">

            <input type="hidden" name="id" value="<?php echo ($id) ?>">

            <input type="hidden" name="full_name" value="<?= $_SESSION['user']['full_name'] ?>">
            
           



                      
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">


                            <select class="form-select" aria-label="Default select example" name="id_topic" >
                            <option selected >Выберите тему обращения</option>
                            <?php
        $sql_top = $link->query("select * from `supporttopics`");
       

        foreach ($sql_top as $top) :
        ?>
                <option value="<?php echo $top['id_topic']; ?>" ><?php echo $top['desc_topic']; ?></option>

          <?php endforeach;?>

          
                            </select>

                    </div> 
                    </div> 


                     
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                  <textarea name="desc" class="form-control" id="desc" rows="3" required></textarea>
                   <label class="required" for="desc">Опишите вашу проблему</label>
                </div>
            </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Создать обращение</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
      </div>
       </form>
    </div>
  </div>
</div>



<script src="js/bootstrap.js"></script>

