<?php

include('../dbconn.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
$aEmail=$_SESSION['aEmail'];
}else{
  echo "<script> location.href='adminlogin.php';     </script>";
}
?>


<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Product</title>
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





<div class="col-sm-6 mt-5  mx-3 bg-dark-subtle">
    <h3 class="text-center pt-3">Customer Bill</h3>
    <?php 
    if(isset($_REQUEST['issue'])){
        $sql="select *from assess_tb where pid={$_REQUEST['id']}";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
    }


    if(isset($_REQUEST['psubmit'])){
        if(($_REQUEST['pid']=="")||($_REQUEST['cname']=="")|| ($_REQUEST['cadd']=="")||($_REQUEST['pname']=="")||
        ($_REQUEST['pava']=="")||($_REQUEST['pquantity']=="")|| ($_REQUEST['pfinalcost']=="")||
         ($_REQUEST['totalcost']=="")||($_REQUEST['inputdate']=="")){
            echo "Filled All fields";
        }else{
            $pid=$_REQUEST['pid'];
            $pava=$_REQUEST['pava'] - $_REQUEST['pquantity'];
            $cname=$_REQUEST['cname'];
        $cadd=$_REQUEST['cadd'];
        $pname=$_REQUEST['pname'];
        $cpquantity=$_REQUEST['pquantity'];

        $pfinalcost=$_REQUEST['pfinalcost'];
           $ptotalcost=$_REQUEST['totalcost'];
           $pdate=$_REQUEST['inputdate'];
            

            $sql=" insert into customer_tb  values
            (null,'$cname','$cadd','$pname',$cpquantity,$pfinalcost,$ptotalcost,'$pdate')";
             $res=mysqli_query($conn,$sql);
            if($res==TRUE){
                $genid=mysqli_insert_id($conn);
                session_start();
                $_SESSION['myid']=$genid;
                echo "<script> location.href='productsellsuccess.php'   </script>";
            }
            $sqlupd= "update assess_tb set pava='$pava' where pid='$pid'";
            $conn->query($sqlupd);

            
            
           
        }
    }
    ?>

<form action="" method="POST" class="">


<div class="form-group">
        <label for="">Product Id</label>
        <input type="text" name="pid" class="form-control " id="pid"  value=
        "<?php if(isset($row['pid'])) echo $row['pid'];    ?>" readonly>
    </div>


    <div class="form-group">
        <label for="Cname">Customer Name</label>
        <input type="text" name="cname" class="form-control">
    </div>

    <div class="form-group">
        <label for="Cadd">Customer Address</label>
        <input type="text" name="cadd" class="form-control">
    </div>


<div class="form-group">
        <label for="pname">Product Name</label>
        <input type="text" class="form-control" id="pname" name="pname"
        value="<?php if(isset($row['pname'])) echo $row['pname'];    ?>" >
    </div>
  
    <div class="form-group">
        <label for="pava">Available</label>
        <input type="number" class="form-control" id="pava" name="pava"
        value=       "<?php if(isset($row['pava'])) echo $row['pava'];    ?>" >
    </div>
  
    <div class="form-group">
<label for="pquantity">Quantity</label>
<input type="number" name="pquantity" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="pselling">Seling Cost Each</label>
        <input type="number" class="form-control" id="pfinalcost" name="pfinalcost"
        value=       "<?php if(isset($row['psellingcost'])) echo $row['psellingcost'];    ?>" >
    </div>
    <div class="form-group">
        <label for="totalcost">Total Price</label>
        <input type="number" name="totalcost" class="form-control">
    </div>
    <div class="form-group col-md-4">
        <label for="inputDate">Date</label>
        <input type="date" class="form-control" name="inputdate">
    </div>
    <br>
    <div class="text-center">
        <button type="submit" class="btn btn-danger me-3" name="psubmit">Submit</button>
        <a href="assets.php" class="btn btn-secondary">Close</a>
    </div>














</form>

<?php if(isset($msg)) echo $msg;
?>


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