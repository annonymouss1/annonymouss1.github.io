<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Page with Minified Sidebar</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="<?=base_url('assets')?>/css/apple/app.min.css" rel="stylesheet" />
	<link href="<?=base_url('assets')?>/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />

	<link href="<?=base_url('assets')?>/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="<?=base_url('assets')?>/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
	
	<link href="<?=base_url('assets')?>/new_plugins/select2/select2.min.css" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-minified page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<img src="<?=base_url('assets/img/logo/')?>logo-kkj.png" style="width: 70%;">
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header -->
			
			<!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">
				<li class="dropdown navbar-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?=base_url('assets')?>/img/user/user-13.jpg" alt="" /> 
						<span class="d-none d-md-inline">Adam Schwartz</span> <b class="caret"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
<!-- 
						<a href="javascript:;" class="dropdown-item">Edit Profile</a>
						<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a>
 -->
						<div class="dropdown-divider"></div>
						<a href="<?=base_url('index.php/C_Dashboard/logout')?>" class="dropdown-item">Log Out</a>
					</div>
				</li>
			</ul>
			<!-- end header navigation right -->
		</div>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<img src="<?=base_url('assets')?>/img/user/user-13.jpg" alt="" />
							</div>
							<div class="info">
								Sean Ngu
								<small>Front end developer</small>
							</div>
						</a>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="nav-header">Navigation</li>
					<li class="has-sub">
						<a href="javascript:;">
							<i class="ion-ios-home"></i>
							<span>Dashboard</span>
						</a>
						<ul class="sub-menu">
							<li><a href="<?=base_url()?>">Beranda</a></li>
						</ul>
					</li>
					<?php if ($this->session->userdata('hak_akses') == "Administrator") { ?>
					<li class="has-sub">
						<a href="javascript:;">
							<i class="ion-ios-briefcase"></i> 
							<span>Master Data</span>
						</a>
						<ul class="sub-menu">
							<li><a href="<?=base_url()?>/index.php/C_MasterData/list_transport">Master Transport</a></li>
							<li><a href="<?=base_url()?>/index.php/C_MasterData/list_limbah">Master Limbah</a></li>
							<li><a href="<?=base_url()?>/index.php/C_MasterData/list_driver">Master Driver</a></li>
						</ul>
					</li>
					<?php } ?>
					<li>
						<a href="<?=base_url('index.php/C_Transaction/scheduler')?>">
							<i class="ion-ios-cart"></i> 
							<span>Scheduler <span class="label label-theme">NEW</span></span> 
						</a>
					</li>
					<li>
						<a href="bootstrap_4.html">
							<div class="icon-img">
								<img src="<?=base_url('assets')?>/img/logo/logo-bs4.png" alt="" />
							</div>
							<span>Bootstrap 4 <span class="label label-theme">NEW</span></span>  
						</a>
					</li>
					<!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="ion-ios-arrow-back"></i> <span>Collapse</span></a></li>
					<!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<?php include $content; ?>
		<!-- end #content -->
				
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?=base_url('assets')?>/js/app.min.js"></script>
	<script src="<?=base_url('assets')?>/js/theme/apple.min.js"></script>

	<script src="<?=base_url('assets')?>/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?=base_url('assets')?>/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js" ></script>
	<script src="<?=base_url('assets')?>/plugins/datatables.net-responsive/js/dataTables.responsive.min.js" ></script>
	<script src="<?=base_url('assets')?>/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
	<script src="<?=base_url('assets')?>/js/demo/table-manage-default.demo.js"></script>


	<script src="<?=base_url('assets')?>/new_plugins/select2/select2.min.js"></script>
	<!-- ================== END BASE JS ================== -->

	<script type="text/javascript">
		$(document).ready(function() {
		    $('.js-example-basic-single').select2();
		});
	</script>
</body>
</html>
