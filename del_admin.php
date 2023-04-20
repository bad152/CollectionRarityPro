<?php
session_start();

require('connect.php');

$order_id = $_GET['id_ord'];
$order_upd = mysqli_query($link, "SELECT * FROM `order_data` WHERE `id_order` = '$order_id'");
$order_upd = mysqli_fetch_assoc($order_upd);

// Кнопки удаления для товаров, пользователей, категорий, обращений в поддержку

$del_admin = $_GET['del_admin'];

if ($del_admin == "delit_user") { 

$id = $_POST['delit_user'];
if($order_upd['id_ord_stat'] < 5 ){

        $_SESSION['message'] = 'Нельзя удалить пользователя, потому что у него есть незавершенные заказы';
        header('Location: index.php?page=admin');

}else{
mysqli_query($link, "DELETE FROM `order_data` WHERE `id` = '$id'");
mysqli_query($link, "DELETE FROM `vetrina` WHERE `id_user` = '$id'");
mysqli_query($link, "DELETE FROM `support` WHERE `id` = '$id'");
}
mysqli_query($link, "DELETE FROM `users` WHERE `id` = '$id'");
$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html';
$_SESSION['message'] = 'Пользователь удален!';
header("Location: $redirect");
exit();

} elseif ($del_admin == "delit") { 

$id = $_POST['delit'];
mysqli_query($link, "DELETE FROM `products` WHERE `id` = '$id'");
$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html';
$_SESSION['message'] = 'Товар удален!';
header("Location: $redirect");
exit();
                            
} elseif ($del_admin == "delit_cat") { 

$id = $_POST['delit_cat'];
mysqli_query($link, "DELETE FROM `category` WHERE `id_category` = '$id'");
$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html';
$_SESSION['message'] = 'Категория удалена!';
header("Location: $redirect");
exit();

}elseif ($del_admin == "delit_sup") { 

$id = $_POST['delit_sup'];
mysqli_query($link, "DELETE FROM `support` WHERE `id_sup` = '$id'");
$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html';
$_SESSION['message'] = 'Обращение в поддержку успешно удалено!';
header("Location: $redirect");
exit();
}

// Кнопки удаления для товаров, пользователей, категорий, обращений в поддержку
?>

