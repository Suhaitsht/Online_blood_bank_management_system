<?php
session_start();
include "Database.php";
if(isset($_POST["submit"]))
{
  
   $username = $_POST["username"];
   $password = $_POST["pass"];
   $sql = "SELECT * FROM `donor` WHERE D_username='$username' and 
   D_password ='$password'";

   $result = $conn->query ($sql) ;

     if($result->num_rows>0)
     {

      $row=$result->fetch_assoc();
      $_SESSION["Did"]=$row["D_id"];
      $_SESSION["username"]=$row["D_username"];
    header("location:Donordashbord.php");
     }

     else
     {
     echo '<script>alert("Inavlid username or password")</script>';
}
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>DONOR</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="Donornew.css">
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
            DONOR
          </h4>
          <form action="Donornew.php" method ="post">
            <div class="form-box px-3">
              <div class="form-input">
                <span><i class="fa fa-envelope-o"></i></span>
                <input type="username" name="username" placeholder="Enter your username" tabindex="10" required>
              </div>

              <div class="form-input">
                <span><i class="fa fa-key"></i></span>
                <input type="password" name="pass" placeholder="Password" required>
              </div>

              <div class="mb-3">
                <button type="submit"  name ="submit"class="btn btn-block text-uppercase">
                  Login
                </button>
              </div>
              <div class="text-right">
              <a href="Resetdonor.php" class="forget-link">
                Forget Password?
              </a>

              <hr class="my-4">

              <div class="text-center mb-2">
                Don't have an account?
                <a href="Donorregistration.php" class="register-link">
                  Register here
                </a>
              </div>
            </form>
        </div>
      </div>
    </div>
</body>
</html>