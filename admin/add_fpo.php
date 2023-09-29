<?php
include 'config.php';

if(isset($_POST['submit']))
{
$fpo_name=$_REQUEST['fpo_name'];
$crop=$_REQUEST['crop'];
$district_id=$_REQUEST['district_id'];
$operational_area=$_REQUEST['operational_area'];
$ri=$_REQUEST['ri'];
$ceo=$_REQUEST['ceo'];
$mobile_number=$_REQUEST['mobile_number'];
$email=$_REQUEST['email'];
$year=$_REQUEST['year'];
$scheme=$_REQUEST['scheme'];

    $ssm= "INSERT INTO `fpo`(`fpo_name`, `crop`, `district_id`,`operational_area`, `ri`, `ceo`, `mobile_number`, `email`, `year`, `scheme`, `created_on`, `status`) values('$fpo_name','$crop','$district_id','$operational_area','$ri','$ceo','$mobile_number','$email','$year','$scheme','".date("Y/m/d")."',1)";
    $result=mysqli_query($con,$ssm)or die (mysqli_error($con));
    header("location:view_fpo.php");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title><?=$title;?></title>
		<meta name="description" content="Philbert is a Dashboard & Admin Site Responsive Template by hencework." />
		<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Philbert Admin, Philbertadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
		<meta name="author" content="hencework"/>
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link href="vendors/bower_components/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>

		<!-- Custom CSS -->
		<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->
		<div class="wrapper theme-1-active box-layout pimary-color-green">
			
			<!-- Top Menu Items -->
			<?php include 'topbar.php'?>
			<!-- /Top Menu Items -->
			
			<!-- Left Sidebar Menu -->
			<?php include 'sidebar.php'?>
			<!-- /Left Sidebar Menu -->
			
			<!-- Right Sidebar Menu -->
			
			<!-- /Right Sidebar Menu -->
			
			
			
			<!-- Right Sidebar Backdrop -->
			<div class="right-sidebar-backdrop"></div>
			<!-- /Right Sidebar Backdrop -->
			
			<!-- Main Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<!-- Title -->
					<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
						  <h5 class="txt-dark">Cotton Diseases</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						  <ol class="breadcrumb">
							<!-- <li><a href="dashboard.php">Dashboard</a></li> -->
							<li><a href="#"><span>Diseases</span></a></li>
							<li class="active"><span>add-Diseases</span></li>
						  </ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
					<!-- /Title -->
					
					<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form method="post" enctype="multipart/form-data">
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>FPO Details</h6>
												<hr class="light-grey-hr"/>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">FPO Name</label>
															<input type="text" id="fpo_name" class="form-control" name="fpo_name" placeholder="Enter the FPO name" required>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Crop</label>
															<input type="text" id="crop" class="form-control" name="crop" placeholder="Enter the crop" required>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Select FPO district</label>
															<select name="district_id" class="form-control" required>
																<?php
																$query = mysqli_query($con, "SELECT * from `districts`");
																while ($ship = mysqli_fetch_array($query)) {
																?>
																	<option value="<?php echo $ship['id'] ?>"><?php echo $ship['district_name'] ?></option>
																<?php
																}
																?>
															</select>
									
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Operational Area</label>
															<input type="text" id="operationalarea" class="form-control" name="operational_area" placeholder="Enter Operational area" required>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">RI</label>
															<input type="text" id="ri" class="form-control" name="ri" placeholder="Enter RI Data" required>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">CEO</label>
															<input type="text" id="ceo" class="form-control" name="ceo" placeholder="Enter CEO Data" required>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Mobile Number</label>
															<input type="text" id="mobile_number" class="form-control" name="mobile_number" placeholder="Enter Mobile number" required>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Email</label>
															<input type="text" id="email" class="form-control" name="email" placeholder="Enter Email id">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Year</label>
															<input type="text" id="year" class="form-control" name="year" placeholder="Enter the year" required>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Scheme</label>
															<input type="text" id="scheme" class="form-control" name="scheme" placeholder="Enter the Scheme" required>
														</div>
													</div>
												</div>												

												<div class="form-actions">
													<button class="btn btn-success btn-icon left-icon mr-10 pull-left" name="submit"> <i class="fa fa-check"></i> <span>save</span></button>
													
													<div class="clearfix"></div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->

				</div>
				
				<!-- Footer -->
				<?php include 'footer.php'?>
				<!-- /Footer -->
				
			</div>
			<!-- /Main Content -->
		
		</div>
		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

		<!-- Bootstrap Daterangepicker JavaScript -->
		<script src="vendors/bower_components/dropify/dist/js/dropify.min.js"></script>

		<!-- Form Flie Upload Data JavaScript -->
		<script src="dist/js/form-file-upload-data.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="dist/js/jquery.slimscroll.js"></script>
	
		<!-- Fancy Dropdown JS -->
		<script src="dist/js/dropdown-bootstrap-extended.js"></script>
		
		<!-- Owl JavaScript -->
		<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
		<!-- Switchery JavaScript -->
		<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>
		
	</body>
</html>