<?php
if (!isset($_SESSION['name'])) {
    header("Location: index.php?action=401");
}
?>

<?php include("includes/application-header.php"); ?>

<div class="container">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?action=home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Bookings</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Upcoming Appointments
                </div>
                <div class="card-body">
                    <?php
                    if (isset($upcoming)) {
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-striped table-bordered'>";
                        echo "<tr>";
                        echo "<th>Date</th>";
                        echo "<th>Time</th>";
                        echo "<th>Clinician</th>";
                        echo "</tr>";

                        foreach ($upcoming as $appointment) {
                            echo "<tr>";
                            echo "<td>{$appointment['diary_date']}</td>";
                            echo "<td>{$appointment['appointment_time']}</td>";
                            echo "<td>{$appointment['clinician_name']}</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Previous Appointments
                </div>
                <div class="card-body">
                    <?php
                    if (isset($previous)) {
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-striped table-bordered'>";
                        echo "<tr>";
                        echo "<th>Date</th>";
                        echo "<th>Time</th>";
                        echo "<th>Clinician</th>";
                        echo "</tr>";

                        foreach ($previous as $appointment) {
                            echo "<tr>";
                            echo "<td>{$appointment['diary_date']}</td>";
                            echo "<td>{$appointment['appointment_time']}</td>";
                            echo "<td>{$appointment['clinician_name']}</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/application-footer.php"); ?>
