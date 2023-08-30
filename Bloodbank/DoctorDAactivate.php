<?php
include "Database.php";

  if (isset($_GET['D_id'])){

    $donorDetails=$_GET['D_id'];

      $sql="UPDATE `donate_blood` SET  `status`=1 WHERE D_id='$donorDetails'";
       mysqli_query($conn,$sql);
  }


  header('location: Donorbloodrequestdetailsdoctor.php');
?>