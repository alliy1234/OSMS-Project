<?php
// login code

include('../dbconn.php');
session_start();
if(!isset($_SESSION['is_login'])){


if(isset($_REQUEST['login'])){
// if(($_REQUEST['rEmail']=="")|| ($_REQUEST['rPassword'])==""){
// $errmsg='<div class="alert alert-warning mt-2" role="alert"> 
// Please Filled all fields for login..</div>';
// }else{
//     $lEmail=$_REQUEST['rEmail'];
//     $check="select *from requesterlogin_tb where r_email='$lEmail'";
//     $exe=mysqli_query($conn,$check);
//     $num=mysqli_num_rows($exe);
//     if($num){
//         $res=mysqli_fetch_assoc($exe);
//         if($_REQUEST['rPassword'] === $res['r_password']){
//             echo "login successful";
//         }else{
//             echo "password not match";
//         }
//     }else{
//         echo "email does not match..";
//     }
// }




// now geeky login way
// mysqli_real_escape_string it make it secure
// trim (agar koi login ti,e space da tu usko ignore krta ha)

$rEmail=mysqli_real_escape_string($conn,trim($_REQUEST['rEmail']));
$rPass=mysqli_real_escape_string($conn,trim($_REQUEST['rPassword']));

$sql="select r_email, r_password from requesterlogin_tb where r_email='".$rEmail."' AND r_password='".$rPass."'
limit 1";
$result=$conn->query($sql);
if($result->num_rows == 1){
    $_SESSION['is_login'] = true;
    $_SESSION['rEmail'] = $rEmail;
    // $_SESSION['rName'] = $r_name;
//   header('location:requesterprofile.php');
echo  "<script> location.href='requesterprofile.php'; </script>";
    
}else{
    $errmsg='<div class="alert alert-warning mt-2" role="alert"> 
  LogIn Failed...</div>';
}

}


} //login check session

else{
    echo  "<script> location.href='requesterprofile.php'; </script>";
}
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
<i class="fas fa-user-secret text-danger me-2"></i>Requester Area (Demo)</p>

<!-- login form start -->
<div class="container-fluid ">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-4">
            <form action="" class="shadow-lg p-4" method="POST" >
                <div class="form-group">
                    <i class="fas fa-user "></i> <label for="email"
                    class="font-weight-bold  pe-2">Email</label>
                    <input type="email" name="rEmail" placeholder="Email"
                     id="" class="form-control mt-2  " >
                     <small class="text-capitalize form-text">we'll never share your email with anyone else..</small>
                
                </div>

                <div class="form-group mt-1">
                    <i class="fas fa-key "></i> <label for="pass"
                    class="pe-2">Password</label>
                    <input type="password" class="form-control mt-2" placeholder="Password"
                    name="rPassword">
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