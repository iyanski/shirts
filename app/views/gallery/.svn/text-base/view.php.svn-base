<fieldset>
	<h1>Design Gallery</h1>
	<?php if(!empty($designs))  foreach($designs as $design){?>
		<?php if(is_file("../shirts/".$config['DESIGN'].$design['image'])){?>
		<a href='<?php echo $config['SITE_URL']?>design/view/id=<?php echo $design['id']?>'>
			<img src='<?php echo $config['SITE_URL'].$config['DESIGN'].$design['image']?>' width='100' border='0'>
		</a>
		<?php }?>
	<?php }?>
</fieldset>