<?php
include "Database.php";
session_start();
unset( $_SESSION['D_id']);
session_destroy();
header("location:Index.php");

?>