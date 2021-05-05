<?php ob_start();
   
   $page_title = 'RDS Consulting Inc. |  Sign Up ' . '<i class="icon-user icon-3"></i>';
   if (empty($_GET['id']))
    {
        $id      = "";
        $fName   = "";
        $lName   = "";
        $add     = null;
        $city    = null;
        $pro     = null;
        $postal  = "";
        $country = "";
        $phone   = "";
        $hidden  = "hidden";
        $uname   = "";
        $welcome ="Sign up!"; 
    }
    else
    {
        require('dao/db.php');
        $id=$_GET['id'];
        $sql = "SELECT * FROM users where id = $id";
        $cmd = $conn->prepare($sql);
        $cmd->execute();

        $users = $cmd->fetchAll();
        foreach ($users as $user) 
        {
            $fName   = $user['fname'];
            $lName   = $user['lname'];
            $add     = $user['str'];
            $city    = $user['city'];
            $pro     = $user['state'];
            $phone   = $user['ph'];
            $country = $user['country'];
            $priv    = $user['priv'];
            $hidden  = null;
            $uname   = $user['uname'];
            $welcome ="change your infomation!"; 
            
        }
        $conn=null;
    }
    require_once('layout/header.php');
?>
<!-- <script src="js/auto-complete.js"></script> -->
    <h1>Let's <?php echo $welcome; ?></h1>    
    <form class ="justify-content-center" action="register.php" method="post">
        <input name='id' hidden  Value=<?php echo $id?> />
        <fieldset>
        <legend>Personal Information</legend>
            <div class="input-group-prepend">
                <span class="input-group-text rounded col-sm-2" id="name">First & Last Name</span>          
                <input class="pl-3 rounded-top-bottom col-sm-3" name="firstName" id="firstName" placeholder="Enter First Name here"  type="text" required value= "<?php echo $fName; ?>"/>
                <input class="pl-3 rounded-top-bottom col-sm-3" name="lastName" id="lastName" placeholder="Enter Last Name here"  type="text" required  value="<?php echo $lName; ?>"/>
            </div>
            <div class="input-group-prepend">                      
                <?php 
                    if($hidden){         
                    echo '
                        <span class="input-group-text rounded col-sm-2 " id="name">Address</span>   
                        <input class=" pl-3 rounded col-sm-6" id="autocomplete" placeholder="Enter full address here"  type="text" onFocus="geolocate()" autocomplete="off"/>
                        </div>
                        ';
                    }
                    else{
                    echo '            
                                <span class="input-group-text rounded col-sm-2 " id="street_number">Street Address</span> 
                                <input  class="col-sm-6 pl-3 rounded" name="str" id="street_number" placeholder="# & Street Name" Value ="'.$add.'" '.$hidden.'/>
                            </div>
                            <div class="input-group-prepend">      
                                <span class="input-group-text rounded col-sm-2 " id="locality">City</span>
                                <input  class="pl-3 rounded col-sm-6"  name="city" id="locality" placeholder="City" Value ="'.$city.'" '.$hidden.'/>
                            </div>
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded col-sm-2" id="administrative_area_level_1">State/Province</span>
                                <input  class="pl-3 rounded col-sm-6" name="province" id="administrative_area_level_1" placeholder="State/Province" Value ="'.$pro.'" '.$hidden.'/>
                            </div>
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded col-sm-2" id="country">Country</span>
                                <input  class="col-sm-6 pl-3 rounded" name="country" id="country" placeholder="Country" Value ="'.$country.'" '.$hidden.'/>
                            </div>
                        ';
                    } 
                ?>
            </div>
            <div class="input-group-prepend">   
                <span class="input-group-text rounded col-sm-2 form-group" id="phoneNumber">Phone</span>
                <input  class="pl-3 rounded col-sm-6" name="phoneNumber" id="phoneNumber" placeholder="123-123-1234"  type="text" required 
                   value= "<?php echo $phone; ?>"/>
            </div>
        </fieldset>
        <fieldset>
        <legend>Account Information</legend>
            <div class="input-group-prepend">  
                <span class="input-group-text rounded col-sm-2 form-group" id="uName">Email</span>
                <input  class="pl-3 rounded col-sm-6" name="uName" id="uName" required type="email" value= "<?php echo $uname; ?>"/>
            </div>
            <div class="input-group-prepend">
                <span class="input-group-text rounded col-sm-2 form-group" id="pass">Password</span>
                <input  class="pl-3 rounded col-sm-6 " name="pass" id="pass" required type="password"/>
            </div>               
                <?php
                    if(!empty($_SESSION['position'])) {
                        if(strcmp($_SESSION['position'],'admin')==0){
                            echo '                            
                                <div class="input-group-prepend">
                                    <span class="input-group-text rounded col-sm-2" id="position">Position </span>
                                    <input  class="pl-3 rounded col-sm-6" name="position" id="position" value = "'.$priv.'" required />
                                </div>
                            ';
                        }
                    }
                ?> 
            </div>
        </fieldset>   
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
        <input class='btn btn-success col-sm-offset-2 float-right' type="submit"/>
    </form>
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUVePJwIL3rqcxoT0T8VX06yJP0b59fCo&libraries=places&callback=initMap">
</script>
<?php
require_once("layout/footer.php");
?>
