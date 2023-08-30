<?php
include "Database.php";
session_start();
if (!isset($_SESSION['id']))
{
    header("location: Admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    <link rel="stylesheet" href="Bloodrequest.css">
</head>

<body>

<?php
         include  'Adminnavbar.php';

        ?>
    <br><br>
    <?php
         include  'Adminsidenavbar.php';

        ?>
        <div class="main_content">
            <div class="container">
                <div class="card rounded bg-white">

                    <div class="h3 text-center">Change password</div> <br>
                    <?php
                         
                         if(isset($_POST["submit"]))
                         {
                            $sql ="SELECT * FROM `admin` WHERE A_password = '{$_POST["oldpass"]}' and id='{$_SESSION['id']}'";
                             $res =$conn->query($sql);
                             
                             if($res->num_rows > 0)
                              {
                                $Update ="UPDATE `admin` SET `A_password`='{$_POST["newpass"]}' WHERE id=".$_SESSION['id'];
                                $conn->query($Update);
                                echo '<script>alert("password changed")</script>';
                              }
                              else
                              {
                                echo '<script>alert(" inavlid password ")</script>';
                              }
                         }


                    ?>

                    <form action = "<?php echo $_SERVER["PHP_SELF"];?>" method = "post">
                        <form class="form-box px-2">
                            <div class="row">
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label>Old password</label>
                                    <input type="password" name = "oldpass" class="form-control" id="validationDefault03" required>
                                </div>
                                <div class="col-md-6 mt-md-0 mt-3">
                                    <label>New password</label>
                                    <input type="password" name = "newpass" class="form-control" id="validationDefault03" required>
                                </div>
                            </div> <br>
                            <button class="btn btn--radius-2 btn-dark" name="submit" type="submit">Update password</button>
                        </form>
                </div>
</body>

</html>