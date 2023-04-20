<?php
session_start();
require('templates/header.php');
?>

<?php
require('connect.php');

if (!isset($_SESSION['sql'])) {
    $_SESSION['sql'] = "SELECT * from `products`";
}
$sql_text = $_SESSION['sql'];

$sql = $link->query($sql_text);

$page = $_GET['page'];

if (!isset($page)) {  
    require('templates/main.php');
} elseif ($page == 'index') {
    require('templates/main.php');
} elseif ($page == 'pay_deliver') {
    require('templates/pay_deliver.php');
} elseif ($page == 'catalog') {
    require('templates/catalog.php');
} elseif ($page == 'tovarCart') {
    $idg = $_GET['id'];
    $good = [];
    foreach ($sql as $product) {
        if ($product['id'] == $idg) {
            $good = $product;
            break;
        }
    }
    require('templates/tovarCart.php');
} elseif ($page == 'product_cat') {
    $idg = $_GET['id_cat'];
    if ($idg == 0) {
        $_SESSION['sql'] = "SELECT * FROM `products`";
    } else {
        $_SESSION['sql'] = "SELECT * FROM `products` WHERE `category` = $idg ";
    }

    $sql_text = $_SESSION['sql'];
    $sql = $link->query($sql_text);
    require('templates/catalog.php');
} elseif ($page == 'sort') {
    $idg = $_GET['id_sort'];
    if ($idg == 1) {
        $sql_text .= " ORDER BY `name`";
    }
    if ($idg == 2) {
        $sql_text .= " ORDER BY `name` DESC";
    }
    if ($idg == 3) {
        $sql_text .= " ORDER BY `price` ASC";
    }
    if ($idg == 4) {
        $sql_text .= " ORDER BY `price` DESC";
    }
    $sql = $link->query($sql_text);


    require('templates/catalog.php');
} elseif ($page == 'login') {
    require('authorization/index.php');
        }elseif ($page == 'register') {
            require('authorization/register.php');
        }elseif ($page == 'vhod') {
            require('authorization/profile.php');
        }elseif ($page == 'admin') {
            require('authorization/admin.php');
        }elseif ($page == 'update_user') {
            require('authorization/upd_admin_user.php');
        }elseif ($page == 'update_category') {
            require('authorization/upd_admin_category.php');
        }elseif ($page == 'update_product') {
            require('authorization/upd_admin_product.php');
        }elseif ($page == 'update_user_profil') {
            require('authorization/upd_user_profil.php');
        }elseif ($page == 'answer_support') {
            require('authorization/answer_support.php');
        }elseif ($page == 'answer_support_user') {
            require('authorization/answer_support_user.php');
        }elseif ($page == 'orderStore') {
            if(isset($_SESSION['user'])){
                require('orderStore.php');
            }else {
            $_SESSION['message'] = 'Для оформления заказа авторизуйтесь!';
            header("Location: index.php?page=login");  
        } 
        
            
        }elseif ($page == 'check_user') {
            require('authorization/check_user.php');
        }elseif ($page == 'orderСourier') {
            if(isset($_SESSION['user'])){
                require('orderСourier.php');
            }else {
            $_SESSION['message'] = 'Для оформления заказа авторизуйтесь!';
            header("Location: index.php?page=login");  
        } 

}


?>

<?php
require('cr_admin_user.php');//модальное окно для изменения данных для админа
?>
<?php
require('templates/footer.php');
?>