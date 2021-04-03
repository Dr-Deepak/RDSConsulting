<?php ob_start();
require_once('secure/auth.php');
$page_title = 'RDS Consulting Inc. | Employees ' . '<i class="icon-group icon-3"></i>';

require_once('layout/header.php');

try {
    //Connecting to the database
    require_once('dao/db.php');
    //Setup an sql command to save the new game
    $sql = 'SELECT * FROM phpapplicants';

    //setup a cmd object
    $cmd = $conn->prepare($sql);
    $cmd->execute();

    //Pull data from database
    $applicant = $cmd->fetchall();
    /**
     * Setup  table  and create its header with column headings
     */
    echo '<h1>Current Employees</h1>
                         <table class = "table table-striped">
                            <thead>
                                <th>Name</th>
                                <th>Position Applied</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Province</th>
                                <th>Phone</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>';

    //Loop through all records in database
    foreach ($applicant as $applicants) {
        echo '<tr>
                <td class = "col-sm-1">' . $applicants['firstname'] . '  ' . $applicants['lastname'] . '</td>
                <td class = "col-sm-1">' . $applicants['positions'] . '</td>
                <td class = "col-sm-1">' . $applicants['address'] . '</td>
                <td class = "col-sm-1">' . $applicants['city'] . '</td>
                <td class = "col-sm-1">' . $applicants['province'] . '</td>
                <td class = "col-sm-1">' . $applicants['phone'] . '</td>
                <td class = "col-sm-1">
                    <a href = "signup.php?ID='.$applicants['applicantID'].'" title = " Edit this applicant">Edit</a>
                </td>
                <td class = "col-sm-1">
                  <a href = "delete.php?applicantID='.$applicants['applicantID'].'"
                        onclick="return confirm(\' Are You Sure  want to delete this record ? \')"
                        title = " Delete this applicant" >Delete</a>
                </td>
            </tr>';
    }
    echo '</tbody></table>';
    $conn = null;
} catch (exception $ex) {
    // send a mail to developer
    mail('error@rdsconsulting.ca', 'view employee error', $ex);

    // redirect user to error page
    header('Location:error.php');
}
require_once('layout/footer.php');
ob_flush();
?>


