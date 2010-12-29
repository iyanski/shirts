<?php if(!empty($errors)){?>
<div>
	<?php inspect($errors);?>
</div>
<?php }?>

<?php if(!empty($successfull)){?>
<div>
	Registration Successfull. Please check your email to complete your registration.
</div>
<?php }else{?>
<form method='POST'>
	<div class='label'>Username: </div> 
	<div class='control'><input type='text' name='user[login]' size='30'/></div>
	<div class='label'>Email: </div> 
	<div class='control'><input type='text' name='user[email]' size='30'/></div>
	<div class='label'>Password: </div> 
	<div class='control'><input type='password' name='user[password]' size='30'/></div>
	<div class='label'>Confirm Password: </div> 
	<div class='control'><input type='password' name='confirm_password' size='30'/></div>
	<div class='label'></div> <div class='control'><input type='submit' value='Login'/></div>
</form>
<?php }?>