<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title><?=$title?></title>
	<meta name="description" content="Philbert is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Philbert Admin, Philbertadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<!-- Data table CSS -->
	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style type="text/css">
	#order {
     line-height: 30px;
     width: 150px;
     font-size: 12pt;
     font-family: tahoma;
     margin-top: 80px;
     margin-right: 400px;
     position:absolute;
     top:0;
     right:0;
 }
</style>
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
					  <h5 class="txt-dark">View Place Order</h5>
					</div>
					<!-- Breadcrumb -->
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
					  <ol class="breadcrumb">
						<li><a href="dashboard.php">Dashboard</a></li>
						<li><a href="#"><span>Regular Line Flower</span></a></li>
						<li class="active"><span>View Place Order</span></li>
					  </ol>
					</div>
					<!-- /Breadcrumb -->
				</div>
				<!-- /Title -->
				
				<!-- Row -->
				
				<div class="row">
					<!-- <a href="place_order.php" class="btn btn-primary" id="order">Add Order</a> -->
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">

											<table id="example" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>S.No</th>
														<th>FPO Name</th>
														<th>Crop</th>
														<th>Operational Area</th>
														<th>RI</th>	
														<th>CEO</th>
														<th>Mobile Number</th>
														<th>E-Mail</th>
														<th>Year</th>
														<th>Scheme</th>
														<th>Date</th>
														<!-- <th>Edit</th> -->
													</tr>
												</thead>
												<tbody>
												<?php
													
								$i=1;
								$query="SELECT * FROM `fpo` where `status`=1";
								$expense_details=mysqli_query($con,$query);
								while($expense_details_array=mysqli_fetch_array($expense_details))
								{
									
									?>
										<tr>
									   <td><?php echo $i++;?></td>
									   <td><?php echo $expense_details_array['fpo_name']?></td>
                                       <td><?php echo $expense_details_array['crop']?></td>
                                       <td><?php echo $expense_details_array['operational_area']?></td>
                                       <td><?php echo $expense_details_array['ri']?></td>
                                       <td><?php echo $expense_details_array['ceo']?></td>
                                       <td><?php echo $expense_details_array['mobile_number']?></td>
                                       <td><?php echo $expense_details_array['email']?></td>
                                       <td><?php echo $expense_details_array['year']?></td>
                                       <td><?php echo $expense_details_array['scheme']?></td>
                                       <td><?php echo $expense_details_array['created_on']?></td>
                                       <!-- <td class="text-nowrap"><a href="update_fpo.php?id=<?php echo $expense_details_array['id']?>" class="btn btn-primary">Edit</a></td> -->
   	
                                            </tr>
                                            <?php
                                        }
                                        ?>
													
												</tbody>
											</table>

										</div>
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
    
	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.flash.min.js"></script>
	<script src="vendors/bower_components/jszip/dist/jszip.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/pdfmake.min.js"></script>
	<script src="vendors/bower_components/pdfmake/build/vfs_fonts.js"></script>
	
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="dist/js/export-table-data.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	
</body>

</html>
