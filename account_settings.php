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
    echo "<script>alert('Please login to continue');</script>";
    exit();
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Get the form data
    
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phoneNo']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
    
    // Check if a new profile picture has been uploaded
    if ($_FILES['image']['name']) {
        $photo = 'uploads/profile/' . uniqid() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $photo);
        echo "<script>alert('New profile picture uploaded successfully');</script>";
    } else {
        // If no new picture has been uploaded, use the existing one
        $photo = mysqli_real_escape_string($conn, $_POST['current_photo']);
    }
    
    // Create the update query
    $sql = "UPDATE `login` SET `username`='$user_name', `email`='$email', `password`='$password', `phone`='$phone', `location`='$location', `address`='$address', `state`='$state', `Country`='$country', `pincode`='$pincode', `photo`='$photo' WHERE `id`='$user_id'";
    
    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('User information updated successfully');</script>";
    } else {
        echo "<script>alert('Error updating user information: " . mysqli_error($conn) . "');</script>";
    }
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
                                                   
                                                </div>
                                            </div>

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

                                        <form method="post" enctype="multipart/form-data">

                                            <div class="row gutters">
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <div class="mb-3 control-dark"><label for="fullName"
                                                            class="form-label">Full Name</label><input type="text"
                                                            class="form-control" name="user_name" value="<?=$row['username']?>">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <div class="mb-3 control-dark"><label for="emailID"
                                                            class="form-label">Email ID</label><input type="email" name="email"
                                                            class="form-control" 
                                                            value="<?=$row['email']?>"></div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <div class="mb-3 control-dark"><label for="phoneNo"
                                                            class="form-label">Phone</label><input type="number"
                                                            class="form-control" name="phoneNo"
                                                            value="<?=$row['phone']?>"></div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <div class="mb-3 control-dark"><label for="address"
                                                            class="form-label">Address</label><input type="text"
                                                            class="form-control" name="address" value="<?=$row['address']?>">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <div class="mb-3 control-dark"><label for="city"
                                                            class="form-label">City</label><input type="text"
                                                            class="form-control" name="location" value="<?=$row['location']?>"></div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <div class="mb-3 control-dark"><label for="state"
                                                            class="form-label">State</label><input type="text"
                                                            class="form-control" name="state" value="<?=$row['state']?>"></div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <div class="mb-3 control-dark"><label for="Pincode"
                                                            class="form-label">Pincode</label><input type="text"
                                                            class="form-control" name="pincode" value="<?=$row['pincode']?>">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="mb-3 control-dark"><label for="Country"
                                                            class="form-label">Country</label><input type="text"
                                                            class="form-control" name="country" value="<?=$row['Country']?>">
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                                    <div class="mb-3 control-dark"><label for="enterPassword"
                                                            class="form-label">Password</label><input type="password"
                                                            class="form-control" name="password"
                                                            placeholder="<?=$row['password']?>"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="account-settings-block">
                                               
                                                <div class="settings-block">
                                                    <div class="settings-block-title">Profile Picture Settings</div>
                                                    <div class="settings-block-body">
                                                        <div class="list-group">
                                                            
                                                        <div class="d-flex flex-row"><img src="<?=$row['photo']?>"
                                                            class="img-fluid change-img-avatar" alt="Image">
                                                            <input type="file" name="image" >

                                                            <input type="text" name="current_photo" value="<?=$row['photo']?>" hidden>
                                                            
                                                        
                                                    </div>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <hr class="light"><button class="btn btn-info" type="submit">Save Settings</button>
                                        </div>

                                        </form>

                                        <?php 
                                            }

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
    <script src="vendor/daterange/daterange.js"></script>
    <script src="vendor/daterange/custom-daterange.js"></script>
    <script src="vendor/dropzone/dropzone.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>