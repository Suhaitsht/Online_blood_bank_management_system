<?php
session_start();
include "Database.php";
if(isset($_POST["Submit"]))
{
  
  $username= $_POST["Username"];
  $password = $_POST["password"];
    $sql = "SELECT * FROM `admin` WHERE A_name='$username' and 
   A_password ='$password'";

   $res = $conn->query($sql);

    if($res->num_rows > 0)
    {

      $row = $res-> fetch_assoc();
      $_SESSION['id']=$row['id'];
      $_SESSION['Username']=$row['A_name'];
      header("location:Admindashbord.php");

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
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="Admin.css">
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
            <h4 class="title text-center mt-4">
              ADMIN
            </h4>
            <form action = "Admin.php" method = "post">
              <div class="form-box px-3">
                <div class="form-input">
                  <span><i class="fa fa-envelope-o"></i></span>
                  <input type="text" name="Username" placeholder="Enter your user name" tabindex="10" required>
                </div>
                <div class="form-input">
                  <span><i class="fa fa-key"></i></span>
                  <input type="password" name="password" placeholder="Password" required>
                </div>

                <div class="mb-3">
                  <button type="submit" name="Submit" class="btn btn-block text-uppercase">
                    Login
                  </button>
                </div>
            </form>
          </div>
        </div>
      </div>
  </body>
</html>