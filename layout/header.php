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
    <button class="navbar-toggler" data-toggle="collapse" data-target="#myTogglerNav" aria-controls="#myTogglerNav" aria-lable="Toggle Navigation">
      <span class= "navbar-toggler-icon"></span>
    </button>

    <div class="container-fluid">      
      <div class="navbar navbar-expand-md bg-dark navbar-dark">     
        <a href="welcome.php" class="navbar-brand" title=" homepage">
            <i class ="fas fa-briefcase"></i> <?php echo $page_title;?>
        </a>
        <section class="collapse navbar-collapse" id = "myTogglerNav">
          <div class="navbar-nav">
            <?php
              if(session_status()!= PHP_SESSION_ACTIVE){
                  session_start();
              }
              if(!empty($_SESSION['uname'])){
                  if(strcmp($_SESSION['position'], 'admin')==0){
                      echo '<a class = "nav-item nav-link text-uppercase" href = "users.php" title = users" >users </a>';

                    }
                    else{
                      
                    }
                      echo' <a class = "nav-item nav-link text-uppercase" href = "logout.php" title = "LOGOUT" > Log Out</a >';
                  
              }
              else
              {
                  echo '<a class = "nav-item nav-link text-uppercase" href = "login.php" title = "LOG IN" > LOG IN </a>
                        <a class = "nav-item nav-link text-uppercase" href = "signup.php" title = "SIGN UP" > SIGN UP </a> ';
              }
            ?>
          </div>
        </section>
      </div>
    </div>
</header>
<main class="container">
