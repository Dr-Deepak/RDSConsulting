<?php ob_start();
require_once('secure/auth.php');
$page_title = 'RDS Consulting Inc. | Employees ' . '<i class="icon-group icon-3"></i>';

require_once('layout/header.php');

try {
    //Connecting to the database
    require_once('dao/db.php');
    //Setup an sql command to save the new game
    $sql = 'SELECT * FROM users';

    //setup a cmd object
    $cmd = $conn->prepare($sql);
    $cmd->execute();

    //Pull data from database
    $users = $cmd->fetchall();
    /**
     * Setup  table  and create its header with column headings
     */
    echo '<h1>Current Employees</h1>
                         <table class = "table table-striped">
                            <thead>
                                <th>Name</th>                              
                                <th>Address</th>
                                <th>City</th>
                                <th>Province</th>
                                <th>Phone</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>';

    //Loop through all records in database
    foreach ($users as $user) {
        echo '<tr>
                <td class = "text-nowrap">' . $user['fname'].' '.$user['lname']. '</td>
                <td class = "text-nowrap">' . $user['str'] . '</td>
                <td class = "text-nowrap">' . $user['city'] . '</td>
                <td class = "text-nowrap">' . $user['state'] . '</td>
                <td class = "text-nowrap">' . $user['country'] . '</td>
                <td class = "text-nowrap">' . $user['ph'] . '</td>
                <td class = "text-nowrap">
                    <a href = "signup.php?id='.$user['id'].'" title = " Edit this user">Edit</a>
                </td>
                <td class = "text-nowrap">
                  <a href = "delete.php?id='.$user['id'].'"
                        onclick="return confirm(\' Are You Sure  want to delete this record ? \')"
                        title = " Delete this users" >Delete</a>
                </td>
            </tr>';
    }
    echo '</tbody></table>';
    $conn = null;
} catch (exception $ex) {
    // send a mail to developer
    // mail('error@rdsconsulting.ca', 'view employee error', $ex);

    // redirect user to error page
    header('Location:error.php');
}
require_once('layout/footer.php');
ob_flush();
?>


