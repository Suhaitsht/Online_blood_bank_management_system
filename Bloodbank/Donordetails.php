
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
    <title>Donor Details </title>
    <link rel="stylesheet" href="donordetails.css">
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
                <div class="container mt-lg-6">
                    <h4 class="text-center text-uppercase"> DONOR DETAILS</h4>
                </div>

                <table class="table-responsive-lg">
                    <table class=" table table-hover table-bordered table-striped table-hover text-center">
                        <thead class="thead-dark">
                            <th scope="col">Donor_id</th>
                            <th scope="col">Donor Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Blood Group</th>
                            <th scope="col">Address</th>
                            <th scope="col">Mobile_No</th>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT * FROM `donor`";
                            $res = $conn->query($sql);
                            if($res->num_rows > 0)
                            {
                                foreach($res as $donor)
                                {
                                    ?>
                                    <tr>
                                         <td><?=  $donor['D_id'];?></td>
                                         <td><?=  $donor['D_fname'];?></td>
                                         <td><?=  $donor['D_age'];?></td>
                                         <td><?=  $donor['D_bloodtype'];?></td>
                                         <td><?=  $donor['D_address'];?></td>
                                         <td><?=  $donor['D_tel'];?></td>
        
                                          
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