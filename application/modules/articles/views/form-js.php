<script src="<?php echo config_item('asset')?>js/tinymce/tinymce.min.js"></script>
<script src="<?php echo config_item('asset'); ?>js/jquery.tagsinput.js"></script>
<script src="<?php echo config_item('asset'); ?>js/jquery.iframe-post-form.js"></script>
<script>
	tinymce.init({
		selector:'textarea',
		height: 300,
		plugins: [
			 "advlist autolink link lists charmap print preview hr anchor pagebreak spellchecker",
			 "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
			 "save table contextmenu directionality  template paste textcolor"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist  | link | print preview media"
		//document_base_url:"<?php echo config_item('domain_url'); ?>"
	});
	
	//Tags Input
	$(".tagsinput").tagsInput();
	
	function insert_image(img_url, img_ori) {
		var ed = tinyMCE.get('content-article'); // get editor instance
		var range = ed.selection.getRng(); // get range
		var newNode = document.createElement("img");
		var rev_atr = document.createAttribute("data-rev");
		newNode.setAttributeNode(rev_atr);
		newNode.setAttribute("data-rev", img_ori);
		newNode.setAttribute("src", img_url);
		range.insertNode(newNode);
		$('#gallery-modal').modal('hide')
	}
	
	$('#_image_gallery').click(function(){
		$('#gallery-modal').modal('show');
	});	
</script>