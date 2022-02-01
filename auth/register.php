<?php
  require '../config/config.php';

  if(isset($_POST['register'])) {
    $errMsg = '';

    // Get data from FROM
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];

    
    $temp="0";
    $string ="";
  

      try {

        //Check existing username   
         $stmt = $connect->prepare("SELECT username FROM users WHERE username='$username'");
               $stmt->execute();
             $data1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
             if (!empty($data1)) {
              $temp="1";  
              $string .="UserName <br>";          
              $errMsg = $string;
          }
        //Check existing email  
        $stmt = $connect->prepare("SELECT email FROM users WHERE email='$email'");
               $stmt->execute();
             $data2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
             if (!empty($data2)) {
              $temp="1";
              $string .="Email <br>";  
              $errMsg = $string;
          }
        //Check existing number 
        $stmt = $connect->prepare("SELECT mobile FROM users WHERE mobile='$mobile'");
               $stmt->execute();
             $data3 = $stmt->fetchAll(PDO::FETCH_ASSOC);
             if (!empty($data3)) {
              $temp="1";
              $string .="Mobile Number <br>";
              $errMsg = $string."Mobile Number ";
          }

        if($temp=="1")
        {
          $errMsg = $string."Is Already Being Used!";
        }

        
          $stmt = $connect->prepare('INSERT INTO users (fullname, mobile, username, email, password) VALUES (:fullname, :mobile, :username, :email, :password)');
        $stmt->execute(array(
          ':fullname' => $fullname,
          ':username' => $username,
          ':password' => md5($password),
          ':email' => $email,
          ':mobile' => $mobile,
          ));
        header('Location: register.php?action=joined');
        exit;
      }
      catch(PDOException $e) {
        //$errMsg = $e->getMessage();
      }
  }

  if(isset($_GET['action']) && $_GET['action'] == 'joined') {
    $errMsg = 'Registration successfull. Now you can login';
  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="../assets/css/rent.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
  </head>
  <body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#212529;" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../index.php">Home</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <!-- <a class="nav-link" href="register.php">Register</a> -->
            </li>
          </ul>
        </div>
      </div>
    </nav>
<!-- <section> --><br>
  <div class="container">
    <div class="row">       
        <div class="col-md-8 mx-auto">
          <div class="alert alert-info" role="alert">
            <?php
            if(isset($errMsg)){
              echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
            }
          ?>
            <h2 class="text-center">Register</h2>
            <form action="" method="post">
              <div class="row">
                  <div class="col-6">
                  <div class="form-group">
                  <label for="fullname">Full Name</label>
                  <input type="text" class="form-control" id="fullname" placeholder="Full Name" name="fullname" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="username">User Name</label>
                  <input type="text" class="form-control" id="username" placeholder="User Name" name="username" required>
                </div>
                </div>
             </div>
             <div class="row">
                  <div class="col-6">
                <div class="form-group">
                  <label for="mobile">Mobile</label>
                  <input type="text" class="form-control" pattern="^(\d{11})$" id="mobile" title="11 digit mobile number" placeholder="11 digit mobile number" name="mobile" required>
                </div>
               </div>
              <div class="col-6">           
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                </div>
               </div>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>

            <div class="form-group">
              <label for="c_password">Confirm Password</label>
              <input type="password" class="form-control" id="c_password" placeholder="Confirm Password" name="c_password" required>
            </div>

            <button type="submit" class="btn btn-primary" name='register' value="register">Submit</button>
          </form>       
        </div>
      </div>
    </div>
  </div>
<!-- </section> -->

