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
                            <div class="card gradient-dark-grey">
                                <div class="card-header">
                                    <div class="card-title">Reports</div>

                                </div>
                                <div class="card-body">
                                    <div class="row gutters">

                                        <?php

                                        // Define the SQL query
                                        $sql = "SELECT * FROM pest_disease";

                                        // Execute the query and get the result set
                                        $result = mysqli_query($conn, $sql);

                                        // Check if there are any rows returned
                                        if (mysqli_num_rows($result) > 0) {


                                            // Display the results using a while loop
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $image_location="admin/pest_disease/" . $row['image'];


                                        ?>

                                                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                
                                                    <div class="product-card"><img class="product-card-img-top" width="240" height="240" src=<?=$image_location?> alt="<?=$row['image']?>">
                                                        <div class="product-card-body">
                                                            <h5 class="product-title"><?=$row['pest_name']?></h5>
                                                            
                                                            
                                                            
                                                            <div class="product-actions"><a href="pestdisease_detail.php?d_id=<?=$row['id']?>"><button class="btn btn-success">Click for Symptoms</button></a>
</div>
                                                        </div>
                                                    </div>
                                                </div>



                                            <?php
                                                
                                            }
                                        } else {
                                            // Display a message if no rows are returned
                                            ?>

                                            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="product-card"><img class="product-card-img-top" src="img/food/img6.jpg" alt="Card image cap">
                                                    <div class="product-card-body">
                                                        <h5 class="product-title">No Records Found</h5>

                                                        <div class="product-actions"><a href="upload_image.php"><button class="btn btn-danger addToCart">Click to check !</button></a></div>

                                                    </div>
                                                </div>
                                            </div>


                                        <?php
                                        }
                                        ?>

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
    <script src="vendor/rating/raty.js"></script>
    <script src="vendor/rating/raty-custom.js"></script>
    <script src="js/main.js"></script>
    <script src="js/product.js"></script>
</body>

</html>