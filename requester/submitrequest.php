


<?php
define('TITLE','Submit Requeste');
define('PAGE','submitrequest');
include('include/header.php');

include('../dbconn.php');

if($_SESSION['is_login']){
    $rEmail=$_SESSION['rEmail'];

}else{
    echo "<script> location.href='requesterlogin.php'  </script>";
}


if(isset($_REQUEST['submitRequest'])){
  if(($_REQUEST['requestInfo'] =="") || ($_REQUEST['requestDesc'] =="") || ($_REQUEST['requestName'] =="") || 
  ($_REQUEST['requestAddres'] =="") || ($_REQUEST['requestAddress'] =="") || ($_REQUEST['requestCity'] =="") || 
  ($_REQUEST['requestState'] =="") || ($_REQUEST['requestZip'] =="") || ($_REQUEST['requestEmail'] =="") ||
  ($_REQUEST['requestMobile'] =="") || ($_REQUEST['requestDate'] =="") )
  {
    $msg="<div class='alert alert-danger col-sm-6 ml-5 mt-2'> Fill All The Fields  </div>";
    
  }
  else{
    $rinfo=$_REQUEST['requestInfo'];
    $rdesc=$_REQUEST['requestDesc'];
    $rname=$_REQUEST['requestName'];
    $radd1=$_REQUEST['requestAddres'];
    $radd2=$_REQUEST['requestAddress'];
    $rcity=$_REQUEST['requestCity'];
    $rstate=$_REQUEST['requestState'];
    $rzip=$_REQUEST['requestZip'];
    $remail=$_REQUEST['requestEmail'];
    $rmobile=$_REQUEST['requestMobile'];
    $rdate=$_REQUEST['requestDate'];


$sql="insert into submitrequest_tb(request_info,request_desc,request_name,request_add1,request_add2,
request_city,request_state,request_zip,request_email,request_mobile,request_date) 
values ('$rinfo','$rdesc','$rname','$radd1','$radd2','$rcity','$rstate','$rzip','$remail','$rmobile','$rdate') ";
if($conn->query($sql) == TRUE){
$genid=mysqli_insert_id($conn);
    $msg="<div class='alert alert-success col-sm-6 ml-5 mt-2'> Your Request Is Submitted  </div>";
    $_SESSION['myid']=$genid;
    echo "<script> location.href='submitrequestsuccess.php'  </script>";
}else{
    $msg="<div class='alert alert-warning col-sm-6 ml-5 mt-2'> Request Not Submitted  </div>";
}
  
}
}




?>



<!-- start submit request second coulmn -->
<div class="col-sm-9 col-md-10 mt-5">  

<form action="" class="mx-5" method="POST">


<div class="form-group pt-2">
    <label for="inputRequestInfo">Request Info</label>
    <input type="text" class="form-control" id="inputRequestInfo" placeholder="Request Info" name="requestInfo" >
</div>


<div class="form-group mt-3">
    <label for="inputRequestDescription">Description</label>
    <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Description" name="requestDesc">
</div>

<div class="form-group mt-3">
    <label for="inputRequestInfoName">Name</label>
    <input type="text" class="form-control" id="inputRequestInfoName" placeholder="Name"  name="requestName">
</div>

<div class="row mt-3 ">

    <div class="form-group col-md-6">
    <label for="inputRequestAddres">Address Line 1</label>
    <input type="text" class="form-control" id="inputRequestAddres" placeholder="House No " name="requestAddres">
    </div>

    <div class="form-group col-md-6">
    <label for="inputRequestAddress">Address Line 2</label>
    <input type="text" class="form-control" id="inputRequestAddress" placeholder="Railway Calony " name="requestAddress">
    </div>

</div>


<div class="row mt-3">
    <div class="form-group col-md-6">
        <label for="inputRequestCity">City</label>
        <input type="text" id="inputRequestCity" class="form-control" name="requestCity">
    </div>

    <div class="form-group col-md-4">
        <label for="inputRequestState">State</label>
        <input type="text" id="inputRequestState" class="form-control" name="requestState">
    </div>

    <div class="form-group col-md-2">
        <label for="inputRequestZip">Zip</label>
        <input type="text" id="inputRequestCity" class="form-control" name="requestZip" onkeypress="isInputNumber(event)">
    </div>
</div>





<div class="row mt-3">
    <div class="form-group col-md-6">
        <label for="inputRequestEmail">Email</label>
        <input type="email" id="inputRequestEmail" class="form-control" name="requestEmail">
    </div>

    <div class="form-group col-md-3">
        <label for="inputRequestMobile">Mobile</label>
        <input type="text" id="inputRequestMobile" class="form-control" display="none"  name="requestMobile"
        onkeypress="isInputNumber(event)">
    </div>

    <div class="form-group col-md-3">
        <label for="inputRequestDate">Date</label>
        <input type="date" id="inputRequestDate" class="form-control" name="requestDate">
    </div>
</div>







<button type="submit" class="btn btn-warning mt-2" name="submitRequest">Submit</button> 
<button type="reset" class="btn btn-secondary mt-2"> Reset</button>



<?php if(isset($msg)){ echo $msg;}  ?>
</form>

</div>
<!-- end submit request  second column -->









<!-- only numbers input -->

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
