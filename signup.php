<?php ob_start();
   
   $page_title = 'RDS Consulting Inc. |  Sign Up ' . '<i class="icon-user icon-3"></i>';
   if (empty($_GET['id']))
    {
        
        $fName   = "";
        $lName   = "";
        $add     = null;
        $city    = null;
        $pro    = null;
        $postal  = "";
        $country = "";
        $phone   = "";
        $hidden ="hidden";
        $uname   = "";
    }
    else
    {
        require('dao/db.php');
        $sql = "SELECT * FROM users where id =".$_GET['id'];
        $cmd = $conn->prepare($sql);
        $cmd->execute();
        $users = $cmd->fetchAll();
        foreach ($users as $user) 
        {
            $fName = $user['fname'];
            $lName = $user['lname'];
            $add   = $user['str'];
            $city  = $user['city'];
            $pro  = $user['state'];
            $phone = $user['ph'];
            $country=$user['country'];
            $hidden =null;
            $uname = $user['uname'];
            $conn=null;
        }
    }
    require_once('layout/header.php');
?>
<!-- <script src="js/auto-complete.js"></script> -->
    <h1>Personal Information </h1>    
    <form action="register.php" method="post">
        <fieldset>
            <label for="firstName" class="col-md-2"> First Name : </label>
            <input name="firstName" id="firstName" placeholder="Enter First Name here"  type="text" value= "<?php echo $fName; ?>"/>
        </fieldset>
        <fieldset>
            <label for="lastName" class="col-md-2"> Last Name : </label>
            <input name="lastName" id="lastName" placeholder="Enter Last Name here"  type="text" value="<?php echo $lName; ?>"/>
        </fieldset>
        
        
            
            <?php 
            if($hidden){         
                echo '
                <fieldset>        
                    <label for="current-address" class="col-md-2"> Street Address : </label>
                    <input  id="autocomplete" placeholder="Enter full address here"  type="text" onFocus="geolocate()" autocomplete="off"/>
                </fieldset>';
            }
            else{
            echo '            
                <fieldset>
                    <label for="str" class="col-md-2" $hidden>Street Address : </label>
                    <input name="str" id="street_number" placeholder="# & Street Name" Value ="'.$add.'" '.$hidden.'/>
                </fieldset>
                <fieldset> 
                    <label for="city" class="col-md-2" $hidden>City : </label>
                    <input name="city" id="locality" placeholder="City" Value ="'.$city.'" '.$hidden.'/>
                </fieldset>
                <fieldset>
                    <label for="province" class="col-md-2" $hidden>State/Province : </label>
                    <input name="province" id="administrative_area_level_1" placeholder="State/Province" Value ="'.$pro.'" '.$hidden.'/>
                </fieldset>                
                <fieldset>
                    <label for="country" class="col-md-2" $hidden>Country : </label>
                    <input name="country" id="country" placeholder="Country" Value ="'.$country.'" '.$hidden.'/>
                </fieldset>';
            } ?>
        <fieldset>
            <label for="phoneNumber" class="col-md-2">Phone : </label>
            <input name="phoneNumber" id="phoneNumber" placeholder="123-123-1234"  type="text"
                   value= "<?php echo $phone; ?>"/>
        </fieldset>
        <fieldset>
            <label for="uName" class="col-md-2">Email : </label>
            <input name="uName" id="uName" required type="email" value= "<?php echo $uname; ?>"/>
        </fieldset>
        <fieldset>
            <label for="pass" class="col-sm-2">Password : </label>
            <input name="pass" id="pass" required type="password"/>
        </fieldset>
        <?php
            if(session_status()== PHP_SESSION_ACTIVE) {
                if( $_SESSION['uname']=='admin'){
                    echo '       
                    <fieldset>
                        <label for="priv" class="col-sm-2">Priv : </label>
                        <input name="priv" id="priv" required />
                    </fieldset>
                    ';
                }
            }
        ?>    
        <!-- I need Help to figure this part out
       <fieldset>
           <label>Select days available to work</label></br>
           <label for="M-F" class = "col-sm-1">Mon - Fri</label><input name ="Mon-Fri" id="M-F" type="checkbox" value="M-F" />
       </fieldset>
       <fieldset>
           <label for="Sat" class = "col-sm-1">Sat</label><input name ="Sat" id="sat" type="checkbox" value="Sat"/>
       </fieldset>
       <fieldset>
           <label for="Sun" class = "col-sm-1">Sun</label><input name ="Sun" id="Sun" type="checkbox" value="Sun"/>
       </fieldset>
       -->
        <input class='btn btn-primary col-sm-offset-2' type="submit"/>
    </form>
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUVePJwIL3rqcxoT0T8VX06yJP0b59fCo&libraries=places&callback=initMap">
</script>
<?php
require_once("layout/footer.php");
?>
