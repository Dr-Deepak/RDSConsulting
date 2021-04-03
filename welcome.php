<?php ob_start();
require_once('secure/auth.php');
$page_title = 'RDS Consulting Inc. | '.$_SESSION['firstname'].' '.$_SESSION['lastname'];
require_once('layout/header.php');
?>
<div>
    <h1>Welcome..<?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?></h1>
    <h4><?php echo $_SESSION['noadmin']; ?>....</h4>
    <h6>Please navigate site through links provided above</h6>
</div>
<?php require_once('layout/footer.php'); ?>
