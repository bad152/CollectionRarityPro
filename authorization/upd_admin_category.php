<?php
session_start();
require_once 'connect.php';
$category_id = $_GET['id'];
$category_upd = mysqli_query($link, "SELECT * FROM `category` WHERE `id_category` = '$category_id'");
$category_upd = mysqli_fetch_assoc($category_upd);
?>

<section class="main-content">
      <div class="modal-body">
    
        <h3 align="center">Изменение данных для категории <?php print_r($category_id) ?></h3>
        <br><br>
         <form action="update_admin_category.php?id=<?php echo $category_upd['id_category']?>" class="row g-3"  method="post" enctype="multipart/form-data">
             <input type="hidden" name="id" value="<?php echo ($category_id) ?>">

                      
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Введите название категории" value="<?php echo $category_upd['name'] ?>" pattern="[A-Za-zА-Яа-яЁё]{3,}\s?[0-9]?\s?[A-Za-zА-Яа-яЁё]?{3,}?" required>
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

                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-success">Изменить</button>
                </div>
                  
                <div class="col-md-6 offset-md-3">
              <a href="index.php?page=admin">Назад</a>
            </a>
                    </form>
                    
</div>


      </div>
    </section>