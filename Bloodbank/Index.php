

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Online Blood Bank Management System</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./Home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <div class="logo"><img src="./1.png"></div>
    <ul>
      <li><a href="Index.php"><i class="fas fa-home"></i>Home</a></li>
      <li><a href="Admin.php"><i class="fas fa-solid fa-user-tie"></i>Admin</a></li>
      <li><a href="Doctor.php"><i class="fa-solid fa-user-doctor"></i>doctor</a></li>
      <li><a href="Donornew.php"><i class="fas fa-solid fa-user"></i>DONOR</a></li>
      <li><a href="Hospital.php"><i class="fa-solid fa-hospital"></i>Hospital</a></li>
    </ul>
  </nav>
  <section></section>
  
   <?php
   include "footer.php";
   ?>

</body>

</html>