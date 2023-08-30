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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation History </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    <link rel="stylesheet" href="Donationhistory.css">
</head>
<body>
    <?php
       include "donornavbar.php";
    ?>
    <br><br>
 <?php
  header("refresh: 10");
 ?>
    <?php
       include "donorsidenavbar.php";
    ?>
        <div class="main_content">
            <div class="container">
                <h4>My Donation History <?php  $donor_ID = $_SESSION['Did'] ?></h4>

                <table class="table-responsive-lg">
                    <table class=" table table-hover table-bordered table-striped table-hover text-center">
                        <thead class="thead-dark">
                            <th scope="col">Donor Name</th>
                            <th scope="col">Donor Age</th>
                            <th scope="col">Disease</th>
                            <th scope="col">Blood Group</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Status</th>
                           
                        </thead>
                        <tbody>
                        <?php
                        include "Database.php";
                      
                            $sql = "SELECT donor.D_fname, donor.D_age, donor.D_bloodtype, donate_blood.D_disease,  donate_blood.unit, donate_blood.Status 
                            FROM `donor`,`donate_blood`
                            WHERE (donor.D_id = donate_blood.D_id) and donate_blood.D_id = $donor_ID";
               
                           
                            $res = $conn->query($sql);
                            if($res->num_rows > 0)
                            {
                                foreach($res as $donorDetails)
                                {
                                  echo "<tr>
                                
                                  <td>{$donorDetails['D_fname']}</td>
                                  <td>{$donorDetails['D_age']}</td>
                                  <td>{$donorDetails['D_disease']}</td>
                                  <td>{$donorDetails['D_bloodtype']}</td>
                                  <td>{$donorDetails['unit']}</td>";
                                
                                  if( $donorDetails['Status']==1)
                                  {
                                      echo' <td>Approved</td>';
                                     // echo'<td><p> <a class="btn btn-danger">Reject</a></p>';
                                  }
                                  elseif( $donorDetails['Status']==0)
                                  {
                                      echo'<td>pending</td>';
                                    //  echo'<td><p>  <a class="btn btn-danger"> Reject</a></p>';
                                     // echo'<p> <a class="btn btn-primary" <a>Approve</a></p></td>';
                                 
                                  }
                                  elseif( $donorDetails['Status']==2)
                                  {
                                      echo'<td>cancelled</td>';
                                    //  <td> <p> <a class="btn btn-primary" <a>Approve</a></p></td>';
                                  }
                                 
                                  echo "</tr>";
                                
                                }
                            
                            
                            
                            }
                    
                                ?>
                            
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
</body>

</html>