<?php
$page_title = "RDS Consulting Inc. | Login ".'<i class="icon-user icon-3"></i>';
require_once ('layout/header.php'); ?>
<form class="horizontal-form" action = "validate.php" method = "post">
    <div>
        <label for="uName" class = "col-sm-2"> User Name: </label>
        <input name ="uName" id="uName" placeholder="Enter User Name here" required type = "text"/>
    </div>
    <div>
        <label for="pwd" class = "col-sm-2"> Password : </label>
        <input name ="pwd" id="pwd" placeholder="Enter Password here" required type = "password"/>
    </div>
    <div>
        <input class = 'btn btn-primary col-sm-offset-2' type="submit" value="LOGIN"/>
    </div>
</form>

<?php require_once ("layout/footer.php")?>
