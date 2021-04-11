<?php
$page_title = 'RDS Consulting Inc. | Error '.'<i class="icon-warning-sign icon-3"></i>';
require_once ("/layout/header.php");
?>
<div class="jumbotron">
    <h3>Sorry about that !</h3>
    <p>
    <?php 
    if(!empty($_SESSION['err']))
    {
    
        echo $_SESSION['err'];
    }
     ?>
        Something went wrong.. but don't worry.. we are looking into it.
    </p>
</div>
<?php require_once("/layout/footer.php"); ?>
