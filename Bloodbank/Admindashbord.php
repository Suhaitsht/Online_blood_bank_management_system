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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    <link rel="stylesheet" href="Admindashbord.css">
      
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
            <br><br>
            <div class="container">

                                   <?php
                                  header("refresh: 10");
                                  ?>
                                <?php
                        include "Database.php";
                      
                           // count the total blood in donate table
                            $sql = " SELECT  donate_blood.D_id,donor.D_bloodtype,donate_blood.unit
                                     FROM `donate_blood`,`donor` 
                                     WHERE  donate_blood.D_id = donor.D_id";
               
                           
                            $res = $conn->query($sql);

                            $Ap = 0 ;
                            $An = 0 ;
                            $Bp = 0 ;
                            $Bn = 0;
                            $ABp = 0;
                            $ABn = 0;
                            $Op = 0;
                            $On = 0 ;
                         

                            if($res->num_rows > 0)
                            {
                                foreach($res as $donorDetails)
                                {
                                  
                                   
                                    if($donorDetails['D_bloodtype'] == "A+")
                                    {

                                         $Ap =    $Ap + $donorDetails['unit'] ;
                                         
                                     
                                    }
                                    elseif($donorDetails['D_bloodtype'] == "A-")
                                    {

                                         $An =    $An + $donorDetails['unit'] ;
                                     
                                    }
                                    elseif ($donorDetails['D_bloodtype'] == "B+")
                                    {
                                        $Bp =    $Bp + $donorDetails['unit'] ;
                                    }
                                    elseif ($donorDetails['D_bloodtype'] == "B-")
                                    {
                                        $Bn =    $Bn + $donorDetails['unit'] ;
                                    }
                                    elseif ($donorDetails['D_bloodtype'] == "AB+")
                                    {
                                        $ABp =    $ABp + $donorDetails['unit'] ;
                                    }
                                    elseif ($donorDetails['D_bloodtype'] == "AB-")
                                    {
                                        $ABn =    $ABn + $donorDetails['unit'] ;
                                    }
                                    elseif ($donorDetails['D_bloodtype'] == "O+")
                                    {
                                        $Op =    $Op + $donorDetails['unit'] ;
                                    }
                                    elseif ($donorDetails['D_bloodtype'] == "O-")
                                    {
                                        $On =    $On + $donorDetails['unit'] ;
                                    }

                                    
                                //   echo "<tr>
                                //   <td> <h2>  <i class='fas fa-tint'>  </i></h2> <p></P></td></tr>";


                                }  
                         
                                  
                                
                            }  
                            


echo " 

<div class='row'>
                    <div class='col-sm-3'>
                        <div class='card bg-light'>
                            <div class='card-body'>
                            <div class='blood'>
                                    <h2> A+  <i class='fas fa-tint'></i></h2>
                                    <h4> $Ap ml</h4>
                                </div><br><br>
                                <div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <div class='card bg-light'>
                            <div class='card-body'>
                                <div class='blood'>
                                    <h2> B+<?php $Op ?><i class='fas fa-tint'></i></h2>
                                    <h4> $Bp ml</h4>
                                </div><br><br>
                                <div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <div class='card bg-light'>
                            <div class='card-body'>
                                <div class='blood'>
                                    <h2>O+ <i class='fas fa-tint'></i></h2>
                                           <h4> $Op ml</h4>
                                </div><br><br>
                                <div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <div class='card bg-light'>
                            <div class='card-body'>
                                <div class='blood'>
                                    <h2>AB+ <i class='fas fa-tint'></i></h2>
                                    <h4> $ABp ml</h4>
                                </div><br><br>
                                <div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='row'>
                    <div class='col-sm-3'>
                        <div class='card bg-light'>
                            <div class='card-body'>
                                <div class='blood'>
                                    <h2>A- <i class='fas fa-tint'></i></h2>
                                    <h4> $An ml</h4>
                                </div><br><br>
                                <div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <div class='card bg-light'>
                            <div class='card-body'>
                                <div class='blood'>
                                    <h2>B- <i class='fas fa-tint'></i></h2>
                                    <h4> $Bn ml</h4>
                                </div><br><br>
                                <div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <div class='card bg-light'>
                            <div class='card-body'>
                                <div class='blood'>
                                    <h2>O- <i class='fas fa-tint'></i></h2>
                                    <h4> $On ml</h4>
                                </div><br><br>
                                <div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-3'>
                        <div class='card bg-light'>
                            <div class='card-body'>
                                <div class='blood'>
                                    <h2>AB- <i class='fas fa-tint'></i></h2>
                                    <h4> $ABn ml</h4>
                                </div><br><br>
                                <div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div> "; ?>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="blood">
                                    <i class="fas fa-users"></i>
                                </div><br>
                                <div>
                                Total Donors<br>
                                   <?php
                                   // count total donors in donor table
                                    include "Database.php";
                                   $sql= "SELECT D_id FROM `donor`ORDER BY D_id ";
                                   $query_run = mysqli_query($conn , $sql);
                                   $row = mysqli_num_rows($query_run);
                                   {
                                    echo''.$row.'';
                                   }
                                     ?>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="blood">
                                    <i class="fas fa-spinner"></i>
                                </div><br>
                                <div>
                                Total Requests <br>
                                <?php
                                   include "Database.php";
                                   // count total request in 4 table 
                                   $sql = "SELECT status FROM `patient` where status != 2 ";
                                   $result= $conn->query($sql);
                                   $req_patient_count = mysqli_num_rows($result);

                                   $sql = "SELECT Status FROM `donorblood_request` where Status != 2 ";
                                   $result= $conn->query($sql);
                                   $req_donor_count = mysqli_num_rows($result);
                                   
                                   $sql = "SELECT Status FROM `donate_blood` where Status != 2 ";
                                   $result= $conn->query($sql);
                                   $req_donate_blood_count = mysqli_num_rows($result);
                                   
                                   $sql = "SELECT Status FROM `doctorbloodrequest` where Status != 2 ";
                                   $result= $conn->query($sql);
                                   $req_doctorbloodrequest_count = mysqli_num_rows($result);
                                   
                                   
                                    $total_req_count = $req_patient_count + $req_donor_count + $req_donate_blood_count + $req_doctorbloodrequest_count ; 
                                    echo "$total_req_count   ";
                                   
                                     ?>

                                     
                                  
                                    

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-sm-3">
                        <div class="card bg-light">
                            <div class="card-body">
                                <div class="blood">
                                    <i class="fas fa-tint xyz"></i>
                                </div><br> 
                                <div>
                                    Total Blood Unit (in ml) <br>
                                    <?php
                                    // count total blood unit in donate table 
                                     include "Database.php";
                                     $sql="SELECT`D_id`, SUM(`unit`) as total_unit FROM `donate_blood` WHERE 1";
                                     $result= $conn->query($sql);
                                     if($result->num_rows > 0)
                                     {
                                        foreach($result as $toall)
                                        {
                                            echo"<tr>
                                            <td>{$toall ['total_unit']}</td></tr><br>";
                                        }
                                     }
                                    ?>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
            </div>

        </div>

 
</body>

</html>