
  <?php
include "Database.php";

if(isset($_POST["Submit"]))
{   

    $fname = $_POST["Dfname"];
    $uname = $_POST["Duname"];
    $passowrd = $_POST["Dpass"];
    $email = $_POST["Dmail"];
    $age = $_POST["Dage"];
    $bloodtype = $_POST["Dblood"];
    $mobinum = $_POST["Dtel"];
    $address = $_POST["Daddress"];


    if(filter_var($email,FILTER_VALIDATE_EMAIL))
    {
      $sql = "SELECT * FROM `donor` WHERE D_email='$email'";
      $run = mysqli_query($conn,$sql);
      $result = mysqli_num_rows($run);
      if($result>=1)
      {
        echo "<script>alert('Your email already Registered please login')
        window.location.href='Donorregistration.php'</script>";
      }
    
    else{

    $sql = "INSERT INTO `donor`( `D_fname`, `D_username`, `D_password`, `D_email`, `D_age`, `D_bloodtype`, `D_tel`, `D_address`) VALUES
    ('$fname','$uname','$passowrd','$email','$age','$bloodtype','$mobinum','$address')";
    $conn->query($sql);
   echo "<script>alert('Successfully Registered')
   window.location.href='Donornew.php'</script>";
    }
  }
}


?>

<!DOCTYPE html>
<html>
<head>
  <title>Donor Regestration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="DonorRegister.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <style>
  .error {
   color:red;
   margin-bottom:2px;
   padding-left:20px;
}
</style>
</head>

<body>
  <div class="container">
    <div class="row px-2">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
        <div class="img-left d-none d-md-flex"></div>

        <div class="card-body">
          <h4 class="title text-center mt-3">
            Donor Registration
          </h4>
          <form action = " Donorregistration.php"id="registration" method= "post">
          <div class="form-box px-3" >
            <div class="form-group">
              <span><i class="uil uil-user"></i></span>
              <input type="text" name="Dfname" placeholder="Enter your Fullname" tabindex="10" required>
            </div>
            <div class="form-group">
              <span><i class="uil uil-user"></i></span>
              <input type="text" name="Duname" placeholder="Enter user name" tabindex="10" required>
            </div>
            <div class="form-group">
              <span><i class="uil uil-lock icon"></i></span>
              <input type="password" name="Dpass" placeholder="Create a password" required>
            </div>
            <div class="form-group">
              <span><i class="uil uil-envelope icon"></i></span>
              <input type="email" name="Dmail" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
              <span><i class="uil uil-calendar-alt"></i></span>
              <input type="number" name="Dage" placeholder="Age" required>
            </div>
            <select class="form-select" aria-label="Default select example" name= "Dblood">
              <option selected="" value="">Choose a Blood group</option>
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
            </select>

            <div class="form-group">
              <span><i class="uil uil-phone"></i></span>
              <input type="tel" name="Dtel" placeholder="Tel" required>
            </div>

            <div class="form-group">
              <span><i class="uil uil-home"></i></span>
              <input type="text" name="Daddress" placeholder="Address" required>
            </div>
            
            <div class="mb-2">
              <button type="submit" id="submitbtn" name = "Submit"class="btn btn-block text-uppercase">
                Signup
              </button>
            </div>

            <div class="text-center">
              Already a member?
              <a href="Donornew.php" class="register-link">
                Login Now
              </a>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  <script >
    $(document).ready(function(){
    $("#submitbtn").click(function(){
     // alert('hi');


    })
     
  $("form[id='registration']").validate({
  // Specify validation rules
  rules: {
    // The key name on the left side is the name attribute
    // of an input field. Validation rules are defined
    // on the right side
    Dfname: "required",
    Duname: "required",
    Dpass : "required",
    Dblood :"required",
    Dtel:"required",
    Daddress:"required",

    Dfname:{
        required : true,
        minlength:5,
        maxlength:20,
        number:false,
        
    },
    Duname:{
        required : true,
        minlength:4,
        maxlength:10,
        number:false,
        
    },
    Dblood :{
        required : true,

    },

    demail: {
      required: true,
      email: true,
    },

    Dpass:{
      required: true,
      minlength: 5,
    },
    Daddress:{
      required: true,

    },

    Dtel:{
      required:true,
      digits:true,
      minlength:10,
      maxlength:10,
    }
  },
  // Specify validation error messages
  messages: {
    Dfname:
    {
      required: "Please enter your firstname",
      minlength:"Name should be at least 5 characters",

    },
    Duname:
    {
      required: "Please enter your firstname",
      minlength:"Name should be at least 4 characters",

    },
  
    Dtel: {
      required: "Please Enter your mobile number",
      minlength: "Your mobile number must be 10 characters long",
    },
    email: {
      required: "Please enter a valid email address",
    },
    Daddress: {
      required: "Please enter a valid  address",
    },
  },
  // Make sure the form is submitted to the destination defined
  // in the "action" attribute of the form when valid
  submitHandler: function(form) {
    form.submit();
  }
 
});

})
   



</script>
<!--validation rules and message-->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>

</body>

</html>