<?php
session_start();

require_once 'connect.php';
$id=$_GET['id'];
$sql= $link->query("DELETE FROM `basket` WHERE `basket`.`id` = '$id'");
header("Location: http://collectionraritypro/index.php?page=vhod");


?>
