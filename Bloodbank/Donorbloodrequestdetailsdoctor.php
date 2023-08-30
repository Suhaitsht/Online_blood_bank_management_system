<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOOD DONATIONS DETAILS</title>
    <link rel="stylesheet" href="donordetails.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
 <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js";></script>
</head>
<?php
         include "Doctornavbar.php ";

         
   
 ?>
 <br><br>
 <?php
 // header("refresh:25");
  ?>
<body>
        <?php
         include "Doctorsidenavbar.php";
         ?>
         
      
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5" id="exampleModalLabel">ADD Blood Unit</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="Takenunit.php" method="POST">     
  <div class="mb-3">    
    <script>   
         function myfunction(x) { 
        document.getElementById("D_id").value = x;
      return x;} 
    </script>
 
    <label >Taken Unit</label>
    <input type="hidden" name="D_id"  id="D_id" class="form-control" required="" autocomplete="off" >
     <input type="number" name="unit"  class="form-control" required="" autocomplete="off"  placeholder="unit">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
        <button type="submit" name="Submit" class="btn btn-primary">Add</button>
      </div> 
    </div>
  </div>
</div>
</form> 
    
        <div class="main_content">
            <div class="container">
                <div class="container mt-lg-6"><br>
                    <h4 class="text-center text-uppercase">BLOOD DONATIONS DETAILS</h4>
                </div>

                <table class="table-responsive-lg">
                    <table class=" table table-hover table-bordered table-striped table-hover text-center">
                        <thead class="thead-dark">
                            <th scope="col">Donor_id</th>
                            <th scope="col">Donor Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Blood Group</th>
                            <th scope="col">Disease</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th class="text-ceneter">Action</th>
                        </thead>
                        <tbody>

                        <?php
                        include "Database.php";
                      
                            $sql = "SELECT donor.D_id, donor.D_fname, donor.D_age, donor.D_bloodtype, donate_blood.D_disease,donate_blood.date, donate_blood.unit, donate_blood.Status 
                            FROM `donor`,`donate_blood`
                            WHERE donor.D_id = donate_blood.D_id";
               
                           
                            $res = $conn->query($sql);
                            if($res->num_rows > 0)
                            {
                                foreach($res as $donorDetails)
                                {
                                  echo "<tr>
                                  <td>{$donorDetails['D_id']}</td>
                                  <td>{$donorDetails['D_fname']}</td>
                                  <td>{$donorDetails['D_age']}</td>
                                  <td>{$donorDetails['D_bloodtype']}</td>
                                  <td>{$donorDetails['D_disease']}</td>
                                  <td>{$donorDetails['unit']}</td>
                                  <td>{$donorDetails['date']}</td>";
                             
                           

                                  if( $donorDetails['Status']==1)
                                  {   $d_id = $donorDetails['D_id'];
                                      echo' <td>Approved</td>';
                                      echo'<td><p> <a class="btn btn-danger"  href="DoctorDDactivate.php?D_id='.$donorDetails['D_id'].'&status=0">Reject</a></p>';
                                      echo "   <input type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#exampleModal' onClick='myfunction({$d_id})' Value='Taken'></td>";
                                      
                                 
                                 
                                    }
                                  elseif( $donorDetails['Status']==0)
                                  {
                                      echo'<td>pending</td>';
                                      echo'<td><p> <a class="btn btn-danger href="DoctorDDactivate.php?D_id='.$donorDetails['D_id'].'&status=0">Reject</a></p>';
                                      echo'<p> <a class="btn btn-primary" href="DoctorDAactivate.php?D_id='.$donorDetails['D_id'].'&status=1">Approve</a></p></td>';
                                 
                                  }
                                  elseif( $donorDetails['Status']==2)
                                  {
                                      echo'<td>cancelled</td>';
                                      echo' <td> <p> <a class="btn btn-primary" href="DoctorDAactivate.php?D_id='.$donorDetails['D_id'].'&status=0">Approve</a></p></td>';
                                  }
                                 
                                  echo "</tr>";
                                
                                }
                            
                            
                            
                            }
                    
                              
                                ?>

                                
                        </tbody>
                    </table>
            </div>
        </div>
</body>

</html>