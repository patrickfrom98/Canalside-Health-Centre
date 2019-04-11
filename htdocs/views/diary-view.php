
<?php include("includes/application-header.php"); ?>

<div class="container">
    <div aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?action=home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Diaries</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    Open a new diary
                </div>
                <div class="card-body">
                    <form action="index.php?action=add-diary-process" method="post">
                        <div class="form-group">
                            <label for="diary_name">Diary Name</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-book-medical"></i>
                            </span>
                                </div>
                                <input type="text" class="form-control" name="diary_name" id="diary_name" placeholder="Diary Name Eg. Dr Hindal 08:00 - 18:00" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="diary_date">Diary Date</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-calendar-times"></i>
                            </span>
                                </div>
                                <input type="text" class="form-control" name="diary_date" id="diary_date" placeholder="Date Eg. 2019-03-22" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="clinician_name">Clinician Name</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-user-md"></i>
                            </span>
                                </div>
                                <input type="text" class="form-control" name="clinician_name" id="clinician_name" placeholder="Clinician name Eg. Dr Hindal" required>
                                <small id="clinicianHelp" class="form-text text-muted">Select the clinician who will own this diary, so that the diary shows up on their dashboard.</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-12 col-md-6">
                                    <label for="start_time">Start Time</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-clock"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="start_time" id="start_time" placeholder="Start time Eg. 08:00:00" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="finish_time">Finish Time</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-clock"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="end_time" id="finish_time" placeholder="End time Eg. 18:00:00" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="add_diary" value="Add Diary">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    Current diaries
                </div>
                <div class="card-body">
                    <!-- Reference: https://www.w3schools.com/html/html_tables.asp -->
                    <?php
                    if ($diaries) {
                        echo "<div class='table-responsive'>";
                        echo "<table class='table table-striped table-bordered'>";
                        echo "<tr>";
                        echo "<th>Diary</th>";
                        echo "<th>Clinician</th>";
                        echo "<th>Start</th>";
                        echo "<th>End</th>";
                        echo "</tr>";

                        foreach ($diaries as $diary) {
                            echo "<tr>";
                            echo "<td>{$diary->getName()}</td>";
                            echo "<td>{$diary->getOwner()}</td>";
                            echo "<td>{$diary->getStart()}</td>";
                            echo "<td>{$diary->getEnd()}</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                        echo "</div>";
                    } else {
                        echo "<h4>No diaries have been setup for today</h4>";
                    }
                    ?>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a class="card-link" href="index.php?action=appointments">View Appointments</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php include("includes/application-footer.php"); ?>
