<?php

    session_start();
    require_once 'connect.php';

    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $id_topic = $_POST['id_topic'];
    $desc = $_POST['desc'];
    $id_stat = '1';

    if($id_topic <= 0 ){
        $_SESSION['message'] = 'Для создания обращения выберите тему обращения!';
        header('Location: index.php?page=vhod'); 
        exit;
    }else{

    mysqli_query($link, "INSERT INTO `support` (`id_sup`, `id_topic`, `id`, `full_name`, `descrip`, `id_stat`, `answer`) VALUES (NULL, '$id_topic', '$id', '$full_name', '$desc', '$id_stat', '');");

        $_SESSION['message'] = 'Обращение создано!';
        header('Location: index.php?page=vhod'); 
    }
?>
