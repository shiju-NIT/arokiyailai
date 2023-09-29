<?php 

include("includes/config.php");
session_start();

// Initialize the error message variable
$error = '';

// Check if the login form is submitted
if (isset($_POST['submit'])) {
    // Sanitize user input to prevent SQL injection
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_EMAIL);
    $pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    // Query the database for user authentication
    $query = "SELECT * FROM `login` WHERE `phone`='$phone' AND `password`='$pass' AND `status`=1";
    $result = mysqli_query($conn, $query);
    
    // Check if the query is successful and there is exactly one matching row
    if ($result && mysqli_num_rows($result) == 1) {
        // User authentication succeeded, set the session variables and redirect to the dashboard
        
        $user = mysqli_fetch_assoc($result);
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['username'];
       

        header('Location: dashboard.php');
        exit();
    } else {
        // User authentication failed, set the error message
        $error = 'Invalid phone or password.';
    }

    // Close the database connection
    mysqli_close($conn);
}

if (!empty($error)): ?>
    <script>
        alert("<?php echo $error; ?>");
    </script>
    <?php endif; 


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

<body class="login-container">
    <!-- <div id="loading-wrapper">
        <div class="spinner-border"></div>
        <div class="loading-messsage">
            <span>L</span><span>o</span><span>a</span><span>d</span><span>i</span><span>n</span><span>g</span></div>
    </div> -->
    <div class="container">
        <form method="post">
            <div class="login-box">
                <div class="login-blocks-img"></div>
                <div class="login-form"><a href="index.php" class="login-logo"><img src="img/logo-white.svg"
                            alt="Cliq Admin" /></a>
                    <div class="login-welcome">Welcome back, <br />Please login to your account.</div>
                    <div class="login-form-block"><label class="login-form-label">Phone number</label><input type="number"
                            class="login-form-control" name="phone" required></div>
                    <div class="login-form-block"><label class="login-form-label">Password</label><input type="password"
                            class="login-form-control" name="password" required></div>
                    <div class="login-form-actions"><button type="submit" class="btn" name="submit"><span class="icon"><i
                                    class="icon-login"></i></span>Login</button></div>
                   <div style="color: white;"><a href="https://chat.whatsapp.com/JJmyzC8ZAgN6lIIfPSe5U7" target="_blank"><img src="img/whatsapp.png" width="50" height="50" style="vertical-align: middle;">Join Group</a></div>
                    <div class="login-form-footer">
                        <div class="additional-link">Don't have an account? <a href="signup.php" class="btn">Signup</a>
                        </div><br>
                        <div class="additional-link">Want to forgot <a href="forgot.php" class="btn">Forgot Password</a>
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