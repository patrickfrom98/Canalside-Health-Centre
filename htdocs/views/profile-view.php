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
            <li class="breadcrumb-item"><a href="index.php?action=profiles">Profiles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    User profile
                </div>
                <div class="card-body">
                    <form>
                        <!-- PATIENT PERSONAL DETAILS -->
                        <div class="form-group">
                            <label for="patient_id">Patient ID</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user-shield"></i>
                                </span>
                                </div>
                                <input type="text" class="form-control" name="patient_id" id="patient_id" placeholder="<?php echo $profile->getPatient()->getPatientId(); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Select Tag Reference - https://www.w3schools.com/tags/tag_select.asp -->
                            <label for="title">Title</label>
                            <select class="form-control" name="title" id="title" disabled>
                                <option value="Mr" <?php if ($profile->getPatient()->getTitle() === "Mr") { echo "selected"; } ?>>Mr</option>
                                <option value="Mrs" <?php if ($profile->getPatient()->getTitle() === "Mrs") { echo "selected"; } ?>>Mrs</option>
                                <option value="Miss" <?php if ($profile->getPatient()->getTitle() === "Miss") { echo "selected"; } ?>>Miss</option>
                                <option value="Ms" <?php if ($profile->getPatient()->getTitle() === "Ms") { echo "selected"; } ?>>Ms</option>
                                <option value="Master" <?php if ($profile->getPatient()->getTitle() === "Master") { echo "selected"; } ?>>Master</option>
                                <option value="Dr" <?php if ($profile->getPatient()->getTitle() === "Dr") { echo "selected"; } ?>>Dr</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <div class="form-check">
                                <!-- Radio Button Reference - https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/radio -->
                                <div>
                                    <input type="radio" class="form-check-input" name="gender" id="gender" value="M"
                                           <?php if ($profile->getPatient()->getGender() === "M") { echo "checked"; } ?> disabled>
                                    <label for="male" class="form-check-label">Male</label>
                                </div>
                                <div>
                                    <input type="radio" class="form-check-input" name="gender" value="F"
                                           <?php if ($profile->getPatient()->getGender() === "F") { echo "checked"; } ?> disabled>
                                    <label for="female" class="form-check-label">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-12 col-md-6">
                                    <label for="forename">Forename</label>
                                    <input type="text" class="form-control" id="forename" placeholder="<?php echo $profile->getPatient()->getForename(); ?>" disabled>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="surname">Surname</label>
                                    <input type="text" class="form-control" id="surname" placeholder="<?php echo $profile->getPatient()->getSurname(); ?>" disabled>
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
                                <input type="text" class="form-control" name="address_1" id="address_1" placeholder="<?php echo $profile->getAddress()->getAddress1(); ?>" disabled>
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
                                <input type="text" class="form-control" name="address_2" id="address_2" placeholder="<?php echo $profile->getAddress()->getAddress2(); ?>" disabled>
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
                                <input type="text" class="form-control" name="town" id="town" placeholder="<?php echo $profile->getAddress()->getTown(); ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="county">County</label>
                            <input type="text" class="form-control" name="county" id="county" placeholder="County" value="<?php echo $profile->getAddress()->getCounty(); ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="postcode">Postcode</label>
                            <input type="text" class="form-control" name="postcode" id="postcode" placeholder="<?php echo $profile->getAddress()->getPostcode(); ?>" disabled>
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
                                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="<?php echo $profile->getContact()->getMobile(); ?>" disabled>
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
                                <input type="text" class="form-control" name="landline" id="landline" placeholder="<?php echo $profile->getContact()->getLandline(); ?>" disabled>
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
                                <input type="text" class="form-control" name="email" id="email" placeholder="<?php echo $profile->getContact()->getEmail(); ?>" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/application-footer.php"); ?>