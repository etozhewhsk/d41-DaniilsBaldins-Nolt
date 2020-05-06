<?php
session_start();

include_once 'includes/dbconnection.php';
 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Nolt Tracking</title>
</head>
<body>

<div style="margin-left:50px;">
<?php  

$orderid=intval($_GET['oid']);
$ret=mysqli_query($con,"select tblfoodtracking.OrderCanclledByUser,tblfoodtracking.remark,tblfoodtracking.status as fstatus,tblfoodtracking.StatusDate from tblfoodtracking where tblfoodtracking.OrderId ='$orderid'");
$cnt=1;


 ?>
<table border="1"  cellpadding="10" style="border-collapse: collapse; border-spacing:0; width: 100%; text-align: center;">
  <tr align="center">
   <th colspan="4" >Izsekošanas vēsture par pasūtījumu #<?php echo  $orderid;?></th>
  </tr>
  <tr>
    <th>#</th>
<th>Piezīme</th>
<th>Statuss</th>
<th>Datums un laiks</th>
</tr>
<?php  
while ($row=mysqli_fetch_array($ret)) { 
  $cancelledby=$row['OrderCanclledByUser'];
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row['remark'];?></td> 
  <td><?php  echo $row['fstatus']; 
if($cancelledby==1){
echo "("."Lietotājs".")";
} else {

echo "("."Restorāns".")";
}

  ?></td> 
   <td><?php  echo $row['StatusDate'];?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
     
     <p >
      <input name="Submit2" type="submit" class="txtbox4" value="Aizvērt" onClick="return f2();" style="cursor: pointer;"  />   <input name="Submit2" type="submit" class="txtbox4" value="Drukāt" onClick="return f3();" style="cursor: pointer;"  /></p>
</div>

</body>
</html>

     