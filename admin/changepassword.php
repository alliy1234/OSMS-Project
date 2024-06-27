




<?php

include('../dbconn.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
$aEmail=$_SESSION['aEmail'];
}else{
  echo "<script> location.href='adminlogin.php';     </script>";
}

$aEmail=$_SESSION['aEmail'];

if(isset($_REQUEST['nameupdate'])){
    if($_REQUEST['aPass']==""){
        $passmsg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Please Enter Paasword  </div>';
    }else{


        $update="update adminlogin_tb set a_password='$_REQUEST[aPass]' where a_email='$aEmail'";
        if($conn->query($update)== TRUE){
            $passmsg= '<div class="alert alert-success col-sm-6 ml-5 mt-2"> Update SuccessFully  </div>'; 
        }else{
            $passmsg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2"> Error Occured  </div>';
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
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
<li class="nav-item"><a class="nav-link " href="assets.php"> <i class="fas fa-align-center"></i>Assets</a></li>
<li class="nav-item"><a class="nav-link " href="technican.php"> <i class="fas fa-align-center"></i>Technician</a></li>
<li class="nav-item"><a class="nav-link " href="requesters.php"> <i class="fas fa-align-center"></i>Requesters</a></li>
<li class="nav-item"><a class="nav-link" href="sellsreport.php"> <i class="fas fa-table"></i>Sells Report</a></li>
<li class="nav-item"><a class="nav-link " href="workreport.php"> <i class="fas fa-table"></i>Work Report</a></li>
<li class="nav-item"><a class="nav-link active" href="changepassword.php"> <i class="fas fa-key"></i>ChangePassword</a></li>
<li class="nav-item"><a class="nav-link " href="../logout.php"> <i class="fas fa-sign-out-alt"></i>Logout</a></li>
        

</ul>
        </div>
    </nav>    <!--- End Sidebar First Column -------------------->













    <div class="col-sm-6 mt-5 me-4"  >
<form action="" method="POST" class="me-5 ms-5">
<div class="form-group">
    <label for="inputEmail">Email</label>
    <input type="email" class="form-control disabled" name="aEmail" id="rEmail" readonly value="<?php echo $aEmail;  ?>" readonly >
</div>

<div class="form-group">
    <label for="rName">Password</label>
    <input type="password" name="aPass" class="form-control" id="aPass"  value="">
</div>

 <button type="submit" class="btn btn-danger mt-3" name="nameupdate">Update</button>
 <br>
 <br>
<?php if(isset($passmsg)) echo $passmsg;    ?>









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