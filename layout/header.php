<!doctype html>
<html lang="en">
<head>
    <title><?php echo $page_title; ?></title>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

    <!-- Font awsome CSS for Icons -->
 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!--Override bootstrap style for footer -->
    <style>

    </style>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <div class="container-fluid">      
        <a href="#page-hero" class="navbar-brand" title=" homepage">
            <i class ="fas fa-briefcase"></i> <?php echo $page_title;?>
        </a>

        <div class="navbar-nav">
          <?php
            if(session_status()== PHP_SESSION_ACTIVE){
                session_start();
                console_log("SESSION ACTIVE");
            }
            if(!empty($_SESSION['applicantID'])){
                 if(strcmp($_SESSION['position'], 'Admin')==0){
                    echo '<a class = "nav-item nav-link" href = "applicants.php" title = "View Applicants" > View Applicants </a>';

                  }
                    echo' <a class = "nav-item nav-link" href = "logout.php" title = "LOGOUT" > Log Out</a >';
                $_SESSION['noadmin']= "Notice you are not logged in as admin, so cannot view applicants page link";
            }
            else
            {
                 echo '<a class = "nav-item nav-link" href = "login.php" title = " View games" > LOG IN </a>
                       <a class = "nav-item nav-link" href = "signup.php" title = " Add a game" > SIGN UP </a> ';
            }
          ?>
        </div>
      </div>
    </nav>
</header>
<main class="container">
