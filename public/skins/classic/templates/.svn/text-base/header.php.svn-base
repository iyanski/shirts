<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv='Content-Language' content='it'/>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'/>
<meta name="robots" content="noindex,nofollow"/>
<meta name='description' content=''/>
<meta name='keywords' content=''/>
<link href='<?php echo $config['SITE_URL'];?>public/skins/classic/custom.css' rel='stylesheet' type='text/css'/>
<link href='<?php echo $config['SITE_URL'];?>public/skins/classic/style.css' rel='stylesheet' type='text/css'/>
<title><?php echo $config['SITE_NAME'];?></title>
</head>
<body leftmargin='0' topmargin='0' marginwidth='0' marginheight='0'>
<div class='container' align='center'>
<div class='topline'></div>
<div id="topmenu_outer" align="center">
  <div class="topmenu_inner" align="left">
    <div class="topmenu">Yey, its <?php echo date("l! F d, Y");?></div>
    <div class="flavors">
      <ul class="topmenu">
        <?php if(is_logged()){?>
        <li><a class="topmenu" href='<?php echo $config['SITE_URL']?>user/logout/'>Logout</a></li>
        <li><a class="topmenu" href='<?php echo $config['SITE_URL']?>article/view/id=2'>Help</a></li>
        <?php }else{?>
        <li><a class="topmenu" href='<?php echo $config['SITE_URL']?>user/login/'>Login</a></li>
        <li><a class="topmenu" href='<?php echo $config['SITE_URL']?>user/signup/'>Signup</a></li>
        <?php } ?>
        <li><a class="topmenu" href='<?php echo $config['SITE_URL']?>article/view/id=1'>About</a></li>
      </ul>
    </div>
  </div>
</div>
<div class='header' align="left">
  <div class='logo'></div>
</div>
<div class='list_container'>
<div class='menu' align="center">
  <ul>
    <?php 
				global $config;
				$me = whos_logged();
				?>
    <li><a href='<?php echo $config['SITE_URL']?>account/home/'><span>HOME</span></a></li>
    <li><a href='<?php echo $config['SITE_URL']?>gallery/view/'><span>GALLERY</span></a></li>
    <li><a href='<?php echo $config['SITE_URL']?>feed/view/'><span>FEED</span></a></li>
    <li><a href='<?php echo $config['SITE_URL']?>comments/view/'><span>COMMENTS</span></a></li>
    <?php if(is_logged()){?>
    <li><a href='<?php echo $config['SITE_URL']?>profile/view/id=<?php echo Account::get_id($me['id']);?>'><span>PROFILE</span></a></li>
    <?php } ?>
    <li><a href='<?php echo $config['SITE_URL']?>account/submit/'><span>SUBMIT</span></a></li>
    <?php if(is_logged()){?>
    <li><a href='<?php echo $config['SITE_URL']?>user/logout/'><span>LOGOUT</span></a></li>
    <?php }else{?>
    <li><a href='<?php echo $config['SITE_URL']?>user/login/'><span>LOGIN</span></a></li>
    <li><a href='<?php echo $config['SITE_URL']?>user/signup/'><span>SIGNUP</span></a></li>
    <?php } ?>
  </ul>
</div>
<!--Body>>-->
