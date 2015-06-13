<script src="<?php echo config_item('asset'); ?>js/jquery.dataTables.js"></script>
<script src="<?php echo config_item('asset'); ?>js/DT_bootstrap.js"></script>
<script>
	//dataTables
    $(document).ready(function() {
        oTable = $('#grid_data').dataTable( {
            'bProcessing': true,
            'bServerSide': true,
            'sAjaxSource': '<?php  if(isset($source)) echo $source; ?>',
            'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [0]
            }],
            'fnServerData': function (sSource, aoData, fnCallback) {
                $.ajax ({
                    type : 'POST',
                    url : sSource,
                    data : aoData,
                    dataType : 'json',
                    success : fnCallback
                });
            },            
			"fnDrawCallback": function ( oSettings) {
				for (var i=0, iLen=oSettings.aiDisplay.length; i<iLen; i++ )
				{
					_id = $('td:eq(0)', oSettings.aoData[oSettings.aiDisplay[i] ].nTr ).text();
					check_box='<input type="checkbox" value="'+ _id +'" class="chek_grid" onclick="check_grid(this)">';
					status=$('td:eq(5)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).text();
					$('td:eq(0)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html(check_box );
					if(status == 0)
					{
						$('td:eq(5)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html('<span class="text-danger"><i class="icon-remove-circle"></i> Unpublish</span>');	
					}
					else
					{
						$('td:eq(5)', oSettings.aoData[ oSettings.aiDisplay[i] ].nTr ).html('<span class="text-info"><i class="icon-ok-circle"></i> Publish</span>');	
					}
				}
			},
        });
		
        // Custom Placehoder
        $('.dataTables_filter input').attr('placeholder','Search...');
		
		$("#check_all").click(function() {
			if($(this).is(':checked')) {
				$(".chek_grid").prop("checked", true);
			} else {
				$(".chek_grid").prop("checked", false);
			}		
		});
		
		$("#_publish").click(function(){
			act_action('publish');
		});

		$("#_unpublish").click(function(){
			act_action('unpublish');
		});

		$("#_delete").click(function(){
			act_action('delete');
		});
    });
	
	function act_action(act, ex) {
		var url = '';
		if(act=='publish')	{
			url = '<?php echo site_url('articles/publish'); ?>';
		}
		if(act=='unpublish') {
			url = '<?php echo site_url('articles/unpublish'); ?>';
		}
		if(act=='delete') {
			/* if(ex!=true) {
				myConfirm('Are you sure want to delete?');
				return false;
			} */
			url = '<?php echo site_url('articles/delete'); ?>';
		}
		var list_id = [];
		$('.chek_grid').each(function () {
			if($(this).is(':checked')) {
				list_id.push($(this).val());
			}
		});
		if(list_id.length > 0) {
			$.ajax({
				url: url,
				type: 'POST',
				datatype:'json',
				data:{post_id:JSON.stringify(list_id)},
				success: function (data) {
					$("#check_all").prop("checked", false);
					jsonData = $.parseJSON(data);
					if(jsonData.status==1) {
						gritter_alert(jsonData.alert);
						oTable.fnDraw();
					} else {
						gritter_alert(jsonData.alert);
					}
				}
			});
		} else {
			gritter_alert('You dont choose any article yet!');
		}
	}
	
	/*--- Confirmation Modal----*/
    function myConfirm(msg) {
        if ($("#confirmModal").length > 0) {
            $("#confirmModal").remove();
        }
        divModal = $('<div class="modal bs-example-modal-sm" id="confirmModal">');
        divModal.append (
            '<div class="modal-dialog modal-sm">'+
                '<div class="modal-content">'+
                    '<div class="modal-header">'+
                        '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'+
                        '<h4 class="modal-title"><i class="icon-exclamation-sign"></i> Confirmation</h4>'+
                    '</div>'+
                    '<div class="modal-body">'+ msg +'</div>'+
                    '<div class="modal-footer">'+
                        '<button data-dismiss="modal" class="btn btn-default" type="button"><i class="icon-remove-circle"></i> No</button>'+
                        '<a class="btn btn-info" href="#" onclick="act_action(\'delete\');"><i class="icon-ok-circle"></i> Yes</a>'+
                    '</div>'+
                '</div>'+
            '</div>'
        );
        $('body').append(divModal);
        $('#confirmModal').modal('show');
        return false;
    }
	
</script>