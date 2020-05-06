<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['fosaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $faid=$_SESSION['fosaid'];
    $fcat=$_POST['foodcategory'];
    $itemname=$_POST['itemname'];
    $description=$_POST['description'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    
    $itempic=$_FILES["itemimages"]["name"];
    $extension = substr($itempic,strlen($itempic)-4,strlen($itempic));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Nederīgs formāts. Only jpg / jpeg/ png /gif formāts atļauts');</script>";
}
else
{
    $itempic=md5($itempic).$extension;
     move_uploaded_file($_FILES["itemimages"]["tmp_name"],"itemimages/".$itempic);
    $query=mysqli_query($con, "insert into tblfood(CategoryName,ItemName,ItemPrice,ItemDes,ItemQty,Image) value('$fcat','$itemname','$price','$description','$quantity','$itempic')");
    if ($query) {
    $msg="Prece ir pievienota.";
  }
  else
    {
      $msg="Kaut kas nogāja greizi. Lūdzu mēģiniet vēlreiz";
    }

  
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
                <h2>Preces</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Mājaslapa</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Item Name</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Pievienot</strong>
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

                            <form id="submit" action="#" class="wizard-big" method="post" name="submit" enctype="multipart/form-data">
                                    <fieldset>
                                          <div class="form-group row"><label class="col-sm-2 col-form-label">Kategorija:</label>
                                                <div class="col-sm-10"><select name='foodcategory' id="foodcategory" class="form-control white_bg" required="true">
     
      <?php
      
      $query=mysqli_query($con,"select * from  tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['CategoryName'];?>"><?php echo $row['CategoryName'];?></option>
                  <?php } ?>  
   </select></div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Nosaukums:</label>
                                                <div class="col-sm-10"><input type="text" class="form-control" name="itemname" required="true"></div>
                                            </div>
                                            
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Apraksts:</label>
                                                <div class="col-sm-10">
                                                 <textarea type="text" class="form-control" name="description" row="8" cols="12" required="true">
                                                 	</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Bilde</label>
                                                <div class="col-sm-10"><input type="file" name="itemimages" required="true"></div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Daudzums:</label>
                                                <div class="col-sm-10"><input type="text" class="form-control" name="quantity" required="true"></div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Cena:</label>
                                                <div class="col-sm-10"><input type="text" class="form-control" name="price" required="true"></div>
                                            </div>
                                           
                                        </fieldset>

                                </fieldset>
                                
                                
                               
  
          <p style="text-align: center;"><button type="submit" name="submit" class="btn btn-primary">Pievienot</button></p>
            
                                
                               
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
<?php }  ?>