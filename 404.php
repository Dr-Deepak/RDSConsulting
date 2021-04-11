<?php
$page_title = 'RDS Consulting Inc. | Page Not Found '.'<i class="icon-frown icon-1"></i>';
require_once ("../layout/header.php");
?>
<div class="jumbotron">
    <h3>Sorry about that ! Page Not Found</h3>
    <p>
    <?php echo $_SESSION['error']; ?>
        We cant find the page you requested. Try one of the links above
    </p>
</div>
<?php require_once("../layout/footer.php");?>
