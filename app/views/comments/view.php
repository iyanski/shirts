<fieldset>
	<h1>Comments</h1>
	<?php if($comments) foreach($comments as $comment){?>
		<div class='data_row'>
		<img align='left' src='<?php echo $config['SITE_URL'] . $config['DESIGN'] . $comment['image'];?>' border='0' width='100'>
		<p><?php echo $comment['alias']?> says: (<a href="<?php echo $config['SITE_URL']."design/view/id=". $comment['design_id']?>">view shirt</a>)</p>
		<p><?php echo $comment['comment']?></p>
		<p><?php echo date("F d, Y h:i:s a", strtotime($comment['created_at']))?></p>
		</div>
	<?php }?>
</fieldset>