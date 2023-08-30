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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Request History </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    <link rel="stylesheet" href="Donationhistory.css">
</head>

</style>

<body>
   <?php
        include "Hospitalnavbar.php";
   ?>
    <br><br>
    <?php
         include "Hospitalsidebar.php";
        ?>
        <div class="main_content">
            <div class="container"><br>
                <h4>My Blood Request History</h4>

                <table class="table-responsive-lg">
                    <table class=" table table-hover table-bordered table-striped table-hover text-center">
                        <thead class="thead-dark">
                            <th scope="col">Patient Name</th>
                            <th scope="col">Patient Age</th>
                            <th scope="col">Disease</th>
                            <th scope="col">Blood Group</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Status</th>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                        include "Database.php";
                      
                            $sql ="SELECT `paitent_id`, `Hospital_id`, `paitent_name`, `paitent_reasion`, `paitent_diseas`, `paitent_age`, `paitent_blood`, `paitent_unit`, `status` FROM `patient` WHERE 1";
               
                           
                            $res = $conn->query($sql);
                            if($res->num_rows > 0)
                            {
                                foreach($res as $patientDetails)
                                {
                                  echo "<tr>
                                
                                  <td>{$patientDetails['paitent_name']}</td>
                                  <td>{$patientDetails['paitent_age']}</td>
                                  <td>{$patientDetails['paitent_diseas']}</td>
                                  <td>{$patientDetails['paitent_blood']}</td>
                                  <td>{$patientDetails['paitent_unit']}</td>";
                                
                                  if( $patientDetails['status']==1)
                                  {
                                      echo' <td>Approved</td>';
                                     // echo'<td><p> <a class="btn btn-danger">Reject</a></p>';
                                  }
                                  elseif($patientDetails['status']==0)
                                  {
                                      echo'<td>pending</td>';
                                    //  echo'<td><p>  <a class="btn btn-danger"> Reject</a></p>';
                                     // echo'<p> <a class="btn btn-primary" <a>Approve</a></p></td>';
                                 
                                  }
                                  elseif( $patientDetails['status']==2)
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