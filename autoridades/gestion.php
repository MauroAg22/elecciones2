<?php 
session_start();

if (!$_SESSION["login"]) {
    header("location:index.php");
}

?>

<?php include "../navbar/head-autoridades.php"; ?>



<?php include "../navbar/footer.php"; ?>