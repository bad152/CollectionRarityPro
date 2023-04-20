    <?php
session_start();
require_once 'connect.php';
$product_id = $_GET['id'];
$product_upd = mysqli_query($link, "SELECT * FROM `products` WHERE `id` = '$product_id'");
$product_upd = mysqli_fetch_assoc($product_upd);
$cat_id = $_GET['id_catt'];
$cat_upd = mysqli_query($link, "SELECT * FROM `category` WHERE `id_category` = '$cat_id'");
$cat_upd = mysqli_fetch_assoc($cat_upd);
?>

      <section class="main-content">
      <div class="modal-body">
    
       <h3 align="center">Изменение данных для товара <?php print_r($product_id) ?> (<?php echo $product_upd['name'] ?>)</h3>
        <br><br>
         <form action="update_admin_product.php?id=<?php echo $product_upd['id'] ?>" class="row g-3"  method="post" enctype="multipart/form-data">
             <input type="hidden" name="id" value="<?php echo ($product_id) ?>">
                      
                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="name_pro" class="form-control" id="name_pro" placeholder="Введите название товара" value="<?php echo $product_upd['name'] ?>" required>
                        <label class="required" for="name_pro">Название товара</label>  
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                         <select class="form-select" aria-label="Default select example" name="id_category">
                           
                          
                           


                            <?php
        $sql_cat = $link->query("select * from `category`");
        foreach ($sql_cat as $cat) :
        ?>
                <option value="<?php echo $cat['id_category']; ?>" ><?php echo $cat['name']; ?></option>
          <?php endforeach;?>

 <option selected value="<?php echo $product_upd['category'] ?>">Текущая категория - <?php echo $cat_upd['name'] ?></option>
         
                
                            </select>
                    </div>
                </div>

                <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="desc" class="form-control" id="desc" placeholder="Введите описание товара" value="<?php echo $product_upd['desc'] ?>" required>
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
                        <input type="text" name="price" class="form-control" id="price" placeholder="Введите описание товара" value="<?php echo $product_upd['price'] ?>" pattern="[0-9]{2,}" required>
                        <label class="required" for="price">Цена товара</label>
                    </div>
                </div>
                 <div class="col-md-6 offset-md-3">
                    <div class="form-floating mb-3">
                        <input type="text" name="discount" class="form-control" id="discount" placeholder="Введите описание товара" value="<?php echo $product_upd['discount'] ?>" required>
                        <label class="required" for="discount">Цена до скидки</label>
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
    </section>