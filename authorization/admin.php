<?php
session_start();
// if (!$_SESSION['user']) {
//     header('Location: /');
// }
require_once 'connect.php';

$id = $_SESSION['user']['id'];

$id_user = $_SESSION['user']['id'];
$user_upd = mysqli_query($link, "SELECT * FROM `users` WHERE `id` = '$id_user'");
$user_upd = mysqli_fetch_assoc($user_upd);


                  

?>
  <section class="main-content">


    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Профиль</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-users-tab" data-bs-toggle="pill" data-bs-target="#pills-users" type="button" role="tab" aria-controls="pills-users" aria-selected="false">Пользователи</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-cat-tab" data-bs-toggle="pill" data-bs-target="#pills-cat" type="button" role="tab" aria-controls="pills-cat" aria-selected="false">Категории товаров</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-prod-tab" data-bs-toggle="pill" data-bs-target="#pills-prod" type="button" role="tab" aria-controls="pills-prod" aria-selected="false">Товары</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-sup-tab" data-bs-toggle="pill" data-bs-target="#pills-sup" type="button" role="tab" aria-controls="pills-sup" aria-selected="false">Поддержка</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-order-tab" data-bs-toggle="pill" data-bs-target="#pills-order" type="button" role="tab" aria-controls="pills-order" aria-selected="false">Заказы</button>
  </li>
  <?php if ($_SESSION['user']['role'] == 2) { ?>      
    <li class="nav-item" role="presentation">
       <button class="nav-link"  type="button" role="tab" aria-controls="pills-order" aria-selected="false"><a href="?page=vhod" class="logout"><b>Перейти в панель пользователя</b></a></button>
  </li>
  <?php } ?> 
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        
       <div class="container">
  <div class="row g-2">
    <div class="col-4">
      <div class="p-3 border bg-light" >
         <style>
   .round {
    border-radius: 120px; /* Радиус скругления */
    box-shadow: 0 0 0 5px light;, 0 0 13px #333; /* Параметры теней */
   }
   
  </style>

       


 <body>
   <p><img src="<?php echo $user_upd['avatar'] ?>"  alt="" class="round" >
      </p>
 </body>



        
</div>
    </div>
    <div class="col-6">
      <div class="p-3 border bg-light">
<div id="primary" class="content-area">

         <table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Информация о админе:</th>
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td>ФИО:</td>
      <td><b><?php echo $user_upd['full_name'] ?></b></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Почта:</td>
      <td><b><?php echo $user_upd['email'] ?></b></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Логин:</td>
      <td><b><?php echo $user_upd['login'] ?></b></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td><a href="authorization/handler_form/logout.php" class="logout">Выход</a></td>
      <td><a href="?page=update_user_profil&id=<?php echo $_SESSION['user']['id']; ?>">Изменить</a></td>
    </tr>
    
  </tbody>
</table>
        
          
    <div class="p-3 border bg-light" >
        <h5>Вывод соообщений</h5>
      <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?> 
    </div>
      
           

        
      </div>
    </div>

    
  </div>
</div>




</table>
</div>


  </div>
  <div class="tab-pane fade" id="pills-users" role="tabpanel" aria-labelledby="pills-users-tab">
      
      <br>
<h2>Все пользователи в системе</h2>
<br>
    
                        <input type="hidden" name="cr_admin" value="<?php echo $user['id']; ?>">
                        <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">Создать нового пользователя</button>
                                     <br>
   <br>
   <div id="primary" class="content-area">

    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <td><b>id</b></td>
                <td><b>Наименование</b></td>
                <td><b>Почта</b></td>
                <td><b>Роль</b></td>
                <td><b></b></td>
                <td><b></b></td>
            </tr>
        </thead>

        <tbody>
            <?php
            $sql_users = $link->query("SELECT * FROM `users`");
            $sql_or = $link->query("SELECT * FROM `order_data`");

             foreach ($sql_or as $or) : ?>
                <tr>
                    
           
            <?php endforeach; ?>

           <?php foreach ($sql_users as $user) : ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['full_name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    
                

           


        
        
        

             



                    <td><form action="del_admin.php?del_admin=delit_user&id_ord=<?php echo $or['id_order']; ?>>" method="post" >
                        <input type="hidden" name="delit_user" value="<?php echo $user['id']; ?>">
                        <button type="submit" class="btn btn-danger" value="delit" >Удалить</button>
                    </form></td>



                    <td><button type="button"  class="btn btn-success"><a href="?page=update_user&id=<?php echo $user['id']; ?>">Изменить</a></button></td>
                     
                  <!--  <td><form action="?page=update&id=<?php echo $user['id']; ?>" >
                        <input type="hidden" name="upd_admin" value="<?php echo $user['id']; ?>">
                        <button type="button"  class="btn btn-success">Изменить</button>
                    </form></td> -->





                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

     

  </div>


  <div class="tab-pane fade" id="pills-cat" role="tabpanel" aria-labelledby="pills-cat-tab">
      
    <br>
<h2>Все категории товаров в системе</h2>

<br>
    
                        <input type="hidden" name="cr_cat_admin" value="<?php echo $user['id']; ?>">
                        <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">Создать новую категорию товара</button>
                                     <br>
   <br>

    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <td><b>id</b></td>
                <td><b>Наименование</b></td>
                <td><b></b></td>
                <td><b></b></td>
            </tr>
        </thead>

        <tbody>
            <?php
            $sql_category = $link->query("SELECT * FROM `category`");
            foreach ($sql_category as $category) : ?>
                <tr>
                    <td><?php echo $category['id_category']; ?></td>
                    <td><?php echo $category['name']; ?></td>

                    <td><form action="del_admin.php?del_admin=delit_cat" method="post" >
                        <input type="hidden" name="delit_cat" value="<?php echo $category['id_category']; ?>">
                        <button type="submit" class="btn btn-danger" value="delit" >Удалить</button>
                    </form></td>


                    <td><button type="button"  class="btn btn-success"><a href="?page=update_category&id=<?php echo $category['id_category']; ?>">Изменить</a></button></td>

                   <!--   <td><form action="#" method="post">
                        <input type="hidden" name="#" value="<?php echo $product['id']; ?>">
                        <button type="submit" class="btn btn-success" value="delit" >Изменить</button>
                    </form></td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


  </div>




  <div class="tab-pane fade" id="pills-prod" role="tabpanel" aria-labelledby="pills-prod-tab">
      
      <br>
<h2>Все товары в системе</h2>

<br>
    
                        <input type="hidden" name="cr_cat_admin" value="<?php echo $user['id']; ?>">
                        <button type="button"  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProductModal">Создать новый товар</button>
                                     <br>
   <br>
<div id="primary" class="content-area">
    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <td><b>id</b></td>
                <td><b>Наименование</b></td>
                <td><b>id Категории</b></td>
                <td><b>Описание</b></td>
                <td><b>Цена</b></td>
                <td><b>Цена до скидки</b></td>
               


            </tr>
        </thead>
        <tbody>
            <?php
            $sql_product = $link->query("SELECT * FROM `products`");
            foreach ($sql_product as $product) : ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['category']; ?></td>
                    <td><?php echo $product['desc'] = mb_substr($product['desc'], 0, 80, 'UTF-8');?><? if (strlen($product['desc']) > 80) {?>...<?}?></td> <!-- Вывод описания из БД с ограничением в символах (80) -->
                    <td><?php echo $product['price']; ?></td>
                     <td><?php echo $product['discount']; ?></td>

                    <td><form action="del_admin.php?del_admin=delit" method="post">
                        <input type="hidden" name="delit" value="<?php echo $product['id']; ?>">
                        <button type="submit" class="btn btn-danger" value="delit" >Удалить</button>
                    </form></td>


                     <td><button type="button"  class="btn btn-success"><a href="?page=update_product&id=<?php echo $product['id'];?>&id_catt=<?php echo $product['category'];?>">Изменить</a></button></td>
                    <!-- <td><form action="#" method="post">
                        <input type="hidden" name="#" value="<?php echo $product['id']; ?>">
                        <button type="submit" class="btn btn-success" value="delit" >Изменить</button>
                    </form></td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
      
  </div>

  <div class="tab-pane fade" id="pills-sup" role="tabpanel" aria-labelledby="pills-sup-tab">
      
    <br>
<h2>Обращения пользователей в поддержку</h2>

   <br>
   
    <table class="table">
        
        <thead>
            <tr>
                <td><b>id</b></td>
                <td><b>id_темы</b></td>
                <td><b>id_пользователя</b></td>
                <td><b>Имя_пользователя</b></td>
                <td><b>Описание проблемы</b></td>
               


            </tr>
        </thead>
        <tbody>
            
              <?php
            $sql_support = $link->query("SELECT * FROM `support`");
            $sql_topic = $link->query("SELECT * FROM `supporttopics`");


            foreach ($sql_support as $support) : 

              ?>

                <tr>
                    <td><?php echo $support['id_sup']; ?></td>
                    <td><?php echo $support['id_topic']; ?></td>
                    <td><?php echo $support['id'] ?></td>
                    <td><?php echo $support['full_name']; ?></td>
                    <td><?php echo $support['descrip']  =  mb_substr($support['descrip'], 0, 80, 'UTF-8');  ?><? if (strlen($support['descrip']) > 80) {?>...<?}?></td> <!-- Вывод описания из БД с ограничением в символах (80) -->
                        
  
                    <td><form action="del_admin.php?del_admin=delit_sup" method="post">
                        <input type="hidden" name="delit_sup" value="<?php echo $support['id_sup']; ?>">
                        <button type="submit" class="btn btn-danger" value="delit_sup" >Удалить</button>
                    </form></td>



                     <td><button type="button" class="btn btn-success"><a href="?page=answer_support&id=<?php echo $support['id_sup']; ?>&id_top=<?php echo $support['id_topic']; ?>&id_sta=<?php echo $support['id_stat']; ?>">Ответить</a></button></td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

  </div>


  <div class="tab-pane fade" id="pills-order" role="tabpanel" aria-labelledby="pills-order-tab">
      
    <div class="modal-body">
    <h2>Все заказы</h2>
        <table class="table">
                <tr>
                    <td></td>
                    <td><b>Номер заказа</b></td>
                    <td><b>Дата заказа</b></td>
                    <td><b>id_Пользователя</b></td>
                    <td><b>Телефон</b></td>
                    <td><b>Адрес доставки</b></td>
                    <td><b>Сумма заказа</b></td>
                    <td><b>Статус</b></td>
                    <td><b></b></td>
                </tr>

<?php
        $sql_status= $link->query("SELECT * FROM `status_order`");
        $Sum = 0;
        $sql_order= $link->query("SELECT * FROM `order_data`");
        
        
        if(isset($sql_order)){
        
       foreach($sql_order as $order ){
            $order['id'];
            $a = $order['id_ord_stat'];
            $kol =  $order['price_order']; 
          
            foreach ($sql_status as $status_o) {
                if($status_o['id_ord_stat'] == $a){
                
                break;  
                }   
            }?> 

                <tr> <td></td>
                     <td><?php echo $order['id_order']; ?></td>
                    <td><?php echo $order['date_order']; ?></td>
                    <td><?php echo $order['id']; ?></td>
                     <td><?php echo $order['telephone']; ?></td>
                      <td><?php echo $order['address']; ?></td>
                     <td><?php echo $order['price_order'].'руб.'; ?></td>
                     <td><?php echo $status_o['name_ord_stat']; ?></td>
                       <br>

                       <td><form action="update_status_order.php" class="row g-3"  method="post"> 
             <input type="hidden" name="id" value="<?php echo $order['id_order']; ?>">
              <input type="hidden" name="id_user" value="<?php echo $order['id']; ?>">
                            <select class="form-select" aria-label="Default select example" name="id_ord_stat">
                            <option selected>Выберите статус заказа</option>

                            <?php
        $sql_sta = $link->query("select * from `status_order`");
       

        foreach ($sql_sta as $sta) :
        ?>

                <option value="<?php echo $sta['id_ord_stat']; ?>"><?php echo $sta['name_ord_stat']; ?></option>
          <?php endforeach;?>
          
                            </select>

                     </td>
                   
                   
                    
                   
                    <td><button type="submit" class="btn btn-primary">Сохранить</button></td> 
                </form>
                     <td> <button type="submit" class="btn btn-primary"><a href="?page=check_user&id=<?php echo $order['id_order']; ?>">Просмотреть чек</a></button></td>
                                    </tr>

           
        <?php
        }   
               
        }
        ?>
      
          
        </table>
    </div>

</div>

</div>

</section>