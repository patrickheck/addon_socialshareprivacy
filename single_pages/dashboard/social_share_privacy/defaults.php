<?php  defined('C5_EXECUTE') or die("Access Denied.");?>

<?php  echo Loader::helper('concrete/dashboard')->getDashboardPaneHeaderWrapper(t('Social Share Privacy Defaults'), false, 'span14 offset1'); ?>

<form method="post" action="<?php  echo $this->action('set_defaults')?>">
<h3><?php echo t("Facebook")?></h3>
<strong><?php  echo t('Show Facebook Button')?></strong><br />
<?php  echo $form->radio('fbStatus', "on", $fbStatus);?> <?php  echo t("Yes")?>&nbsp;&nbsp;
<?php  echo $form->radio('fbStatus', "off", $fbStatus);?> <?php  echo t("No")?><br />
<br />
<strong><?php  echo t('Caption')?></strong><br />
<?php  echo $form->radio('fbAction', "like", $fbAction);?> <?php  echo t("Like")?>&nbsp;&nbsp;
<?php  echo $form->radio('fbAction', "recommend", $fbAction);?> <?php  echo t("Recommend")?><br />
<br />
<h3><?php echo t("Twitter") ?></h3>
<strong><?php  echo t('Show Twitter Button')?></strong><br />
<?php  echo $form->radio('twStatus', "on", $twStatus);?> <?php  echo t("Yes")?>&nbsp;&nbsp;
<?php  echo $form->radio('twStatus', "off", $twStatus);?> <?php  echo t("No")?><br />
<br />
<h3><?php echo t("Google+") ?></h3>
<strong><?php  echo t('Show Google+ Button')?></strong><br />
<?php  echo $form->radio('gpStatus', "on", $gpStatus);?> <?php  echo t("Yes")?>&nbsp;&nbsp;
<?php  echo $form->radio('gpStatus', "off", $gpStatus);?> <?php  echo t("No")?><br />
<br />
<h3><?php echo t("Info Button Page")?></h3>
<p><?php echo t("This URL will be visited if you click the <em>i</em> button.")?></p>
<div class="clearfix">
	<?php  echo Loader::helper('form/page_selector')->selectPage('infoCID', $infoCID)?>
</div>
<?php  echo Loader::helper('validation/token')->output('set_defaults')?>
<?php  echo Loader::helper('concrete/interface')->submit(t('Save'), 'save', 'left')?></form>

<?php  echo Loader::helper('concrete/dashboard')->getDashboardPaneFooterWrapper();?>
