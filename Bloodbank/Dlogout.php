<?php
include "Database.php";
session_start();
unset( $_SESSION["Did"]);
session_destroy();
header("location:Index.php");

?>