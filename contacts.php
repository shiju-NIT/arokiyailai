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
    <link rel="stylesheet" href="vendor/daterange/daterange.css">
    <link rel="stylesheet" href="vendor/dropzone/dropzone.min.css" />
</head>

<body>
    <div class="page-wrapper">
    <?php include("includes/nav.php");?>
        <div class="main-container">
        <?php include("includes/header.php");?>
            <div class="content-wrapper-scroll">
                <div class="content-wrapper">
                    <div class="row gutters">
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="card gradient-teal">
                                <div class="contact-card"><img
                                        src="img/user2.png" alt="Cliq Admin" class="contact-avatar">
                                    <h5>Name</h5>
                                    <ul class="list-group">
                                        <li class="list-group-item"><span>Email: </span>sample@mail.com</li>
                                        <li class="list-group-item"><span>Phone: </span>+91 123456789</li>
                                        <li class="list-group-item"><span>Location: </span>Chennai</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="card gradient-grey2">
                                <div class="contact-card"><img
                                        src="img/user5.png" alt="Cliq Admin" class="contact-avatar">
                                        <h5>Name</h5>
                                    <ul class="list-group">
                                        <li class="list-group-item"><span>Email: </span>sample@mail.com</li>
                                        <li class="list-group-item"><span>Phone: </span>+91 123456789</li>
                                        <li class="list-group-item"><span>Location: </span>Chennai</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="card gradient-peach">
                                <div class="contact-card"><img
                                        src="img/user3.png" alt="Cliq Admin" class="contact-avatar">
                                        <h5>Name</h5>
                                    <ul class="list-group">
                                        <li class="list-group-item"><span>Email: </span>sample@mail.com</li>
                                        <li class="list-group-item"><span>Phone: </span>+91 123456789</li>
                                        <li class="list-group-item"><span>Location: </span>Chennai</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                       
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                            <div class="card gradient-red">
                                <div class="contact-card"><img
                                        src="img/user3.png" alt="Cliq Admin" class="contact-avatar">
                                        <h5>Name</h5>
                                    <ul class="list-group">
                                        <li class="list-group-item"><span>Email: </span>sample@mail.com</li>
                                        <li class="list-group-item"><span>Phone: </span>+91 123456789</li>
                                        <li class="list-group-item"><span>Location: </span>Chennai</li>
                                    </ul>
                                </div>
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
    <script src="vendor/daterange/daterange.js"></script>
    <script src="vendor/daterange/custom-daterange.js"></script>
    <script src="vendor/dropzone/dropzone.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>