<?php include("includes/application-header.php"); ?>

<div class="container">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </div>
    <div class="jumbotron">
        <h1 class="display-4">Welcome, <?php echo $_SESSION['name']; ?></h1>
        <p class="lead">This is the Canalside Health Centre <strong>dashboard</strong>. Access all areas using the top navigation or dashboard functions.</p>
        <hr class="my-4">
        <p>View today's upcoming appointments and ledgers</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="index.php?action=appointments" role="button">Appointments</a>
        </p>
    </div>
    <div class="row">
        <div class="col-12">

        </div>
    </div>
</div>

<?php include("includes/application-footer.php"); ?>
