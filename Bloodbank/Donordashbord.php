<?php
  session_start();
  if(!isset($_SESSION['Did'])) 
  {
    header("location:Donornew.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DONOR</title>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
  <link rel="stylesheet" href="Donordashbord.css">
</head>

<body>


        <?php
         include "donornavbar.php";
         ?>
  <br><br>
        <?php
         include "donorsidenavbar.php";
         ?>
  <div class="main_content">
    <br><br>
    <div class="container">


      <div class="row">

        <div class="col-sm-3">
          <div class="card bg-light">
            <div class="card-body">
              <div class="blood">
                <i class="fas fa-sync-alt xyz"></i>
              </div><br>
              <div>
               Total Request Made <?php  $donor_ID = $_SESSION['Did'] ?> <br>
                <?php
                   include "Database.php";
               //select donor id in donateblood table
              $Sql = "SELECT * FROM `donate_blood` where $donor_ID =D_id";
              $result= $conn->query($Sql);
              $donorblood_request_count = mysqli_num_rows($result);
              
               //select donor id in donorblood request table
               $Sql = "SELECT * FROM `donorblood_request` where $donor_ID =donor_id";
               $result= $conn->query($Sql);
               $donate_blood_count = mysqli_num_rows($result);
               
               // add two table id into one variable
              $total_req_count =  $donate_blood_count + $donorblood_request_count ; 
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
               // select donate blood table particular donor id and status0
               $Sql = "SELECT Status FROM `donate_blood` WHERE $donor_ID=D_id and Status=0";
               $result= $conn->query($Sql);
               $donorblood_request_count = mysqli_num_rows($result);
              
              // select donate blood request table particular donor id and status0
               $Sql = "SELECT Status FROM `donorblood_request` WHERE $donor_ID=donor_id and Status=0";
               $result= $conn->query($Sql);
               $donate_blood_count = mysqli_num_rows($result);
               // count two table 

               $total_req_count =  $donorblood_request_count + $donate_blood_count ; 
               echo "$total_req_count   ";




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

               $Sql = "SELECT  Status FROM `donorblood_request` WHERE  $donor_ID=donor_id and Status = 1";
               $result= $conn->query($Sql);
               $donorblood_request_count = mysqli_num_rows($result);
               

               $Sql = "SELECT  Status FROM `donate_blood` WHERE  $donor_ID=D_id and Status = 1";
               $result= $conn->query($Sql);
               $donate_blood_count = mysqli_num_rows($result);
               $total_req_count =  $donorblood_request_count + $donate_blood_count ; 
               echo "$total_req_count   ";
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

               $Sql = "SELECT  Status FROM `donorblood_request` WHERE $donor_ID=donor_id and Status = 2";
               $result= $conn->query($Sql);
               $donorblood_request_count = mysqli_num_rows($result);
               $total_req_count =  $donorblood_request_count ; 

               $Sql = "SELECT  Status FROM `donate_blood` WHERE $donor_ID=D_id and Status = 2";
               $result= $conn->query($Sql);
               $donate_blood_count = mysqli_num_rows($result);
               $total_req_count =  $donorblood_request_count + $donate_blood_count ; 
               echo "$total_req_count   ";
               ?>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>