<?php ob_start();
try {
    $conn = new PDO('mysql:host=localhost:3306;dbname=cms', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(exception $db){
    header('location:error/error.php');
    // send a mail to developer
    mail('error@rdsconsulting.ca','Database connection error',$db);
}
ob_flush();
?>
