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
    <title>Blood Request History</title>
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
        include "donornavbar.php";
   ?>
    <br><br>
    <?php
         include "donorsidenavbar.php";
        ?>
        <div class="main_content">
            <div class="container"><br>
                <h4>My Blood Request History</h4><?php  $donor_ID = $_SESSION['Did'] ?>

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
                          // got a record from paitentblood request table
                            $sql = "SELECT `p_id`, `donor_id`, `P_name`, `reasion`, `disease`, `unit`, `age`, `bloodtype`, `Status` FROM `donorblood_request` WHERE donor_id = $donor_ID";
               
                            $res = $conn->query($sql);
                            if($res->num_rows > 0)
                            {
                                foreach($res as $donorDetails)
                                {
                                  echo "<tr>
                                
                                  <td>{$donorDetails['P_name']}</td>
                                  <td>{$donorDetails['age']}</td>
                                  <td>{$donorDetails['disease']}</td>
                                  <td>{$donorDetails['bloodtype']}</td>
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
                                    //<td> <p> <a class="btn btn-primary" <a>Approve</a></p></td>';
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