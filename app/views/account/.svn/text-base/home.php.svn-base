<fieldset>
	<h1>Designs</h1>
	<?php if(!empty($designs)) foreach($designs as $design){?>
		<?php if(is_file("../shirts/".$config['DESIGN'].$design['image'])){?>
		<div class="design_entry">
		<a href='<?php echo $config['SITE_URL']?>design/view/id=<?php echo $design['id']?>'>
			<img src='<?php echo $config['SITE_URL'].$config['DESIGN'].$design['image']?>' width='100' border='0'>
		</a>
		<p>
			<a href='<?php echo $config['SITE_URL']?>account/modify_design/id=<?php echo $design['id']?>'>
			modify
			</a>
		</p>
		</div>
		<?php }?>
	<?php }?>
</fieldset>

<fieldset class='sidebar'>
	<h1>Avatar</h1>
	<form method='POST' enctype="multipart/form-data" name='frmimage'>
	<div class='data_row'>
		<div class='data_value'>
			<img align='left' src='<?php echo $config['SITE_URL'] . $config['AVATAR'] . $account['user_id'];?>.jpg' border='0' width='100'>

			<input type='submit' size='30' value='Save'/>
			<input type='file' name='image' size='30' value='<?php echo $account['first_name'];?>'/>
			<?php echo !empty($response) ? $response : '';?>
		</div>
	</div>
	</form>
</fieldset>

<fieldset class='sidebar'>
	<h1>Account Settings</h1>
	<form method='POST'>
	<div class='data_row'>
		<div class='data_label'>Alias: </div> 
		<div class='data_control' id='alias_control'>
			<input type='text' name='account[alias]' size='30' value='<?php echo $account['alias'];?>'/>
		</div>
	</div>
	<div class='data_row'>
		<div class='data_label'>First Name: </div> 
		<div class='data_control' id='first_name_control'>
			<input type='text' name='account[first_name]' size='30' value='<?php echo $account['first_name'];?>'/>
		</div>
	</div>
	<div class='data_row'>
		<div class='data_label'>Last Name: </div> 
		<div class='data_control' id='last_name_control'>
			<input type='text' name='account[last_name]' size='30' value='<?php echo $account['last_name'];?>'/>
		</div>
	</div>
	<div class='data_row'>
		<div class='data_label'>Website: </div> 
		<div class='data_control' id='url_control'>
			<input type='text' name='account[url]' size='30' value='<?php echo $account['url'];?>'/>
		</div>
	</div>
	<div class='data_row' align='right'>
		<div class='data_control'>
			<input type='submit' size='30' value='Save' name='submit'/>
		</div>
	</div>
	</form>
	
	<div class='data_row'>
		<div class='data_label'>Following: (<?php echo $followers;?>)</div> 
		<div class='data_control' id='url_control'>
			
		</div>
	</div>
	<div class='data_row'>
		<div class='data_label'>Followers:  (<?php echo $following;?>)</div> 
		<div class='data_control' id='url_control'>
			
		</div>
	</div>
</fieldset>

