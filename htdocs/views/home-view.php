<?php
if (!isset($_SESSION['name'])) {
    header("Location: index.php?action=401");
}
?>

<?php include("includes/application-header.php"); ?>

<div class="container">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </div>
    <div class="jumbotron">
        <h1 class="display-4">Welcome <?php echo $_SESSION['name']; ?></h1>
        <p class="lead">Access all functionality from the dashboard.</p>
        <hr class="my-4">
        <p>To quick jump to appointments, click below.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="index.php?action=appointments" role="button">Appointments</a>
        </p>
    </div>
</div>

<?php include("includes/application-footer.php"); ?>
