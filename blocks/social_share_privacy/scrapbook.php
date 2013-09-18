<?php  defined('C5_EXECUTE') or die("Access Denied.");
$sh = Loader::helper('social_share_privacy','social_share_privacy'); 
?>

<?php  if ($fbStatus == "on") {?>
<img src="<?php  echo $sh->getServiceImage("facebook")?>" />&nbsp;&nbsp;
<?php  } ?>
<?php  if ($twStatus == "on") {?>
<img src="<?php  echo $sh->getServiceImage("twitter")?>" />&nbsp;&nbsp;
<?php  } ?>
<?php  if ($gpStatus == "on") {?>
<img src="<?php  echo $sh->getServiceImage("gplus")?>" />&nbsp;&nbsp;
<?php  } ?>