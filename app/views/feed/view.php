<fieldset>
	<h1>Feeds</h1>
	<?php if(!empty($designs)) foreach($designs as $design){?>
		<div class='data_row'>
			<?php if(is_file("../shirts/".$config['DESIGN'].$design['image'])){?>
			<div align='left'>
			<a href='<?php echo $config['SITE_URL']?>design/view/id=<?php echo $design['id']?>'>
				<img src='<?php echo $config['SITE_URL'].$config['DESIGN'].$design['image']?>' width='100' border='0'>
			</a>
			</div>
		
			<div>
				<p>by: <?php echo $design['alias']?> last <em><?php echo date("F d, Y h:i:s a", strtotime($design['created_at']))?></em></p>
				<p><?php echo $design['alias']?></p>
				<p><?php echo $design['description']?></p>
			</div>
		</div>
		<?php }?>
	<?php }?>
</fieldset>