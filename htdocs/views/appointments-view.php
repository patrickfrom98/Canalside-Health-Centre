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
            <li class="breadcrumb-item"><a href="index.php?action=diary">Diaries</a></li>
            <li class="breadcrumb-item active" aria-current="page">Appointments</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-12">
            <?php
            if (isset($diaries)) {
                foreach ($diaries as $diary) {
                    echo "<div class='card'>";
                    echo "<div class='card-header'>{$diary->getName()}</div>";
                    echo "<div class='card-body'>";
                    echo "<div class='table-responsive'>";
                    echo "<table class='table table-bordered'>";

                    $startTime = $diary->getStart();
                    $appointments = $diary->getAppointments();

                    for ($i = 0; $i < $diary->getNoOfAppointments(); $i++) {
                        echo "<tr>";
                        $time = date('H:i', strtotime($startTime) + ($i * 60 * 15)); // sets correct time for appointment
                        echo "<td>{$time}</td>";

                        $appointment = $diary->getAppointment($time);
                        if (isset($appointment)) {
                            echo "<td>{$appointment->getPatientName()}</td>";
                        } else {
                            echo "<td></td>";
                        }
                        echo "</tr>";
                    }

                    echo "</table>";
                    echo "</div>";
                    echo "</div>";
                    echo "<ul class='list-group list-group-flush'>";
                    echo "<li class='list-group-item'><a class='btn btn-primary' href='index.php?action=booking'>Book Appointment</a></li>";
                    echo "</ul>";
                    echo "</div>";
                }
            } else {
                echo "<p>No diaries have been setup for today</p>";
            }
            ?>
        </div>
    </div>
</div>

<?php include("includes/application-footer.php"); ?>