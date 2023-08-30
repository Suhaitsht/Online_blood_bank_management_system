<?php
session_start();
include "Database.php";
if(isset($_POST["login"]))
{
    $sql = "SELECT * FROM `doctor` WHERE D_name	='{$_POST["DUsername"]}' and 
   D_password	 ='{$_POST["Dpass"]}'";

   $res = $conn->query($sql);

    if($res->num_rows > 0)
    {

      $row = $res-> fetch_assoc();
      $_SESSION['ID']=$row['D_id'];
      $_SESSION['Username']=$row['D_name'];
      header("location:Doctordashbord.php");

    }
     else
    {
      echo '<script>alert("Inavalid Username or password")</script>';
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Doctor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="Doctor.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row px-3">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
        <div class="img-left d-none d-md-flex"></div>

        <div class="card-body">
          <h4 class="title text-center mt-4 ">
            DOCTOR
          </h4>
          <form action ="Doctor.php" method = "post">
          <div class="form-box px-3">
            <div class="form-input">
              <span><i class="fa fa-envelope-o"></i></span>
              <input type="username" name="DUsername" placeholder="Enter your username" tabindex="10" required>
            </div>
            <div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input type="password" name="Dpass" placeholder="Password" required>
            </div>

            <div class="mb-3">
              <button type="submit" name="login"class="btn btn-block text-uppercase">
                Login
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>