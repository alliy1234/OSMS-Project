

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
    <title>Dashboard</title>
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
    <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
        <div class="sidebar-sticky">
            <ul class="nav flex-column edit">
<li class="nav-item">
    <a class="nav-link " href="admindashboard.php"> 
    <i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
<li class="nav-item"><a class="nav-link active " href="workorder.php"> <i class="fab fa-accessible-icon"></i>Work Order</a></li>
<li class="nav-item"><a class="nav-link " href="requests.php"> <i class="fas fa-align-center"></i>Requests</a></li>
<li class="nav-item"><a class="nav-link " href="assets.php"> <i class="fas fa-align-center"></i>Assets</a></li>
<li class="nav-item"><a class="nav-link " href="technican.php"> <i class="fas fa-align-center"></i>Technician</a></li>
<li class="nav-item"><a class="nav-link " href="requesters.php"> <i class="fas fa-align-center"></i>Requesters</a></li>
<li class="nav-item"><a class="nav-link" href="sellsreport.php"> <i class="fas fa-table"></i>Sells Report</a></li>
<li class="nav-item"><a class="nav-link " href="workreport.php"> <i class="fas fa-table"></i>Work Report</a></li>
<li class="nav-item"><a class="nav-link " href="changepassword.php"> <i class="fas fa-key"></i>ChangePassword</a></li>
<li class="nav-item"><a class="nav-link " href="../logout.php"> <i class="fas fa-sign-out-alt"></i>Logout</a></li>
        

</ul>
        </div>
    </nav>    <!--- End Sidebar First Column -------------------->


<div class="col-sm-6 mt-5 mx-3">
    <h3 class="text-center">Assigned Work Details</h3>

<?php
if(isset($_REQUEST['view'])){
    $sql="select *from assignwork_tb where request_id= {$_REQUEST['id']}";
    $result=$conn->query($sql);
$row=$result->fetch_assoc(); ?>

<table class="table table-bordered">
  <tbody>
    <tr>
        <td>Request ID</td>
        <td><?php if(isset($row['request_id'])) echo $row['request_id'];   ?></td>
    </tr>
    <tr>
        <td>Request Info</td>
        <td><?php if(isset($row['request_info'])) echo $row['request_info'];   ?></td>
    </tr>
    <tr>
        <td>Request Desc</td>
        <td><?php if(isset($row['request_desc'])) echo $row['request_desc'];   ?></td>
    </tr>
    <tr>
        <td>Request Name</td>
        <td><?php if(isset($row['request_name'])) echo $row['request_name'];   ?></td>
    </tr>
    <tr>
        <td>Request Addres1</td>
        <td><?php if(isset($row['request_add1'])) echo $row['request_add1'];   ?></td>
    </tr>
    <tr>
        <td>Request Addres2</td>
        <td><?php if(isset($row['request_add2'])) echo $row['request_add2'];   ?></td>
    </tr>
    <tr>
        <td>Request City</td>
        <td><?php if(isset($row['request_city'])) echo $row['request_city'];   ?></td>
    </tr>
    <tr>
        <td>Request State</td>
        <td><?php if(isset($row['request_state'])) echo $row['request_state'];   ?></td>
    </tr>
    <tr>
        <td>Pin Code</td>
        <td><?php if(isset($row['request_zip'])) echo $row['request_zip'];   ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php if(isset($row['request_email'])) echo $row['request_email'];   ?></td>
    </tr>
    <tr>
        <td>Mobile</td>
        <td><?php if(isset($row['request_mobile'])) echo $row['request_mobile'];   ?></td>
    </tr>
    <tr>
        <td>Technician Name</td>
        <td><?php if(isset($row['assign_tech'])) echo $row['assign_tech'];   ?></td>
    </tr>
    <tr>
        <td>Assign Date</td>
        <td><?php if(isset($row['assign_date'])) echo $row['assign_date'];   ?></td>
    </tr>
    <tr>
        <td>Customer Sign</td>
    </tr>
    <tr>
        <td>Technician Sign</td>
    </tr>
  </tbody>   
</table>
<div class="text-center mt-2">
    <form action="" class="d-print-none d-inline">
        <input type="submit" value="Print" class="btn btn-danger" onClick="window.print()"> 
</form>
<form action="workorder.php" class="d-print-none d-inline"></form>
<input type="submit" value="Closed" class="btn btn-secondary"> 
    </form> 
 
</div>


<?php  }  ?>
 






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
