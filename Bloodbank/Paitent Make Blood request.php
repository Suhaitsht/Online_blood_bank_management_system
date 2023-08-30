<?php
include "Database.php";
session_start();
if (!isset($_SESSION['Id']))
{
    header("location: Hospital.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Blood Request</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    <link rel="stylesheet" href="Bloodrequest.css">
</head>

<body>
<?php
    include "Hospitalnavbar.php";
  ?>
    <br><br>
    <?php
    include "Hospitalsidebar.php";
  ?>
        <div class="main_content">
            <div class="container">
                <div class="card rounded bg-white">

                    <div class="h3 text-center">MAKE BLOOD REQUEST</div> <br>
                    <form>
                        <form class="form-box px-2">
                            <div class="row">
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label>Patient Name</label>
                                    <input type="text" class="form-control" id="validationDefault03" required>
                                </div>
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label>Reasion</label>
                                    <input type="text" class="form-control" id="validationDefault03" required>
                                </div>
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label>Disease (If any)</label>
                                    <input type="text" class="form-control" id="validationDefault03" required>
                                </div>

                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label for="validationDefault01" class="form-label">Unit (ml)</label>
                                    <input type="text" class="form-control" id="validationDefault01" required>
                                </div>
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label for="validationDefault01" class="form-label">Age</label>
                                    <input type="text" class="form-control" id="validationDefault01" required>

                                    <div class=" my-md-2 my-3">
                                        <label>Choose Blood Group</label>
                                        <select id="sub" required>
                                            <option value="" selected hidden>A+</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                        </select>
                                    </div>

                                    <div>
                                        <button class="btn btn--radius-2 btn-danger" type="submit">REQUEST</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    </form>
               </div>
        </body>
</html>