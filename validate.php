<?php ob_start();
$username = $_POST['uName'];
$password = hash("sha512", $_POST['pwd']);
// $password = $_POST['pwd'];

try {

    require_once ('dao/db.php');

    $sql = "SELECT * FROM users where username = :uname AND password = :pass";

    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':uname', $username, PDO::PARAM_STR, 30);
    $cmd->bindParam(':pass', $password, PDO::PARAM_STR, 128);
    $cmd->execute();

    $users = $cmd->fetchAll();
    $recCount = $cmd->rowCount();

    if($recCount == 0){
        echo "Invalid Username or password";
        //$result = "Invalid Username or password";
    }
    else {
        session_start();
        foreach($users as $user ){
            $_SESSION['applicantID'] = $user['applicantID'];
            $_SESSION['firstname']   = $user['firstname'];
            $_SESSION['lastname']    = $user['lastname'];
            $_SESSION['position']    = $user['positions'];
        }
        $conn = null;
        header('location:welcome.php');
    }


}catch(Exception $db){

    console.log($db);
  //  mail("errors@rdsconsulting.ca","Database connection error",$db);
  //  header('location:error/error.php');
}
ob_flush();
?>