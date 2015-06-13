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
		<!-- end: MAIN CSS -->
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
			  <li class="active"><a>Galeri</a></li>
			  <li><a href="<?php echo base_url()?>image_manager/upload_image" >Upload Image</a></li>
			</ul>
			<div class="tab-content">
				<div style="height:350px;padding-right:10px;margin:0px" class="panel-scroll">
				<table class="table" id="_list_content">
					<?php if(isset($image_list)):?>
					<?php $i=0;?>
					<?php foreach($image_list as $row):?>
					<?php $i++;?>
						<tr>
							<td width="50"><img src="<?php  echo config_item('domain_url').$row['img_icon']?>" alt="image"></td>
							<td><?php echo (($row['caption'])?$row['caption']:'-')?></td>
							<td width="120">
								<select class="form-control" id="size<?php echo $i;?>" name="size">
								<option value="<?php echo config_item('domain_url').$row['img_preview']?>">Medium</option>
								<option value="<?php echo config_item('domain_url').$row['img_full']?>">Big</option>
								<option value="<?php echo config_item('domain_url').$row['img_thumb']?>">Small</option>
								</select>
							</td>
							<td width="50">
							<a href="javascript:void(0)" class="btn btn-xs btn-teal" onclick="window.parent.insert_image($('#size<?php echo $i;?>').val(),'<?php echo $row['img_full']?>')">
							
								Pilih
							</a>
							</td>
						</tr>
					<?php endforeach;?>
					<?php endif;?>
					
				</table>
				</div>
				<?php if($pagging):?>
				<a class="btn btn-default btn-sm btn-block" href="<?php echo $pagging;?>" style="margin-top:5px" id="_load_more">
					Load More
				</a>
				<img src="<?php echo config_item('assets')?>images/ajax-loader.gif" id="_loader" style="display:none;"/>
				<?php endif;?>
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
	<script src="<?php echo config_item('assets')?>plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
	<!-- end: MAIN JAVASCRIPTS -->
	</body>
	<!-- end: BODY -->
<script type="text/javascript">
	$(document).ready(function(){
		$('.panel-scroll').perfectScrollbar({
			wheelSpeed: 50,
			minScrollbarLength: 20,
			suppressScrollX: true
		});
		
		$("#_load_more").click(function(){
			$("#_load_more").hide();
			$("#_loader").show();
			
			$.ajax({
				url: $(this).attr('href'),
				type: 'POST',
				datatype:'json',
				success: function (data) {
				jsondata=$.parseJSON(data);
					$("#_list_content tbody").append(jsondata.view);
					if(jsondata.pagging){
						$("#_load_more").attr('href',jsondata.pagging);
					}else{
						$("#_load_more").remove();
					}
					$("#_loader").hide();
					$("#_load_more").show();
					$('.panel-scroll').perfectScrollbar('update');
				}
			});
			
			return false;
		})
		
	})
</script>
</html>