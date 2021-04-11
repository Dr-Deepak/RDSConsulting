<?php
$page_title = 'RDS Consulting Inc. | Error '.'<i class="icon-frown icon-1"></i>';
require_once ("../header.php");
?>
<div class="jumbotron">
    <h3>Sorry about that !</h3>
    <p>
        <?php echo $_SESSION['error']; ?>       
    </p>
</div>
<?php require_once("../layout/footer.php");?>
