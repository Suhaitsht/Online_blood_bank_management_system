<?php
session_start();
include "Database.php";
if(isset($_POST["Login"]))
{
    $sql = "SELECT * FROM `hospital` WHERE H_username='{$_POST["H_username"]}' and 
   H_password='{$_POST["HPassword"]}'";

   $res = $conn->query($sql);

    if($res->num_rows > 0)
    {

      $row = $res-> fetch_assoc();
      $_SESSION['Id']=$row['H_id'];
      $_SESSION['Husername']=$row['H_username'];
      header("location:Hospitaldashbord.php");

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
  <title>Hospital</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="patientnew.css">
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
            HOSPITAL
          </h4>
          <form action="Hospital.php" method="post">
            <div class="form-box px-3">
              <div class="form-input">
                <span><i class="fa fa-envelope-o"></i></span>
                <input type="username" name="H_username" placeholder="Enter your username" tabindex="10" required>
              </div>
              <div class="form-input">
                <span><i class="fa fa-key"></i></span>
                <input type="password" name="HPassword" placeholder="Password" required>
              </div>

              <div class="mb-3">
                <button type="submit" name="Login" class="btn btn-block text-uppercase">
                  Login
                </button>
              </div>
              <div class="text-right">
              <a href="ResetHospital.php" class="forget-link">
                Forget Password?
              </a>

              <hr class="my-4">

              <div class="text-center mb-2">
                Don't have an account?
                <a href="patientregistration.php" class="register-link">
                  Register here
                </a>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>