<?php
session_start();
$id=$_GET['del'];
unset($_SESSION['add_product'][$id]);
$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html';
header("Location: $redirect");

?>