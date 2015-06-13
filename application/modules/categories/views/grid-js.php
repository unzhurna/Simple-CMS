<script src="<?php echo config_item('asset'); ?>js/jquery.dataTables.js"></script>
<script src="<?php echo config_item('asset'); ?>js/DT_bootstrap.js"></script>
<script>
	//dataTables
    $(document).ready(function() {
        oTable = $('#grid_data').dataTable( {
            'bProcessing': true,
            'bServerSide': true,
            'sAjaxSource': '<?php  if(isset($source)) echo $source; ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                $.ajax ({
                    type : 'POST',
                    url : sSource,
                    data : aoData,
                    dataType : 'json',
                    success : fnCallback
                });
            }
        });     
        
        // Custom Placehoder
        $('.dataTables_filter input').attr('placeholder','Search...');
	});
	
	function call_modal(id) {
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url('categories/call_form'); ?>/'+id, 
			success: function (data) {
				$('#myModal').html(data).modal('show');
			}
		});
		return false;
	}
	
</script>