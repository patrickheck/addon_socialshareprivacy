<?php  defined('C5_EXECUTE') or die("Access Denied.");?>

<?php  echo Loader::helper('concrete/dashboard')->getDashboardPaneHeaderWrapper(t('Social Share Privacy Defaults'), false, 'span8 offset2', false); ?>
<form method="post" class="form-horizontal" action="<?php  echo $this->action('set_defaults')?>">
<div class="ccm-pane-body">
<fieldset>
<legend style="margin-bottom: 0px"><?php echo t("Facebook")?></legend>
<div class="control-group">
<label class="control-label" for="fbStatus"><?php  echo t('Facebook Button')?></label>
<div class="controls">
<label class="radio">
<?php  echo $form->radio('fbStatus', "on", $fbStatus);?> <?php  echo t("On")?>&nbsp;&nbsp;
</label>
</div>
<div class="controls">
<label class="radio">
<?php  echo $form->radio('fbStatus', "off", $fbStatus);?> <?php  echo t("Off")?><br />
</label>
</div>
</div>

<div class="control-group">
<label class="control-label" for="fbStatus"><?php  echo t('Caption')?></label>
<div class="controls">
<label class="radio">
<?php  echo $form->radio('fbAction', "like", $fbAction);?> <?php  echo t("Like")?>
</label>
</div>
<div class="controls">
<label class="radio">
<?php  echo $form->radio('fbAction', "recommend", $fbAction);?> <?php  echo t("Recommend")?>
</label>
</div>
</div>
</fieldset>


<fieldset>
<legend style="margin-bottom: 0px"><?php echo t("Twitter") ?></legend>
<div class="control-group">
<label class="control-label" for="fbStatus"><?php  echo t('Twitter Button')?></label>
<div class="controls">
<label class="radio">
<?php  echo $form->radio('twStatus', "on", $twStatus);?> <?php  echo t("On")?>
</label>
</div>
<div class="controls">
<label class="radio">
<?php  echo $form->radio('twStatus', "off", $twStatus);?> <?php  echo t("Off")?>
</label>
</div>
</div>
</fieldset>

<fieldset>
<legend style="margin-bottom: 0px"><?php echo t("Google+") ?></legend>
<div class="control-group">
<label class="control-label" for="fbStatus"><?php  echo t('Google+ Button')?></label>
<div class="controls">
<label class="radio">
<?php  echo $form->radio('gpStatus', "on", $gpStatus);?> <?php  echo t("On")?>
</label>
</div>
<div class="controls">
<label class="radio">
<?php  echo $form->radio('gpStatus', "off", $gpStatus);?> <?php  echo t("Off")?>
</label>
</div>
</div>
</fieldset>


<fieldset>
<legend style="margin-bottom: 0px"><?php echo t("Info Button Page")?></legend>
<div class="control-group">
<label for="infoCID" ><?php echo t("This URL will be visited if you click the <em>i</em> button. If none is set the button will be hidden.")?></label>

<?php  echo Loader::helper('form/page_selector')->selectPage('infoCID', $infoCID)?>

</div>
</fieldset>
<?php  echo Loader::helper('validation/token')->output('set_defaults')?>
</div>
<div class="ccm-pane-footer">
	<?php echo Loader::helper('concrete/interface')->submit(t('Save'), 'mail-settings-form','right','primary')?>
</div>
</form>

<?php  echo Loader::helper('concrete/dashboard')->getDashboardPaneFooterWrapper();?>
