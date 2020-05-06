<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if (strlen($_SESSION['fosuid']==0)) {
  header('location:logout.php');
  } else{ 

if(isset($_POST['placeorder'])){
$fnaobno=$_POST['flatbldgnumber'];
$street=$_POST['streename'];
$code=$_POST['code'];
$city=$_POST['city'];
$userid=$_SESSION['fosuid'];
$orderno= mt_rand(100000000, 999999999);
$query="update tblorders set OrderNumber='$orderno',IsOrderPlaced='1' where UserId='$userid' and IsOrderPlaced is null;";
$query.="insert into tblorderaddresses(UserId,Ordernumber,Flatnobuldngno,StreetName,Code,City) values('$userid','$orderno','$fnaobno','$street','$code','$city');";

$result = mysqli_multi_query($con, $query);
if ($result) {

echo '<script>alert("Jūsu pasūtījums veikts veiksmīgi. Pasūtījuma numurs ir "+"'.$orderno.'")</script>';
echo "<script>window.location.href='my-order.php'</script>";

}
}   

if(isset($_GET['delid'])) {
$rid=$_GET['delid'];
$query=mysqli_query($con,"delete from tblorders where ID='$rid'");
echo '<script>alert("Prece ir izdzēsta")</script>';
echo "<script>window.location.href='cart.php'</script>";

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
    <title>Grozs</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> </head>

<body>
    <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out">
        <header id="header" class="header-scroll top-header headrom">
          <?php include_once('includes/header.php');?>
        </header>
        <div class="page-wrapper">
            <div class="top-links">
                
            </div>

            <div class="breadcrumb">
                <div class="container">
                    <ul>
                        <li><a href="index.php" class="active">Sākumlapa</a></li>
                        <li><a href="cart.php">Grozs</a></li>
                        <li>Detalizēts</li>
                    </ul>
                </div>
            </div>
            <div class="container m-t-30">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <div class="sidebar clearfix m-b-20">
                            <div class="main-block">
                                <div class="sidebar-title white-txt">
                                    <h6>Kategorijas</h6> <i class="fa fa-cutlery pull-right"></i> </div>
                                    <?php
      
      $query=mysqli_query($con,"select * from  tblcategory");
              while($row=mysqli_fetch_array($query))
              {
              ?>
                               <ul>
                                            <li>
                                                <label class="custom-control custom-checkbox">
                                                    <span class="custom-control-description"><a href="viewfood-categorywise.php?catid=<?php echo $row['CategoryName'];?>"><?php echo $row['CategoryName'];?></a></span> </label>
                                            </li>
                                        </ul>
                                        <?php } ?>
                                <div class="clearfix"></div>
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                        <div class="menu-widget m-b-30">
                            <div class="widget-heading">
                                <h3 class="widget-title text-dark">
                                    Jūsu iepirkumu grozs. <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular" aria-expanded="true">
                              <i class="fa fa-angle-right pull-right"></i>
                              <i class="fa fa-angle-down pull-right"></i>
                              </a>
                           </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="collapse in" id="1">
                                <div class="food-item white">

<?php 
$userid= $_SESSION['fosuid'];
$query=mysqli_query($con,"select tblorders.ID as frid,tblfood.Image,tblfood.ItemName,tblfood.ItemDes,tblfood.ItemPrice,tblfood.ItemQty,tblorders.FoodId from tblorders join tblfood on tblfood.ID=tblorders.FoodId where tblorders.UserId='$userid' and tblorders.IsOrderPlaced is null");
$num=mysqli_num_rows($query);
if($num>0){
while ($row=mysqli_fetch_array($query)) {
 

?>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-lg-8">
                                            <div class="rest-logo pull-left">
                                                <a class="restaurant-logo pull-left" href="#"><img src="admin/itemimages/<?php echo $row['Image']?>" width="100" height="80" alt="<?php echo $row['ItemName']?>"></a>
                                            </div>
                                            <div class="rest-descr">
<h6><a href="food-detail.php?fid=<?php echo $_SESSION['fid']=$row['FoodId'];?>"><?php echo $row['ItemName']?> (<?php echo $row['ItemQty']?>) </a></h6>
                                                <p> <?php echo $row['ItemDes']?></p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info"> <span class="price pull-left">€ <?php echo $total=$row['ItemPrice']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="cart.php?delid=<?php echo $row['frid'];?>" onclick="return confirm('Vai tiešām vēlaties izdzēst?');";><i class="fa fa-trash" aria-hidden="true" title="Dzēst šo produktu"></i><a/></span>
                                        </div>
                                    </div>

                                <?php 
$grandtotal+=$total;
                            } 

} else {

    echo "Jūsu grozs ir tukšs.";
}
                            ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($num>0){?>
                        <form method="post">
                    <div class="col-xs-12 col-md-12 col-lg-3">
                        <div class="sidebar-wrap">
                            <div class="widget widget-cart">
                                <div class="widget-heading">
                                    <h3 class="widget-title text-dark">
                                        Piegāde
                              </h3>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="order-row bg-white">
                                    <div class="widget-body">
                                 
                                        <div class="form-group row no-gutter">
                                            <div class="col-lg-12">
                                                <input type="text" name="flatbldgnumber"  placeholder="Dzīvokļa vai ēkas numurs" class="form-control" required="true">
                                                <input type="text" name="streename" placeholder="Ielas nosaukums" class="form-control" required="true">
                                                <input type="text" name="code" placeholder="Durvju kods" class="form-control">
                                                <input type="text" name="city" placeholder="Pilsēta" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            
                          
                                <div class="widget-body">
                                    <div class="price-wrap text-xs-center">
                                        <p>Kopējā vērtība</p>
                                        <h3 class="value"><strong>€<?php echo $grandtotal;?></strong></h3>
                                        <p>Bezmaksas piegāde</p>
                                        <button  type="submit" name="placeorder" class="btn theme-btn btn-lg">Pasūtīt</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php } ?>
            </div>


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
<?php } ?>