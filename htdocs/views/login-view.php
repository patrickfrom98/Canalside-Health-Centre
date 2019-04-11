<?php include("includes/default-header.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <?php
                    if (isset($errorMsg)) {
                        echo "<div class='alert alert-danger'>";
                        echo "<strong>Error!</strong> Your login details are incorrect.";
                        echo "</div>";
                    }
                    ?>
                    <form action="index.php?action=login-process" method="POST">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                                </div>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-key"></i>
                            </span>
                                </div>
                                <!-- Reference: https://www.w3schools.com/tags/att_input_pattern.asp -->
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" pattern=".{8,}" title="Password must contain 8 or more characters" required>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="login_btn" value="Login">
                    </form>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a class="card-link" href="index.php?action=signup">Signup</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php include("includes/default-footer.php"); ?>
