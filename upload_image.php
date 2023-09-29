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
                                    <div class="card-title">Upload a image to predict</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">


                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="product-block">
                                                <!-- <div class="product-title">Note:System is in training stage so upload cotton leaf image only</div> -->
                                                <div class="product-body">
                                                    <div class="card gradient-yellow">
                                                        <div class="card-header">
                                                            <div class="card-title">Upload Images</div>
                                                        </div>
                                                        <div class="card-body">
                                                        <form method="post" action="capture_image_upload.php" enctype="multipart/form-data">
                                                            <div class="input-group m-0 control-light">
                                                                <input type="file"  id="image" name="image" accept="image/*" class="form-control"><label class="input-group-text">Upload</label>
                                                            </div>
                                                            
                                                            
                                                        

                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                    <!-- <div class="col-xl-6 mx-auto">
                        <label for="formFileLg" class="form-label">Select category</label>
                                         <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category">
                    <?php
                                                    $sql = mysqli_query($conn,"SELECT * from category where status='1'")or die(mysqli_error($conn));  
                                                             while($data = mysqli_fetch_array($sql)) 
                                                             {
                                                                ?>
                                    <option value="<?php echo $data['category']?>"><?php echo $data['category']?></option>
                                    <?php
                                                }
                                                ?>
                                </select>
                                        </div> -->
                            <div class="col-xl-6 mx-auto">
                                <label for="formFileLg" class="form-label">Place</label>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="place">
                                    <option value="-">select FPO</option>
                                    <option value="-">No FPO found</option>
                                            <?php
                                                    $sql = mysqli_query($conn,"SELECT * from fpo where status='1'")or die(mysqli_error($conn));  
                                                             while($data = mysqli_fetch_array($sql)) 
                                                             {
                                                                ?>
                                    <option value="<?php echo $data['operational_area']?>"><?php echo $data['operational_area']?></option>
                                    <?php
                                                }
                                                ?>
                                </select>
                            </div>
                        </div>
                                            <div class="custom-btn-group flex-end"><button type="submit" class="btn btn-success" name="submit">Predict</button></div>
                                            </form>
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
    <script src="vendor/dropzone/dropzone.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>