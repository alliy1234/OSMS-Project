<?php
include('dbconn.php');

if(isset($_REQUEST['rsignup'])){
    if(($_REQUEST['rName']=="")|| ($_REQUEST['rEmail']=="") ||
    ($_REQUEST['rPass']=="")){
        $regmsg='<div class="alert alert-warning mt-2" role="alert"> 
        filled all fields to make your Account <br> Thanks </div>';
    }else{
        
        $uname=$_REQUEST['rName'];
        $uemail=$_REQUEST['rEmail'];
        $upass=$_REQUEST['rPass'];
        $find="select *from requesterlogin_tb where r_email='$uemail'";
        $run=mysqli_query($conn,$find);
        if(mysqli_num_rows($run) > 0) {
            $regmsg='<div class="alert alert-danger mt-2" role="alert">
            Email ALready Excist Try New- Email </div>';
        }else{
            $sql="insert into requesterlogin_tb (r_name,r_email,r_password)
            values('$uname','$uemail','$upass')";
          if($conn->query($sql) == TRUE){
           $regmsg = '<div class="alert alert-success mt-2" role="alert">
           Account SuccessFuly Created </div>';
          }else{
           $regmsg=' <div class="alert alert-danger mt-2" role="alert">
           Unable To Create Account </div>';
          }
   
        }


        
        // $run=mysqli_query($conn,$sql);
        // if($run){
        //   

          
        //     alert(  " Welco0me to our Family");
        //  
        // }
        // // $coon
    }
}
?>


<div class="container pt-5" id="registeration">
    <h2 class="text-capitalize text-center">create an account</h2>
    <div class="row mt-4 mb-4">
        <div class="col-md-6 offset-md-3">
            <form action="" class="shadow-lg p-4" method="POST">
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="name"
                    class="font-weight-bold ps-2">Name</label>
                    <input type="text" name="rName" class="form-control mt-2 mb-2" id="name"
                    placeholder="Name">
                </div>
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="email"
                    class="font-weight-bold ps-2">Email</label>
                    <input type="email" name="rEmail" class="form-control  mt-2" id=""
                    placeholder="Email">
<small class="form-text  pb-2">we'll never share your email with anyone else</small>
                </div>
                  <div class="form-group">
                    <i class="fas fa-key"></i><label for="pass"
                    class="font-weight-bold ps-2">Password</label>
                    <input type="password" name="rPass" class="form-control  mb-2 mt-2" id=""
                    placeholder="Password">  
                </div>
                <button type="submit" class="btn btn-danger mt-5 btn-block 
                shadow-sm font-weight-bold text-capitalize d-grid w-100 " name="rsignup"> sign up </button>
            <em style="font-size:10px;" class="text-capitalize">note - by clicking sign up
        you agree to our terms, data policy and cookies policy</em><br>
        <?php if(isset($regmsg)) {echo $regmsg;} ?>
                    </form>
        </div>
    </div>
</div>