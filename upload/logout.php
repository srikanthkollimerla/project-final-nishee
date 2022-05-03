<?php session_start();

unset($_SESSION['empid']);
unset($_SESSION['pname']);

header("Location:index.php");

?>