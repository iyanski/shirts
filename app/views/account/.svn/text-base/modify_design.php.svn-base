<fieldset>
	<h1>Modify Design</h1>
	<form method='POST'>
	<div>
	<?php if($shirt){?>
		<img src='<?php echo $config['SITE_URL'].$config['DESIGN'].$shirt['image']?>' width='100' border='0'>
	<?php }?>
	</div>
	<div class='data_row'>
		<div class='data_label'>Title: 
			<input type='text' name='design[title]' size='30'/>
		</div>
	</div>
	
	<div class='data_row'>
		<div class='data_label'>Description: 
			<textarea name='design[description]' rows='10' cols='50'></textarea>
		</div>
	</div>
	
	<div class='data_row' style='margin-left: 0px;'>
	<p>Thumbnail Version 130 x 200 pixels</p>
		<div class='data_value' id='first_name'>
			<input type='file' name='image' size='30'/> <?php echo isset($response_for_thumbnail) ? $response_for_thumbnail : ''?>
		</div>
	</div>
	
	<div class='data_row' style='margin-left: 0px;'>
	<p>Large Version 800 x 640 pixels</p>
		<div class='data_value' id='first_name'>
			<input type='file' name='image_large' size='30'/> <?php echo !empty($response_for_large) ? $response_for_large : ''?>
		</div>
	</div>
	
	
	<div class='data_row' style='margin-left: 0px;'>
	<p>Placement Version 500 x 400 pixels</p>
		<div class='data_value' id='first_name'>
			<input type='file' name='image_placement' size='30'/> <?php echo !empty($response_for_placement) ? $response_for_placement : ''?>
		</div>
	</div>	
	
	<div class='data_row' align='right'>
		<input type='submit' value='Submit' size='30'/>
	</div>	
	</form>
</fieldset>