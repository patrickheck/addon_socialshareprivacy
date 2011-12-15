<?php   defined('C5_EXECUTE') or die("Access Denied.");
$sh = Loader::helper('social_share_privacy','social_share_privacy'); 
?>
<h2><img alt="<?php  echo t("Facebook") ?>" src="<?php   echo $sh->getServiceImage("facebook")?>" /></h2>
<strong><?php   echo t('Show Facebook Button')?></strong><br />
<?php   echo $form->radio('fbStatus', "on", $fbStatus);?> <?php   echo t("Yes")?>&nbsp;&nbsp;
<?php   echo $form->radio('fbStatus', "off", $fbStatus);?> <?php   echo t("No")?><br />
<br />
<strong><?php   echo t('Caption')?></strong><br />
<?php   echo $form->radio('fbAction', "like", $fbAction);?> <?php   echo t("Like")?>&nbsp;&nbsp;
<?php   echo $form->radio('fbAction', "recommend", $fbAction);?> <?php   echo t("Recommend")?><br />
<br />
<h2><img alt="<?php  echo t("Twitter") ?>" src="<?php   echo $sh->getServiceImage("twitter")?>" /></h2>
<strong><?php   echo t('Show Twitter Button')?></strong><br />
<?php   echo $form->radio('twStatus', "on", $twStatus);?> <?php   echo t("Yes")?>&nbsp;&nbsp;
<?php   echo $form->radio('twStatus', "off", $twStatus);?> <?php   echo t("No")?><br />
<br />
<h2><img alt="<?php  echo t("Google+") ?>" src="<?php   echo $sh->getServiceImage("gplus")?>" /></h2>
<strong><?php   echo t('Show Google+ Button')?></strong><br />
<?php   echo $form->radio('gpStatus', "on", $gpStatus);?> <?php   echo t("Yes")?>&nbsp;&nbsp;
<?php   echo $form->radio('gpStatus', "off", $gpStatus);?> <?php   echo t("No")?><br />