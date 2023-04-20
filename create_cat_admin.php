<?php

    session_start();
    require_once 'connect.php';

    $name = $_POST['name'];
    
    $check_cat = mysqli_query($link, "SELECT * FROM `category` WHERE `name` = '$name' ");
   
    if (mysqli_num_rows($check_cat) > 0) {
        $_SESSION['message'] = 'Такая категория уже существует';
        header('Location: ../../index.php?page=admin');
    }else{

   

        

        $path = 'img/' . $_FILES['img']['name'];
        if (!move_uploaded_file($_FILES['img']['tmp_name'], $path)) {
            header('Location: index.php?page=admin');
           
        }


        mysqli_query($link, "INSERT INTO `category` (`id_category`, `name`,  `img`) VALUES (NULL, '$name', '$path')");

        $_SESSION['message'] = 'Категория создана!';
        header('Location: ../../index.php?page=admin'); 
}
?>
