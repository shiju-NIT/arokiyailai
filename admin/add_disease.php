<?php
include 'config.php';

if(isset($_POST['submit']))
{
$disease_name=$_REQUEST['disease_name'];
$symptoms=$_REQUEST['symptoms'];
$survival=$_REQUEST['survival'];
$f_condition=$_REQUEST['f_condition'];
$management=$_REQUEST['management'];
$pesticide=$_REQUEST['pesticide'];
if(empty($_FILES['image']['name'])){
    $ssm= "INSERT INTO `disease` (`disease_name`, `symptoms`, `survival`, `f_condition`, `management`,`pesticide`,`created_on`,`status`)
    values('$disease_name','$symptoms','$survival','$f_condition','$management','$pesticide',".date("Y/m/d")."',1)";
    $result=mysqli_query($con,$ssm)or die (mysqli_error($con));
    header("location:view_bouquet.php");
}
else{
    $fil=$_FILES['image']['name'];
    $ssm2=$con->query("INSERT INTO `disease` (`disease_name`, `symptoms`, `survival`, `f_condition`, `management`, `pesticide`, `image`, `created_on`,`status`)
    values('$disease_name','$symptoms','$survival','$f_condition','$management','pesticide','$fil','".date("Y/m/d")."',1)");
  $count=mysqli_affected_rows($con);
    move_uploaded_file($_FILES['image']['tmp_name'], "disease/".$fil);
    header("location:view_disease.php");
}
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
											<form action="#" method="post" enctype="multipart/form-data">
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Cotton Disease</h6>
												<hr class="light-grey-hr"/>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label mb-10">Cotton Disease Name</label>
															<input type="text" id="disease_name" class="form-control" name="disease_name" placeholder="Enter the Disease Name" required>
														</div>
													</div>
												</div>

												<div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-comment-text mr-10"></i>Symptoms</h6>
												<hr class="light-grey-hr"/>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<textarea class="form-control" rows="4" name="symptoms" placeholder="Symptoms Details"></textarea>
														</div>
													</div>
												</div>
												
												<div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-comment-text mr-10"></i>Survival and mode of spread</h6>
												<hr class="light-grey-hr"/>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<textarea class="form-control" rows="4" name="survival" placeholder="Survival and mode of spread"></textarea>
														</div>
													</div>
												</div>	

												<div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-comment-text mr-10"></i>Favourable Conditions</h6>
												<hr class="light-grey-hr"/>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<textarea class="form-control" rows="4" name="f_condition" placeholder="Favourable Conditions"></textarea>
														</div>
													</div>
												</div>

												<div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-comment-text mr-10"></i>Management</h6>
												<hr class="light-grey-hr"/>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<textarea class="form-control" rows="4" name="management" placeholder="Management"></textarea>
														</div>
													</div>
												</div>

												<div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-comment-text mr-10"></i>Pesticide Link</h6>
												<hr class="light-grey-hr"/>
												<div class="row">
													<div class="col-md-12">
														<div class="form-group">
															<textarea class="form-control" rows="4" name="pesticide" placeholder="Pesticide Link"></textarea>
														</div>
													</div>
												</div>

												<div class="seprator-block"></div>
												<h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-collection-image mr-10"></i>Upload Image</h6>
												<hr class="light-grey-hr"/>
												<div class="row">
													<div class="col-lg-6">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Image Upload</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										
										<div class="mt-40">
											<input type="file" name="image" id="input-file-now" class="dropify" />
										</div>	
									</div>
								</div>
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