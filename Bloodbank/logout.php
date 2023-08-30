<?php
include "Database.php";
session_start();
unset( $_SESSION["id"]);
session_destroy();
header("location:Index.php");

?>