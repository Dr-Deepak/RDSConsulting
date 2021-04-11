<?php ob_start();
$username = $_POST['uName'];
$password = hash("sha512", $_POST['pwd']);
// $password = $_POST['pwd'];

try {

    require_once ('dao/db.php');

    $sql = "SELECT * FROM users where uname = :uname AND pwd = :pass";

    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':uname', $username, PDO::PARAM_STR, 30);
    $cmd->bindParam(':pass', $password, PDO::PARAM_STR, 128);
    $cmd->execute();

    $users = $cmd->fetchAll();
    $recCount = $cmd->rowCount();

    if($recCount == 0){
        $_SESSION['error'] = 'no record found';
        header('location:/error/404.php');
        
        //$result = "Invalid Username or password";
    }
    else {
        session_start();
        foreach($users as $user ){
            $_SESSION['uname']       = $user['uname'];
            $_SESSION['firstname']   = $user['fname'];
            $_SESSION['lastname']    = $user['lname'];
            $_SESSION['position']    = $user['priv'];
        }
        $conn = null;
        header('location:welcome.php');
    }


}catch(Exception $db){
$_SESSION['error'] = "ERROR Messeges from DB".$db;
    
  //  mail("errors@rdsconsulting.ca","Database connection error",$db);
   header('location:/error/404.php');
}
ob_flush();
?>