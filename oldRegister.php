<!DOCTYPE html>
<html>
<head>
    <title>Sign Up | RDS Consulting Inc.</title>
    <meta content = "text/html; charset=utf-8" http-equiv="content-type" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<a href="applicants.php">View Employees</a>
<h1>Personal Information</h1>
<form action="register.php" method="post">
    <fieldset>
        <label for="firstName" class = "col-sm-1"> First Name : </label>
        <input name ="firstName" id="firstName" placeholder="Enter First Name here" required type = "text"/>
    </fieldset>
    <fieldset>
        <label for="lastName" class = "col-sm-1"> Last Name : </label>
        <input name ="lastName" id="lastName" placeholder="Enter Last Name here" required type = "text"/>
    </fieldset>
    <fieldset>
        <label for="address" class = "col-sm-1">Address : </label>
        <input name ="address" id="address" placeholder="Enter full address here" required type = "text"/>
    </fieldset>
    <fieldset>
        <label for="phoneNumber" class = "col-sm-1"> Phone : </label>
        <input name ="phoneNumber" id="phoneNumber" placeholder="Enter phone number here" required type="tel"/>
    </fieldset>
    <fieldset>
        <label for="sinNumber" class = "col-sm-1"> SIN/SSN : </label>
        <input name ="sinNumber" id="sinNumber" placeholder="Enter SIN/SSN here" required type="password"/>
    </fieldset>
    <fieldset>
        <label>Select days available to work</label></br>
        <label for="mon">Mon</label><input name ="mon" id="mon" type="checkbox" value="Monday" />
        <label for="tue">Tue</label><input name ="tue" id="tue" type="checkbox" value="Tuesday" />
        <label for="wed">Wed</label><input name ="wed" id="wed" type="checkbox" value="Wednesday" />
        <label for="thu">Thu</label><input name ="thu" id="thu" type="checkbox" value="Thursday" />
        <label for="fri">Fri</label><input name ="fri" id="fri" type="checkbox" value="Friday" />
        <label for="sat">Sat</label><input name ="sat" id="sat" type="checkbox" value="Sat"/>
        <label for="sun">Sun</label><input name ="sun" id="sun" type="checkbox" value="Sunday"/>
    </fieldset>
    <input class = btn btn-blue type="submit"/>
</form>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: deep
 * Date: 2016-02-03
 * Time: 10:32 AM
 */