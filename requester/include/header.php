
<!-- <?php
include('../dbconn.php');
session_start();







// MY WAY oF UPDATING NAME WORKING PROPERLY

// if(isset($_REQUEST['nameupdate'])){
//     $sql="update requesterlogin_tb set r_name='$_REQUEST[rName]' where r_email='$rEmail'";
//     $exe=mysqli_query($conn,$sql);
//     if($exe){
//         echo "<script> alert('Updated Successfuly');   </script>";
//     }
//     else{
//         echo "error occured";
//     }
// }


// // MY WAY  WORKING PROPERLY

// $result=mysqli_query($conn,$sql);
// if($row=mysqli_fetch_assoc($result))
// {
//     $rName=$row['r_name'];
// }

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

<div class="container-fluid" style="margin-top:20px;">
    <div class="row">
        <div class="col-sm-2 bg-light sidebar py-5  user"  > <!-- sidebar start -->
            <div class="sidebar-sticky">
                <ul class="nav flex-column" >
                     <li class="nav-item" style="color:black;"><a href="requesterprofile.php" class="nav-link text-dark 
                    <?php if(PAGE == 'requesterprofile') {echo 'active';}  ?> ">
                        <i class="fas fa-user "></i>Profile</a></li>

                    <li class="nav-item"><a href="submitrequest.php" class="nav-link text-dark 
                    <?php if(PAGE == 'submitrequest') {echo 'active';}  ?> ">
                         <i class="fab fa-accessible-icon "></i>Submit Request</a></li>  
                    
                    <li class="nav-item"><a href="checkstatus.php" class="nav-link text-dark  
                    <?php if(PAGE == 'checkstatus') {echo 'active';}  ?> " >
                        <i class="fas fa-align center "></i>Service Status</a></li> 
                    
                    <li class="nav-item"><a href="changepassword.php" class="nav-link text-dark
                    <?php if(PAGE == 'changepassword') {echo 'active';}  ?> ">
                        <i class="fas fa-key "></i>Change Password</a></li>   
                    
                    <li class="nav-item"><a href="../logout.php" class="nav-link text-dark 
                    ">
                        <i class="fas fa-sign-out-alt "></i>Logout</a></li>       
                        
               
                </ul>
            </div>
        </div> <!-- sidebar end -->
 
<!-- second column start -->

<!-- second column end -->







