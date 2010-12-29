<fieldset class='window'>
	<h1>Designs</h1>
	<?php if(!empty($designs)) foreach($designs as $design){?>
		<?php if(is_file("../shirts/".$config['DESIGN'].$design['image'])){?>
		<a href='<?php echo $config['SITE_URL']?>design/view/id=<?php echo $design['id']?>'>
			<img src='<?php echo $config['SITE_URL'].$config['DESIGN'].$design['image']?>' width='100' border='0'>
		</a>
		<?php }?>
	<?php }?>
</fieldset>

<fieldset class='sidebar'>
	<h1><?php echo $account['alias'];?></h1>
	<div class='data_row'>
		<div class='data_value'>
			<img src='<?php echo $config['SITE_URL'] . $config['AVATAR'] . $account['user_id'];?>.jpg' border='0' width='100'>
			<div class='follow'>Follow</div>
		</div>
	</div>
	<div class='data_row'>
		<div class='data_label'>First Name: </div> 
		<div class='data_value' id='first_name'>
			<?php echo ucwords($account['first_name']);?>
		</div>
	</div>
	<div class='data_row'>
		<div class='data_label'>Last Name: </div> 
		<div class='data_value' id='last_name'>
			<?php echo ucwords($account['last_name']);?>
		</div>
	</div>
	<div class='data_row'>
		<div class='data_label'>Website: </div> 
		<div class='data_value' id='url'>
			<?php echo ucwords($account['url']);?>
		</div>
	</div>
</fieldset>