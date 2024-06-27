


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
    <title>Assets</title>
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
<li class="nav-item"><a class="nav-link active " href="assets.php"> <i class="fas fa-align-center"></i>Assets</a></li>
<li class="nav-item"><a class="nav-link " href="technican.php"> <i class="fas fa-align-center"></i>Technician</a></li>
<li class="nav-item"><a class="nav-link " href="requesters.php"> <i class="fas fa-align-center"></i>Requesters</a></li>
<li class="nav-item"><a class="nav-link" href="sellsreport.php"> <i class="fas fa-table"></i>Sells Report</a></li>
<li class="nav-item"><a class="nav-link " href="workreport.php"> <i class="fas fa-table"></i>Work Report</a></li>
<li class="nav-item"><a class="nav-link " href="changepassword.php"> <i class="fas fa-key"></i>ChangePassword</a></li>
<li class="nav-item"><a class="nav-link " href="../logout.php"> <i class="fas fa-sign-out-alt"></i>Logout</a></li>
        

</ul>
        </div>
    </nav>    <!--- End Sidebar First Column -------------------->













    
    <div class="col-sm-9 col-md-10 text-center mt-5 ">
    <p class="bg-dark text-white p-2">Products/Parts Detail</p>
<?php
$sql="select *from assess_tb";
$result=$conn->query($sql);
if($result->num_rows > 0){
    echo '<table class="table">';
     echo '<tr>' ;
     echo '<th scope="col">Product Id </th>';
         echo '<th scope="col">Name </th>';
             echo '<th scope="col"> Dop </th>';
                 echo '<th scope="col">Available</th>';
                 echo '<th scope="col">Total</th>';
                 echo '<th scope="col">Original Cost Each</th>';
                 echo '<th scope="col">Selling Cost Each</th>';
                 echo '<th scope="col">Action</th>';
     echo '</tr>';
     while($row=$result->fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$row["pid"].    '</td>';
         echo '<td>'.$row["pname"].    '</td>';
         echo '<td>'.$row["pdop"].    '</td>';
         echo '<td>'.$row["pava"].    '</td>';
          echo '<td>'.$row["ptotal"].    '</td>';
          echo '<td>'.$row["poriginalcost"].    '</td>';
          echo '<td>'.$row["psellingcost"].    '</td>';
         echo '<td>';   
         echo  '<form action="editproduct.php" method="POST" class="d-inline">  ';
      echo '<input type="hidden" name="id" value='.$row["pid"].'> <button type="submit" class="btn btn-info mr-3" name="edit" value="Edit"><i class="fas fa-pen"> </i></button> ';
         
         
         echo '</form>';
         
         echo  '<form action=""  method="POST" class="d-inline">  ';
         echo '<input type="hidden" name="ide" value='.$row["pid"].'> 
         <button type="submit" class="btn btn-secondary mr-3" name="delete" value="Delete">
         <i class="far fa-trash-alt"> </i></button> ';
            
            
            echo '</form>';
            
            echo  '<form action="sellproduct.php" method="POST" class="d-inline">  ';
            echo '<input type="hidden" name="id" value='.$row["pid"].'> <button type="submit" class="btn btn-warning mr-3"
             name="issue" value="issue"><i class="fas fa-handshake"> </i></button> ';
               
               
               echo '</form>';


         echo'</td>';
          echo '</tr>';
     }
    echo '</table>';
}else{
    echo '0 Results';
}


?>









<?php

if(isset($_REQUEST['delete'])){
    $sql="delete from assess_tb where pid={$_REQUEST['ide']}";
    // if($conn->query($sql)==TRUE){
    //     echo '<meta http-equiv="refresh" content="0;URL=?delete" />';
    // }else{
    //     echo 'Unable To Delete';
    // }
    if(mysqli_query($conn,$sql) == TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?delete" />';
    }else{
            echo 'Unable To Delete';
        }
}


?>





<br>
<br>

<div><a href="insertprod.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a></div>

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