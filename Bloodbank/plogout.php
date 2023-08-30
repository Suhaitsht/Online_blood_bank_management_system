<?php
include "Database.php";
session_start();
unset( $_SESSION["H_password"]);
session_destroy();
header("location:Index.php");

?>