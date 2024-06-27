








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
    <title>Requests</title>
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
<li class="nav-item"><a class="nav-link active" href="requests.php"> <i class="fas fa-align-center"></i>Requests</a></li>
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


<div class="col-sm-4 mb-5">
    <?php $sql="select request_id,request_info,request_desc,request_date from submitrequest_tb" ;
    $result=$conn->query($sql);
    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            echo '<div class="card mt-5 mx-5">';
            echo '<div class="card-header">';
echo 'Request ID:'.$row['request_id'];

            echo '</div>';

echo '<div class="card-body">';
echo '<h5 class="card-title"> Request Info: '. $row['request_info'];   '</h5> ';
echo '<br>'; 
echo '<p class="card-text">'
.$row['request_desc'];
echo '</p>';
echo '<p class="card-text"> Request Date: '
.$row['request_date'];
echo '</p>';

echo '<div class="float-right  me-auto">';
echo '<form action="" method="post">';
echo '<input type="hidden" name="id" value='.$row["request_id"].'>';
echo '<input type="submit" class="btn btn-danger me-3" value="View" name="view">';
echo '<input type="submit" class="btn btn-secondary" value="Closed" name="close">';
echo '</form>';
echo '</div>';

echo '</div>';

            echo '</div>';
        }
    }
    
    
    
    
    ?>
</div>
    


<?php


if(isset($_REQUEST['view'])){



$sql="select *from submitrequest_tb where request_id={$_REQUEST['id']}";
$result=$conn->query($sql);
// $sql="select *from submitrequest_tb where request_id = {$_REQUEST['id']}";
// $result=$conn->query($sql);
$row=$result->fetch_assoc();

}


if(isset($_REQUEST['close'])){
    $sql="delete from submitrequest_tb where request_id={$_REQUEST['id']}";
    $result=$conn->query($sql);

    if( $result=$conn->query($sql) == TRUE){
        echo '<meta http-equiv="refresh" content="0;URL=?closed"/ >';
    }
}




if(isset($_REQUEST['assign'])){
    if(($_REQUEST['requestId'] == "")||($_REQUEST['requestInfo'] == "")||($_REQUEST['requestDesc'] == "")||
    ($_REQUEST['requestName'] == "")||($_REQUEST['requestAddres'] == "")||($_REQUEST['requestAddress'] == "")||
    ($_REQUEST['requestCity'] == "")||($_REQUEST['requestState'] == "")||($_REQUEST['requestZip'] == "")||
    ($_REQUEST['requestEmail'] == "")||($_REQUEST['requestMobile'] == "")||($_REQUEST['assigntechnician'] == "")||
    ($_REQUEST['requestDate'] == "")){
        $msg= '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Filled All Field </div>';
    }else{
$rid=$_REQUEST['requestId'];
$rinfo=$_REQUEST['requestInfo'];
$rdesc=$_REQUEST['requestDesc'];
$rname=$_REQUEST['requestName'];
$radd1=$_REQUEST['requestAddres'];
$radd2=$_REQUEST['requestAddress'] ;
$rcity=$_REQUEST['requestCity'];
$rstate=$_REQUEST['requestState'];
$rzip=$_REQUEST['requestZip'];
$remail=$_REQUEST['requestEmail'];
$rmobile=$_REQUEST['requestMobile'] ;
$rassigntech=$_REQUEST['assigntechnician'];
$rassigndate=$_REQUEST['requestDate'];

$sql="insert into assignwork_tb values (null,'$rid','$rinfo','$rdesc','$rname','$radd1','$radd2','$rcity','$rstate',
'$rzip','$remail','$rmobile','$rassigntech','$rassigndate')";

if($conn->query($sql) == TRUE){
    $msg= '<div class="alert alert-success col-sm-6 ml-5 mt-2">Work Assigned Successfuly</div>';
}else{
    $msg= '<div class="alert alert-danger col-sm-6 ml-5 mt-2">Not Assigned </div>';
}

    }
}
?>


<div class="col-sm-5 mt-5 jumbotron bg-dark-subtle">


<form action="" class="mx-5 " method="POST">

<h5 class="text-center pt-2">AssIgned Work Order Request</h5>



<div class="form-group pt-2">
    <label for="inputRequestInfo">Request ID</label>
    <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request Info" name="requestId"
    value="<?php if(isset($_REQUEST['id'])) echo $_REQUEST['id'];   ?>" readonly >
</div>
<div class="form-group pt-2">
    <label for="inputRequestInfo">Request Info</label>
    <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request Info" name="requestInfo"
    value="<?php if(isset($row['request_info'])) echo $row['request_info'];   ?>" >
</div>


<div class="form-group mt-3">
    <label for="inputRequestDescription">Description</label>
    <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Description" name="requestDesc"
    value="<?php if(isset($row['request_desc'])) echo $row['request_desc'];   ?>">
</div>

<div class="form-group mt-3">
    <label for="inputRequestInfoName">Name</label>
    <input type="text" class="form-control" id="inputRequestInfoName" placeholder="Name"  name="requestName"
     value="<?php if(isset($row['request_name'])) echo $row['request_name'];   ?>">
</div>

<div class="row mt-3 ">

    <div class="form-group col-md-6">
    <label for="inputRequestAddres">Address Line 1</label>
    <input type="text" class="form-control" id="inputRequestAddres" placeholder="House No " name="requestAddres"
     value="<?php if(isset($row['request_add1'])) echo $row['request_add1'];   ?>">
    </div>

    <div class="form-group col-md-6">
    <label for="inputRequestAddress">Address Line 2</label>
    <input type="text" class="form-control" id="inputRequestAddress" placeholder="Railway Calony " name="requestAddress"
     value="<?php if(isset($row['request_add2'])) echo $row['request_add2'];   ?>">
    </div>

</div>


<div class="row mt-3">
    <div class="form-group col-md-5">
        <label for="inputRequestCity">City</label>
        <input type="text" id="inputRequestCity" class="form-control" name="requestCity"
         value="<?php if(isset($row['request_city'])) echo $row['request_city'];   ?>">
    </div>

    <div class="form-group col-md-4">
        <label for="inputRequestState">State</label>
        <input type="text" id="inputRequestState" class="form-control" name="requestState"
         value="<?php if(isset($row['request_state'])) echo $row['request_state'];   ?>">
    </div>

    <div class="form-group col-md-3">
        <label for="inputRequestZip">Zip</label>
        <input type="text" id="inputRequestCity" class="form-control" name="requestZip" onkeypress="isInputNumber(event)"
         value="<?php if(isset($row['request_zip'])) echo $row['request_zip'];   ?>">
    </div>
</div>





<div class="row mt-3">
    <div class="form-group col-md-6">
        <label for="inputRequestEmail">Email</label>
        <input type="email" id="inputRequestEmail" class="form-control" name="requestEmail" 
         value="<?php if(isset($row['request_email'])) echo $row['request_email'];   ?>">
    </div>

    <div class="form-group col-md-5">
        <label for="inputRequestMobile">Mobile</label>
        <input type="text" id="inputRequestMobile" class="form-control" display="none"  name="requestMobile"
        onkeypress="isInputNumber(event)"  value="<?php if(isset($row['request_mobile'])) echo $row['request_mobile'];   ?>">
    </div>

  
</div>
<div class="row mt-3 ">

    <div class="form-group col-md-7">
    <label for="inputRequestAddres">Assign To Technician</label>
    <input type="text" class="form-control" id="inputRequestAddres" placeholder=" " name="assigntechnician"
     value="">
    </div>

    
    <div class="form-group col-md-5">
        <label for="inputRequestDate">Assign Date</label>
        <input type="date" id="inputRequestDate" class="form-control" name="requestDate" 
         value="">
    </div>

</div>






<button type="submit" class="btn btn-warning mt-2" name="assign">Assign</button> 
<button type="reset" class="btn btn-secondary mt-2"> Reset</button>



<?php if(isset($msg)){ echo $msg;}  ?>




</form>

 
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