<?php
if (!isset($_SESSION['name'])) {
    header("Location: index.php?action=401");
}
?>

<?php include("includes/application-header.php"); ?>

<div class="container custom">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </div>
    <?php
    if ($_SESSION['role'] === "Receptionist") {
        echo "<div class='jumbotron'>";
        echo "<h1 class='display-4'>Welcome {$_SESSION['name']}</h1>";
        echo "<p class='lead'>Access all functionality from the dashboard.</p>";
        echo "<hr class='my-4'>";
        echo "<p>To quick jump to appointments, click below.</p>";
        echo "<p class='lead'>";
        echo "<a class='btn btn-primary btn-lg' href='index.php?action=appointments' role='button'>Appointments</a>";
        echo "</p>";
        echo "</div>";
    } else if ($_SESSION['role'] === "Patient") {
        echo "<div class='jumbotron'>";
        echo "<h1 class='display-4'>Welcome {$_SESSION['name']}</h1>";
        echo "<p class='lead'>View your personal details and appointments</p>";
        echo "<hr class='my-4'>";
        echo "<p>To quick jump to each area, click below.</p>";
        echo "<p class='lead'>";
        echo "<a class='btn btn-primary btn-lg' style='margin-right: 10px;' href='index.php?action=details' role='button'>Details</a>";
        echo "<a class='btn btn-danger btn-lg' href='index.php?action=bookings' role='button'>Bookings</a>";
        echo "</p>";
        echo "</div>";
    }
    ?>
</div>

<?php include("includes/application-footer.php"); ?>
