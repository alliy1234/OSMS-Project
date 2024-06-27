


<?php

include('../dbconn.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
$aEmail=$_SESSION['aEmail'];
}else{
  echo "<script> location.href='adminlogin.php';     </script>";
}

$sql="select max(request_id) from submitrequest_tb";
$res=$conn->query($sql);
$row=$res->fetch_row();
$submitrequest=$row[0];



$sql="select max(rno) from assignwork_tb";
$res=$conn->query($sql);
$row=$res->fetch_row();
$assignwork=$row[0];


$sql="select *from technician_tb";
$res=$conn->query($sql);
$totaltech=$res->num_rows;
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
    <nav class="col-sm-2 bg-light sidebar py-5">
        <div class="sidebar-sticky">
            <ul class="nav flex-column edit">
<li class="nav-item">
    <a class="nav-link active" href="admindashboard.php"> 
    <i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
<li class="nav-item"><a class="nav-link  " href="workorder.php"> <i class="fab fa-accessible-icon"></i>Work Order</a></li>
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



<div class="col-sm-9 col-md-10">   <!---------- Start Second Column ---------------->
<div class="row text-center mx-5 mt-5">
<div class="col-sm-4">
  <div class="card text-white bg-danger mb-3" style="max-width:18rem;">
    <div class="card-header">Request Recieved</div>
    <div class="card-body">
    <h4 class="card-title"><?php echo $submitrequest;  ?></h4>
    <a class="btn text-white" href="requests.php">View</a>
</div>
  </div>
</div>
<div class="col-sm-4">
<div class="card text-white bg-success mb-3" style="max-width:18rem;">
    <div class="card-header">Assigned Worked</div>
    <div class="card-body">
    <h4 class="card-title"><?php echo $assignwork;  ?></h4>
    <a class="btn text-white" href="workorder.php">View</a>
</div>
  </div>
</div>


<div class="col-sm-4">
<div class="card text-white bg-info mb-3" style="max-width:18rem;">
    <div class="card-header">No Of Technician</div>
    <div class="card-body">
    <h4 class="card-title"><?php echo $totaltech;  ?></h4>
    <a class="btn text-white" href="technican.php">View</a>
</div>
  </div>
</div>



</div>


<div class="mt-5 text-center me-5">
  <p class="bg-dark text-white p-2">List Of Requests</p>
<?php 

$sql="select *from submitrequest_tb";
$result=$conn->query($sql);
if($result->num_rows>0){
    echo '
    <table class="table">
  <tr>
 <th scope="col">Request Id</th>
 <th scope="col">Name</th>
 <th scope="col">Email</th>
</tr>';

while($row=$result->fetch_assoc()){
  echo '<tr>'; 
  echo '<td>' .$row['request_id'].    '</td>';
  echo '<td>' .$row['request_name'].    '</td>';
  echo '<td>' .$row['request_email'].    '</td>';



  '<tr>';
  
}
'
</table>
      
      
';

}else{
  echo '0 Result';
}


?>

</div>



</div>

</div>  
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