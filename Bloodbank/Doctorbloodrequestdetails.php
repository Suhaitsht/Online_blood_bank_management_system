<?php
include "Database.php";
session_start();
if (!isset($_SESSION['id']))
{
    header("location: Admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOCTOR BLOOD REQUESTED DETAILS</title>
    <link rel="stylesheet" href="requestdetail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
</head>


<body>
        <?php
         include "Adminnavbar.php";
         ?>
    <br><br>
    <?php
         include "Adminsidenavbar.php";
         ?>
        <div class="main_content">
            <div class="container">
                <h4>DOCTOR BLOOD REQUESTED DETAILS</h4>

                <table class="table-responsive-lg">
                    <table class=" table table-hover table-bordered table-striped table-hover text-center">
                        <thead class="thead-dark">
                            
                            <th scope="col">Patient Name</th>
                            <th scope="col">Reason</th>
                            <th scope="col">diseas</th>
                            <th scope="col">Age</th>
                            <th scope="col">Blood Group</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Status</th>
                            <th class="text-ceneter">Action</th>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT `id`, `D_id`, `name`, `resion`, `P_diseas`, `unit`, `p_age`, `blood_types`, `Status` 
                            FROM `doctorbloodrequest` WHERE 1";
                            $res = $conn->query($sql);
                            if($res->num_rows > 0)
                            {
                                foreach($res as $patient)
                                {
                                    ?>
                                    <tr>
                                        
                                         <td><?=  $patient['name'];?></td>
                                         <td><?=  $patient['resion'];?></td>
                                         <td><?= $patient['P_diseas'];?></td>
                                         <td><?= $patient['p_age'];?></td>
                                         <td><?=  $patient['blood_types'];?></td>
                                         <td><?=  $patient['unit'];?></td>
                                        
                                        
                                            <?php
                                            if( $patient['Status']==1)
                                            {
                                                echo' <td>Approved</td>';
                                                echo'<td><p> <a class="btn btn-danger" href="Doctardactivate.php?id='.$patient['id'].'&status=0">Reject</a></p></td>';
                                            }
                                            elseif($patient['Status']==0)
                                            {
                                                echo'<td>pending</td>';
                                                echo'<td><p> <a class="btn btn-danger" href="Doctardactivate.php?id='.$patient['id'].'&status=0">Reject</a></p>';
                                                echo'<p> <a class="btn btn-primary" href="Doctoractivate.php?id='.$patient['id'].'&status=1">Approve</a></p></td>';
                                           
                                            }
                                            elseif($patient['Status']==2)
                                            {
                                                echo'<td>cancelled</td>';
                                               echo '<td> <p> <a class="btn btn-primary" href="Doctoractivate.php?id='.$patient['id'].'&status=2">Approve</a></p>
                                                </td>';
                                            }
                                            ?>
                                         
                                        
                                  
                                          
                                </tr>
                                <?php
                                }
                            }
                            else
                            {
                                echo"<h5 ><center>No Record Found <center></h5>";
                            }
                            
                            ?>       
                        </tbody>
                    </table>
            </div>
        </div>
</body>

</html>