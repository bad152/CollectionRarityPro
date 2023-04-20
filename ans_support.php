<?php

    session_start();
    require_once 'connect.php';

    $id = $_POST['id'];
    $id_stat = $_POST['id_stat'];
    $answer = $_POST['answer'];

    $id_user = $_POST['id_user'];

        

     $sql_mail = $link->query("SELECT * FROM `users` WHERE `id` = '$id_user'");

    foreach ($sql_mail as $mail) :
        

         endforeach;
    
   
     if($id_stat == 3){
            mail( $mail['email'], 'CollectionRarity', 'Вам пришел ответ на ваше обращение в поддержку');
        }

        mysqli_query($link, "UPDATE `support` SET `id_stat` = '$id_stat', `answer` = '$answer' WHERE `support`.`id_sup` = '$id';");

        $_SESSION['message'] = 'Ответ отправлен!';
        header('Location: ../../index.php?page=admin');
       
?>