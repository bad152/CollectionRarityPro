<?php


    session_start();
     require_once '../../connect.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);
    $check_user = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
  
    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "full_name" => $user['full_name'],
            "avatar" => $user['avatar'],
            "email" => $user['email'],
            "role"  => $user['role']
        ];

        if ($_SESSION['user']['role'] == 1){
        //var_dump($_SESSION['user']);
        header('Location:  ../../index.php?page=vhod');

        } elseif ($_SESSION['user']['role'] == 2){
        header('Location: ../../index.php?page=admin');
    }
    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location:  ../../index.php?page=login');
    }

    ?>

