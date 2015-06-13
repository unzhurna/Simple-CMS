<script>
    $('#myModalform').submit(function() {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('categories/submit_form'); ?>',            
            datatype: 'json',
            data: $(this).serialize(),
            success: function(data) {
                jsonData = $.parseJSON(data);
                if(jsonData.status == 0) {
                    gritter_alert(jsonData.alert);
                } else {
                    $('#myModal').modal('toggle');
                    gritter_alert(jsonData.alert); 
                    oTable.fnDraw();                                 
                }
            }           
        });
        return false;
    });
</script>
<div class="modal-dialog modal-sm">
	<form id="myModalform">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><i class="icon-edit"></i> Form Category</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Category <span class="text-danger">*</span></label>
					<input type="hidden" name="id" value="<?php echo set_value($id); ?>">
					<input type="text" class="form-control" name="category" value="<?php echo set_value('category', $category); ?>">
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" rows="3" name="description"><?php echo $description; ?></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<?php if ($id) : ?>
                <button class="btn btn-danger" type="button" onclick="myConfirm('categories/delete_category/<?php echo $id; ?>')"><i class="icon-trash"></i> Delete</button>
                <?php endif ?>
				<button data-dismiss="modal" class="btn btn-default" type="button"><i class="icon-remove-circle"></i> Cancel</button>
				<button class="btn btn-primary" type="submit"><i class="icon-ok-circle"></i> Submit</button>
			</div>
		</div>
	</form>
</div>