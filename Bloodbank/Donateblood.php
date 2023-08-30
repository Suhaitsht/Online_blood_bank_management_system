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
    <title>Donate Blood Request</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    <link rel="stylesheet" href="Donateblood.css">
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

                    <div class="h3 text-center">DONATE BLOOD REQUEST<?php  $donor_ID = $_SESSION['Did'] ?></div> <br>
                    <?php
                    
                    if(isset($_POST["submit"]))
                    {
                     
                     $unit= 0;
                     $disease= $_POST['Disease'];
                     $date= date('Y.m.d');
                     $status = 0;
                     if(filter_var($donor_ID,FILTER_VALIDATE_INT ))
                     {
                       $sql = "SELECT * FROM `donate_blood` WHERE 	D_id='$donor_ID'";
                       $run = mysqli_query($conn,$sql);
                       $result = mysqli_num_rows($run);
                       if($result>=1)
                       {
                         echo '<script>alert("Your already  Request")</script>';
                         
                       }
                      
                     else {
                     $sql = "INSERT INTO `donate_blood`(`D_id`,`unit`,`D_disease`,`date`,`Status`)
                           VALUES ('$donor_ID','$unit','$disease','$date','$status')";
                        $result = mysqli_query($conn,$sql);
                        if($result)
                        {
                         echo '<script>alert("Request sent")</script>';
                        }
                        
                       }
                    }
                }
 
                   ?>
                    
                    <form action="Donateblood.php" method = "post">
                        <form class="form-box px-3">
                            <div class="row">
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label>Disease(if any)</label>
                                    <input type="text" name="Disease" class="form-control" id="validationDefault03" required>
                                </div>
                            </div><br>
                            <div>
                                <button class="btn btn--radius-2 btn-danger" name= "submit" type="submit">DONATE</button>
                            </div>
                        </form>
                       </div>
                   </div>
</body>
</html>