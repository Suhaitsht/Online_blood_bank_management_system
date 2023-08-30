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
    <title>Hospital Details </title>
    <link rel="stylesheet" href="patientdetails.css">
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
            <div class="container"><br>
                <h4>HOSPITAL DETAILS</h4>

            
                 <table class="table-responsive-lg">
                    <table class=" table table-hover table-bordered table-striped table-hover text-center">
                        <thead class="thead-dark">
                        <th scope="col"> H_id</th>
                            <th scope="col"> Hospi_Name</th>
                            <th scope="col">Hospital_Email</th>
                            <th scope="col">Hospital_Tel</th>
                            <th scope="col">Hospital_Address</th>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM `hospital`";
                            $res = $conn->query($sql);
                            if($res->num_rows > 0)
                            {
                                foreach($res as $hospital)
                                {
                                    ?>
                                    <tr>
                                         <td><?= $hospital['H_id'];?></td>
                                         <td><?=  $hospital['H_name'];?></td>
                                         <td><?=  $hospital['H_mail'];?></td>
                                         <td><?=  $hospital['H_tel'];?></td>
                                         <td><?=  $hospital['H_address'];?></td>
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