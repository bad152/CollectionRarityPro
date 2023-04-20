<?php

    session_start();
    require_once 'connect.php';


    $id = $_POST['id'];
    $name_card = $_POST['name_card'];
    $number_car = $_POST['number_car'];
    $term = $_POST['term'];
    $adress = $_POST['adress'];
    $telephone = $_POST['telephone'];
    $cvv = $_POST['cvv'];
    $price_order = $_POST['price_order'];
    $id_ord_stat = 1;

    mysqli_query($link, "INSERT INTO `order_data` (`id_order`, `id`, `id_ord_stat`,  `address`, `telephone`,`date_order`, `name_card`, `number_card`, `term_card`, `cvv`, `price_order`) VALUES (NULL, '$id', '$id_ord_stat', '$adress', '$telephone', CURRENT_DATE(), '$name_card', '$number_car', '$term',  '$cvv', '$price_order');");

      
       header('Location: vetrina_buy.php'); 
    
?>