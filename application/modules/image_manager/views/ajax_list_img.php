<?php if(isset($image_list)):?>
<?php foreach($image_list as $row):?>
	<tr>
		<td width="50"><img src="<?php echo config_item('userfiles').$row['img_icon']?>" alt="image"></td>
		<td><?php echo (($row['caption'])?$row['caption']:'-')?></td>
		<td width="120">
			<select class="form-control" id="size" name="size">
			<option value="<?php echo config_item('userfiles').$row['img_preview']?>">Medium</option>
			<option value="<?php echo config_item('userfiles').$row['img_full']?>">Big</option>
			<option value="<?php echo config_item('userfiles').$row['img_thumb']?>">Small</option>
			</select>
		</td>
		<td width="50">
		<a href="javascript:void(0)" class="btn btn-xs btn-teal" onclick="window.parent.insert_image($('#size').val(),'<?php echo $row['img_full']?>')">
		
			Pilih
		</a>
		</td>
	</tr>
<?php endforeach;?>
<?php endif;?>