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
    <title>Edit Employee</title>
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
<li class="nav-item"><a class="nav-link active" href="technican.php"> <i class="fas fa-align-center"></i>Technician</a></li>
<li class="nav-item"><a class="nav-link " href="requesters.php"> <i class="fas fa-align-center"></i>Requesters</a></li>
<li class="nav-item"><a class="nav-link" href="sellsreport.php"> <i class="fas fa-table"></i>Sells Report</a></li>
<li class="nav-item"><a class="nav-link " href="workreport.php"> <i class="fas fa-table"></i>Work Report</a></li>
<li class="nav-item"><a class="nav-link " href="changepassword.php"> <i class="fas fa-key"></i>ChangePassword</a></li>
<li class="nav-item"><a class="nav-link " href="../logout.php"> <i class="fas fa-sign-out-alt"></i>Logout</a></li>
        

</ul>
        </div>
    </nav>    <!--- End Sidebar First Column -------------------->





<div class="col-sm-6 mt-5  mx-3 bg-dark-subtle">
    <h3 class="text-center pt-3">Update Employee Details</h3>
    <?php 
    if(isset($_REQUEST['edit'])){
        $sql="select *from technician_tb where empid={$_REQUEST['id']}";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    }


    if(isset($_REQUEST['empupdate'])){
        if(($_REQUEST['emp_id']=="")||($_REQUEST['e_name']=="")|| ($_REQUEST['e_city']=="")||
        ($_REQUEST['e_mobile']=="")||($_REQUEST['e_email']=="")){
            echo "Filled All fields";
        }else{
$eid=$_REQUEST['emp_id'];
$ename=$_REQUEST['e_name'];
$ecity=$_REQUEST['e_city'];
$emobile=$_REQUEST['e_mobile'];
$eemail=$_REQUEST['e_email'];

            $sql="update technician_tb set empid='$eid' , empName='$ename',empCity='$ecity',
            empMobile='$emobile',empEmail='$eemail'
            where empid='$eid'";
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
        <label for="">Emp Id</label>
        <input type="text" name="emp_id" class="form-control " id="emp_id" value=
        "<?php if(isset($row['empid'])) echo $row['empid'];    ?>" readonly>
    </div>

    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="e_name" class="form-control" id="e_name" value=
        "<?php if(isset($row['empName'])) echo $row['empName'];    ?>" >
    </div>
    <div class="form-group">
        <label for="">City</label>
        <input type="text" name="e_city" class="form-control" id="e_city" value=
        "<?php if(isset($row['empCity'])) echo $row['empCity'];    ?>" >
    </div>
    <div class="form-group">
        <label for="">Mobile</label>
        <input type="number" name="e_mobile" class="form-control" id="e_mobile" value=
        "<?php if(isset($row['empMobile'])) echo $row['empMobile'];    ?>" >
    </div>

    <div class="form-group">
        <label for=""> Email</label>
        <input type="email" name="e_email" class="form-control" id="e_email" value=
        "<?php if(isset($row['empEmail'])) echo $row['empEmail'];    ?>" readonly>
    </div>
    <br>
<div class="text-center">
    <button type="submit" class="btn btn-danger me-2" name="empupdate">Update</button>
    <a href="technican.php" class="btn btn-secondary">Closed</a>
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