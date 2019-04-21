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
            <li class="breadcrumb-item active" aria-current="page">Users</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    Create a staff account
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['staff_account_added'])) {
                        echo "<div class='alert alert-success'>";
                        echo "<strong>Success!</strong> Staff account added.";
                        echo "</div>";
                        $_SESSION['staff_account_added'] = null;
                    }
                    ?>
                    <form action="index.php?action=add-user-process" method="post">
                        <div class="form-group">
                            <label for="reg_user">Username</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                                </div>
                                <input type="text" class="form-control" name="username" id="reg_user" placeholder="Username">
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
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user-tag"></i>
                            </span>
                                </div>
                                <select class="form-control" name="role" id="role">
                                    <option value="Receptionist">Receptionist</option>
                                    <option value="GP">GP</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="add_account" value="Add Account">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    View user profiles
                </div>
                <div class="card-body">
                    <form action="index.php?action=find-user-process" method="POST">
                        <div class="form-group">
                            <label for="search">Username</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                                </div>
                                <input type="text" class="form-control" name="username" id="search" placeholder="Username">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="search" value="Search">
                    </form>
                    <?php
                    if ($user) {
                        echo "<p>{$user['username']}</p>";
                    }
                    ?>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a class="card-link" href="index.php?action=profiles">View All</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php include("includes/application-footer.php"); ?>
