
<?php
include "Database.php";

  if (isset($_GET['p_id'])){

    $paitent_id=$_GET['p_id'];

      $sql="UPDATE `donorblood_request` SET  `status`=2 WHERE p_id='$paitent_id'";
       mysqli_query($conn,$sql);
  }


  header('location:BloodRequestDetaails.php');
?>