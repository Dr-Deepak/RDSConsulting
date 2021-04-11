<?php 
session_start();

if(empty($_SESSION['uname'])){
   header('location:login.php');
    exit();
}
session_commit();
?>
