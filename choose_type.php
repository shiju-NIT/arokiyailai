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
    <meta name="description" content=<?=$description?>>
    <meta name="author" content=<?=$author?>>
    <link rel="shortcut icon" href=<?=$fav_icon?>>
    <title><?=$title?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/icomoon/icomoon.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="vendor/overlay-scroll/OverlayScrollbars.min.css">
</head>

<body>
    <div id="loading-wrapper">
        <div class="spinner-border"></div>
        <div class="loading-messsage">
            <span>L</span><span>o</span><span>a</span><span>d</span><span>i</span><span>n</span><span>g</span></div>
    </div>
    <div class="page-wrapper">
        <?php include("includes/nav.php");?>
        <div class="main-container">
        <?php include("includes/header.php");?>
            <div class="content-wrapper-scroll">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <h5>Choose your prediction type</h5>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="card gradient-green card-150">
                            <a href="capture_image.php">
                                <div class="card-body">
                                    <div class="sales-tile3">
                                        <div class="sales-tile3-block">
                                            <div class="sales-tile3-icon green"><i class="icon-camera animate__animated animate__swing"></i>
                                            </div>
                                            <div class="sales-tile3-details">
                                                <h5>Take Live Leaf image</h5>
                                                <!-- <h2>927</h2><span>+8.2% since last week</span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="card gradient-violet-pink card-150">
                            <a href="upload_image.php">
                                <div class="card-body">
                                    <div class="sales-tile3">
                                        <div class="sales-tile3-block">
                                            <div class="sales-tile3-icon peach"><i class="icon-camera animate__animated animate__swing"></i></div>
                                            <div class="sales-tile3-details">
                                                <h5>Upload Leaf image</h5>
                                                <!-- <h2>271</h2><span>+3.7% since yesterday</span> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>


                    
                    
                </div>
                <?php include("includes/footer.php");?>
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
    <script src="vendor/apex/custom/home3/notificationsGraph.js"></script>
    <script src="vendor/apex/custom/home3/signupsGraph.js"></script>
    <script src="vendor/apex/custom/home3/qtrTargetGraph.js"></script>
    <script src="vendor/apex/custom/home3/ordersGraph.js"></script>
    <script src="vendor/apex/custom/home3/revenueGraph.js"></script>
    <script src="vendor/circliful/circliful.min.js"></script>
    <script src="vendor/circliful/circliful.custom.js"></script>
    <script src="js/main.js"></script>
</body>

</html>