<?php include("includes/config.php");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $district = $_POST['district'];
    $photo = 'uploads/profile/logo-img.png'; 
    $login = mysqli_query($conn, "SELECT * FROM `login` WHERE `email`='" . $email . "' and `status`=1 ") or die(mysqli_error($conn));
    $l = mysqli_fetch_array($login);
    if ($l['email'] == $email) {
?>
        <script type="text/javascript">
            alert("This Mail has Already Registered");
            window.location = "signup.php";
        </script>
        <?php
    } else {

        $query = mysqli_query(
            $conn,
            "INSERT INTO `login`(`id`,`username`,`email`,`password`,`district`,`created_on`,`status`,`photo`)values(NULL,'$name','$email','$pass','$district','" . date("Y/m/d") . "',1,'$photo')"
        ) or die(mysqli_error($conn));
        if ($query) {
        ?>
            <script type="text/javascript">
                alert("Your Details Registered");
                window.location = "index.php";
            </script>
<?php
        }
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
</head>

<body class="login-container">
    <!-- <div id="loading-wrapper">
        <div class="spinner-border"></div>
        <div class="loading-messsage">
            <span>L</span><span>o</span><span>a</span><span>d</span><span>i</span><span>n</span><span>g</span>
        </div>
    </div> -->
    <div class="container">
        <form method="post">
            <div class="login-box">
                <div class="login-blocks-img"></div>
                <div class="login-form"><a href="index.php" class="login-logo"><img src="img/logo-white.svg" alt="Cliq Admin" /></a>
                    <div class="login-welcome">Welcome to Arokiya Illai, Create your account. </div>
                    <div class="login-form-block"><label class="login-form-label">Name</label>
                    <input type="text" name="name" class="login-form-control" required>
                    </div>

                    <div class="login-form-block"><label class="login-form-label">Email</label>
                    <input type="email" class="login-form-control" name="email" required>
                    </div>
                    <div class="login-form-block"><label class="login-form-label">Password</label>
                    <input type="password" class="login-form-control" name="pass" required>
                    </div>
                    <div class="login-form-block"><label class="login-form-label">Your District</label>
                        <select name="district" class="form-control" required>
                                                                <?php
                                                                $query = mysqli_query($conn,"SELECT * from `districts`");
                                                                while ($ship = mysqli_fetch_array($query)) {
                                                                ?>
                                                                    <option value="<?php echo $ship['id'] ?>"><?php echo $ship['district_name'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                   
                    </div>

                    <div class="login-form-footer">
                    <div class="login-form-actions"><button type="submit" class="btn" name="submit"><span class="icon"><i
                                    class="icon-login"></i></span>Sign Up</button></div>
                        <br/>
                        <div class="additional-link">Already have an account? <a href="index.php" class="btn">Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>