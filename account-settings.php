<?php 


session_start();

include("includes/config.php");


// Check if the user is logged in
if (isset($_SESSION['user_id']) && isset($_SESSION['name']) && !empty($_SESSION['user_id']) && !empty($_SESSION['name'])) {
    // User is logged in, store the session variables in variables
    $user_id = $_SESSION['user_id'];
    $name = $_SESSION['name'];
} else {
    // User is not logged in, redirect to login page
    header('Location: index.php');
    exit();
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=<?= $description ?>>
    <meta name="author" content=<?= $author ?>>
    <link rel="shortcut icon" href=<?= $fav_icon ?>>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/icomoon/icomoon.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="vendor/overlay-scroll/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="vendor/daterange/daterange.css">
    <link rel="stylesheet" href="vendor/dropzone/dropzone.min.css" />
</head>

<body>
    <div class="page-wrapper">
    <?php include("includes/nav.php"); ?>
        <div class="main-container">
        <?php include("includes/header.php"); ?>
            <div class="content-wrapper-scroll">
                <div class="content-wrapper">
                    <div class="row gutters">
                        <div class="col-xl-12">
                            <div class="card gradient-dark-grey">
                                <div class="card-body">
                                    <div class="row gutters">
                                        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                                            <div class="row gutters">
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="d-flex flex-row"><img src="img/user2.png"
                                                            class="img-fluid change-img-avatar" alt="Image">
                                                        <div id="dropzone-sm" class="mb-4 dropzone-dark">
                                                            <form action="https://www.kodingwife.com/upload"
                                                                class="dropzone needsclick dz-clickable"
                                                                id="demo-upload">
                                                                <div class="dz-message needsclick"><button type="button"
                                                                        class="dz-button">Change Image.</button></div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row gutters">
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <div class="mb-3 control-dark"><label for="fullName"
                                                            class="form-label">Full Name</label><input type="text"
                                                            class="form-control" id="fullName" placeholder="Full Name">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <div class="mb-3 control-dark"><label for="emailID"
                                                            class="form-label">Email ID</label><input type="email"
                                                            class="form-control" id="emailID"
                                                            placeholder="reese@meail.com"></div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <div class="mb-3 control-dark"><label for="phoneNo"
                                                            class="form-label">Phone</label><input type="number"
                                                            class="form-control" id="phoneNo"
                                                            placeholder="123-456-7890"></div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <div class="mb-3 control-dark"><label for="address"
                                                            class="form-label">Address</label><input type="text"
                                                            class="form-control" id="address" placeholder="Address">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <div class="mb-3 control-dark"><label for="city"
                                                            class="form-label">City</label><input type="text"
                                                            class="form-control" id="city" placeholder="City"></div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <div class="mb-3 control-dark"><label for="state"
                                                            class="form-label">State</label><input type="text"
                                                            class="form-control" id="state" placeholder="State"></div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <div class="mb-3 control-dark"><label for="zipCode"
                                                            class="form-label">Zip Code</label><input type="text"
                                                            class="form-control" id="zipCode" placeholder="Zip Code">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <div class="mb-3 control-dark"><label for="country"
                                                            class="form-label">Country</label><select
                                                            class="form-control" id="country">
                                                            <option>United States</option>
                                                            <option>Australia</option>
                                                            <option>Canada</option>
                                                            <option>Gremany</option>
                                                            <option>India</option>
                                                            <option>Japan</option>
                                                            <option>England</option>
                                                            <option>Brazil</option>
                                                        </select></div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <div class="mb-3 control-dark"><label for="enterPassword"
                                                            class="form-label">Password</label><input type="password"
                                                            class="form-control" id="enterPassword"
                                                            placeholder="Enter Password"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="account-settings-block">
                                                <div class="settings-block">
                                                    <div class="settings-block-title">Change Plan</div>
                                                    <div class="settings-block-body">
                                                        <div class="pricing-change-plan"><a href="#"
                                                                class="gradient-teal active-plan">
                                                                <h5>$29</h5>
                                                                <h6>Basic</h6>
                                                            </a><a href="#" class="gradient-green">
                                                                <h5>$59</h5>
                                                                <h6>Business</h6>
                                                            </a><a href="#" class="gradient-peach">
                                                                <h5>$99</h5>
                                                                <h6>Enterprise</h6>
                                                            </a></div>
                                                    </div>
                                                </div>
                                                <div class="settings-block">
                                                    <div class="settings-block-title">Other Settings</div>
                                                    <div class="settings-block-body">
                                                        <div class="list-group">
                                                            <div
                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                <div>Show desktop notifications</div>
                                                                <div class="form-check form-switch"><input
                                                                        class="form-check-input" type="checkbox"
                                                                        id="showNotifications"><label
                                                                        class="form-check-label"
                                                                        for="showNotifications"></label></div>
                                                            </div>
                                                            <div
                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                <div>Show email notifications</div>
                                                                <div class="form-check form-switch"><input
                                                                        class="form-check-input" type="checkbox"
                                                                        id="showEmailNotifications" checked><label
                                                                        class="form-check-label"
                                                                        for="showEmailNotifications"></label></div>
                                                            </div>
                                                            <div
                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                <div>Show chat notifications</div>
                                                                <div class="form-check form-switch"><input
                                                                        class="form-check-input" type="checkbox"
                                                                        id="showChatNotifications"><label
                                                                        class="form-check-label"
                                                                        for="showChatNotifications"></label></div>
                                                            </div>
                                                            <div
                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                <div>Show purchase history</div>
                                                                <div class="form-check form-switch"><input
                                                                        class="form-check-input" type="checkbox"
                                                                        id="showPurchaseNotifications"><label
                                                                        class="form-check-label"
                                                                        for="showPurchaseNotifications"></label></div>
                                                            </div>
                                                            <div
                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                <div>Show orders</div>
                                                                <div class="form-check form-switch"><input
                                                                        class="form-check-input" type="checkbox"
                                                                        id="showOrders"><label class="form-check-label"
                                                                        for="showOrders"></label></div>
                                                            </div>
                                                            <div
                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                <div>Show alerts</div>
                                                                <div class="form-check form-switch"><input
                                                                        class="form-check-input" type="checkbox"
                                                                        id="showAlerts"><label class="form-check-label"
                                                                        for="showAlerts"></label></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <hr class="light"><button class="btn btn-info">Save Settings</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php include("includes/footer.php"); ?>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/moment.js"></script>
    <script src="vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
    <script src="vendor/overlay-scroll/custom-scrollbar.js"></script>
    <script src="vendor/daterange/daterange.js"></script>
    <script src="vendor/daterange/custom-daterange.js"></script>
    <script src="vendor/dropzone/dropzone.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>