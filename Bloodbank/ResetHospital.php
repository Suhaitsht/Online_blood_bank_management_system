<?php
include "Database.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
function sendMail($email,$reset_token)
{
    
    $mail = new PHPMailer(true);

    try {
        //$mail->SMTPDebug = 4; \
        //$mail->SMTPDebug = 4;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'suhaitsuhait58@gmail.com';                     //SMTP username
        $mail->Password   = 'siwilqexgmsanlpi';                               //SMTP password
        $mail->SMTPSecure = 'tls';                           //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('suhaitsuhait58@gmail.com', 'Online blood bank');
        $mail->addAddress($email);     //Add a recipient
       
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Paasword rest link from online blood bank management system';
        $mail->Body    = "We got a request link from you to create password<br>
        click the link below:<br>
        <a href='http://localhost/Bloodbank/updatepasswordhospital.php?H_mail=$email &resettoken=$reset_token'>
        Reset password </a>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
if(isset($_POST["reset"]))
{
    $resetmail=$_POST["resetmail"];
    $sql=" SELECT * FROM `hospital` WHERE `H_mail`='$resetmail'";
    $result =mysqli_query($conn,$sql);
    if($result)
    {
        if(mysqli_num_rows($result)==1)
        {
            /**Email found*/
            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/colombo');
            $date =date('Y-m-d');
           
            $upadte = "UPDATE `hospital` SET `resettoken`='$reset_token',`resettokenexpaire`='$date' WHERE `H_mail` = '$resetmail'";
            if(mysqli_query($conn, $upadte) && sendMail($resetmail,$reset_token))
            {
                echo "<script>alert('Password rest link send to mail');
                window.loaction.href='ResetHospital.php';
                </script>";
              

            }
            else{
                echo "<script>alert('server down plese try again letter ');
            window.loaction.href='ResetHospital.php';
            </script>";
          
            }
            
        }
        else{
            echo "<script>alert('Email Not found');
            window.loaction.href='ResetHospital.php';
            </script>";

          
        }
    }
    else
    {
        echo '<script>alert("cannnot run query");
        window.loaction.href="ResetHospital.php";
        </script>';
    }
   
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Reset Password</title>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="Reset.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row px-3">
      <div class="col-lg-6 col-xl-5 card flex-row mx-auto px-0">
        <div class="img-left d-none d-md-flex"></div>

        <div class="card-body">
          <h3 class="title text-center mt-4">
            Reset Password
          </h3>
          <h6 class="title text-center mt-3">
            Enter your email to reset your password.
          </h6>
          <form action ="ResetHospital.php" method="POST">
          <div class="form-box px-3">
            <div class="form-input">
              <span><i class="fa fa-envelope-o"></i></span>
              <input type="email" name="resetmail" placeholder="Enter your Email Address" tabindex="10" required>
            </div>
            
           
            <div class="mb-3">
              <button type="submit" name ="reset"class="btn btn-block text-uppercase">
                Reset Password
              </button>
              <br>
              <div class="text-right">
              <a href="Hospital.php" class="forget-link">
                LOGIN PAGE
              </a>
              
            </div>
            </div>   
        </div>
      </div>
    </form>
  </div>
    </div>
  </div>
</body>
</html>