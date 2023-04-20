<?php
session_start();
require_once 'connect.php';
// if (!$_SESSION['user']) {
//     header('Location: /');
// }

// $user_id = $_GET['id'];
$user_id = $_SESSION['user']['id'];;
$user_upd = mysqli_query($link, "SELECT `full_name` FROM `users` WHERE `users`.`id`='$user_id'");
$user_upd = mysqli_fetch_assoc($user_upd);


$id = $_SESSION['user']['id'];
?>


<!doctype html>
<html lang="ru" class="h-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link rel="stylesheet" href="styles/bootstrap.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style.css">

  <title>Collection Rarity</title>
</head>
<body>

  <!-- Навигационная панель -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    
    <div class="brend">
    <a href="index.php"><img src="img/brend.png" alt=""></a>  
    </div>
    
    <a class="navbar-brand" href="index.php"><h2>CollectionRarity</h2>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 top-menu">

         <li class="nav-item">
          <a class="nav-link" href="index.php?page=index">Главная</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="index.php?page=catalog">Магазин</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#modal-cart">Корзина</a>     
        </li>
         <li class="nav-item">
          <a class="nav-link" href="index.php?page=login"><?php if ($_SESSION['user']['role'] == 2) { ?>

                              <?php echo $user_upd['full_name']?>(Админ)

                            <?php } elseif ($_SESSION['user']['role'] == 1) { 
                          

                            ?><?php echo $user_upd['full_name']?>
                            

                            <?php } else { ?> Вход <?php } ?>  
              
            </a>
        </li>
        
        
        
      </ul>
    </ul>
    </div>
  </div>
</nav>