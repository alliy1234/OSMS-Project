

s
<?php
DEFINE('TITLE','Status');
define('PAGE','checkstatus');
include('include/header.php');

if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];

}else{
    echo "<script> location.href='requesterlogin.php'  </script>";
}






?>


<div class="col-sm-6 mt-3">
<form action="" method="POST" autocomplete="off" class="d-print-none"> 
    <div class="form-group mb-2">
        <label for="checkid">Enter Request ID:</label>
        <input type="number" name="checkid" id="checkid" class="form-control" 
        onkeypress="isInputNumber(event)">
    </div>
    <button type="submit" class="btn btn-danger">Search</button>
</form>



<?php


if(isset($_REQUEST['checkid'])){
    if($_REQUEST['checkid'] ==""){
    echo '<div class="alert alert-warning"> Filled the Field </div>';
}else{



if(isset($_REQUEST['checkid'])){
    $sql="select *from assignwork_tb where request_id= {$_REQUEST['checkid']}";
    $result=$conn->query($sql);
$row=$result->fetch_assoc();



if(isset($row['request_id']) == $_REQUEST['checkid']){

?>

<h3 class="text-center mt-5">Assigned Work Details</h3>
<table class="table table-bordered">
  <tbody>
    <tr>
        <td>Request ID</td>
        <td><?php if(isset($row['request_id'])) echo $row['request_id'];   ?></td>
    </tr>
    <tr>
        <td>Request Info</td>
        <td><?php if(isset($row['request_info'])) echo $row['request_info'];   ?></td>
    </tr>
    <tr>
        <td>Request Desc</td>
        <td><?php if(isset($row['request_desc'])) echo $row['request_desc'];   ?></td>
    </tr>
    <tr>
        <td>Request Name</td>
        <td><?php if(isset($row['request_name'])) echo $row['request_name'];   ?></td>
    </tr>
    <tr>
        <td>Request Addres1</td>
        <td><?php if(isset($row['request_add1'])) echo $row['request_add1'];   ?></td>
    </tr>
    <tr>
        <td>Request Addres2</td>
        <td><?php if(isset($row['request_add2'])) echo $row['request_add2'];   ?></td>
    </tr>
    <tr>
        <td>Request City</td>
        <td><?php if(isset($row['request_city'])) echo $row['request_city'];   ?></td>
    </tr>
    <tr>
        <td>Request State</td>
        <td><?php if(isset($row['request_state'])) echo $row['request_state'];   ?></td>
    </tr>
    <tr>
        <td>Pin Code</td>
        <td><?php if(isset($row['request_zip'])) echo $row['request_zip'];   ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><?php if(isset($row['request_email'])) echo $row['request_email'];   ?></td>
    </tr>
    <tr>
        <td>Mobile</td>
        <td><?php if(isset($row['request_mobile'])) echo $row['request_mobile'];   ?></td>
    </tr>
    <tr>
        <td>Technician Name</td>
        <td><?php if(isset($row['assign_tech'])) echo $row['assign_tech'];   ?></td>
    </tr>
    <tr>
        <td>Assign Date</td>
        <td><?php if(isset($row['assign_date'])) echo $row['assign_date'];   ?></td>
    </tr>
    <tr>
        <td>Customer Sign</td>
    </tr>
    <tr>
        <td>Technician Sign</td>
    </tr>
  </tbody>   
</table>
<div class="text-center mt-2">
    <form action="" class="d-print-none">
        <input type="submit" value="Print" class="btn btn-danger" onClick="window.print()">
<input type="submit" value="Closed" class="btn btn-secondary"> 
    </form> 
 
</div>

<?php  }else{
    echo '<div class="alert alert-info"> Your Request Is Still Pending   </div>';
} 

}
}
}

?>

</div>

<script>
    function isInputNumber(evt){
var ch=string.formCharCode(evt.which);
if(!(/[0-9]/.test(ch))){
    evt.preventDefault();
}
    }
</script>

<?php

include('include/footer.php');

?>
