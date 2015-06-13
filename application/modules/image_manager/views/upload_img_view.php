<!DOCTYPE html>
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
	<!--<![endif]-->
	<!-- start: HEAD -->
	<head>
		<title>Image Manager</title>
		<!-- start: META -->
		<meta charset="utf-8" />
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- end: META -->
		<!-- start: MAIN CSS -->
		<link rel="stylesheet" href="<?php echo config_item('assets')?>plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo config_item('assets')?>css/main.css">
		<link rel="stylesheet" href="<?php echo config_item('assets')?>plugins/perfect-scrollbar/src/perfect-scrollbar.css">
		<link rel="stylesheet" href="<?php echo config_item('assets')?>plugins/bootstrap-fileupload/bootstrap-fileupload.min.css">
	</head>
	<!-- end: HEAD -->
	<!-- start: BODY -->
	<body>
	<div class="row">
		<div class="col-sm-12">
			<?php if($this->session->flashdata('success')):?>
			<div class="alert alert-success">
				<button class="close" data-dismiss="alert">
					×
				</button>
				<i class="fa fa-check-circle"></i>
				<?php echo $this->session->flashdata('success');?>
			</div>
			<?php endif;?>
			<?php if($this->session->flashdata('error')):?>
			<div class="alert alert-danger">
				<button class="close" data-dismiss="alert">
					×
				</button>
				<i class="fa fa-times-circle"></i>
				<?php echo $this->session->flashdata('error');?>
			</div>
			<?php endif;?>		
			<ul class="nav nav-tabs tab-padding tab-space-3 tab-blue">
			  <li><a href="<?php echo base_url()?>image_manager" >Galeri</a></li>
			  <li class="active"><a>Upload Image</a></li>
			</ul>
			<div class="tab-content">
				<form method="post" action="<?php echo base_url()?>image_manager/do_upload" class="form-horizontal" enctype="multipart/form-data">
				<div class="form-group">
					<div class="col-sm-4">
							<label class="control-label">
								Caption
							</label>
							<input type="text" value="" name="caption" id="caption" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4">
						<label class="control-label">
								disarankan dimensi (690 X 345 ) pixel
						</label>
						<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="input-group">
								<div class="form-control uneditable-input">
									<i class="fa fa-file fileupload-exists"></i>
									<span class="fileupload-preview"></span>
								</div>
								<div class="input-group-btn">
									<div class="btn btn-light-grey btn-file">
										<span class="fileupload-new"><i class="fa fa-folder-open-o"></i> Select file</span>
										<span class="fileupload-exists"><i class="fa fa-folder-open-o"></i> Change</span>
										<input type="file" class="file-input" name="userfile">
									</div>
									<a href="#" class="btn btn-light-grey fileupload-exists" data-dismiss="fileupload">
										<i class="fa fa-times"></i> Remove
									</a>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">
							Start Upload
						</button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- start: MAIN JAVASCRIPTS -->
	<!--[if lt IE 9]>
	<script src="<?php echo config_item('assets')?>plugins/respond.min.js"></script>
	<script src="<?php echo config_item('assets')?>plugins/excanvas.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<![endif]-->
	<!--[if gte IE 9]><!-->
	<script src="<?php echo config_item('assets')?>js/jquery.min.js"></script>
	<!--<![endif]-->
	<script src="<?php echo config_item('assets')?>plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo config_item('assets')?>plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
	<script src="<?php echo config_item('assets')?>plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
	<script>
		jQuery(document).ready(function() {
//				Main.init();
		});
	</script>
	<?php 
		if(isset($script))
		{
			echo $script;
		}
	?>
	</body>
	<!-- end: BODY -->
</html>