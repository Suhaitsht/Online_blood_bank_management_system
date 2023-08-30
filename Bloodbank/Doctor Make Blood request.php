<?php
  session_start();
  include "Database.php";
  if (!isset($_SESSION['ID']))
{
    header("location: Doctor.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Blood Request</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    <link rel="stylesheet" href="Bloodrequest.css">
</head>

<body>
        <?php
         include  'Doctornavbar.php';
           ?>
   
    <br><br>
    <?php
         include  'Doctorsidenavbar.php';
        ?> 
        <div class="main_content">
            <div class="container">
                <div class="card rounded bg-white">

                    <div class="h3 text-center">MAKE BLOOD REQUEST <?php  $doctor_ID = $_SESSION['ID'] ?></div> <br>
                    <?php
                     if(isset($_POST["submit"]))
                     {
                      $name = $_POST['name'];
                      $resion= $_POST['resion'];
                      $disease = $_POST['disease'];
                      $unit = $_POST['unit'];
                      $age = $_POST['age'];
                      $blood = $_POST['bloodtype'];
                      $status = 0;
                      
                      $sql = "insert into `doctorbloodrequest`( `D_id`,`name`, `resion`, `P_diseas`,`unit`, `p_age`, `blood_types`,`Status`)
                      VALUES ($doctor_ID,'$name','$resion','$disease','$unit','$age',' $blood','$status')";

                      $result = mysqli_query($conn,$sql);
                      if($result)
                      {
                       echo '<script>alert("Request sent")</script>';
                      }
                      
                     }
                     
       
                 ?>
                    
                        <form class="form-box px-2" action = "Doctor Make Blood request.php" method = "post">
                            <div class="row">
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label>Patient Name</label>
                                    <input type="text" class="form-control" name="name"  required autocomplete ="off">
                                </div>
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label>Reason</label>
                                    <input type="text" class="form-control"  name="resion"  required  autocomplete ="off">
                                </div>
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label>Disease (If any)</label>
                                    <input type="text" class="form-control" name="disease"required  autocomplete ="off">
                                </div>

                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label for="validationDefault01" class="form-label">Unit (ml)</label>
                                    <input type="text" class="form-control" name="unit"  required autocomplete ="off">
                                </div>
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label for="validationDefault01" class="form-label">Age</label>
                                    <input type="text" class="form-control" name="age"  required  autocomplete ="off">

                                    <div class=" my-md-2 my-3">
                                        <label>Choose Blood Group</label>
                                        <select id="sub" name="bloodtype" required  autocomplete ="off">
                                            <option value="" selected hidden>Choose Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                        </select>
                                    </div><br>

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