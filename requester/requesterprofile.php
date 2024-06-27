
<?php
define('TITLE','Requester Profile');
define('PAGE','requesterprofile');
include('include/header.php');
include('../dbconn.php');

if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];

}else{
    echo "<script> location.href='requesterlogin.php'  </script>";
}

$sql="select r_name,r_email from requesterlogin_tb  where r_email='$rEmail'";

$res=$conn->query($sql);
if($res->num_rows == 1){
    $row=$res->fetch_assoc();
    $rName=$row['r_name'];
}




if(isset($_REQUEST['nameupdate'])){
    if($_REQUEST['rName']==""){
        // echo "<script> alert('Enter your Name to Save it') </script>";
        $passmsg=' <div class="alert alert-warning col-sm-6 me-5 mt-2" role="alert" >
        Filled all fields </div>';
    }else{
$rName=$_REQUEST['rName'];
$sql="update requesterlogin_tb set r_name ='$rName' where r_email='$rEmail'";
if($conn->query($sql)){
    echo "<script>  alert ('Your Name is Updated Successfully');    </script>";
}else{
    $passmsg=' <div class="alert alert-warning col-sm-6 me-5 mt-2" role="alert" >
       An Error Occured.. Try Again </div>';
}
    }
}







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

<!-- profile are -->

    <div class="col-sm-6 mt-5 me-4"  >
<form action="" method="POST" class="me-5 ms-5">
<div class="form-group">
    <label for="inputEmail">Email</label>
    <input type="email" class="form-control disabled" name="rEmail" id="rEmail" value="<?php echo $rEmail;  ?>" readonly >
</div>

<div class="form-group">
    <label for="rName">Name</label>
    <input type="text" name="rName" class="form-control" id="rName"  value="<?php echo $rName;  ?>">
</div>

 <button type="submit" class="btn btn-danger mt-3" name="nameupdate">Update</button>
 <br>
 <br>
 
 <?php if(isset($passmsg)) { echo $passmsg; }  ?>
</form>
</div>


<!-- end profile are -->



<?php include('include/footer.php');  ?>