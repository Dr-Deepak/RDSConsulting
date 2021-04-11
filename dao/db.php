<?php ob_start();
if(getHostName()=='newdell'){
    $hosts ='192.168.2.31';

}else
{
    $hosts = 'vijay.zapto.org';
}
try {

    $conn = new PDO('mysql:host='.$hosts.':3306;dbname=cms', 'shrd2669', 'deepak86');
    // $conn = new PDO('mysql:host=192.168.2.31:3306;dbname=cms', 'shrd2669', 'deepak86');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(exception $db){
    $_SESSION['error'] = "No server connection";
    header('location:error/error.php');
    // send a mail to developer
    // mail('error@rdsconsulting.ca','Database connection error',$db);
}
ob_flush();
?>
