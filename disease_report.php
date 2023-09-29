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
    <style>
    .product-title {
    margin-bottom: 10px; /* Add space below the heading */
}

.product-title::after {
    content: "\A"; /* This is the CSS for adding a line break */
    white-space: pre; /* Preserve whitespace */
}

.product-title::before {
    content: "\2022"; /* Bullet point character */
    margin-right: 5px; /* Space between bullet point and text */
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
                                    <div class="card-title">Welcome, <?= $_SESSION['name'] ?></div>
                                </div>


                                <?php
                                // Define the SQL query
                                $sql = "SELECT * FROM camera WHERE `prediction`='".$_GET['d_id']."' AND `id`='".$_GET['usr_id']."'";
                                
                               

                                // Execute the query and get the result set
                                $result = mysqli_query($conn, $sql);

                                // Check if there are any rows returned
                                if (mysqli_num_rows($result) > 0) {


                                    // Display the results using a while loop
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $image_location = "uploads/" . $row['camera'];
                                        $usr_id = $row['id'];

                                ?>
                                        <div class="card-body">
                                            <div class="card gradient-dark-grey2">
                                                <div class="card-body">
                                                    <?php
                                    $predict=mysqli_query($conn,"SELECT * FROM `disease` where `id`='".$row['prediction']."'")or die(mysqli_error($conn));
                                    $prediction=mysqli_fetch_array($predict);

                                    $fpo_details=mysqli_query($conn,"SELECT * FROM `fpo` where `operational_area`='".$row['place']."'")or die(mysqli_error($conn));
                                    $fpo=mysqli_fetch_array($fpo_details);

                                    $dist=mysqli_query($conn,"SELECT * FROM `login` where `id`='".$_SESSION['user_id']."'")or die(mysqli_error($conn));
                                    $district=mysqli_fetch_array($dist);

                                ?>
                                <?php
                                                
                    $query="SELECT * FROM `fpo`";
                                $disease_details=mysqli_query($conn,$query);
                                while($disease_details_array=mysqli_fetch_array($disease_details))
                                {
                                    $dur = $disease_details_array['district_id'];
                                    // echo $dur;
                                }
                    ?>
                                <?php
// URL to share
$url = "http://localhost/arokiyailai/whatsapp_view.php?id=" . $usr_id;

// Create the WhatsApp share link
$whatsappLink = 'https://api.whatsapp.com/send?text=' . urlencode($url);
?>

<!-- WhatsApp share button -->
<a href="<?php echo $whatsappLink; ?>" target="_blank"><img src="img/whatsapp.png" width="50" height="50" style="vertical-align: middle;"></a>

                                                    <div class="row gutters">
                                                        <div class="col-xxl-8 col-xl-8 col-lg-9 col-md-8 col-sm-8 col-12">
                                                        <div class="card-title"><?=$prediction['disease_name']?></div>

                                                        <div class="card-title">Management</div>
                                                            <label> <h5 class="product-title" ><?=$prediction['management']?></h5></label><br><br>
                                                            <div class="card-title">Pesticide Online store</div>
                                                            <label> <h5 class="product-title" ><a href="<?=$prediction['pesticide']?>"><?=$prediction['pesticide']?></h5></label>
                                                            <!-- <?php
                                                            if($fpo['operational_area']==$row['place'])
                                                            {
                                                                ?>
                                                        <div class="card-title">Nearby FPO details</div>
                                                            <label> <h5 class="product-title" >FPO Name : <?=$fpo['fpo_name']?></h5></label><br>
                                                            <label> <h5 class="product-title" >Crop : <?=$fpo['crop']?></h5></label><br>
                                                            <label> <h5 class="product-title" >Operational Area : <?=$fpo['operational_area']?></h5></label><br>
                                                            <label> <h5 class="product-title" >RI : <?=$fpo['ri']?></h5></label><br>
                                                            <label> <h5 class="product-title" >CEO : <?=$fpo['ceo']?></h5></label><br>
                                                            <label> <h5 class="product-title" >Mobile Number : <?=$fpo['mobile_number']?></h5></label><br>
                                                            <label> <h5 class="product-title" >E-Mail : <?=$fpo['email']?></h5></label><br>
                                                            <label> <h5 class="product-title" >Year : <?=$fpo['year']?></h5></label><br>
                                                            <label> <h5 class="product-title" >Scheme : <?=$fpo['scheme']?></h5></label><br>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <div class="card-title">Nearby FPO details</div>
                                                            <label> <h5 class="product-title" style="color:red;">No Nearby FPO</h5></label><br>
                                                            <?php
                                                        }
                                                        ?> -->

                                                        </div>
                                                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                            <div class="product-list-card">
                                                                <h5><?=$prediction['disease_name']?></h5>
                                                                <img class="product-list-img" width="300" height="300" src="<?=$image_location?>" alt="<?=$prediction['disease_name']?>">
                                                                
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    <script src="vendor/apex/apexcharts.min.js"></script>
    <script src="vendor/apex/custom/profile/revenue.js"></script>
    <script src="vendor/rating/raty.js"></script>
    <script src="vendor/rating/raty-custom.js"></script>
    <script src="js/main.js"></script>
</body>

</html>