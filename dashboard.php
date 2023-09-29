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
    <script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>

    <style type="text/css">
        .weather-widget-container {
  height: 100%;
  width: 100%;
}
</style>
</head>

<body onload="getLocation()">
    <div id="loading-wrapper">
        <div class="spinner-border"></div>
        <div class="loading-messsage">
            <span>L</span><span>o</span><span>a</span><span>d</span><span>i</span><span>n</span><span>g</span></div>
    </div>
    <div class="page-wrapper">
        <?php include("includes/nav.php");?>
        <div class="main-container">
        <?php include("includes/header.php");?>
            <div class="content-wrapper-scroll">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="card gradient-violet3 globe-bg card-390">
                                <div class="card-body">
                                    <div class="card-title">Statistics</div>
                                    <ul class="statistics">
                                        <li><span class="stat-icon"><i class="icon-add_task"></i></span>A disease added.</li>
                                        <li><span class="stat-icon"><i class="icon-lightbulb_outline"></i></span>Accurarcy Increased!</li>
                                        <li><span class="stat-icon"><i class="icon-repeat_one"></i></span>3500 items
                                            Predicted.</li>
                                        <li><span class="stat-icon"><i
                                                    class="icon-check_circle_outline"></i></span>Data Validated.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="width: 50%; height: 50%;">
                            <p id="demo" style="display: none;"></p>

<div id="openweathermap-widget-15"></div>

<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;

  var latitude = position.coords.latitude;
  var longitude = position.coords.longitude;
  var cityId = getCityId(latitude, longitude);
  loadWeatherWidget(cityId);
}

function getCityId(latitude, longitude) {
  var apiUrl = "http://api.openweathermap.org/data/2.5/weather?lat=" + latitude + "&lon=" + longitude + "&appid=dea0b1881613ad281b94f376a9ec0ecf";
  var request = new XMLHttpRequest();
  request.open("GET", apiUrl, false);
  request.send();

  if (request.status === 200) {
    var data = JSON.parse(request.responseText);
    return data.id;
  } else {
    return null;
  }
}

function loadWeatherWidget(cityId) {
  window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];
  window.myWidgetParam.push({
    id: 15,
    cityid: cityId,
    appid: 'dea0b1881613ad281b94f376a9ec0ecf',
    units: 'metric',
    containerid: 'openweathermap-widget-15'
  });

  var script = document.createElement('script');
  script.async = true;
  script.charset = "utf-8";
  script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(script, s);
}
</script>
                            
                       
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="card gradient-green card-150">
                                <div class="card-body">
                                    <div class="sales-tile3">
                                        <div class="sales-tile3-block">
                                            <div class="sales-tile3-icon green"><i class="icon-camera animate__animated animate__swing animate__infinite infinite"></i>
                                            </div>
                                            <?php                   
                     $res=$conn->query("select * from camera where `user_id`='".$user_id."'");
                     $count=mysqli_num_rows($res);
                     
                     ?>
                                            <div class="sales-tile3-details">
                                                <h5>Predictions</h5>
                                                <h2><?php echo $count;?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="card gradient-violet-pink card-150">
                                <div class="card-body">
                                    <div class="sales-tile3">
                                        <div class="sales-tile3-block">
                                            <div class="sales-tile3-icon peach"><i
                                                    class="icon-sentiment_satisfied_alt"></i></div>
                                                    <?php                   
                     $res=$conn->query("select * from login");
                     $count=mysqli_num_rows($res);
                     
                     ?>
                                            <div class="sales-tile3-details">
                                                <h5>Signups</h5>
                                                <h2><?php echo $count;?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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