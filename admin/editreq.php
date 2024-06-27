<?php

include('../dbconn.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
$aEmail=$_SESSION['aEmail'];
}else{
  echo "<script> location.href='adminlogin.php';     </script>";
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





<div class="col-sm-6 mt-5  mx-3 bg-dark-subtle">
    <h3 class="text-center pt-3">Update Requester Details</h3>
    <?php 
    if(isset($_REQUEST['edit'])){
        $sql="select *from requesterlogin_tb where r_login_id={$_REQUEST['id']}";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    }


    if(isset($_REQUEST['requpdate'])){
        if(($_REQUEST['r_login_id']=="")||($_REQUEST['r_name']=="")||($_REQUEST['r_email']=="")){
            echo "Filled All fields";
        }else{
$rid=$_REQUEST['r_login_id'];
$rname=$_REQUEST['r_name'];
$remail=$_REQUEST['r_email'];

            $sql="update requesterlogin_tb set r_login_id='$rid' , r_name='$rname', r_email='$remail'
            where r_login_id='$rid'";
            if($conn->query($sql)==TRUE){
$msg='<div class="alert alert-success" role="alert">  Update Successfully   </div>';
            }else{
                $msg='<div class="alert alert-danger" role="alert"> Unable To Update Successfully   </div>';
            }
        }
    }
    ?>

<form action="" method="POST" class="">
    <div class="form-group">
        <label for="">Requester Id</label>
        <input type="text" name="r_login_id" class="form-control " id="r_logiN_id" value=
        "<?php if(isset($row['r_login_id'])) echo $row['r_login_id'];    ?>" readonly>
    </div>

    <div class="form-group">
        <label for="">Requester Name</label>
        <input type="text" name="r_name" class="form-control" id="r_name" value=
        "<?php if(isset($row['r_name'])) echo $row['r_name'];    ?>" >
    </div>

    <div class="form-group">
        <label for="">Requester Email</label>
        <input type="email" name="r_email" class="form-control" id="r_email" value=
        "<?php if(isset($row['r_email'])) echo $row['r_email'];    ?>" readonly>
    </div>
    <br>
<div class="text-center">
    <button type="submit" class="btn btn-danger me-2" name="requpdate">Update</button>
    <a href="requesters.php" class="btn btn-secondary">Closed</a>
</div>
    
</form>

<?php if(isset($msg)) echo $msg;
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