<?php 
session_start();
$error = array();

require "mail.php";

// require "config.php";
 	if(!$con = mysqli_connect("localhost","root","","cotton_ml")){
 		die("could not connect");
	}

	$mode = "enter_email";
	if(isset($_GET['mode'])){
		$mode = $_GET['mode'];
	}

	//something is posted
	if(count($_POST) > 0){

		switch ($mode) {
			case 'enter_email':
				// code...
				$email = $_POST['email'];
				//validate email
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$error[] = "Please enter a valid email";
				}elseif(!valid_email($email)){
					$error[] = "That email was not found";
				}else{

					$_SESSION['forgot']['email'] = $email;
					send_email($email);
					header("Location: forgot.php?mode=enter_code");
					die;
				}
				break;

			case 'enter_code':
				// code...
				$code = $_POST['code'];
				$result = is_code_correct($code);

				if($result == "the code is correct"){

					$_SESSION['forgot']['code'] = $code;
					header("Location: forgot.php?mode=enter_password");
					die;
				}else{
					$error[] = $result;
				}
				break;

			case 'enter_password':
				// code...
				$password = $_POST['password'];
				$password2 = $_POST['password2'];

				if($password !== $password2){
					$error[] = "Passwords do not match";
				}elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
					header("Location: forgot.php");
					die;
				}else{
					
					save_password($password);
					if(isset($_SESSION['forgot'])){
						unset($_SESSION['forgot']);
					}

					header("Location: index.php");
					die;
				}
				break;
			
			default:
				// code...
				break;
		}
	}

	function send_email($email){
		
		global $con;

		$expire = time() + (60 * 5);
		$code = rand(10000,99999);
		$email = addslashes($email);

		$query = "insert into codes (email,code,expire) value ('$email','$code','$expire')";
		mysqli_query($con,$query);

		//send email here
		send_mail($email,'Password reset',"Your code is " . $code);
	}
	
	function save_password($password){
		
		global $con;

		//$password = password_hash($password, PASSWORD_DEFAULT);
		$password = $password;
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "update login set password = '$password' where email = '$email' limit 1";
		mysqli_query($con,$query);

	}
	
	function valid_email($email){
		global $con;

		$email = addslashes($email);

		$query = "select * from login where email = '$email' limit 1 ";		
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				return true;
 			}
		}

		return false;

	}

	function is_code_correct($code){
		global $con;

		$code = addslashes($code);
		$expire = time();
		$email = addslashes($_SESSION['forgot']['email']);

		$query = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1";
		$result = mysqli_query($con,$query);
		if($result){
			if(mysqli_num_rows($result) > 0)
			{
				$row = mysqli_fetch_assoc($result);
				if($row['expire'] > $expire){

					return "the code is correct";
				}else{
					return "the code is expired";
				}
			}else{
				return "the code is incorrect";
			}
		}

		return "the code is incorrect";
	}

	
?>

<!doctype html>
<html lang="en">
<!-- Mirrored from www.kodingwife.com/demos/cliq/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Apr 2023 18:24:06 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 5 Dashboard Template">
    <meta name="author" content="ParkerThemes">
    <link rel="shortcut icon" href="img/fav.png">
    <title>Forgot password</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/icomoon/icomoon.css">
    <link rel="stylesheet" href="css/main.css">
</head>
 <body class="login-container">
    <div id="loading-wrapper">
        <div class="spinner-border"></div>
        <div class="loading-messsage">
            <span>L</span><span>o</span><span>a</span><span>d</span><span>i</span><span>n</span><span>g</span></div>
    </div>


		<?php 

			switch ($mode) {
				case 'enter_email':
					// code...
					?>
					<div class="container">
        <form action="forgot.php?mode=enter_email" method="post">
        	<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
            <div class="login-box">
                <div class="login-blocks-img"></div>
                <div class="login-form"><a href="index.php" class="login-logo"><img src="img/logo-white.svg"
                            alt="Cliq Admin" /></a>
                    <div class="login-welcome">Enter Email address </div>
                    <div class="login-form-block"><label class="login-form-label">Email ID</label><input class="form-control" type="email" name="email" placeholder="Enter email address" required></div>
                    <div class="login-form-actions"><input type="submit" class="btn" value="Next"><span class="icon"><i
                                    class="icon-send"></i></span></div>
                     <div class="login-welcome"><a href="login.php" style="color: white;">Go to Login Page</a></div>
                </div>
            </div>
        </form>
    </div>
					<?php				
					break;

				case 'enter_code':
					// code...
					?>
					<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
						<form method="post" action="forgot.php?mode=enter_code"> <br>
							<h3 style="text-align:center;margin: auto;display: block;">Enter OTP</h3>
							
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>

							<input class="form-control" style="text-align:center;margin: auto;display: block;" type="text" name="code" placeholder="Enter OTP" required><br>
							<br style="clear: both;">
							<div class="form-group">
							<input style="text-align:left;margin: auto;display: block;" type="submit" value="Next" class="form-control button" style="float: right;"><br>
							<a href="forgot.php">
								<input style="text-align:right;margin: auto;display: block;" type="button" class="form-control button" value="Start Over">
							</a>
							</div>
							<br>
							<h6 style="text-align:center;margin: auto;display: block;">Check your Mail for the OTP</h6></br>
							<h6 style="text-align:center;margin: auto;display: block;">NOTE : OTP expires in 60 Seconds</h6>
							<div style="text-align:center;margin: auto;display: block;font-size:20px;"><a href="login.php">Login</a></div>
						</form>
						</div>
        </div>
    </div>
					<?php
					break;

				case 'enter_password':
					// code...
					?>
					<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
						<form method="post" action="forgot.php?mode=enter_password"><br> 
							<h3 style="text-align:center;margin: auto;display: block;">Enter your New Password</h3>
							
							<span style="font-size: 12px;color:red;">
							<?php 
								foreach ($error as $err) {
									// code...
									echo $err . "<br>";
								}
							?>
							</span>

							<input style="text-align:center;margin: auto;display: block;" class="form-control" type="text" name="password" placeholder="Password" required><br>
							<input style="text-align:center;margin: auto;display: block;" class="form-control" type="text" name="password2" placeholder="Retype Password" required><br>
							<br style="clear: both;">
							<input style="text-align:center;margin: auto;display: block;" type="submit" value="Next" class="form-control button" style="float: right;">
							<a href="forgot.php">
								<input style="text-align:center;margin: auto;display: block;" type="button" class="form-control button" value="Start Over">
							</a>
							<br>
							<div style="text-align:center;margin: auto;display: block;"><a href="login.php">Login</a></div>
						</form>
						</div>
        </div>
    </div>
					<?php
					break;
				
				default:
					// code...
					break;
			}

		?>

<script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>