<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Public CMS</title>
        <link href="<?php echo config_item('asset'); ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo config_item('asset'); ?>css/bootstrap-reset.css" rel="stylesheet">
        <link href="<?php echo config_item('asset'); ?>css/font-awesome.css" rel="stylesheet">
		<link href="<?php echo config_item('asset'); ?>css/jquery.gritter.css" rel="stylesheet">
        <link href="<?php echo config_item('asset'); ?>css/style.css" rel="stylesheet">
        <link href="<?php echo config_item('asset'); ?>css/style-responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="<?php echo config_item('asset'); ?>js/html5shiv.js"></script>
            <script src="<?php echo config_item('asset'); ?>js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="full-width">
        <section id="container">
            <!--header start-->
            <header class="header white-bg">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--logo start-->
                    <a href="<?php echo site_url('/'); ?>" class="logo" >C<span>M</span>S</a>
                    <!--logo end-->
                    <div class="top-nav ">
                        <ul class="nav pull-right top-menu">
							<li class="dropdown language">
								<?php if(!$this->session->userdata('logged_in')) : ?>
									<a href="<?php echo site_url('auth'); ?>"><i class="icon-signin"></i><span class="username"> User Login</span></a>
								<?php else : ?>
									<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-user"></i> <span class="username"><?php echo $this->session->userdata('name'); ?></span> <b class="caret"></b> </a>
									<ul class="dropdown-menu">
										<li>
											<a href="<?php echo site_url('auth/logout'); ?>"><i class="icon-signout"></i> Log Out</a>
										</li>
									</ul>
								<?php endif ?>
							</li>
                        </ul>
                    </div>
                </div>
            </header>
            <!--header end-->
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper site-min-height">
                    <!-- page start-->
                    <div class="row">
						<div class="col-lg-2">
							<section class="panel">
								<header class="panel-heading">
									CATEGORIES
								</header>
								<div class="list-group">
									<?php foreach($categories as $category) : ?>
									<a class="list-group-item " href="<?php echo site_url('welcome/article_base/'.$category['id']); ?>"><?php echo $category['category']; ?></a>
									<?php endforeach ?>
								</div>
							</section>
						</div>   
                        <div class="col-lg-10">
                            <section class="panel">
                                <div class="panel-body profile-activity">
                                    <div class="activity terques">
                                        <span> <i class="icon-shopping-cart"></i> </span>
                                        <div class="activity-desk">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <div class="arrow"></div>
                                                    <i class=" icon-time"></i>
                                                    <h4>10:45 AM</h4>
                                                    <p>
                                                        Purchased new equipments for zonal office setup and stationaries.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="activity alt purple">
                                        <span> <i class="icon-rocket"></i> </span>
                                        <div class="activity-desk">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <div class="arrow-alt"></div>
                                                    <i class=" icon-time"></i>
                                                    <h4>12:30 AM</h4>
                                                    <p>
                                                        Lorem ipsum dolor sit amet consiquest dio
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="activity blue">
                                        <span> <i class="icon-bullhorn"></i> </span>
                                        <div class="activity-desk">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <div class="arrow"></div>
                                                    <i class=" icon-time"></i>
                                                    <h4>10:45 AM</h4>
                                                    <p>
                                                        Please note which location you will consider, or both. Reporting to the VP  you will be responsible for managing..
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="activity alt green">
                                        <span> <i class="icon-beer"></i> </span>
                                        <div class="activity-desk">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <div class="arrow-alt"></div>
                                                    <i class=" icon-time"></i>
                                                    <h4>12:30 AM</h4>
                                                    <p>
                                                        Please note which location you will consider, or both.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </section>
                        </div>                                    
                    </div>
                    <!-- page end-->
                </section>
            </section>
            <!--main content end-->
        </section>

        <script src="<?php echo config_item('asset'); ?>js/jquery.js"></script>
        <script src="<?php echo config_item('asset'); ?>js/bootstrap.js"></script>
        <script src="<?php echo config_item('asset'); ?>js/jquery.dcjqaccordion.2.7.js"></script>
		<script src="<?php echo config_item('asset'); ?>js/jquery.gritter.js"></script>
        <script src="<?php echo config_item('asset'); ?>js/jquery.scrollTo.min.js"></script>
        <script src="<?php echo config_item('asset'); ?>js/jquery.nicescroll.js"></script>
        <script src="<?php echo config_item('asset'); ?>js/respond.min.js" ></script>
        <script src="<?php echo config_item('asset'); ?>js/common-scripts.js"></script>
		<?php if($this->session->flashdata('alert')) : ?>
		<script>
			gritter_alert('<?php echo $this->session->flashdata('alert'); ?>');
		</script>
		<?php endif; ?>

    </body>
</html>
