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
            <li class="breadcrumb-item active" aria-current="page">Registration</li>
        </ol>
    </div>
    <?php
    if ($notify) {
        echo "<div class='alert alert-success'>";
        echo "<strong>Success!</strong> New patient registered with the surgery.";
        echo "</div>";
    }
    ?>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    Register a patient
                </div>
                <div class="card-body">
                    <form action="index.php?action=register-process" method="POST">
                        <!-- PATIENT PERSONAL DETAILS -->
                        <div class="form-group">
                            <label for="patient_id">Patient ID</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user-shield"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="patient_id" id="patient_id" placeholder="Patient ID" <?php echo "value='{$id}'" ?> readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Select Tag Reference - https://www.w3schools.com/tags/tag_select.asp -->
                            <label for="title">Title</label>
                            <select class="form-control" name="title" id="title">
                                <option value="Mr">Mr</option>
                                <option value="Mrs">Mrs</option>
                                <option value="Miss">Miss</option>
                                <option value="Ms">Ms</option>
                                <option value="Master">Master</option>
                                <option value="Dr">Dr</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <div class="form-check">
                                <!-- Radio Button Reference - https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/radio -->
                                <div>
                                    <input type="radio" class="form-check-input" name="gender" id="gender" value="M">
                                    <label for="male" class="form-check-label">Male</label>
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="gender" value="F">
                                    <label for="female" class="form-check-label">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-12 col-md-6">
                                    <label for="forename">Forename</label>
                                    <input type="text" class="form-control" name="forename" id="forename" placeholder="First name">
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="surname">Surname</label>
                                    <input type="text" class="form-control" name="surname" id="surname" placeholder="Last name">
                                </div>
                            </div>
                        </div>
                        <!-- PATIENT ADDRESS DETAILS -->
                        <div class="form-group">
                            <label for="address_1">House name</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-home"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="address_1" id="address_1" placeholder="House number/name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address_2">Road name</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-road"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="address_2" id="address_2" placeholder="Road name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="town">Town</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-map-marker-alt"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="town" id="town" placeholder="Town" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="county">County</label>
                            <input type="text" class="form-control" name="county" id="county" placeholder="County" value="West Yorkshire">
                        </div>
                        <div class="form-group">
                            <label for="postcode">Postcode</label>
                            <input type="text" class="form-control" name="postcode" id="postcode" placeholder="Postcode" required>
                        </div>
                        <!-- PATIENT CONTACT DETAILS -->
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-sms"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="landline">Landline</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="landline" id="landline" placeholder="Landline" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-at"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="register" value="Register">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    Unregister a patient
                </div>
                <div class="card-body">
                    <form action="index.php?action=find-patient-process" method="post">
                        <div class="form-group">
                            <label for="pid">Patient ID</label>
                            <input type="text" class="form-control" name="pid" id="pid" placeholder="Search by Patient ID" required>
                        </div>
                        <input type="submit" class="btn btn-primary" name="unregister" value="Retrieve">
                    </form>
                    <?php
                    if (isset($patient)) {
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-striped'>";
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>ID</th>";
                        echo "<th>Forename</th>";
                        echo "<th>Surname</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td><a href='index.php?action=profile&pid={$patient->getPatientId()}'>{$patient->getPatientId()}</a></td>";
                        echo "<td>{$patient->getForename()}</td>";
                        echo "<td>{$patient->getSurname()}</td>";
                        echo "</tr>";
                        echo "</tbody>";
                        echo "</table>";
                        echo "</div>";
                    } else {
                        echo "<div class='alert alert-danger'>";
                        echo "<strong>Error!</strong> No patient found with this ID.";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/application-footer.php"); ?>
