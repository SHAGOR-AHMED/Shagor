<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?= (isset($title))? $title : ''; ?></title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link href="<?php echo base_url()."assets/backend/css/bootstrap.min.css"; ?>" type="text/css" rel="stylesheet" />
		<link href="<?php echo base_url()."assets/backend/css/font-awesome.min.css"; ?>" type="text/css" rel="stylesheet" />

		<!-- text fonts -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" /> 
		<link href="<?php echo base_url()."assets/backend/css/custom-admin.css"; ?>" type="text/css" rel="stylesheet" />
		<link href="<?php //echo base_url()."css/menu-style.css"; ?>" type="text/css" rel="stylesheet" />
		
		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?php echo base_url()."assets/backend/css/jquery-ui.custom.min.css"; ?>" />
		<link rel="stylesheet" href="<?php echo base_url()."assets/backend/css/chosen.css"; ?>" />
		<link rel="stylesheet" href="<?php echo base_url()."assets/backend/css/datepicker.css"; ?>" />
		<link rel="stylesheet" href="<?php echo base_url()."assets/backend/css/bootstrap-timepicker.css"; ?>" />
		<link rel="stylesheet" href="<?php echo base_url()."assets/backend/css/daterangepicker.css"; ?>" />
		<link rel="stylesheet" href="<?php echo base_url()."assets/backend/css/bootstrap-datetimepicker.css"; ?>" />
		<link rel="stylesheet" href="<?php echo base_url()."assets/backend/css/colorpicker.css"; ?>" />
		<link rel="stylesheet" href="<?php echo base_url()."assets/backend/css/select2.css"; ?>" />
		
		<link rel="shortcut icon" href="<?php echo base_url()."assets/backend/img/favicon.png"; ?>" />
		
		<!-- ace styles -->
		<link href="<?php echo base_url()."assets/backend/css/ace.min.css"; ?>" type="text/css" rel="stylesheet">
		<link href="<?php echo base_url()."assets/backend/css/ace-skins.min.css"; ?>" type="text/css" rel="stylesheet">
		<link href="<?php echo base_url()."assets/backend/css/ace-rtl.min.css"; ?>" type="text/css" rel="stylesheet">
		<link href="<?php echo base_url()."assets/backend/css/style.css"; ?>" type="text/css" rel="stylesheet">

		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link href="<?= base_url('assets/dt_picker/jquery.datepick.css'); ?>" rel="stylesheet">

		<!-- ace settings handler -->
		<script src="<?php echo base_url()."assets/backend/js/jquery.min.js"; ?>" type="text/javascript"></script>
		<script src="<?php echo base_url()."assets/backend/js/ace-extra.min.js"; ?>"></script>

		<script src="<?= base_url('assets/dt_picker/jquery.plugin.min.js'); ?>" type="text/javascript"></script>
		<script src="<?= base_url('assets/dt_picker/jquery.datepick.js'); ?>" type="text/javascript"></script>
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
			<?php
				$user_data = $this->session->userdata('user_name');
				$user_photo = $this->session->userdata('user_photo');
			?>
			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>
				<div class="navbar-header pull-left">
					<a href="<?php echo base_url()."dashboard"; ?>" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Online Hostel Management
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-tasks"></i>
								<span class="badge badge-grey">2</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-check"></i>
									1 Tasks to complete
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">Software Update</span>
											<span class="pull-right">65%</span>
										</div>

										<div class="progress progress-mini">
											<div style="width:65%" class="progress-bar"></div>
										</div>
									</a>
								</li>

								<li class="dropdown-footer">
									<a href="#">
										See tasks with details
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important"><?php echo count($notices);?></span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									Notifications
								</li>

								<?php
									if(!empty($notices)):
										foreach($notices as $notice): 
								?>
										<li>
											<a href="#">
												<i class="btn btn-xs btn-primary fa fa-user"></i>
												<?php echo $notice->purpose_notice ?>
											</a>
										</li>
								<?php 
									
										endforeach; 
									endif;
								?>
								
								<li class="dropdown-footer">
									<a href="<?php echo base_url('Notice/Notices'); ?>">
										See all notifications
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="green">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">2</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									2 Messages
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
										<li>
											<a href="#">
												<img src="<?= base_url();?>assets/backend/img/avatar2.png" class="msg-photo" alt="Alex's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Alex:</span>
														Ciao sociis natoque penatibus et auctor ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>a moment ago</span>
													</span>
												</span>
											</a>
										</li>

										<li>
											<a href="#">
												<img src="<?= base_url();?>assets/backend/img/avatar2.png" class="msg-photo" alt="Bob's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">Bob:</span>
														Nullam quis risus eget urna mollis ornare ...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>3:15 pm</span>
													</span>
												</span>
											</a>
										</li>

									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="inbox.html">
										See all messages
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url($this->session->userdata('photo')); ?>" alt="" />
								<span class="user-info">
									<small>Welcome</small>
									<?php echo $user_data;?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							
								<li>
									<a href="dashboard">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>
								<li>
									<a href="<?php echo base_url()."logo_setting_controller/settings"?>">
										<i class="fa fa-cog"></i>
										Setting
									</a>
								</li>

								<li>
									<a href="<?php echo base_url()."user/do_logout"?>">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>