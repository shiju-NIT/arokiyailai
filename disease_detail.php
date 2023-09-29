<?php

session_start();

// Get the d_id parameter value from the URL
$d_id = isset($_GET['d_id']) ? $_GET['d_id'] : null;

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
    <style type="text/css">
        @media print {
  .page-header {
    display: none;
  }
  .sidebar-wrapper {
    display: none;
  }
  body {
    overflow: hidden;
  }
  ::-webkit-scrollbar {
    display: none;
  }

}

    </style>
    <style>
    .bullet-list {
        list-style-type: disc; /* You can change this to square, circle, etc. */
        margin-left: 20px; /* Adjust the indentation as needed */
    }
</style>
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
                                    <div class="card-title">Get More Insights about Cotton Leaf Diseases</div>
                                </div>


                                <?php

                                // Define the SQL query
                                if($d_id!=NULL){ $sql = "SELECT * FROM `disease` WHERE `id`=$d_id";}
                                else
                                {
                                    $sql = "SELECT * FROM disease";
                                }
                                
                               

                                // Execute the query and get the result set
                                $result = mysqli_query($conn, $sql);

                                // Check if there are any rows returned
                                if (mysqli_num_rows($result) > 0) {


                                    // Display the results using a while loop
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $image_location = "admin/disease/" . $row['image'];
                                        $symptomsArray = explode('.', $row['symptoms']);
                                        $survivalArray = explode('.', $row['survival']);
                                        $f_conditionArray = explode('.', $row['f_condition']);
                                        $managementArray = explode('.', $row['management']);
                                        $diseasecycleArray = explode('.', $row['disease_cycle']);
                                        $pesticideArray = explode(',', $row['pesticide']);

                                ?>
                                        <div class="card-body">
                                            <div class="card gradient-dark-grey2">
                                                <div class="card-body">
                                                    <div class="row gutters">
                                                        <div class="col-xxl-8 col-xl-8 col-lg-9 col-md-8 col-sm-8 col-12">
                                                        <div class="card-title"><?=$row['disease_name']?></div>

                                                        <div class="card-title">Symptoms</div>
                                                        <?php
                                                        foreach ($symptomsArray as $symp) {
                                                        ?>
<ul class="bullet-list">
    <li><h5 class="product-title"><?php echo htmlspecialchars($symp)?></h5></li>
</ul>
<?php
}
?>
<div class="card-title">Survival and Mode of Spread</div>
<?php
foreach ($survivalArray as $surv) {
?>
<ul class="bullet-list">
    <li><h5 class="product-title"><?php echo htmlspecialchars($surv)?></h5></li>
</ul>
<?php
}
?>
<div class="card-title">Favourable Conditions</div>
<?php
foreach ($f_conditionArray as $fcon) {
?>
<ul class="bullet-list">
    <li><h5 class="product-title"><?php echo htmlspecialchars($fcon)?></h5></li>
</ul>
<?php
}
?>
<div class="card-title">Management</div>
<?php
foreach ($managementArray as $manage) {
?>
<ul class="bullet-list">
    <li><h5 class="product-title"><?php echo htmlspecialchars($manage)?></h5></li>
</ul>
<?php
}
?>
<div class="card-title">Disease Cycle</div>
<?php
foreach ($diseasecycleArray as $discycle) {
?>
<ul class="bullet-list">
    <li><h5 class="product-title"><?php echo htmlspecialchars($discycle)?></h5></li>
</ul>
<?php
}
?>
<div class="card-title">Pesticide link</div>
<?php
foreach ($pesticideArray as $pest) {
?>
<ul class="bullet-list">
    <li><a href="<?php echo htmlspecialchars($pest)?>"><h5 class="product-title"><?php echo htmlspecialchars($pest)?></h5></a></li>
</ul>
<?php
}
?>


                                                        </div>
                                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                            <div class="product-list-card">
                                                                <h5><?=$row['disease_name']?></h5>
                                                                <img class="product-list-img" width="300" height="300" src="<?=$image_location?>" alt="<?=$row['disease_name']?>">
                                                                
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" onclick="window.print()">PRINT/PDF</button>
                                        </div>

                                <?php }
                                } ?>

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