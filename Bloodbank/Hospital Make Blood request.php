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
    <title> Blood Request</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    <link rel="stylesheet" href="Bloodrequest.css">
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
            <div class="container">
                <div class="card rounded bg-white">
                    <div class="h3 text-center">MAKE BLOOD REQUEST<?php  $hopital_ID = $_SESSION['Id'] ?></div> <br>
                    <?php
                       if(isset($_POST["submit"]))
                       {
                        $pname = $_POST['pname'];
                        $resion= $_POST['reasion'];
                        $disease = $_POST['disease'];
                        $age = $_POST['age'];
                        $blood = $_POST['blood'];
                        $bloodunit = $_POST['unit'];
                        $status = 0;

                        $sql="INSERT INTO `patient`(`Hospital_id`, `paitent_name`, `paitent_reasion`, `paitent_diseas`, `paitent_age`, `paitent_blood`, `paitent_unit`, `status`) VALUES 
                        ('$hopital_ID','$pname','$resion','$disease','$age','$blood ','$bloodunit','$status')";
                        $result = mysqli_query($conn,$sql);
                        if($result)
                        {
                         echo '<script>alert("Request sent")</script>';
                        }
                        else
                        {
                            echo '<script>alert("Request sent notsucsessfulliy ")</script>';
                        }
                        
                       }
                      
                     ?>
                    <form action="Hospital Make Blood request.php" method = "post">
                        <form class="form-box px-2">
                            <div class="row">
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label>Patient Name</label>
                                    <input type="text" class="form-control" name="pname" id="validationDefault03" required>
                                </div>
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label>Reasion</label>
                                    <input type="text" class="form-control" name="reasion" id="validationDefault03" required>
                                </div>
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label>Disease (If any)</label>
                                    <input type="text" class="form-control" name="disease" id="validationDefault03" required>
                                </div>

                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label>Unit (ml)</label>
                                    <input type="text" class="form-control" name="unit" id="validationDefault01" required>
                                </div>
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label>Age</label>
                                    <input type="text" class="form-control" name="age" id="validationDefault01" required>

                                    <div class=" my-md-2 my-3">
                                        <label>Choose Blood Group</label>
                                        <select id="sub" name="blood" required>
                                            <option value="" selected hidden>Choose Blood Group</option>
                                            <option value="A+">A-</option>
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