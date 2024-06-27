








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
    <title>Work Order</title>
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
<li class="nav-item"><a class="nav-link active " href="workorder.php"> <i class="fab fa-accessible-icon"></i>Work Order</a></li>
<li class="nav-item"><a class="nav-link " href="requests.php"> <i class="fas fa-align-center"></i>Requests</a></li>
<li class="nav-item"><a class="nav-link " href="assets.php"> <i class="fas fa-align-center"></i>Assets</a></li>
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
$sql="select *from assignwork_tb    ";
$result=$conn->query($sql);
if($result->num_rows > 0){
    echo '<table class="table">';
echo '<thead>';
echo '<tr>';
echo '<th scope="col">Req ID</th>';
echo '<th scope="col">Req Info</th>';
echo '<th scope="col">Req Desc</th>';
echo '<th scope="col">Name</th>';
echo '<th scope="col">Address</th>';
echo '<th scope="col">City</th>';
echo '<th scope="col">Mobile</th>';
echo '<th scope="col">Technician</th>';
echo '<th scope="col">Assign Date</th>';
echo '<th scope="col">Action</th>';
echo '</tr>';
echo '</thead>';




echo '<tbody>';
while($row=$result->fetch_assoc()){
    echo '<tr>';
echo '<td>'.$row['request_id'].'</td>';
echo '<td>'.$row['request_info'].'</td>';
echo '<td>'.$row['request_desc'].'</td>';
echo '<td>'.$row['request_name'].'</td>';
echo '<td>'.$row['request_add1'].'</td>';
echo '<td>'.$row['request_city'].'</td>';
echo '<td>'.$row['request_mobile'].'</td>';
echo '<td>'.$row['assign_tech'].'</td>';
echo '<td>'.$row['assign_date'].'</td>';
echo '<td>';
echo '<form action="viewassignwork.php" method="POST" class=" ">';
echo '<input type="hidden" name="id" value='.$row['request_id'].'>    <button class="btn btn-warning" name="view" value="view" type="submit"> <i class="far fa-eye">   
</i> </button>';
echo '</form>';
echo '<form action="" method="POST" class=" ">';
echo '<input type="hidden" name="id" value='.$row['request_id'].'>    <button class="btn btn-danger" name="Delete" value="Delete" type="submit"> <i class="far fa-trash-alt">   
</i> </button>';
echo '</form>';
echo '</td>';
    echo '</tr>';
}

echo '</tbody>';
    echo '</table>';
}else{
    echo '0 Result';
}




if(isset($_REQUEST['Delete'])){
    $sql="delete from assignwork_tb where request_id ={$_REQUEST['id']}";
    if($conn->query($sql)==TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
    }else{
        echo "Unable to Delete";
    }
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