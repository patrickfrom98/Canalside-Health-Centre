<?php include("includes/default-header.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Signup
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['patient_signup'])) {
                        echo "<div class='alert alert-success'>";
                        echo "<strong>Success!</strong> Sign up completed Click here to <a href='index.php?action=login'>login</a>.";
                        echo "</div>";
                        $_SESSION['patient_signup'] = null;
                    }

                    if (isset($_SESSION['patient_signed_up'])) {
                        echo "<div class='alert alert-danger'>";
                        echo "<strong>Error!</strong> You have already signed up. Click here to <a href='index.php?action=login'>login</a>.";
                        echo "</div>";
                        $_SESSION['patient_signed_up'] = null;
                    }

                    if (isset($_SESSION['patient_not_found'])) {
                        echo "<div class='alert alert-danger'>";
                        echo "<strong>Error!</strong> We can't find your details. Click here to <a href='index.php?action=signup'>signup</a>.";
                        echo "</div>";
                        $_SESSION['patient_not_found'] = null;
                    }
                    ?>
                    <form action="index.php?action=signup-process" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                                </div>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-12 col-md-6">
                                    <label for="password">Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-key"></i>
                                        </span>
                                        </div>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm password">
                                </div>
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
                                <input type="text" class="form-control" name="patient_id" id="patient_id" placeholder="16-digit code">
                            </div>
                            <small id="patientIdHelp" class="form-text text-muted">The one given to you by our receptionists after registration. Eg. CHS004TP2...</small>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/default-footer.php"); ?>
