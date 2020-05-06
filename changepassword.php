<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['fosuid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$userid=$_SESSION['fosuid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbluser where ID='$userid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbluser set Password='$newpassword' where ID='$userid'");
$msg= "Jūsu parole ir veiksmīgi nomainīta";
} else {

$msg="Jūsu pašreizējā parole nav pareiza";
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
    <link href="css/style.css" rel="stylesheet"> 
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('Lauks Jauna parole un Apstiprināt paroli neatbilst');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
  </head>
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
                     <li>Mainīt paroli</li>
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
                              <form action="" name="changepassword" method="post" onsubmit="return checkpass();">
                                 <div class="row">
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1">Pašreizējā parole</label>
                                       <input type="password" name="currentpassword" id="currentpassword" class="form-control" required="true" >
                                    </div> </div>
                                    <div class="row">
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Jauna parole</label>
                                       <input type="password" class="form-control" id="newpassword" value="" name="newpassword" required="true"> 
                                    </div>
                                    
                                      </div>  
                                      <div class="row">
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1">Apstipriniet paroli</label>
                                       <input type="password" class="form-control" id="confirmpassword" value="" name="confirmpassword" required="true"> 
                                    </div>
                                      </div> 
                                      <?php } ?>
                                 <div class="row">
                                    <div class="col-sm-4">
                                      <button type="submit" name="submit" class="btn theme-btn"><i class="ft-user"></i>Apstiprināt</button>
                                    </div>
                                    <div class="col-sm-4">
                                   </div>
                                 </div>
                              </form>
                           </div>
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