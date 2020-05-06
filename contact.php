<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $emailcon=$_POST['emailcont'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbluser where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['fosuid']=$ret['ID'];
     header('location:index.php');
    }
    else{
    $msg="Nepareizs logins vai parole.";
    }
  }
  ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Sazinieties ar mums</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> </head>
<body>
     <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
         <header id="header" class="header-scroll top-header headrom">
            <?php include('includes/header.php');?>

         </header>
         <div class="page-wrapper">
            <div class="breadcrumb">
               <div class="container">
                  <ul>
                     <li><a href="#" class="active">Sākumlapa</a></li>
                     <li>Sazinieties ar mums</li>
                  </ul>
               </div>
            </div>
            <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">
                     <div class="col-md-7">
                        <div class="widget">
                           <div class="widget-body">
                              <form action="" name="login" method="post">
                                 <div class="row">
                                    <div class="form-group col-sm-4">
                                  <h3 align="center">Sazinieties ar mums</h3>
                                      <hr />
                                        <p><b>Adrese:</b> Maskavas iela 257, Rīga, LV-1019</p>
                                        <p><b>Darba laiks:</b> 24/7</p>
                                        <p><b>Tel. numurs:</b> +37120415009</p>
                                        <p><b>Epasts:</b> Šobrid nav pieejams</p>

                                    </div>
                                 </div>
                               
                              </form>
                           </div>
                        </div>
                     </div>

               </div>
            </section>
           <?php include('includes/footer.php');?>

         </div>

      </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>