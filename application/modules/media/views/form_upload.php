<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Public CMS</title>
		<link href="<?php echo config_item('asset'); ?>css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo config_item('asset'); ?>css/bootstrap-reset.css" rel="stylesheet">
		<link href="<?php echo config_item('asset'); ?>css/font-awesome.css" rel="stylesheet">
		<link href="<?php echo config_item('asset')?>css/perfect-scrollbar.css" rel="stylesheet">
		<link href="<?php echo config_item('asset')?>css/bootstrap-fileupload.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="row">
			<div class="col-sm-12">
				<?php if($this->session->flashdata('success')):?>
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">
						×
					</button>
					<i class="fa fa-check-circle"></i>
					<?php echo $this -> session -> flashdata('success'); ?>
				</div>
				<?php endif; ?>
				<?php if($this->session->flashdata('error')):?>
				<div class="alert alert-danger">
					<button class="close" data-dismiss="alert">
						×
					</button>
					<i class="fa fa-times-circle"></i>
					<?php echo $this -> session -> flashdata('error'); ?>
				</div>
				<?php endif; ?>
				<ul class="nav nav-tabs tab-padding tab-space-3 tab-blue">
					<li>
						<a href="<?php echo base_url()?>image_manager" >Galeri</a>
					</li>
					<li class="active">
						<a>Upload Image</a>
					</li>
				</ul>
				<div class="tab-content">
					<form method="post" action="<?php echo site_url('media/do_upload'); ?>" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-group">
							<div class="col-sm-4">
								<label class="control-label"> Caption </label>
								<input type="text" value="" name="caption" id="caption" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4">
								<label class="control-label"> disarankan dimensi (690 X 345 ) pixel </label>
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
											<a href="#" class="btn btn-light-grey fileupload-exists" data-dismiss="fileupload"> <i class="fa fa-times"></i> Remove </a>
										</div>
									</div>
								</div>
								<button type="submit" class="btn btn-primary">
									<i class="icon-upload"></i> Start Upload
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<script src="<?php echo config_item('asset'); ?>js/jquery.js"></script>
        <script src="<?php echo config_item('asset'); ?>js/bootstrap.js"></script>
        <script src="<?php echo config_item('asset'); ?>js/bootstrap-fileupload.min.js"></script>
        <script src="<?php echo config_item('asset')?>js/perfect-scrollbar.js"></script>
		<?php
            if (isset($script)) {
                echo $script;
            }
		?>
	</body>
</html>