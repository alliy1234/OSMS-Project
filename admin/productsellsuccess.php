








<?php

include('../dbconn.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
$aEmail=$_SESSION['aEmail'];
}else{
  echo "<script> location.href='adminlogin.php';     </script>";
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Sell</title>
      <!-- bootstrap css -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">

<!-- font awesom css -->
<link rel="stylesheet" href="../css/all.min.css">


<!-- cutom   -->
<link rel="stylesheet" href="../css/custom.css">
</head>
<body>




<nav class="navbar navbar-expand-sm navbar-dark bg-danger ps-5 
fixed-top">
<a href="admindashboard.php" class="navbar-brand">OSMS</a></nav>


<!-- start container-fluid -->



<div class="container-fluid" style="margin-top:40px;">
<div class="row">
    <nav class="col-sm-2 bg-light sidebar py-5">
        <div class="sidebar-sticky">
            <ul class="nav flex-column edit">
<li class="nav-item">
    <a class="nav-link " href="admindashboard.php"> 
    <i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
<li class="nav-item"><a class="nav-link  " href="workorder.php"> <i class="fab fa-accessible-icon"></i>Work Order</a></li>
<li class="nav-item"><a class="nav-link " href="requests.php"> <i class="fas fa-align-center"></i>Requests</a></li>
<li class="nav-item"><a class="nav-link active" href="assets.php"> <i class="fas fa-align-center"></i>Assets</a></li>
<li class="nav-item"><a class="nav-link " href="technican.php"> <i class="fas fa-align-center"></i>Technician</a></li>
<li class="nav-item"><a class="nav-link " href="requesters.php"> <i class="fas fa-align-center"></i>Requesters</a></li>
<li class="nav-item"><a class="nav-link" href="sellsreport.php"> <i class="fas fa-table"></i>Sells Report</a></li>
<li class="nav-item"><a class="nav-link  " href="workreport.php"> <i class="fas fa-table"></i>Work Report</a></li>
<li class="nav-item"><a class="nav-link " href="changepassword.php"> <i class="fas fa-key"></i>ChangePassword</a></li>
<li class="nav-item"><a class="nav-link " href="../logout.php"> <i class="fas fa-sign-out-alt"></i>Logout</a></li>
        

</ul>
        </div>
    </nav>    <!--- End Sidebar First Column -------------------->










<div class="col-sm-9 col-md-10 mt-5">

<?php
$sql="select *from customer_tb where custid={$_SESSION['myid']}    ";
$result=$conn->query($sql);
if($result->num_rows == 1){
   $row=$result->fetch_assoc();

echo"<div class='ml-5 mt-5'>
<h3 class='text-center'>Customer Bill </h3>
<table class='table'>
<tbody>
<tr>
<th>Customer Id </th>
<td>".$row['custid']."</td>
</tr>

<tr>
<th> Name </th>
<td>".$row['custname']."</td>
</tr>

<tr>
<th>Address </th>
<td>".$row['custadd']."</td>
</tr>

<tr>
<th> Product </th>
<td>".$row['cpname']."</td>
</tr>

<tr>
<th>Quantity </th>
<td>".$row['cpquantity']."</td>
</tr>

<tr>
<th>Total Price </th>
<td>".$row['cptotal']."</td>
</tr>

<tr>
<th>Date </th>
<td>".$row['cpdate']."</td>
</tr>


<td><form class='d-print-none'><input class='btn btn-danger' type='submit' value='print'
onClick='window.print()'></form></td>
<td><a href='assets.php' class='btn btn-secondary d-print-none'>Close </a></td>
</tr></tbody>
</table></div>";
}
else{
    echo "failed";
}


?>



</div>









    

    <!-- jquery files -->
    <script src="../js/jquery.min.js"></script>
<!-- popper js -->
    <script src="../js/popper.min.js"></script>
    <!-- boot js -->
    <script src="../js/jquery.min.js"></script>
    <!-- font awesome js -->
     <script src="../js/all.min.js"></script>
</body>
</html>