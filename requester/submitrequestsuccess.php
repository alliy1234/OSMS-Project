<?php  
define('TITLE','Success');

include('../dbconn.php');
session_start();

if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];

}else{
    echo "<script> location.href='requesterlogin.php'  </script>";
}


$sql="select * from submitrequest_tb where request_id ={$_SESSION['myid']} ";

// $result=mysqli_query($conn,$sql);

$result=$conn->query($sql);
if($result->num_rows ==1){
    $row=$result->fetch_assoc();
    echo "<div class='ms-5 mt-5' style='margin-top:5rem;'>
    <table class='table'>
    <tbody>
    <tr>
    <th>Request Id </th>
    <td>".$row['request_id']."</td>
    </tr>
    
    <tr>
    <th>Name </th>
    <td>".$row['request_name']."</td>
    </tr>

    <tr>
    <th>Email Id </th>
    <td>".$row['request_email']."</td>
    </tr>

    <tr>
    <th>Request Info </th>
    <td>".$row['request_info']."</td>
    </tr>

    <tr>
    <th>Request Description </th>
    <td>".$row['request_desc']."</td>
    </tr>

    <tr>
    <td><form class='d-print-none'> <input class='btn btn-danger' type='submit' value='print'
    onClick='window.print()'> </form> </td>
    </tr>
    </tbody>
    </table> </div>
    
    
    ";
}

// echo "$res";
// if($exe=mysqli_num_rows($result)>0){
  
//     $row=mysqli_fetch_assoc($exe);
    
// }
else{
    echo"faikle
    ";
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE;  ?></title>
     <!-- bootstrap css -->
     <link rel="stylesheet" href="../css/bootstrap.min.css">

<!-- font awesom css -->
<link rel="stylesheet" href="../css/all.min.css">


<!-- cutom   -->
<link rel="stylesheet" href="../css/custom.css">
<style>
    
/* .user a{
    color: black;
}
.active{
color: white;
background-color:#dc3545 ;
}
.user a:hover{
color: #f26571;
} */

</style>
</head>
<body>


<!-- top navbar -->

    <nav class=" navbar navbar-expand-sm navbar-dark bg-danger ps-5 
fixed-top">
        <a href="requesterprofile.php" class="navbar-brand col-sm-3 col-md-2 me-0">OSMS</a> </nav> 
        <!-- </top navbara end -->





<!-- start container-fluid -->

<!-- <div class="container-fluid" style="margin-top:20px;">
    <div class="row">
        <div class="col-sm-2 bg-light sidebar py-5  user"  >  sidebar start -->
            <!-- <div class="sidebar-sticky">
                <ul class="nav flex-column" >
                    <li class="nav-item" style="color:black;"><a href="requesterprofile.php" class="nav-link text-dark ">
                        <i class="fas fa-user "></i>Profile</a></li>

                    <li class="nav-item"><a href="submitrequest.php" class="nav-link text-dark active
                  ">
                        <i class="fab fa-accessible-icon "></i>Submit Request</a></li> 
                    
                    <li class="nav-item"><a href="checkstatus.php" class="nav-link text-dark  
                     " >
                        <i class="fas fa-align center "></i>Service Status</a></li> 
                    
                    <li class="nav-item"><a href="changepassword.php" class="nav-link text-dark
                    ">
                        <i class="fas fa-key "></i>Change Password</a></li>   
                    
                    <li class="nav-item"><a href="logout.php" class="nav-link text-dark 
                    ">
                        <i class="fas fa-sign-out-alt "></i>Logout</a></li>       
                        
                </ul>
            </div>
        </div>  -->
        <!-- sidebar end -->
 
<!-- second column start -->

<!-- second column end -->







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

