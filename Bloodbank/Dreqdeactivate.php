
<?php
include "Database.php";

  if (isset($_GET['D_id'])){

    $donor_id=$_GET['D_id'];

    $sql="UPDATE `donate_blood` SET  `status`=2 WHERE D_id='$donor_id'";
    mysqli_query($conn,$sql);
  }


  header('location:Donorbloodrequestdetailsdoctor.php');
?>