<?php

    session_start();
    require_once 'connect.php';


    $id = $_POST['id'];
    $name_card = $_POST['name_card'];
    $number_car = $_POST['number_car'];
    $term = $_POST['term'];
    $cvv = $_POST['cvv'];
    $price_order = $_POST['price_order'];
    $id_ord_stat = 1;

    $sql_m = $link->query("SELECT * FROM `products`");
            $add_product = $_SESSION['add_product'];

     if (isset($add_product)) {
              foreach ($add_product as $key => $value) {
                $a = $key;
                $kol =  $_SESSION['add_product'][$a];
                $good_m[] = $a;
                $good_m[] = $kol;

                }
               
}
print_r($good_m);
$arraya  = implode("- ", $good_m);

   

    mysqli_query($link, "INSERT INTO `order_data` (`id_order`, `id`, `id_ord_stat`,  `address`, `telephone`,`date_order`, `name_card`, `number_card`, `term_card`, `cvv`, `price_order`, `tovar`) VALUES (NULL, '$id', '$id_ord_stat', NULL, NULL, CURRENT_DATE(), '$name_card', '$number_car', '$term', '$cvv','$price_order','$arraya');");

      
       header('Location: vetrina_buy.php'); 
    
?>