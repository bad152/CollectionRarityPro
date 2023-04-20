<?php
session_start();
unset($_SESSION['user']);
header('Location: http://collectionraritypro/index.php?page=login'); 
?>