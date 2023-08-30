
<?php
include "Database.php";

if(isset($_POST["Signup"]))
{
   $Hname = $_POST['H_name'];
   $Huname = $_POST['H_uname'];
   $Hpassword = $_POST['H_password'];
   $Hemail = $_POST['H_email'];
   $Hmobile = $_POST['H_tel'];
   $Haddress = $_POST['H_daddress'];
   if(filter_var($Hemail,FILTER_VALIDATE_EMAIL))
   {
     $sql = "SELECT * FROM `hospital` WHERE H_mail='$Hemail'";
     $run = mysqli_query($conn,$sql);
     $result = mysqli_num_rows($run);
     if($result>=1)
     {
       echo "<script>alert('Your email already Registered please login')
       window.location.href='patientregistration.php';</script>";
       
     }
    
    
   else
   {
   $sql = "INSERT INTO `hospital`(`H_name`, `H_username`, `H_password`, `H_mail`, `H_tel`, `H_address`) VALUES 
   ('$Hname','$Huname','$Hpassword','$Hemail',' $Hmobile','$Haddress')";
   $conn->query($sql);
   echo "<script>alert('Successfully Registered')
   window.location.href='Hospital.php';</script>";
   
   }

}
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Hospital Regestration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="Hospitalreg.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
 <style>
  .error {
    color: #ff0000;
    margin-bottom:2px;
}
    </style>

</head>

<body>
  <div class="container">
    <div class="row px-3">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
        <div class="img-left d-none d-md-flex"></div>

        <div class="card-body">
          <h4 class="title text-center mt-5">
            Hospital Regestration
          </h4>
          <form action = "<?php echo $_SERVER["PHP_SELF"];?>"method = "post" id='registration'>
          <div class="form-box px-3">
            <div class="form-group">
              <span> <i class="uil uil-hospital"></i></span>
              <input type="text" name="H_name" placeholder="Hospital name" tabindex="10" required>
            </div>
            <div class="form-group">
              <span><i class="uil uil-user"></i></span>
              <input type="text" name="H_uname" placeholder="Enter user name" tabindex="10" required>
            </div>
            <div class="form-group">
              <span><i class="uil uil-lock icon"></i></span>
              <input type="password" name="H_password" placeholder="Create a password" required>
            </div>
            <div class="form-group">
              <span><i class="uil uil-envelope icon"></i></span>
              <input type="email" name="H_email" placeholder="Enter Hospital email" required>
            </div>

            <div class="form-group">
              <span><i class="uil uil-phone"></i></span>
              <input type="text" name="H_tel" placeholder="Tel" required>
            </div>

            <div class="form-group">
              <span><i class="uil uil-home"></i></span>
              <input type="text" name="H_daddress" placeholder="Address" required>
            </div>

            <div class="mb-2">
              <button type="submit" name = "Signup" id ="submitbtn"class="btn btn-block text-uppercase">
                Signup
              </button>
            </div>

            <div class="text-center">
              Already a member?
              <a href="Hospital.php" class="register-link">
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
    H_name: "required",
    H_uname: "required",
    dpassword : "required",
    H_daddress :"required",

    H_name:{
        required : true,
        minlength:4,
        maxlength:20,
    },
    H_uname:{
        required : true,
        minlength:4,
      maxlength:12,
    },

    demail: {
      required: true,
      
      email: true,
      //accept:"[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}",
     },

     dpassword:{
      required: true,
      minlength: 5
    },

    H_tel:{
      required:true,
      digits:true,
      minlength:10,
      maxlength:10,
    },
    H_tel:{
      required:true,
      digits:true,
      minlength:10,
      maxlength:10,
    }
  },
  // Specify validation error messages
  messages: {
    H_name:
    {
      required: "Please enter your firstname",
      minlength:"Name should be at least 3 characters"

    },
    H_uname:
    {
      required: "Please enter your username",
      minlength:"Name should be at least 3 characters"

    },
    H_tel:{
      H_tel:"Please enter your Mobile number",
      minlength:"Please input 10 digits number"
    },
  
    dpassword: {
      required: "Please provide a password",
      minlength: "Your password must be at least 5 characters long"
    },
    email: "Please enter a valid email address"
  },
  // Make sure the form is submitted to the destination defined
  // in the "action" attribute of the form when valid
  submitHandler: function(form) {
    form.submit();
  }
 
});

})
</script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
  
</body>
</html>