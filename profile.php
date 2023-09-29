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
</head>

<body>
    <div class="page-wrapper">
        <?php include("includes/nav.php"); ?>
        <div class="main-container">
            <?php include("includes/header.php"); ?>
            <div class="content-wrapper-scroll">
                <div class="content-wrapper">
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="profile-header">
                                <h1>Welcome, <?= $_SESSION['name'] ?></h1>
                                <div class="profile-header-content">
                                    <div class="profile-header-tiles">



                                        <?php

                                        // Define the SQL query
                                        $sql = "SELECT * FROM `login` WHERE `id`=$user_id";

                                        // Execute the query and get the result set
                                        $result = mysqli_query($conn, $sql);

                                        // Check if there are any rows returned
                                        if (mysqli_num_rows($result) > 0) {


                                            // Display the results using a while loop
                                            while ($row = mysqli_fetch_assoc($result)) {


                                        ?>



                                                <div class="row gutters">
                                                    <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="profile-tile"><span class="icon"><i class="icon-location_history"></i></span>
                                                            <h6>Name - <span><?=$row['username']?></span></h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="profile-tile"><span class="icon"><i class="icon-email"></i></span>
                                                            <h6>Email - <span><?=$row['email']?></span></h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="profile-tile"><span class="icon"><i class="icon-contacts"></i></span>
                                                            <h6>Contact - <span><?=$row['phone']?></span></h6>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="profile-tile"><span class="icon"><i class="icon-map"></i></span>
                                                            <h6>Location - <span><?=$row['location']?></span></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="profile-avatar-tile"><img src="img/user2.png" class="img-fluid" alt="User Profile"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-12">
                            <div class="stats-tile1 gradient-teal">
                                <div class="stats-icon1 gradient-pearl"><i class="icon-receipt"></i></div>
                                <h3>2</h3>
                                <h4>Predictions</h4>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-12">
                            <div class="stats-tile1 gradient-orange">
                                <div class="stats-icon1 gradient-pearl"><i class="icon-stars"></i></div>
                                <h3>7</h3>
                                <h4>Predictions</h4>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 col-12">
                            <div class="stats-tile1 gradient-green">
                                <div class="stats-icon1 gradient-pearl"><i class="icon-money"></i></div>
                                <h3>9500</h3>
                                <h4>Predictions</h4>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="create-offer-container">
                                <h4>Share your thoughts</h4>
                                <div class=" control-dark"><textarea class="form-control" rows="3">Hello,</textarea></div>
                                <div class="share-thoughts-footer">
                                    <div class="share-icons"><a href="#"><i class="icon-map"></i></a><a href="#"><i class="icon-attach_email"></i></a><a href="#"><i class="icon-camera_alt"></i></a><a href="#"><i class="icon-supervised_user_circle"></i></a></div><button class="btn btn-light btn-sm">Post</button>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php

                                            }
                                        }


            ?>

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
    <script src="vendor/apex/apexcharts.min.js"></script>
    <script src="vendor/apex/custom/profile/revenue.js"></script>
    <script src="vendor/rating/raty.js"></script>
    <script src="vendor/rating/raty-custom.js"></script>
    <script src="js/main.js"></script>
</body>

</html>