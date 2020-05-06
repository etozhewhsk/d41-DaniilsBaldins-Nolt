<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['fosaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$adminid=$_SESSION['fosaid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbladmin where ID='$adminid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbladmin set Password='$newpassword' where ID='$adminid'");
$msg= "Jūsu parole ir veiksmīgi nomainīta";
} else {

$msg="Jūsu pašreizējā parole nav pareiza";
}



}

  
  ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nolt Admin</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
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

    <div id="wrapper">

    <?php include_once('includes/leftbar.php');?>

        <div id="page-wrapper" class="gray-bg">
             <?php include_once('includes/header.php');?>
        <div class="row border-bottom">
        
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Change Password</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Password</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Change</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                    
                        <div class="ibox-content">
 <p style="font-size:16px; color:red;"> <?php if($msg){
    echo $msg;
  }  ?> </p>   
                            
                          <?php
$adminid=$_SESSION['fosaid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

                            <form name="changepassword" method="post" class="wizard-big" onsubmit="return checkpass();">
                                    <fieldset>
                                          <div class="form-group row"><label class="col-sm-2 col-form-label">Current Password:</label>
                                                <div class="col-sm-10"><input type="password" name='currentpassword' id="currentpassword" class="form-control white_bg" required="true">
     
       
   </div>
                                            </div>
                                             <div class="form-group row"><label class="col-sm-2 col-form-label">New Password:</label>
                                                <div class="col-sm-10"><input type="password" name='newpassword' id="newpassword" class="form-control white_bg" required="true">
     
       
   </div>
                                            </div>
                                            
                                             <div class="form-group row"><label class="col-sm-2 col-form-label">Confirm Password:</label>
                                                <div class="col-sm-10"><input type="password" name='confirmpassword' id="confirmpassword" class="form-control white_bg" required="true">
     
       
   </div>
                                            </div>
                                            
                                                                                      
                                           
                                        </fieldset>

                                </fieldset>
                                
                             <?php } ?>
                               
  
          <p style="text-align: center;"><button type="submit" name="submit" class="btn btn-primary">Change</button></p>
            
                                
                               
                            </form>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        <?php include_once('includes/footer.php');?>

        </div>
        </div>



    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <script src="js/plugins/steps/jquery.steps.min.js"></script>

    <script src="js/plugins/validate/jquery.validate.min.js"></script>


    <script>
        $(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    if (currentIndex < newIndex)
                    {
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    form.validate().settings.ignore = ":disabled,:hidden";

                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    form.validate().settings.ignore = ":disabled";

                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
       });
    </script>

</body>

</html>
   <?php } ?>