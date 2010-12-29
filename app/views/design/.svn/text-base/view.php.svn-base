	<script type="text/javascript" src="<?php echo $config['SITE_URL'];?>/public/javascripts/jquery.js"></script>
	<script>
    	function post_comment(){
			var comment = document.getElementById('comment').value;
			if (comment != '') {
				$.ajax({
					type: "POST",
					url: "<?php echo $config['SITE_URL'];?>partial.php?controller=comments&action=create&id=<?php echo $_GET['id'];?>",
					data: "comment=" + comment,
					success: function(msg){
						if (msg == 1) {
							document.getElementById('response').innerHTML = 'Posted Comment Successfully.';
						}
					}
				});
				document.getElementById('response').innerHTML = '';
			}else{
				document.getElementById('response').innerHTML = 'Please write a whorthwhile comment.';
			}
		}
    </script>

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
<fieldset class='window'>
	<h1><?php echo $tee['title'];?></h1>
	<img src='<?php echo $config['SITE_URL'] . $config['DESIGN'] . $tee['image'];?>' border='0' width='100'>
	<h4>Description</h4>
	<p><?php echo $tee['title'];?></p>	
</fieldset>
<fieldset>
	<h3>Comments</h3>
	<?php if(is_logged()){?>
	<?php if(!empty($comments))foreach($comments as $comment){?>
		<div class='avatar'>
			<img src='<?php echo $config['SITE_URL'] . $config['AVATAR'] . $comment['account_id'];?>.jpg' border='0' width='100'>
		</div>
		<div class='comment'>
			<?php echo $comment['comment'];?>
		</div>
	<?php }?>
	<br/><hr size='1'/>
	<p>
		<h4>Post Comment</h4>
		<div id='response'></div>
		<textarea rows='5' cols='50' id='comment'></textarea>
		<p>
		<input type='button' id='comment' value='Comment' onclick='post_comment();'/>
		</p>
	</p>
	<?php }else{?>
	<a href="<?php echo $config['SITE_URL']?>user/login/">Login</a> to comment or <a href="<?php echo $config['SITE_URL']?>user/signup/">signup</a> here
	<?php }?>
</fieldset>