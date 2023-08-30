<?php
include "Database.php";

if(isset($_POST['D_id']))
{
  
    $D_id = $_POST['D_id'];
   $unit =$_POST['unit'];
  
    $sql = "UPDATE `donate_blood` SET unit =$unit WHERE D_id = $D_id";
    mysqli_query($conn,$sql);
    
}
 header('location:Donorbloodrequestdetailsdoctor.php');
?>