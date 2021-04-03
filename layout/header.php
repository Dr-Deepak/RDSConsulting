<!doctype html>
<html lang="en">
<head>
    <title><?php echo $page_title; ?></title>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">

    <!-- Font awsome CSS for Icons -->
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css"
          rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <!--Override bootstrap style for footer -->
    <style>
    header
    {
      background-color: #00000073;
    }
      footer
      {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 50px;
        line-height: 60px;
        background-color: #00000073;
      }
    </style>
</head>
<body>
  <header>
    <nav class="navbar">
        <a href="default.php" class="navbar-brand" title=" homepage" ><?php echo $page_title;?></a>

        <ul class="nav navbar-nav navbar-right">
          <?php
            if(session_status()== PHP_SESSION_ACTIVE){
                session_start();
                console_log("SESSION ACTIVE");
            }
            if(!empty($_SESSION['applicantID'])){
                 if(strcmp($_SESSION['position'], 'Admin')==0){
                    echo '<li ><a href = "applicants.php" title = "View Applicants" > View Applicants </a ></li >';

                  }
                    echo' <li ><a href = "logout.php" title = "LOGOUT" > Log Out</a ></li >';
                $_SESSION['noadmin']= "Notice you are not logged in as admin, so cannot view applicants page link";
            }
            else
            {
                 echo '<li ><a href = "login.php" title = " View games" > LOG IN </a ></li>
                       <li ><a href = "signup.php" title = " Add a game" > SIGN UP </a ></li>';
            }
          ?>
        </ul>
    </nav>
</header>
<main class="container">
