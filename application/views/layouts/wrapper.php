<!DOCTYPE html>
<!-- Template Name: Packet - Responsive Admin Template build with Twitter Bootstrap 3.x | Author: ClipTheme -->
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title><?=(isset($title)?$title:'Uca Finance')?></title>
		<!-- start: META -->
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: GOOGLE FONTS -->
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<!-- end: GOOGLE FONTS -->
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="<?=base_url()?>bower_components/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url()?>bower_components/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?=base_url()?>bower_components/themify-icons/themify-icons.css">
		<link rel="stylesheet" href="<?=base_url()?>bower_components/flag-icon-css/css/flag-icon.min.css">
		<link rel="stylesheet" href="<?=base_url()?>bower_components/animate.css/animate.min.css">
		<link rel="stylesheet" href="<?=base_url()?>bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css">
		<link rel="stylesheet" href="<?=base_url()?>bower_components/switchery/dist/switchery.min.css">
		<link rel="stylesheet" href="<?=base_url()?>bower_components/seiyria-bootstrap-slider/dist/css/bootstrap-slider.min.css">
		<link rel="stylesheet" href="<?=base_url()?>bower_components/ladda/dist/ladda-themeless.min.css">
		<link rel="stylesheet" href="<?=base_url()?>bower_components/slick.js/slick/slick.css">
		<link rel="stylesheet" href="<?=base_url()?>bower_components/slick.js/slick/slick-theme.css">
		<!-- end: MAIN CSS -->
		<!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
		<link href="<?=base_url()?>bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="<?=base_url()?>bower_components/select2/dist/css/select2.min.css" rel="stylesheet" media="screen">
		<link href="<?=base_url()?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: Packet CSS -->
		<link rel="stylesheet" href="<?=base_url()?>assets/css/styles.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/plugins.css">
		<link rel="stylesheet" href="<?=base_url()?>assets/css/themes/lyt4-theme-1.css" id="skin_color">
		<!-- end: Packet CSS -->
		<!-- Favicon -->
		<link rel="shortcut icon" href="<?=base_url()?>favicon.ico" />
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
		<link href="<?=base_url()?>assets/css/ui-grid-unstable.min.css" rel="stylesheet" />
		<link href="<?=base_url()?>assets/css/toastr.min.css" rel="stylesheet" />

		<script src="<?=base_url()?>assets/Scripts/angular.min.js"></script>
		<script src="<?=base_url()?>assets/Scripts/angular-touch.min.js"></script>
		<script src="<?=base_url()?>assets/Scripts/angular-resource.min.js"></script>
		<script src="<?=base_url()?>assets/Scripts/angular-animate.min.js"></script>
		<script src="<?=base_url()?>assets/Scripts/angular-ui/ui-bootstrap.min.js"></script>
		<script src="<?=base_url()?>assets/Scripts/angular-ui/ui-bootstrap-tpls.min.js"></script>
		<script src="<?=base_url()?>assets/Scripts/i18n/angular-locale_fr-ma.js"></script>

		<script src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script>

		<script src="<?=base_url()?>assets/Scripts/toastr.min.js"></script>
		<script src="<?=base_url()?>assets/Scripts/ui-grid-unstable.min.js"></script>
		<script src="<?=base_url()?>assets/Scripts/App/app.js"></script>

		<script src="<?=base_url()?>assets/Scripts/Chart.min.js"></script>
		<script src="<?=base_url()?>assets/Scripts/angular-chart.js"></script>
		<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	</head>
	<!-- end: HEAD -->
	<body>
		<div id="app" class="lyt-4">
			<!-- sidebar -->
			<div class="sidebar app-aside" id="sidebar">
				<div class="sidebar-container perfect-scrollbar">
					<div>
						<!-- start: USER OPTIONS -->
						<div class="nav-user-wrapper">
							<div class="media">
								<div class="media-left">
									<a class="profile-card-photo" href="#"><img alt="" src="<?=base_url()?>assets/images/media-user.png"></a>
								</div>
								<div class="media-body">
									<span class="media-heading text-white">Er rrahmani Issam</span>
									<div class="text-small text-white-transparent">
										&nbsp;
									</div>
								</div>
								<div class="media-right media-middle">
									<div class="dropdown">
										<button href class="btn btn-transparent text-white dropdown-toggle" data-toggle="dropdown">
											<i class="fa fa-caret-down"></i>
										</button>
										<ul class="dropdown-menu animated fadeInRight pull-right">
											<li>
												<a href="#"> Mon Profile </a>
											</li>
											<li class="divider"></li>
											<li>
												<a href="<?=base_url()?>Auth/signout"> Se Déconnecter</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>						
					</div>
				</div>
			</div>
			<!-- / sidebar -->
			<div class="app-content">
				<!-- start: TOP NAVBAR -->
				<header class="navbar navbar-default navbar-static-top">
					<!-- start: NAVBAR HEADER -->
					<div class="navbar-header">
						<button href="javascript:void(0)" class="menu-mobile-toggler btn no-radius pull-left hidden-md hidden-lg" id="horizontal-menu-toggler" data-toggle="collapse" data-target=".horizontal-menu">
							<i class="fa fa-bars"></i>
						</button>
						<a class="navbar-brand" href="/welcome"> <img src="<?=base_url()?>assets/images/logo2.png" alt="Packet"/> </a>
					</div>
					<!-- end: NAVBAR HEADER -->
					<!-- start: NAVBAR COLLAPSE -->
					<div class="navbar-collapse collapse">
					</div>
					
				</header>
				<!-- start: HORIZONTAL MENU -->
				<div class="navbar navbar-default horizontal-menu collapse">
					<div class="horizontal-menu-wrapper">
						<div class="horizontal-nav-container">
							<ul class="nav navbar-nav no-border">
								<li>
									<a href="<?= base_url()?>Dashboard"> <div class="lettericon" data-text="Dashboard" data-size="sm" data-char-count="2" data-color="auto"></div> <span> Dashboard </span> </a>
								</li>
								<li>
									<a href="<?= base_url()?>ListeExpressionBesoin"> <div class="lettericon" data-text="EB" data-size="sm" data-char-count="2" data-color="auto"></div> <span> Expression de besoin </span> </a>
								</li>
								<li>
									<a href="<?= base_url()?>ListeBC"> <div class="lettericon" data-text="BC" data-size="sm" data-char-count="2" data-color="auto"></div> <span> Bon de Commande </span> </a>
								</li>
								<li>
									<a href="<?= base_url()?>ListeAO"> <div class="lettericon" data-text="AO" data-size="sm" data-char-count="2" data-color="auto"></div> <span> Appel d'offres </span> </a>
								</li>
								<li>
									<a href="<?= base_url()?>ListeMarche"> <div class="lettericon" data-text="M" data-size="sm" data-char-count="2" data-color="auto"></div> <span> Marché </span> </a>
								</li>
								<li>
									<a href="<?= base_url()?>listeDepense"> <div class="lettericon" data-text="F" data-size="sm" data-char-count="2" data-color="auto"></div> <span> Dépenses </span> </a>
								</li>
								<li>
									<a href="<?= base_url()?>Payments"> <div class="lettericon" data-text="OP" data-size="sm" data-char-count="2" data-color="auto"></div> <span> Ordonnancement & Paiement </span> </a>
								</li>
								<li class="dropdown">
									<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"> <div class="lettericon" data-text="P" data-size="sm" data-char-count="2" data-color="auto"></div> <span> Paramètres</span> <span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li>
											<a href="<?=base_url()?>settings/budget"> <span> Répartition Budget </span> </a>
										</li>
										<li>
											<a href="<?=base_url()?>settings/listProjects"> <span> Projets </span> </a>
										</li>
										<li>
											<a href="<?=base_url()?>settings/listSousProjects"> <span> Sous Projets </span> </a>
										</li>
										<li>
											<a href="<?=base_url()?>settings/listApplicant"> <span> Services Demandeurs </span> </a>
										</li>
										<li>
											<a href="<?=base_url()?>Product/"> <span> Articles </span> </a>
										</li>
										<li>
											<a href="<?=base_url()?>Provider/listProvider"> <span> Fournisseurs </span> </a>
										</li>
										<li>
											<a href="<?=base_url()?>settings/listConvention"> <span> Conventions </span> </a>
										</li>
										<li>
											<a href="<?=base_url()?>settings/listInteresse"> <span> Interessés </span> </a>
										</li>
									</ul>
								</li>
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle nav-user-wrapper" data-toggle="dropdown"> <img alt="" src="<?=base_url()?>assets/images/avatar-1.png"> <span></span> <span class="caret"></span> </a>

									<ul class="dropdown-menu pull-right animated fadeInRight">
										<li>
											<a href="#"> Mon Profile </a>
										</li>
										<li class="divider"></li>
										<li>
											<a href="<?=base_url()?>Auth/logout"> Se Déconnecter </a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
						<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
						<div class="close-handle visible-xs-block visible-sm-block menu-toggler" data-toggle="collapse" data-target=".horizontal-menu">
							<div class="arrow-left"></div>
							<div class="arrow-right"></div>
						</div>
						<!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
					</div>
				</div>
				<!-- end: HORIZONTAL MENU -->
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
					<?php $this->load->view($content); ?>
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
			<footer>
				<div class="footer-inner">
					<div class="pull-left">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> UCAM</span>. <span>All rights reserved</span>
					</div>
					<div class="pull-right">
						<span class="go-top"><i class="ti-angle-up"></i></span>
					</div>
				</div>
			</footer>
			<!-- end: FOOTER -->
			
		</div>
		<!-- start: MAIN JAVASCRIPTS -->

		<script src="<?=base_url()?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?=base_url()?>bower_components/components-modernizr/modernizr.js"></script>
		<script src="<?=base_url()?>bower_components/js-cookie/src/js.cookie.js"></script>
		<script src="<?=base_url()?>bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
		<script src="<?=base_url()?>bower_components/jquery-fullscreen/jquery.fullscreen-min.js"></script>
		<script src="<?=base_url()?>bower_components/switchery/dist/switchery.min.js"></script>
		<script src="<?=base_url()?>bower_components/jquery.knobe/dist/jquery.knob.min.js"></script>
		<script src="<?=base_url()?>bower_components/seiyria-bootstrap-slider/dist/bootstrap-slider.min.js"></script>
		<script src="<?=base_url()?>bower_components/slick.js/slick/slick.min.js"></script>
		<script src="<?=base_url()?>bower_components/jquery-numerator/jquery-numerator.js"></script>
		<script src="<?=base_url()?>bower_components/ladda/dist/spin.min.js"></script>
		<script src="<?=base_url()?>bower_components/ladda/dist/ladda.min.js"></script>
		<script src="<?=base_url()?>bower_components/ladda/dist/ladda.jquery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?=base_url()?>bower_components/jquery.maskedinput/dist/jquery.maskedinput.min.js"></script>
		<script src="<?=base_url()?>bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
		<script src="<?=base_url()?>bower_components/autosize/dist/autosize.min.js"></script>
		<script src="<?=base_url()?>bower_components/select2/dist/js/select2.min.js"></script>
		<script src="<?=base_url()?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<script src="<?=base_url()?>bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: Packet JAVASCRIPTS -->
		<script src="<?=base_url()?>assets/js/letter-icons.js"></script>
		<script src="<?=base_url()?>assets/js/main.js"></script>
		<!-- end: Packet JAVASCRIPTS -->
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="<?=base_url()?>assets/js/selectFx/classie.js"></script>
		<script src="<?=base_url()?>assets/js/selectFx/selectFx.js"></script>
		<script src="<?=base_url()?>assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>

		<!-- end: JavaScript Event Handlers for this page -->
	</body>
</html>
