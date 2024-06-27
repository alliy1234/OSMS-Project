<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boo5ts5trap css -->
<link rel="stylesheet" href="css/bootstrap.min.css">

 <!-- fon5tawesome css -->
<link rel="stylesheet" href="css/all.min.css">

<!-- google font -->

<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

 <!-- custom css -->
 <link rel="stylesheet" href="css/custom.css">

    <title>OSMS</title>
</head>
<body>
    
<!-- s5tar5t naviga5tion -->
<nav class="navbar navbar-expand-sm navbar-dark bg-danger ps-5 
fixed-top">
<a href="index.php" class="navbar-brand">OSMS</a>
<span class="navbar-text">Customer's Happines Is Our Aim</span>
<button type="button" class="navbar-toggler" data-toggle="collapse"
data-target="#mymenu">
<span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="mymenu">
    <ul class="navbar-nav ps-5 custom-nav">
<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
<li class="nav-item"><a href="#service" class="nav-link">Services</a></li>
<li class="nav-item"><a href="#registeration" class="nav-link">Registeration</a></li>
<li class="nav-item"><a href="requester/requesterlogin.php" class="nav-link">Login</a></li>
<li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>

    </ul>
</div>
</nav>

<!-- end naviga5tion -->




<!-- background-image:url(images/bg img.jpg); -->

<!-- s5tar5t header -->
<!-- <header class="jumbotron back-image"
 style=""> -->
<div class="set">
    <h1 class="text-uppercase text-danger font-weight-bold">welcome to osms</h1>
    <p class="font-italic text-white">Customer's Happines Is Our Aim</p>
    <a href="requester/requesterlogin.php" class="btn btn-success me-4 ">login</a>
    <a href="#registeration" class="btn btn-danger me-4 ">sign up</a>
</div>
</header>

<!-- /end header -->


<!-- in5troduc5tion sec5tion -->

<div class="container bg-info mt-3">
    <div class="jumb">
        <h3 class="text-center " style="padding-top:3rem;">OSMS Services</h3>
    <p style="padding-bottom:3rem;">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Praesentium expedita dignissimos neque molestiae consequatur, aut unde voluptatum obcaecati incidunt, similique iste harum inventore ipsum voluptates exercitationem, sapiente quo qui sint! Itaque dolorem saepe et omnis, at corrupti doloremque! Incidunt odio maiores ipsam consequatur, modi, nemo adipisci reiciendis impedit laudantium, non unde recusandae. Reprehenderit delectus sed, sit vitae illo voluptatum commodi, doloremque optio cumque eligendi ex nisi nesciunt eum. Aut sit quia pariatur eum perferendis ex numquam labore nam magni tempore eligendi quos laudantium molestias dicta dolorum expedita voluptate sunt, sequi distinctio ad a id. Pariatur sit eum rem. Eius, neque.
    </p>
    </div>
</div>


<!-- in5troduc5tion sec5tion end -->





<!-- service sec5tion s5tar5t -->
<div class="container text-center border-bottom" id="service">
    <h2 class="text-capitalize">our Services</h2>
    <div class="row mt-4 mb-4">
        <div class="col-sm-4 ">
            <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
            <h4 class="text-capitalize">electronic apliances</h4>
        </div>
        <div class="col-sm-4 ">
            <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
            <h4 class="text-capitalize">preventive maintenance</h4>
        </div>
        <div class="col-sm-4 ">
            <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
            <h4 class="text-capitalize">fault repair</h4>
        </div>
    </div>
</div>



<!-- service sec5tion end -->





<!-- registeration form start  -->

<?php include ('userregistration.php')  ?>


<!-- registeration form end  -->




<!-- happy customers start -->


<div class="bg-danger jumbotron">
<div class="container">
<h2 class="text-capitalize text-center pt-5 text-white">Happy Customers</h2>
    <div class="row mt-5 mb-5">
        <div class="col-lg-3 col-sm-6 mb-5">
            <div class="card shadow-lg mb-2">
                <div class="card-body text-center">
                    <img src="images/review 1.jpg" alt="review1" class="img-fluid"
                    style="border-radius:50%" width="100px" height="100px">
                <h4 class="card-title">Jennifer Lowerence </h4>
                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti, magni?</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-5">
            <div class="card shadow-lg mb-2">
                <div class="card-body text-center">
                    <img src="images/review 2.jpg" alt="review1" class="img-fluid"
                    style="border-radius:50%" width="100px" height="100px">
                <h4 class="card-title text-capitalize">sasha flair </h4>
                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti, magni?</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-5">
            <div class="card shadow-lg mb-2">
                <div class="card-body text-center">
                    <img src="images/review 1.jpg" alt="review1" class="img-fluid"
                    style="border-radius:50%" width="100px" height="100px">
                <h4 class="card-title">Jennifer Lowerence </h4>
                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti, magni?</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 mb-5">
            <div class="card shadow-lg mb-2">
                <div class="card-body text-center">
                    <img src="images/review 2.jpg" alt="review1" class="img-fluid"
                    style="border-radius:50%" width="100px" height="100px">
                <h4 class="card-title text-capitalize">sasha flair </h4>
                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Deleniti, magni?</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<!-- happy customers end -->







<!-- contact us start -->

<div class="container" id="contact">
    <h2 class="text-center mb-4 mt-5 text-capitalize">contact us</h2>
    <div class="row">
       
            <!-- s5tar5t firs5t column  -->
<?php include('contactform.php') ?>
        <!-- </div> end firs5t column -->

<!-- s5tar5t second column -->
<div class="col-md-4 text-capitalize text-center">
<strong> headquarter: </strong><br>
osms pvt ltd, <br>
ashok nagar ranchi <br>
jharkhand -434567 <br>
phone: +0000000000 <br>
<a href="#" target="_blank">www.osms.com</a><br>
<br> <br> 

<strong> headquarter: </strong><br>
osms pvt ltd, <br>
ashok nagar ranchi <br>
jharkhand -434567 <br>
phone: +0000000000 <br>
<a href="#" target="_blank">www.osms.com</a><br>
<br> <br> 
<!-- end second column -->

    </div>
</div>
</div>

<!-- contact us end -->



<!-- start footer -->
<div class=" container-fluid  bg-danger mt-5 text-white" >
    <div class="container">
        <div class="row py-3">
            <div class="col-md-6"> <!-- start first column -->
<span class="text-capitalize ps-2">follow us:</span>
<a href="#" target="_blank" class="pe-2  fi-color"><i class="fab fa-facebook-f">
</i></a>
<a href="#" target="_blank" class="pe-2 fi-color"><i class="fab fa-twitter">
</i></a>
<a href="#" target="_blank" class="pe-2 fi-color"><i class="fab fa-youtube">
</i></a>
<a href="#" target="_blank" class="pe-2 fi-color"><i class="fab fa-google-plus-g">
</i></a>
            </div> <!-- end first column -->
        
            <div class="col-md-6 text-right"><!-- start second column -->
<small class="text-capitalize">designed by geekyshows &copy; 2023</small>
<small class="text-capitalize ml-2"><a href="admin/adminlogin.php">admin login</a></small>        
</div>   <!-- end second column -->  
        </div>
    
</div>
</div>




<!-- end footer -->




<!-- javascript -->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
</body>
</html>