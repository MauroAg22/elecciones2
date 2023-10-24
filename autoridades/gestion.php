<?php 
session_start();

if (!$_SESSION["login"]) {
    header("location:../autoridades");
}

?>

<?php include "../navbar/head-atd.php"; ?>



<?php include "../navbar/footer-atd.php"; ?>