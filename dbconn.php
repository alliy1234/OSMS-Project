<?php
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="newosms";
$db_port=3306;

$conn= new mysqli($db_host,$db_user,$db_password,$db_name,$db_port);

// $conn=mysqli_connect("localhost","root","","newosms");
if($conn){

}else{
    echo "connection failed";
}
?>