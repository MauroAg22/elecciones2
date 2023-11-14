<?php

session_start();

$_SESSION["votar"] = true;

header("location:votar.php");

?>