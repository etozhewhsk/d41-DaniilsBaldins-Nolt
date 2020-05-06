<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['fosuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $sid=$_SESSION['fosuid'];
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    
   

    $query=mysqli_query($con, "update tbluser set FirstName='$fname', LastName='$lname' where ID='$sid'");


    if ($query) {
    $msg="Izmaiņas saglabātas";
  }
  else
    {
      $msg="Kaut kas nogāja greizi. Lūdzu mēģiniet vēlreiz";
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
    <title>Nolt</title>
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
                     <li>Profils</li>
                  </ul>
               </div>
            </div>
            <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="widget">
                           <div class="widget-body">
                              <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                              <form action="" name="submit" method="post">
                                <?php
$pid=$_SESSION['fosuid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$pid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>  
                                 <div class="row">
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Vārds</label>
                                       <input class="form-control" type="text" value="<?php  echo $row['FirstName'];?>" id="firstname" name="firstname" required="true"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Uzvārds</label>
                                       <input class="form-control" type="text" value="<?php  echo $row['LastName'];?>" id="lastname" name="lastname" required="true"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Email</label>
                                       <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php  echo $row['Email'];?>" required="true" readonly='true'>
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Telefona numurs</label>
                                       <input class="form-control" type="text" id="mobilenumber" name="mobilenumber" value="<?php  echo $row['MobileNumber'];?>" readonly="true">
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Reģistrācijas datums</label>
                                       <input class="form-control" type="text" id="regdate" name="regdate" value="<?php  echo $row['RegDate'];?>" readonly="true">
                                    </div>
                                   
                                                                     </div>
                                                                   <?php } ?> 
                                 
                                 <div class="row">
                                    <div class="col-sm-4">
                                      <button type="submit" name="submit" class="btn theme-btn"><i class="ft-user"></i>Saglabāt izmaiņas</button>
                                    </div>
                              
                                 </div>
                              </form>
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
<?php  } ?>