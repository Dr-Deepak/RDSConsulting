<?php session_start();
if(empty($_SESSION['uID'])){
   header('location:login.php');
    exit();
}
session_commit();
?>
