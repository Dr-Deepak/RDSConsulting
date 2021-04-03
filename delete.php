<?php ob_start();

$ID = $_GET['applicantID'];

if(is_numeric($ID)){
// Connect to database
    require_once("dao/db.php");

//Write and run the query
    $sql = "DELETE FROM phpapplicants WHERE applicantID = :aapID";
    $cmd= $conn ->prepare($sql);
    $cmd->bindParam(':aapID',$ID, PDO::PARAM_INT);
    $cmd->execute();
// Disconnect the server
    $conn = null;
    header('location:applicants.php');
}
//clear the output buffer
ob_flush();
?>
