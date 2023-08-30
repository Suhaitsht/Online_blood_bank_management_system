<?php
include "Database.php";
session_start();
if (!isset($_SESSION['Id']))
{
    header("location: Hospital.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hospital</title>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
  <link rel="stylesheet" href="patientdashbord.css">
</head>

<body>

  <?php
    include "Hospitalnavbar.php";
  ?>
  <br><br>
  <?php
    include "Hospitalsidebar.php";
  ?>
  
    <div class="main_content">
      <br><br>
      <div class="container">

      <?php  $Hospital = $_SESSION['Id'] ?>
        <div class="row">
          <div class="col-sm-3">
            <div class="card bg-light">
              <div class="card-body">
                <div class="blood">
                  <i class="fas fa-sync-alt xyz"></i>
                </div><br>
                <div>
                  Total Request Made <br>
                <?php
                  include "Database.php";
                  $Sql = "SELECT * FROM `patient` where $Hospital =Hospital_id";
                  $result= $conn->query($Sql);
                  $hospitalblood_request_count = mysqli_num_rows($result);

                  $total_req_count = $hospitalblood_request_count ; 
                   echo "$total_req_count  ";
                        ?>
                                    
               
                  
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="card bg-light">
              <div class="card-body">
                <div class="blood">
                  <i class="fas fa-sync xyz"></i>
                </div><br>
                <div>
                  Pending Request <br>
                  <?php
                  include "Database.php";
                   $sql= "SELECT status FROM `patient` WHERE Hospital_id=$Hospital and status=0";
                  $result= $conn->query($sql);
                  $hospitalblood_request_count = mysqli_num_rows($result);
                  $total_req_count = $hospitalblood_request_count ; 
                   echo "$total_req_count  ";
                     ?>
                 
                  
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-3">
            <div class="card bg-light">
              <div class="card-body">
                <div class="blood">
                  <i class="fas fa-check-circle xyz"></i>
                </div><br>
                <div>
                  Approved Request<br>
                  <?php
                  include "Database.php";
                  $sql= "SELECT status FROM `patient` WHERE `Hospital_id`=$Hospital and status=1";
                 $result= $conn->query($sql);
                 $hospitalblood_request_count = mysqli_num_rows($result);
                 $total_req_count = $hospitalblood_request_count ; 
                  echo "$total_req_count  ";
                    ?>
                        
                  
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card bg-light">
              <div class="card-body">
                <div class="blood">
                  <i class="fas fa-times-circle xyz"></i>
                </div><br>
                <div>
                  Rejected Request <br>
                  <?php
                  include "Database.php";
                   $sql= "SELECT status FROM `patient` WHERE Hospital_id=$Hospital and status=2";
                   $result= $conn->query($sql);
                   $hospitalblood_request_count = mysqli_num_rows($result);
                  
                  
                   $total_req_count = $hospitalblood_request_count ; 
                   echo "$total_req_count  ";
                     ?>
                  
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</body>

</html>