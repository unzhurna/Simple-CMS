<!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin CMS</title>
        <link href="<?php echo config_item('asset'); ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo config_item('asset'); ?>css/bootstrap-reset.css" rel="stylesheet">
        <link href="<?php echo config_item('asset'); ?>css/font-awesome.css" rel="stylesheet">
        <link href="<?php echo config_item('asset'); ?>css/jquery.gritter.css" rel="stylesheet">
		<link href="<?php echo config_item('asset'); ?>css/DT_bootstrap.css" rel="stylesheet">
        <link href="<?php echo config_item('asset'); ?>css/style.css" rel="stylesheet">
        <link href="<?php echo config_item('asset'); ?>css/style-responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="<?php echo config_item('asset'); ?>js/html5shiv.js"></script>
            <script src="<?php echo config_item('asset'); ?>js/respond.min.js"></script>
        <![endif]-->
    </head>
	<body>
		<section id="container">
			<!--header start-->
			<header class="header white-bg">
				<div class="sidebar-toggle-box">
					<div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
				</div>
				<!--logo start-->
				<a href="index.html" class="logo" >C<span>M</span>S</a>
				<!--logo end-->				
				<div class="top-nav ">
					<ul class="nav pull-right top-menu">
						<!-- user login dropdown start-->
						<li class="dropdown language">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#"><img alt="" src="<?php echo config_item('asset'); ?>img/avatar1_small.jpg"> <span class="username"><?php echo $this->session->userdata('name'); ?></span> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo site_url('welcome'); ?>" target="_blank"><i class="icon-globe"></i> View Site</a>
								</li>
								<li>
									<a href="<?php echo site_url('auth/logout'); ?>"><i class="icon-signout"></i> Log Out</a>
								</li>
							</ul>
						</li>
						<!-- user login dropdown end -->
					</ul>
				</div>
			</header>
			<!--header end-->
			<!--sidebar start-->
			<aside>
				<div id="sidebar"  class="nav-collapse ">
					<!-- sidebar menu start-->
					<ul class="sidebar-menu" id="nav-accordion">
						<li class="sub-menu">
							<a href="javascript:;"><i class="icon-pencil"></i><span>Post</span></a>
							<ul class="sub">
								<li>
									<a  href="<?php echo site_url('articles'); ?>">Articles</a>
								</li>
								<li>
									<a  href="<?php echo site_url('articles/submit'); ?>">Create</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="<?php echo site_url('categories'); ?>"><i class="icon-tags"></i><span>Categories</span></a>
						</li>
					</ul>
					<!-- sidebar menu end-->
				</div>
			</aside>
			<!--sidebar end-->
			<!--main content start-->
			<section id="main-content">
				<section class="wrapper site-min-height">
					<!-- page start-->
					<?php echo $content; ?>
					<!-- page end-->
				</section>
			</section>
			<!--main content end-->
			<!--footer start-->
			<footer class="site-footer">
				<div class="text-center">
					&copy; 2015 All right reserved.
					<a href="#" class="go-top"> <i class="icon-angle-up"></i> </a>
				</div>
			</footer>
			<!--footer end-->
		</section>
		
		<!--myModal start-->
		<div class="modal fade bs-example-modal-sm" id="myModal"></div>
		<!--myModal start-->

		<script src="<?php echo config_item('asset'); ?>js/jquery.js"></script>
        <script src="<?php echo config_item('asset'); ?>js/bootstrap.js"></script>
        <script src="<?php echo config_item('asset'); ?>js/jquery.dcjqaccordion.2.7.js"></script>
		<script src="<?php echo config_item('asset'); ?>js/jquery.gritter.js"></script>
		<script src="<?php echo config_item('asset'); ?>js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo config_item('asset'); ?>js/jquery.nicescroll.js"></script>
        <script src="<?php echo config_item('asset'); ?>js/respond.min.js" ></script>
        <script src="<?php echo config_item('asset'); ?>js/common-scripts.js"></script>
		<?php if($script) echo $script; ?>
		<?php if($this->session->flashdata('alert')) : ?>
		<script>
			gritter_alert('<?php echo $this->session->flashdata('alert'); ?>');
		</script>
		<?php endif; ?>

	</body>
</html>