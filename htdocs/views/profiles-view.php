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
            <li class="breadcrumb-item"><a href="index.php?action=users">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profiles</li>
        </ol>
    </div>
    <div class="card">
        <div class="card-header">
            All users
        </div>
        <div class="card-body">
            <?php
            if (isset($allPatients)) {
                echo "<div class='table-responsive'>";
                echo "<table class='table table-striped table-bordered'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>Patient ID</th>";
                echo "<th>Full Name</th>";
                echo "<th>Gender</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                foreach ($allPatients as $patient) {
                    echo "<tr>";
                    echo "<td><a href='index.php?action=profile&pid={$patient['patient_id']}'>{$patient['patient_id']}</td>";
                    echo "<td>{$patient['title']} {$patient['forename']} {$patient['surname']}</td>";
                    echo "<td>{$patient['gender']}</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
                echo "</div>";

                echo "<ul class='pagination justify-content-end''>";
                for ($i = 0; $i < count($allPatients) / 50; $i++) {
                    $number = $i + 1;
                    echo "<li class='page-item'><a class='page-link' href='index.php?action=profiles&offset={$i}'>$number</a></li>";
                }
                echo "</ul>";
            } else {
                echo "<p>We can't find any patients at this time.";
            }
            ?>
        </div>
    </div>
</div>

<?php include("includes/application-footer.php"); ?>