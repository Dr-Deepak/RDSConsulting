<html>
<body>
<?php
ob_start();
//declare variables to store data received from post
$fName = $_POST['firstName'];
$lName = $_POST['lastName'];
$username = $_POST['uName'];
$password = hash('sha512', $_POST['pass']);
$address = $_POST['address'];
// $city = $_POST['city'];
// $province = $_POST['province'];
$phone = $_POST['phoneNumber'];
$sin = $_POST['sinNumber'];
$position = $_POST['position'];

// created a flag to check if form is fill appropriately
$ok = true;

/* $workday    = $_POST['M-F'];

 /**
  * Just checked if fields are nor numeric neither empty
  * if any condition is true it will raise the flag
  */
if (is_numeric($fName) || empty($fName)) {

    $ok = false;
    echo 'First name cannot be empty or a number';

} else if (is_numeric($lName) || empty($lName)) {
    $ok = false;
    echo 'Last name cannot be empty or a number';
} else if (empty($username)) {
    $ok = false;
    echo 'User name cannot be left empty';
} else if (empty($password)) {
    $ok = false;
    echo 'Password cannot be left empty';
} else if (empty($address)) {
    $ok = false;
    echo 'Street cannot be left empty';

// } else if (empty($city)) {
//     $ok = false;
//     echo 'City cannot be left empty';
// } else if (empty($province)) {
//     $ok = false;
//     echo 'province cannot be left empty';
} else if (empty($phone)) {
    $ok = false;
    echo 'Phone Number cannot be non-numeric or left empty';
} else if (empty($sin)) {
    $ok = false;
    echo 'SIN/SSN cannot be left empty or non-numeric';
}
if ($ok) {
    try {
        //Connecting to the database
        require_once("dao/db.php");

        //Setup an sql command to save the new game
        // if ($position == 'Admin') {
        //     $sql = 'SELECT * FROM phpapplicants WHERE positions = "Admin"';
        //     $cmd = $conn->prepare($sql);
        //     $cmd->execute();
        //     $count = $cmd->rowCount();
        //     if ($count >= 2) {

        //         echo 'Cannot have more than two admins';
        //         exit();
        //     }
        // }
        session_start();
        if (!empty($_SESSION['ID'])) {
            $sql = 'UPDATE phpapplicants
                        SET fiurstname = :firstname, lastname = :lastname, username = :uname,
                         password = :pass, address = :address, city = :city, province = :province,
                          phone = :phone, sin = :sin, positions = :position WHERE applicantID = "' . $_SESSION['ID'] . '"';
        } else {
            // $sql = 'INSERT INTO phpapplicants (firstname, lastname, username, password, address, city, province, phone, sin, positions)
            //                 VALUES (:firstname, :lastname,:uname,:pass, :address, :city, :province, :phone, :sin, :position)';

            $sql = 'INSERT INTO users (fName, lName, username, password, sin)
            VALUES (:firstname, :lastname, :uname,:pass, :sin)';
        }
        //setup a cmd object
        $cmd = $conn->prepare($sql);

        //Fill the placeholder to avoid SQL INJECTION
        $cmd->bindParam(':firstname', $fName, PDO::PARAM_STR, 50);
        $cmd->bindParam(':lastname', $lName, PDO::PARAM_STR, 50);
        $cmd->bindParam(':uname', $username, PDO::PARAM_STR, 30);
        $cmd->bindParam(':pass', $password, PDO::PARAM_STR, 128);
        // $cmd->bindParam(':address', $address, PDO::PARAM_STR);
        // $cmd->bindParam(':city', $city, PDO::PARAM_STR);
        // $cmd->bindParam(':province', $province, PDO::PARAM_STR);
        // $cmd->bindParam(':phone', $phone, PDO::PARAM_STR, 12);
        $cmd->bindParam(':sin', $sin, PDO::PARAM_STR, 11);
        // $cmd->bindParam(':position', $position, PDO::PARAM_STR, 50);

        // execute SQL Query
        $cmd->execute();
        //disconnecting from database
        $conn = null;
        header('location:login.php');
    } catch (Exception $ex) {
        // send a mail to developer
        // mail('error@rdsconsulting.ca','Register page error',$ex);
        echo $ex;
        // redirect user to error page
        //  header('location:error/error.php');
    }
}
/*send notification email for successfully registering with company7*/
/* mail('$userEmailAvailableInNextVersion@AnyWebsite.com','Application Complete', $fName.' '.$lName.
     ' Thank you for filling an application with RDS Consulting.
         An HR Specialist will contact you soon via email or by phone.','From: RDS CONSULTING INC.| noreply@rdsconsulting.com');*/
ob_flush();
?>
</body>
</html>
