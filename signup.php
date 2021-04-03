
<?php //ob_start();
    $page_title = 'RDS Consulting Inc. |  Sign Up ' . '<i class="icon-user icon-3"></i>';
//    if (empty($_GET['ID']))
//    {
//    // session_start();
   $fName   = "";
   $lName   = "";
   $add     = null;
   $city    = null;
   $pro    = null;
   $postal  = "";
   $country = "";
   $phone   = "";
   $sin     = "";
   $uname   = "";
//   }
// else
//   {
    // require('dao/db.php');
    // $sql = 'SELECT * FROM phpapplicants where applicantID ='.$_GET['ID'];
    // $cmd = $conn->prepare($sql);
    // $cmd->execute();
    // $users = $cmd->fetchAll();
    // foreach ($users as $user) {
    //     $fName = $user['firstname'];
    //     $lName = $user['lastname'];
    //     $add   = $user['address'];
    //     $city  = $user['city'];
    //     $pro  = $user['province'];
    //     $phone = $user['phone'];
    //     $sin   = $user['sin'];
    //     $uname = $user['username'];
    //     $conn=null;
    // }
//}
require_once('layout/header.php');
?>


  <script src="js/auto-complete.js"></script>
    <h1>Personal Information</h1>

    
    <form action="register.php" method="post">
        <fieldset>
            <label for="firstName" class="col-sm-2"> First Name : </label>
            <input name="firstName" id="firstName" placeholder="Enter First Name here" required type="text" value= "<?php echo $fName; ?>"/>
        </fieldset>
        <fieldset>
            <label for="lastName" class="col-sm-2"> Last Name : </label>
            <input name="lastName" id="lastName" placeholder="Enter Last Name here" required type="text" value="<?php echo $lName; ?>"/>
        </fieldset>
        <fieldset>
            <label for="address" class="col-sm-2"> Street Address : </label>
            <input  id="autocomplete" placeholder="Enter full address here" required type="text" onFocus="geolocate()" autocomplete="off"/>

            <input name="address" id="street_number" hidden/>
            <input name="city" id="locality" hidden/>
            <input name="province" id="administrative_area_level_1" hidden />
            <input name="country" id="country"  hidden/>
            <input name="postal" id="postal_code" hidden/>
        </fieldset>
        <fieldset>
            <label for="phoneNumber" class="col-sm-2">Phone : </label>
            <input name="phoneNumber" id="phoneNumber" placeholder="555-555-5555" required type="text"
                   value= "<?php echo $phone; ?>"/>
        </fieldset>
        <fieldset>
            <label for="sinNumber" class="col-sm-2">SIN/SSN<e>*</e> : </label>
            <input name="sinNumber" id="sinNumber" placeholder="123-123-123" type="text"
                   value= "<?php echo $sin; ?>" required />
        </fieldset>
        <fieldset>
            <label for="uName" class="col-sm-2">Username : </label>
            <input name="uName" id="uName" required type="text" value= "<?php echo $uname; ?>"/>
        </fieldset>
        <fieldset>
            <label for="pass" class="col-sm-2">Password : </label>
            <input name="pass" id="pass" required type="password"/>
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
        <input class='btn btn-primary col-sm-offset-2' type="submit"/>
    </form>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUVePJwIL3rqcxoT0T8VX06yJP0b59fCo&libraries=places&callback=initAutocomplete" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<?php
require_once("layout/footer.php");
?>
