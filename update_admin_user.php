<?php

    session_start();
    require_once 'connect.php';

    
    $user_id = $_GET['id'];
    $user_upd = mysqli_query($link, "SELECT * FROM `users` WHERE `id` = '$user_id'");
    $user_upd = mysqli_fetch_assoc($user_upd);

    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    
    $check_user = mysqli_query($link, "SELECT * FROM `users` WHERE `login` = '$login' ");
   

    if (mysqli_num_rows($check_user) > 0) {
        $_SESSION['message'] = 'Такой логин уже используется';
        header('Location: ../../index.php?page=admin');

}
        $path = 'authorization/avatars/' . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $path)) {
            header('Location: index.php?page=register');
                   }

        if ($path === 'authorization/avatars/'){

           if($user_upd['avatar'] === NULL){
            $path = 'authorization/avatars/no_avatar.jpg';
           
           }else{
             $path = $user_upd['avatar'];
           }
            
        }

        
         mysqli_query($link, "UPDATE `users` SET `full_name` = '$full_name', `login` = '$login', `email` = '$email',`avatar` = '$path', `role` = '$role' WHERE `users`.`id` = '$id';");
         $_SESSION['message'] = 'Данные успешно обновлены!';

         header('Location: ../../index.php?page=admin'); 

?>