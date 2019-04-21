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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Book Appointment
                    </div>
                    <div class="card-body">

                        <?php
                        if (isset($_SESSION['appointment_not_booked'])) {
                            echo "<div class='alert alert-danger'>";
                            echo "<strong>Error!</strong> Something went wrong, please re-book the appointment.";
                            echo "</div>";
                            $_SESSION['appointment_not_booked'] = null;
                        }

                        if (isset($_SESSION['appointment_already_exists'])) {
                            echo "<div class='alert alert-danger'>";
                            echo "<strong>Error!</strong> This appointment time has already been filled.";
                            echo "</div>";
                            $_SESSION['appointment_already_exists'] = null;
                        }

                        if (isset($_SESSION['appointment_booked'])) {
                            echo "<div class='alert alert-success'>";
                            echo "<strong>Success!</strong> Appointment booked.";
                            echo "</div>";
                            $_SESSION['appointment_booked'] = null;
                        }
                        ?>

                        <form action="index.php?action=booking-process" method="post">
                            <div class="form-group">
                                <label for="diary">Diary</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-book-medical"></i>
                                        </span>
                                    </div>
                                    <select class="form-control" name="diary" id="diary">
                                        <?php
                                        foreach ($diaries as $diary) {
                                            echo "<option value='{$diary->getId()}'>{$diary->getName()}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="time">Time</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-clock"></i>
                                        </span>
                                    </div>
                                    <!-- Reference: https://stackoverflow.com/questions/1494671/regular-expression-for-matching-time-in-military-24-hour-format -->
                                    <input type="text" class="form-control" name="time" id="time" placeholder="Time Eg. 08:30" pattern="^([01]\d|2[0-3]):(00|15|30|45)$" title="Time should be a valid time in 24 hour format. Eg. 08:30" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="patient_id">Patient ID</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-user-shield"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="patient_id" id="patient_id" placeholder="16-digit code" pattern="CHS[0-9]{13}" title="Patient ID has to match the format of 'CHS' followed by 13 digits" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="patient_name">Patient Name</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="patient_name" id="patient_name" placeholder="Patients full name. Eg. Mr John Doe" required>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" name="submit" value="Book">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include("includes/application-footer.php"); ?>