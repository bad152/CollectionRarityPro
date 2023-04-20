<?php

    session_start();
    require_once 'connect.php';

    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $role = $_POST['role'];

    
    $check_user = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login' ");
   

    if (mysqli_num_rows($check_user) > 0) {
        $_SESSION['message'] = 'Такой логин уже используется';
        header('Location: ../../index.php?page=admin');
        exit;

    }else{

    if ($password === $password_confirm) {

       $path = 'authorization/avatars/' . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $path)) {
            header('Location: index.php?page=admin');
           
        }

        if ($path === 'authorization/avatars/'){
            $path = 'authorization/avatars/no_avatar.jpg';
        }

        $password = md5($password);

        mysqli_query($link, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`,`role`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path','$role')");

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../../index.php?page=admin');


    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../../index.php?page=admin');
    }
}
?>