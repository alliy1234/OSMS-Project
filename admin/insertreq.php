<?php

include('../dbconn.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
$aEmail=$_SESSION['aEmail'];
}else{
  echo "<script> location.href='adminlogin.php';     </script>";
}













if(isset($_REQUEST['reqsubmit'])){
    if(($_REQUEST['r_name']=="")|| ($_REQUEST['r_email']=="") ||
    ($_REQUEST['r_password']=="")){
        $regmsg='<div class="alert alert-warning mt-2" role="alert"> 
        filled all fields to make your Account <br> Thanks </div>';
    }else{
        
        $uname=$_REQUEST['r_name'];
        $uemail=$_REQUEST['r_email'];
        $upass=$_REQUEST['r_password'];
        $find="select *from requesterlogin_tb where r_email='$uemail'";
        $run=mysqli_query($conn,$find);
        if($run > 0) {
            $regmsg='<div class="alert alert-danger mt-2" role="alert">
            Email ALready Excist Try New- Email </div>';
        }else{
            $sql="insert into requesterlogin_tb (r_name,r_email,r_password)
            values('$uname','$uemail','$upass')";
          if($conn->query($sql) == TRUE){
           $regmsg = '<div class="alert alert-success mt-2" role="alert">
           Account SuccessFuly Created </div>';
          }else{
           $regmsg=' <div class="alert alert-danger mt-2" role="alert">
           Unable To Create Account </div>';
          }
   
        }


        
        // $run=mysqli_query($conn,$sql);
        // if($run){
        //   

          
        //     alert(  " Welco0me to our Family");
        //  
        // }
        // // $coon
    }
}


?>


<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Request</title>
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
<li class="nav-item"><a class="nav-link  " href="assets.php"> <i class="fas fa-align-center"></i>Assets</a></li>
<li class="nav-item"><a class="nav-link " href="technican.php"> <i class="fas fa-align-center"></i>Technician</a></li>
<li class="nav-item"><a class="nav-link active" href="requesters.php"> <i class="fas fa-align-center"></i>Requesters</a></li>
<li class="nav-item"><a class="nav-link" href="sellsreport.php"> <i class="fas fa-table"></i>Sells Report</a></li>
<li class="nav-item"><a class="nav-link " href="workreport.php"> <i class="fas fa-table"></i>Work Report</a></li>
<li class="nav-item"><a class="nav-link " href="changepassword.php"> <i class="fas fa-key"></i>ChangePassword</a></li>
<li class="nav-item"><a class="nav-link " href="../logout.php"> <i class="fas fa-sign-out-alt"></i>Logout</a></li>
        

</ul>
        </div>
    </nav>    <!--- End Sidebar First Column -------------------->


<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Add New Requester</h3>
<form action="" method="POST">
    <div class="form-group">
        <label for="r_name">Name</label>
        <input type="text" class="form-control" id="r_name" name="r_name">
    </div>
    <div class="form-group">
        <label for="r_email">Email</label>
        <input type="email" class="form-control" id="r_email" name="r_email">
    </div>
    <div class="form-group">
        <label for="r_password">Password</label>
        <input type="password" class="form-control" id="r_password" name="r_password">
    </div>
    <br>
    <div class="text-center">
        <button type="submit" class="btn btn-danger me-3" name="reqsubmit">Submit</button>
        <a href="requesters.php" class="btn btn-secondary">Close</a>
    </div>
</form>
</div>


<?php
if(isset($regmsg)) echo $regmsg;


?>







    

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