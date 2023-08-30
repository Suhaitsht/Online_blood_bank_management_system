<?php
include "Database.php";
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
    <title> Blood Request</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    <link rel="stylesheet" href="Bloodrequest.css">
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
            <div class="container">
                <div class="card rounded bg-white">

                

                    <div class="h3 text-center">MAKE BLOOD REQUEST<?php  $donor_ID = $_SESSION['Did'] ?></div> <br>
                    <?php
                     if(isset($_POST["submit"]))
                     {
                      $pname = $_POST['Pname'];
                      $resion= $_POST['resion'];
                      $disease = $_POST['disease'];
                      $unit = $_POST['unit'];
                      $age = $_POST['age'];
                      $blood = $_POST['blood'];
                      $Status =0;
                      
                      $sql = "insert into `donorblood_request` ( `donor_id`,`P_name`, `reasion`, `disease`, `unit`, `age`, `bloodtype`,`Status`)
                      VALUES (' $donor_ID',' $pname',' $resion','$disease','$unit','$age',' $blood','$Status')";

                      $result = mysqli_query($conn,$sql);
                      if($result)
                      {
                       echo '<script>alert("Request sent")</script>';
                      }
                      
                     }
                     
       
                 ?>
                        <form class="form-box px-2" action = "Make Blood request.php"method = "post">
                            <div class="row">
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label>Paitent Name</label>
                                    <input type="text" class="form-control" name="Pname" id="validationDefault03" required>
                                </div>
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label>Reason</label>
                                    <input type="text" class="form-control" name="resion" id="validationDefault03" required>
                                </div>
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label>Disease (If any)</label>
                                    <input type="text" class="form-control" name="disease" id="validationDefault03" required>
                                </div>

                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label for="validationDefault01" class="form-label">Unit (ml)</label>
                                    <input type="text" class="form-control" name="unit" id="validationDefault01" required>
                                </div>
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label for="validationDefault01" class="form-label">Age</label>
                                    <input type="text" class="form-control" name="age" id="validationDefault01" required>

                                    <div class=" my-md-2 my-3">
                                        <label>Choose Blood Group</label>
                                        <select id="sub" name="blood" required>
                                            <option selected hidden>Choose Blood Group</option>
                                            <option value="A">A+</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                        </select>
                                    </div>

                                    <div>
                                        <button class="btn btn--radius-2 btn-danger" name="submit" type="submit">REQUEST</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    </form>
               </div>
        </body>
</html>