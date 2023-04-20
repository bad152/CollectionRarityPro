<?php
session_start();
require_once 'connect.php';



$id_user = $_SESSION['user']['id'];
$user_upd = mysqli_query($link, "SELECT * FROM `users` WHERE `id` = '$id_user'");
$user_upd = mysqli_fetch_assoc($user_upd);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

   
<section class="main-content">


<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="true">Профиль</button>
  </li>
  <?php if ($_SESSION['user']['role'] == 1) {?>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-sup-tab" data-bs-toggle="pill" data-bs-target="#pills-sup" type="button" role="tab" aria-controls="pills-sup" aria-selected="false">Обращения в поддержку</button>
  </li>
   <?php } ?>  
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-collect-tab" data-bs-toggle="pill" data-bs-target="#pills-collect" type="button" role="tab" aria-controls="pills-collect" aria-selected="false">Моя коллекция</button>
  </li>
  <?php if ($_SESSION['user']['role'] == 1) {?>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-order-tab" data-bs-toggle="pill" data-bs-target="#pills-order" type="button" role="tab" aria-controls="pills-order" aria-selected="false">Мои заказы</button>
  </li>
   <?php } ?>  

   <?php if ($_SESSION['user']['role'] == 1) { ?>
   <li class="nav-item" role="presentation">
   <button class="nav-link" id="collection-tab" data-bs-toggle="modal" data-bs-target="#createSupportModal" type="button" role="tab" aria-controls="collection" aria-selected="true">Написать в поддержку</button>
  </li>
 <?php } ?>  


  <?php if ($_SESSION['user']['role'] == 2) { ?>
           
    <li class="nav-item" role="presentation">
       <button class="nav-link"  type="button" role="tab" aria-controls="pills-order" aria-selected="false"><a href="?page=admin" class="logout"><b>Перейти в панель администратора</b></a></button>
    
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
      <th scope="col">Информация о пользователе:</th>
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
</div>
        
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
  <?php if ($_SESSION['user']['role'] == 1) {?>

  <div class="tab-pane fade" id="pills-sup" role="tabpanel" aria-labelledby="pills-sup-tab">
      


<br>
<h2>Мои обращения в поддержку</h2>

   <br>

    <table class="table">
        <thead>
            <tr>
            
                <td><b>Тема обращения</b></td>
                <td><b>Описание проблемы</b></td>
                <td><b>Статус</b></td>
               

              


            </tr>
        </thead>
        <tbody>

            <?php
        $sql_stat_sup= $link->query("SELECT * FROM `status_support`");
        $sql_support = $link->query("SELECT * FROM `support`");
        $sql_topic = $link->query("SELECT * FROM `supporttopics`");
        

        
        if(isset($sql_support)){
        
       foreach($sql_support as $support ){
            if($support['id'] == $id_user){
            $b = $support['id_stat'];
            $c = $support['id_topic'];

       
          
            foreach ($sql_stat_sup as $stat_o) {
                if($stat_o['id_stat'] == $b){
                
                break;  
                }   
            }

             foreach ($sql_topic as $topic_o) {
                if($topic_o['id_topic'] == $c){
                
                break;  
                }   
            }

            ?> 

           

                <tr> 
                     <td><?php echo $topic_o['desc_topic']; ?></td>
                    <td><?php echo $support['descrip'] = mb_substr($support['descrip'], 0, 80, 'UTF-8');?><? if (strlen($support['descrip']) > 80) {?>...<?}?></td> <!-- Вывод описания из БД с ограничением в символах (80) -->
                    <td><?php echo $stat_o['desc_stat']; ?></td>
                    
 <td><form action="del_admin.php?del_admin=delit_sup" method="post">
                        <input type="hidden" name="delit_sup" value="<?php echo $support['id_sup']; ?>">
                        <button type="submit" class="btn btn-danger" value="delit_sup" >Удалить</button>
                    </form></td>


 


                     <td><form action="?page=answer_support_user&id=<?php echo $support['id_sup']; ?>&id_top=<?php echo $support['id_topic']; ?>" method="post">
                        <input type="hidden" name="delit" value="<?php echo $support['id']; ?>">
                        <button type="submit" class="btn btn-primary position-relative" value="delit" >Просмотр</button>
                    </form></td>
                    
                                    </tr>

           
        <?php
        }   
        }        
        }
        ?>

           
        </tbody>
    </table>



  </div>
  <?php } ?>  
  <div class="tab-pane fade" id="pills-collect" role="tabpanel" aria-labelledby="pills-collect-tab">
      
    <div class="modal-body">
    <h5>Приобретенные товары пользователя <?= $_SESSION['user']['full_name']
?></h5>
        <table class="table">
                <tr>
                    <td></td>
                    <td><b>Наименование</b></td>
                    <td><b>Количество</b></td>
                    <td><b>Цена за шт.</b></td>
                    <td><b>Итого</b></td>
                    <td><b></b></td>
                </tr>

<?php
        $sql_m= $link->query("SELECT * FROM `products`");
        $Sum = 0;
        $sql_vetrina= $link->query("SELECT * FROM `vetrina`");
        
        
        if(isset($sql_vetrina)){
        
       foreach($sql_vetrina as $vetrina ){
            if($vetrina['id_user'] == $id_user){
            $a = $vetrina['id_product'];
            $kol =  $vetrina['number_product']; 
            $good_m = [];
            foreach ($sql_m as $product_m) {
                if($product_m['id'] == $a){
                $good_m= $product_m;
                break;  
                }   
            }?> 

                <tr>
                    <td><img width="50px" src="<?php echo $good_m['imgs']; ?>" /></td>
                    <td><?php echo $good_m['name']; ?></td>
                    <td> <?php echo $kol; ?> </td>
                    <td><?php echo $good_m['price'].'руб.'; ?></td>
                    <td><?php echo $kol*$good_m['price'].'руб.'; ?></td>
                                    </tr>

           
        <?php
        $Sum +=$kol*$good_m['price'];
        }   
        }        
        }
        ?>
        <tr>
             <td align="right" colspan="5"><b> <?php echo 'Всего: '.$Sum.' руб.'  ?>  </b></td>
         </tr> 
          
        </table>
    </div>

  </div>


  <div class="tab-pane fade" id="pills-order" role="tabpanel" aria-labelledby="pills-order-tab">
      
    <div class="modal-body">
    <h5>Мои заказы</h5>
        <table class="table">
                <tr>
                    <td></td>
                    <td><b>Номер заказа</b></td>
                    <td><b>Дата заказа</b></td>
                    <td><b>Телефон</b></td>
                    <td><b>Адрес доставки</b></td>
                    <td><b>Сумма заказа</b></td>
                    <td><b>Статус</b></td>
                    <td><b></b></td>
                </tr>

<?php
        $sql_status= $link->query("SELECT * FROM `status_order`");
        $sql_order= $link->query("SELECT * FROM `order_data`");
        
        
        if(isset($sql_order)){
        
       foreach($sql_order as $order ){
            if($order['id'] == $id_user){
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
                    <td><?php echo $order['telephone']; ?></td>
                      <td><?php echo $order['address']; ?></td>
                     <td><?php echo $order['price_order'].'руб.'; ?></td>
                    <td><?php echo $status_o['name_ord_stat']; ?></td>
                    <td> <button type="submit" class="btn btn-primary"><a href="?page=check_user&id=<?php echo $order['id_order']; ?>">Получить чек</a></button></td>
                    
                                    </tr>

           
        <?php
        }   
        }        
        }
        ?>
      
          
        </table>
    </div>

</div>
</section>


<!-- <form> --><!-- Профиль -->







  
        
        <!--  <div class="modal-body">
        <table class="table">
                <tr>
                    <td></td>
                    <td><b>Наименование</b></td>
                    <td><b>Количество</b></td>
                    <td><b>Цена за шт.</b></td>
                    <td><b>Итого</b></td>
                    <td><b></b></td>
                </tr>

<?php
        $sql_m= $link->query("SELECT * FROM `products`");
        $Sum = 0;
        $sql_basket= $link->query("SELECT * FROM `basket`");
        
        
        if(isset($sql_basket)){
        
       foreach($sql_basket as $basket ){
            if($basket['id_user'] == $id_user){
            $a = $basket['id_product'];
            $kol =  $basket['number_product']; 
            $good_m = [];
            foreach ($sql_m as $product_m) {
                if($product_m['id'] == $a){
                $good_m= $product_m;
                break;  
                }   
            }?> 

                <tr>
                    <td><img width="50px" src="<?php echo $good_m['imgs']; ?>" /></td>
                    <td><?php echo $good_m['name']; ?></td>
                    <td> <?php echo $kol; ?> </td>
                    <td><?php echo $good_m['price'].'руб.'; ?></td>
                    <td><?php echo $kol*$good_m['price'].'руб.'; ?></td>
                    <td><b><a href="del_profil.php?id=<?= $basket['id'] ?>">Удалить</a></b></td>
                                    </tr>

           
        <?php
        $Sum +=$kol*$good_m['price'];
        }   
        }        
        }
        ?>
        <tr>
            <td align="right" colspan="5"><b> <?php echo 'Всего: '.$Sum.' руб.' ?> <td><b><a href="vetrina_buy.php">Купить</a></b></td> </b></td>
         </tr> 
          
        </table>
    </div> -->








        
   <!--  </form> -->



<!-- </body>
</html>  -->
