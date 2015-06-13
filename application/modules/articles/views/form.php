<div class="row">
	<div class="col-lg-12">
		<section class="panel">
			<header class="panel-heading">
				<i class="icon-edit"></i> Form Article
			</header>
			<div class="panel-body">
				<div class="form">
					<form  method="POST" action="<?php echo site_url('articles/submit/'.$id); ?>">
						<div class="row">
							<div class="col-lg-9">
                                <div class="form-group">
                                    <label>Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" value="<?php echo set_value('title', $title); ?>">
									<?php echo form_error('title'); ?>
                                </div>
								<div class="form-group">
									<div class="btn-group">
										<a id="_image_gallery" href="javascript:void(0)" class="btn btn-default">
											<i class="icon-picture"></i> Insert Image 
										</a>
									</div>							
								</div>
								<div class="form-group">
									<textarea class="form-control" rows="6" name="content" id="content-article"><?php echo $content; ?></textarea>
									<?php echo form_error('content'); ?>
								</div>
							</div>						
							<div class="col-lg-3">
								<div class="form-group">
									<label>Categories</label>
									<?php echo form_dropdown('category', $opt_category, set_value('category', $id_category), 'class="form-control"'); ?>
                                </div>
								<div class="form-group">
									<label>Status</label>
									<?php
									    $opt_status = array('0'=>'Unpublish', '1'=>'Publish'); 
                                        echo form_dropdown('status', $opt_status, set_value('status', $published), 'class="form-control"'); 
									?>
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
									<input name="tags" id="tagsinput" class="tagsinput">
                                </div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-9">                                
                                <button type="submit" class="btn btn-info"><i class="icon-circle-arrow-right"></i> Submit</button>
                            </div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>
</div>


<div id="gallery-modal" class="modal fade">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="icon-picture"></i> Media</h4>
			</div>
			<div class="modal-body">
				<iframe   frameborder="0" scrolling="no" height="470" width="100%" src="<?php echo site_url('media'); ?>"></iframe>
			</div>
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default" type="button"><i class="icon-remove-circle"></i> Cancel</button>
			</div>
		</div>
	</div>
</div>