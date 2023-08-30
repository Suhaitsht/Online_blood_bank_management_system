<?php
include "Database.php";
if (isset($_GET['id'])){
  
    $paitent_id=$_GET['id'];

    $sql="UPDATE `doctorbloodrequest`SET `status`=1  WHERE id='$paitent_id'";
    mysqli_query($conn,$sql);
}

header('location: Doctorbloodrequestdetails.php');
?>
