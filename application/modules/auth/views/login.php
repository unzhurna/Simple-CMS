<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="img/favicon.png">
		<title>Login CMS</title>
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
	<body class="login-body">
		<div class="container">
			<?php echo form_open('auth/login', 'class="form-signin"'); ?>
				<h2 class="form-signin-heading">sign in now</h2>
				<div class="login-wrap">
				    <?php if($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger fade in">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>                      
                    <?php endif; ?> 
					<input type="text" class="form-control" placeholder="Username" name="username" autofocus>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <button class="btn btn-lg btn-login btn-block" type="submit">
						<i class="icon-signin"></i> Login
					</button>
					<p>
						or you can sign in via social network
					</p>
					<div class="login-social-link">
						<a href="https://www.facebook.com/dialog/oauth?client_id=1451793178450014&amp;redirect_uri=http%3A%2F%2Ffuf.me%2Fcms%2Fauth%2Ffacebook_login&amp;state=6203a466199bf081f1e44cfccaa7669e&amp;sdk=php-sdk-3.2.3&amp;scope=email" class="facebook"><i class="icon-facebook"></i> Facebook</a>
						<a href="<?php echo site_url('twtest'); ?>" class="twitter"> <i class="icon-twitter"></i> Twitter </a>
					</div>
				</div>
			<?php echo form_close(); ?>
		</div>

		<script src="<?php echo config_item('asset'); ?>js/jquery.js"></script>
		<script src="<?php echo config_item('asset'); ?>js/bootstrap.js"></script>
		<script src="<?php echo config_item('asset'); ?>js/jquery.gritter.js"></script>
		<script>
            function gritter_alert(message) {
                var unique_id = $.gritter.add({
                    text: message,
                    sticky: false,
                    before_open: function(){
                        if($('.gritter-item-wrapper').length == 3)
                        {
                            return false;
                        }
                    }
                });
                setTimeout(function(){
                    $.gritter.remove(unique_id, {
                        fade: true,
                        speed: 'slow'
                    });
                }, 1500);   
            }
        </script>       
        <?php if($this->session->flashdata('alert')) : ?>
            <script>
                gritter_alert('<?php echo $this->session->flashdata('alert'); ?>'); 
            </script>
        <?php endif; ?>
		
	</body>
</html>