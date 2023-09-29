<div class="page-header">
<div class="breadcrumb-container">
                    <div class="toggle-sidebar" id="toggle-sidebar"><i class="icon-menu"></i></div>
                    
                </div>
                
                <div class="header-actions-container">
                    
                    <ul class="header-actions">
                        
                        <li class="dropdown d-none d-md-block"><a href="#" id="bookmarks" data-toggle="dropdown"
                                aria-haspopup="true"><i class="icon-star_outline"></i></a>
                            <div class="dropdown-menu dropdown-menu-end lrg" aria-labelledby="bookmarks">
                                <div class="bookmarks-container"><a href="upload_image.php" class="bookmark-block"><img
                                            src="img/social/dribbble.svg" alt="Dribbble">
                                        <h5>Predict</h5>
                                    </a><a href="library.php" class="bookmark-block"><img src="img/social/dribbble.svg"
                                            alt="Behance">
                                        <h5>Analyze</h5>
                                    </a><a href="report.php" class="bookmark-block"><img src="img/social/dribbble.svg"
                                            alt="Evernote">
                                        <h5>Validate</h5>
                                    </a></div>
                            </div>
                        </li>
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

                       <div id="google_translate_element"></div>
                        <li class="dropdown"><a href="#" id="userSettings" class="user-settings" data-toggle="dropdown"
                                aria-haspopup="true"><span class="user-name d-none d-md-block"><?=$_SESSION['name']?></span><span
                                    class="avatar"><img src="<?=$row['photo']?>" alt="User Avatar"><span
                                        class="status online"></span></span></a>
                            <div class="dropdown-menu dropdown-menu-end md" aria-labelledby="userSettings">
                                <div class="header-profile-avatar"><img src="<?=$row['photo']?>" alt="Avatar"></div>
                                <div class="header-profile-block">
                                    <h5><?=$_SESSION['name']?></h5>
                                    <p>User</p>
                                </div>
                                <div class="header-profile-actions"><a href="profile.php" class="gradient-blue"><i
                                            class="icon-person_outline"></i>Profile</a><a href="account_settings.php"
                                        class="gradient-green"><i class="icon-edit_road"></i>Settings</a><a
                                        href="logout.php" class="gradient-red"><i
                                            class="icon-power_settings_new"></i>Logout</a></div>
                            </div>
                        </li>
                        <?php } }?>
                    </ul>
                </div>
            </div>
            <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>