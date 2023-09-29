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
    
    <div class="page-wrapper">
        <?php include("includes/nav.php");?>
        <div class="main-container">
        <?php include("includes/header.php");?>
            <div class="content-wrapper-scroll">
                <div class="content-wrapper">
                    <form action="capture_image_upload.php" method="post" enctype="multipart/form-data">
                <div>
                                    <label for="formFileLg" class="form-label">Click here to take live image</label>
                                    <input class="form-control form-control-lg" name="image" id="formFileLg" type="file" accept="image/*" capture>
                                </div><br><br>
                <!--end row-->
                <!-- <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <h6 class="mb-0 text-uppercase">Image Uploadify</h6>
                        <hr/>
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <input id="image-uploadify" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->
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
                <!--end row-->
                <input type="submit" value="Upload" name="submit" class="btn btn-danger px-5">
            </form>
 
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