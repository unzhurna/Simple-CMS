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
	</head>
	<body>
    	<div class="row">
            <div class="col-sm-12">
    			<?php if($this->session->flashdata('success')):?>
    			<div class="alert alert-success">
    				<?php echo $this->session->flashdata('success'); ?>
    			</div>
    			<?php endif; ?>
    			<?php if($this->session->flashdata('error')):?>
    			<div class="alert alert-danger">
    				<?php echo $this->session->flashdata('error'); ?>
    			</div>
    			<?php endif; ?>    			
    			<ul class="nav nav-tabs tab-padding tab-space-3 tab-blue">
                    <li class="active"><a>Galeri</a></li>
                    <li><a href="<?php echo site_url('media/upload_image')?>" >Upload Image</a></li>
    			</ul>
    			<div class="tab-content">
    				<div style="height:350px; padding-right:10px; margin:0px" class="panel-scroll">
        				<table class="table" id="_list_content">
        					<?php if(isset($image_list)): ?>
        					<?php $i = 0; ?>
        					<?php foreach($image_list as $row): ?>
        					<?php $i++; ?>
        						<tr>
        							<td width="50"><img src="<?php  echo config_item('domain_url').$row['img_icon']?>" alt="image"></td>
        							<td><?php echo (($row['caption']) ? $row['caption'] : '-')?></td>
        							<td width="120">
        								<select class="form-control" id="size<?php echo $i; ?>" name="size">
            								<option value="<?php echo config_item('domain_url').$row['img_preview']; ?>"> Medium</option>
            								<option value="<?php echo config_item('domain_url').$row['img_full']; ?>"> Big</option>
            								<option value="<?php echo config_item('domain_url').$row['img_thumb']; ?>"> Small</option>
        								</select>
        							</td>
        							<td width="50">
            							<a href="javascript:void(0)" class="btn" onclick="window.parent.insert_image($('#size<?php echo $i; ?>').val(),'<?php echo $row['img_full']; ?>')">        							
            								<i class="icon-ok-circle"></i> 
            							</a> 
        							</td>
        						</tr>
        					<?php endforeach; ?>
        					<?php endif; ?>    					
        				</table>
    				</div>
    				<?php if($pagging):?>
    				<a class="btn btn-default btn-sm btn-block" href="<?php echo $pagging; ?>" style="margin-top:5px" id="_load_more">
    					Load More
    				</a>
    				<img src="<?php echo config_item('asset'); ?>img/ajax-loader.gif" id="_loader" style="display:none;"/>
    				<?php endif; ?>
    			</div>				
    		</div>		
    	</div>
    	<script src="<?php echo config_item('asset'); ?>js/jquery.js"></script>
        <script src="<?php echo config_item('asset'); ?>js/bootstrap.js"></script>
    	<script src="<?php echo config_item('asset')?>js/perfect-scrollbar.js"></script>
    </body>    
    <script>
		$(document).ready(function() {
			$('.panel-scroll').perfectScrollbar({
				wheelSpeed : 50,
				minScrollbarLength : 20,
				suppressScrollX : true
			});

			$("#_load_more").click(function() {
				$("#_load_more").hide();
				$("#_loader").show();
				$.ajax({
					url : $(this).attr('href'),
					type : 'POST',
					datatype : 'json',
					success : function(data) {
						jsondata = $.parseJSON(data);
						$("#_list_content tbody").append(jsondata.view);
						if (jsondata.pagging) {
							$("#_load_more").attr('href', jsondata.pagging);
						} else {
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