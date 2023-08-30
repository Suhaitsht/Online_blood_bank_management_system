<?php
include "Database.php";
if (isset($_GET['paitent_id'])){
  
    $paitent_id=$_GET['paitent_id'];

    $sql="UPDATE `patient` SET `status`=1  WHERE paitent_id='$paitent_id'";
    mysqli_query($conn,$sql);
}

header('location:Hospitalreqestdetails.php');
?>
