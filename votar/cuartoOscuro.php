<?php

session_start();

if (isset($_SESSION["dni"])) {
    $_SESSION["votar"] = true;
    header("location:votar.php");
} else {
    header("location:index.php");
}

?>