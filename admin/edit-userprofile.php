<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['fosaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $sid=$_GET['userid'];
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    
   

    $query=mysqli_query($con, "update tbluser set FirstName='$fname', LastName='$lname' where ID='$sid'");


    if ($query) {
    $msg="Lietotāja profils ir atjaunināts";
  }
  else
    {
      $msg="Kaut kas nogāja greizi. Lūdzu mēģiniet vēlreiz";
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
                <h2>Informācija par lietotāju</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Sākumlapa</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Informācija par lietotāju</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Atjaunināt</strong>
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
$sid=$_GET['userid'];
$ret=mysqli_query($con,"select * from tbluser where ID='$sid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

                            <form id="submit" action="#" class="wizard-big" method="post" name="submit">
                                    <fieldset>
                                          <div class="form-group row"><label class="col-sm-2 col-form-label">Vārds:</label>
                                                <div class="col-sm-10"><input name='firstname' id="firstname" class="form-control white_bg" value="<?php  echo $row['FirstName'];?>">
     
       
   </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Uzvārds:</label>
                                                <div class="col-sm-10"><input type="text" class="form-control" name="lastname" value="<?php  echo $row['LastName'];?>"></div>
                                            </div>
                                            
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Email:</label>
                                                <div class="col-sm-10">
                                                 <input type="email" class="form-control" name="email" readonly="true" value="<?php  echo $row['Email'];?>">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Tel. numurs:</label>
                                                <div class="col-sm-10"><input type="text" class="form-control" name="mobilenumber" readonly="true" value="<?php  echo $row['MobileNumber'];?>"></div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Reģistrācijas datums:</label>
                                                <div class="col-sm-10"><input type="text" class="form-control" name="price" readonly="true" value="<?php  echo $row['RegDate'];?>"></div>
                                            </div>
                                           
                                        </fieldset>

                                </fieldset>
                                
                             <?php } ?>
                               
  
          <p style="text-align: center;"><button type="submit" name="submit" class="btn btn-primary">Atjaunināt</button></p>
            
                                
                               
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