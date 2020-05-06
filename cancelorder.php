<?php
session_start();
error_reporting(0);
include_once('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    
    $oid=$_GET['oid'];
    $ressta="Order Cancelled";
    $remark=$_POST['restremark'];
    $canclbyuser=1;

    $query=mysqli_query($con,"insert into tblfoodtracking(OrderId,remark,status,OrderCanclledByUser) value('$oid','$remark','$ressta','$canclbyuser')"); 
   $query=mysqli_query($con, "update   tblorderaddresses set OrderFinalStatus='$ressta' where Ordernumber='$oid'");
    if ($query) {
    $msg="Pasūtījums ir atjaunināts";
  }
  else
    {
      $msg="Kaut kas nogāja greizi. Lūdzu mēģiniet vēlreiz";
    }

  
}

 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Pasūtījuma atcelšana</title>
</head>
<body>

<div style="margin-left:50px;">
<?php  
$oid=$_GET['oid'];
$query=mysqli_query($con,"select Ordernumber,OrderFinalStatus from tblorderaddresses where Ordernumber='$oid'");
$num=mysqli_num_rows($query);
$cnt=1;
?>

<table border="1"  cellpadding="10" style="border-collapse: collapse; border-spacing:0; width: 100%; text-align: center;">
  <tr align="center">
   <th colspan="4" >Atcelt pasūtījumu #<?php echo  $oid;?></th>
  </tr>
  <tr>
<th>Pasūtījuma numurs </th>
<th>Pašreizējais statuss </th>
</tr>
<?php  
while ($row=mysqli_fetch_array($query)) {
  ?>
<tr> 
  <td><?php  echo $oid;?></td> 
   <td><?php  $status=$row['OrderFinalStatus'];
if($status==""){
  echo "Gaida restorāna apstiprinājumu";
} else { 
echo $status;
}
?></td> 
</tr>
<?php 
} ?>

</table>
     <?php if($status=="" || $status=="Order Confirmed" || $status=="Food being Prepared") {?>
<form method="post">
      <table>
        <tr>
          <th>Atcelšanas iemesls:</th>
<td>    <textarea name="restremark" placeholder="" rows="12" cols="50" class="form-control wd-450" required="true"></textarea></td>
        </tr>
<tr>
  <td colspan="2" align="center"><button type="submit" name="submit" class="btn btn-primary">Atjaunināt pasūtījumu</button></td>

</tr>
      </table>

</form>
    <?php } else { ?>
<?php if($status=='Order Cancelled'){?>
<p style="color:red; font-size:20px;"> Pasūtījums jau atcelts</p>
<?php } else { ?>
  <p style="color:red; font-size:20px;"> Jūs nevarat atcelt šo pasūtījumu. Pasūtījums saņemts piegādei vai piegādāts</p>

<?php }  } ?>
  
</div>

</body>
</html>

     