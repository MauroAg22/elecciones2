<?php
// session_start();

// if (!$_SESSION["login"]) {
//     header("location:../autoridades");
// }

?>

<?php include "../navbar/head-atd.php"; ?>

<style>
    body,
    html {
        background-color: #fff;
    }
</style>


<div class="row mt-5">
    <div class="col">
        <div class="progress border" style="height: 30px;">
            <div class="progress-bar bg-success" role="progressbar" aria-label="Example with label" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
        </div>
    </div>
    <div class="col">
        <div class="progress border" style="height: 30px;">
            <div class="progress-bar bg-warning" role="progressbar" aria-label="Example with label" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">55%</div>
        </div>
    </div>
    <div class="col">
        <div class="progress border" style="height: 30px;">
            <div class="progress-bar bg-danger" role="progressbar" aria-label="Example with label" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
        </div>
    </div>
</div>







<?php include "../navbar/footer-atd.php"; ?>