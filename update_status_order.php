<?php

    session_start();
    require_once 'connect.php';

    $id = $_POST['id'];
    $id_stat = $_POST['id_ord_stat'];
    $id_user = $_POST['id_user'];

        

     $sql_mail = $link->query("SELECT * FROM `users` WHERE `id` = '$id_user'");

    foreach ($sql_mail as $mail) :
        

         endforeach;
    
   

         mysqli_query($link, "UPDATE `order_data` SET `id_ord_stat` = '$id_stat' WHERE `id_order` = '$id';");

         

         if($id_stat == 3){
            mail( $mail['email'], 'CollectionRarity', 'Ваш заказ отправлен по указанному адресу ');
        }elseif($id_stat == 4){
            mail($mail['email'], 'CollectionRarity', 'Ваш заказ собран. Вы можете забрать свой заказ по адресу Улица Родионова 193/4');
        }
    
         $_SESSION['message'] = 'Статус обновлен!';
        header('Location: ../../index.php?page=admin');



?>
