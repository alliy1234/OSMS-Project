

<?php 



include('../dbconn.php');
session_start();
if(!isset($_SESSION['is_adminlogin'])){


if(isset($_REQUEST['login'])){



$aEmail=mysqli_real_escape_string($conn,trim($_REQUEST['aEmail']));
$aPass=mysqli_real_escape_string($conn,trim($_REQUEST['aPass']));

$sql="select a_email, a_password from adminlogin_tb where a_email='".$aEmail."' AND a_password='".$aPass."'
limit 1";
$result=$conn->query($sql);
if($result->num_rows == 1){
    $_SESSION['is_adminlogin'] = true;
    $_SESSION['aEmail'] = $aEmail;
    // $_SESSION['rName'] = $r_name;
//   header('location:requesterprofile.php');
echo  "<script> location.href='admindashboard.php'; </script>";
    
}else{
    $errmsg='<div class="alert alert-warning mt-2" role="alert"> 
  LogIn Failed...</div>';
}

}


}
 //login check session

else{
    echo  "<script> location.href='index.php'; </script>";
}






















// include('../dbconn.php');
// if(isset($_REQUEST['login'])){

//     if(($_REQUEST['aEmail']=="")|| ($_REQUEST['aPass']=="")){
// $errmsg='<div class="alert alert-danger">Please Filled All Fields </div>';
//     }
//     else{

//         $aEmail=mysqli_real_escape_string($conn,trim($_REQUEST['aEmail']));
//         $aPass=mysqli_real_escape_string($conn,trim($_REQUEST['aPass']));
        
//         $sql="select a_email, a_password from adminlogin_tb where a_email='".$aEmail."' AND a_password='".$aPass."'
//         limit 1";
//         $result=$conn->query($sql);
//         if($result->num_rows == 1){
//             $_SESSION['is_login'] = true;
//             $_SESSION['aEmail'] = $aEmail;
//             // $_SESSION['rName'] = $r_name;
//         //   header('location:requesterprofile.php');
//         echo  "<script> location.href=''; </script>";
            
//         }else{
//             $errmsg='<div class="alert alert-warning mt-2" role="alert"> 
//           LogIn Failed...</div>';
//         }
        
//         }
        
        
//         } //login check session     
//         else{
//             echo  "<script> location.href='admindashboard.php'; </script>";
//         }   




    // else{
    //     $aEmail=$_REQUEST['aEmail'];
    //     $select="select *from adminlogin_tb where a_email = '$aEmail'";
    //     $run=mysqli_query($conn,$select);
    //     $num=mysqli_num_rows($run);
    //     $che=mysqli_fetch_assoc($run);
    //     if($_REQUEST['aPass']==$che['a_password']){

    //         echo "<script> window.location.href='admindashboard.php'     </script>";
    //     }else{
    //         $errmsg='<div class="alert alert-danger">PASSWORD Does Not Matched </div>';  
    //     }
        
    // }

// }




?>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">


    

    <!-- font awesom css -->
    <link rel="stylesheet" href="../css/all.min.css">

</head>
<body>
    <div class="mt-5 mb-2 text-center font-weight-bold" style="font-size:30px;
    font-wight:bold;">
    <i class="fas fa-stethoscope"></i>
        <span class="text-capitalize">Online Service management system</span>
    </div>
    <p class="text-center" style="font-size:20px;">
<i class="fas fa-user-secret text-danger me-2"></i>Admin Area (Demo)</p>

<!-- login form start -->
<div class="container-fluid ">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-4">
            <form action="" class="shadow-lg p-4" method="POST" >
                <div class="form-group">
                    <i class="fas fa-user "></i> <label for="email"
                    class="font-weight-bold  pe-2">Email</label>
                    <input type="email" name="aEmail" placeholder="Email"
                     id="" class="form-control mt-2  " >
                     <small class="text-capitalize form-text">we'll never share your email with anyone else..</small>
                
                </div>

                <div class="form-group mt-1">
                    <i class="fas fa-key "></i> <label for="pass"
                    class="pe-2">Password</label>
                    <input type="password" class="form-control mt-2" placeholder="Password"
                    name="aPass">
                </div>

                <button type="submit" name="login" class="btn btn-outline-danger
                mt-4  shadow-sm font-weight-bold btn-block w-100">Login</button>
            <br>
                <?php if(isset($errmsg)) echo $errmsg; ?>
            </form>
            <div class=" text-center mt-4"><a href="../index.php"
            class="btn btn-success font-weight-bold shadow-sm">Back To Home</a></div>
        </div>
    </div>
</div>





<!-- login form end -->



    <!-- jquery files -->
    <script src="../js/jquery.min.js"></script>
<!-- popper js -->
    <script src="../js/popper.min.js"></script>
    <!-- boot js -->
    <script src="../js/popper.min.js"></script>
    <!-- font awesome js -->
     <script src="../js/all.min.js"></script>
</body>
</html>