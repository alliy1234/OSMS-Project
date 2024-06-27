



<?php
DEFINE('TITLE','Change Password');
define('PAGE','changepassword');
include('include/header.php');
include('../dbconn.php');

if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];
}else{
    echo "<script> location.href='RequesterLogin.php' </script>";
}

if(isset($_REQUEST['nameupdate'])){
    if($_REQUEST['rPass']==""){
        $passmsg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Please Enter Paasword  </div>';
    }else{


        $update="update requesterlogin_tb set r_password='$_REQUEST[rPass]' where r_email='$rEmail'";
        if($conn->query($update)== TRUE){
            $passmsg= '<div class="alert alert-success col-sm-6 ml-5 mt-2"> Update SuccessFully  </div>'; 
        }else{
            $passmsg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2"> Error Occured  </div>';
        }
    }
}

?>

















<div class="col-sm-6 mt-5 me-4"  >
<form action="" method="POST" class="me-5 ms-5">
<div class="form-group">
    <label for="inputEmail">Email</label>
    <input type="email" class="form-control disabled" name="rEmail" id="rEmail" value="<?php echo $rEmail;  ?>" readonly >
</div>

<div class="form-group">
    <label for="rName">Password</label>
    <input type="password" name="rPass" class="form-control" id="rPass"  value="">
</div>

 <button type="submit" class="btn btn-danger mt-3" name="nameupdate">Update</button>
 <br>
 <br>
<?php if(isset($passmsg)) echo $passmsg;    ?>

<?php

include('include/footer.php');

?>
