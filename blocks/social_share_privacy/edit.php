<?php  defined('C5_EXECUTE') or die("Access Denied.");
$sh = Loader::helper('social_share_privacy','social_share_privacy'); 
?>
<fieldset>
	<legend style="margin-bottom: 0px"><?php echo t("Facebook")?></legend>
	<div class="control-group">
		<label class="control-label" for="fbStatus"><?php  echo t('Facebook Button')?></label>
		<div class="controls">
			<label class="radio">
			<?php  echo $form->radio('fbStatus', "", $fbStatus);?> <?php  echo t("Default")?>
			(<?php if ($sh->default_args["fbStatus"] == "on") {
				echo tc("State","On");
			} else {
				echo t("Off");
			}?>)
			</label>
		</div>
		<div class="controls">
			<label class="radio">
			<?php  echo $form->radio('fbStatus', "on", $fbStatus);?> <?php  echo tc("State","On")?>
			</label>
		</div>
		<div class="controls">
			<label class="radio">
			<?php  echo $form->radio('fbStatus', "off", $fbStatus);?> <?php  echo t("Off")?>
			</label>
		</div>
	</div>

	<div class="control-group fb-action hide">
		<label class="control-label" for="fbStatus"><?php  echo t('Caption')?></label>
		<div class="controls">
			<label class="radio">
			<?php  echo $form->radio('fbAction', "", $fbAction);?> <?php  echo t("Default")?>
			(<?php if ($sh->default_args["fbAction"] == "like") {
				echo t('"Like"');
			} else {
				echo t('"Recommend"');
			}?>)
			</label>
		</div>
		<div class="controls">
			<label class="radio">
			<?php  echo $form->radio('fbAction', "like", $fbAction);?> <?php  echo t('"Like"')?>
			</label>
		</div>
		<div class="controls">
			<label class="radio">
			<?php  echo $form->radio('fbAction', "recommend", $fbAction);?> <?php  echo t('"Recommend"')?>
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
			<?php  echo $form->radio('twStatus', "", $twStatus);?> <?php  echo t("Default")?>
			(<?php if ($sh->default_args["twStatus"] == "on") {
				echo tc("State","On");
			} else {
				echo t("Off");
			}?>)
			</label>
		</div>
		<div class="controls">
			<label class="radio">
			<?php  echo $form->radio('twStatus', "on", $twStatus);?> <?php  echo tc("State","On")?>
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
			<?php  echo $form->radio('gpStatus', "", $gpStatus);?> <?php  echo t("Default")?>
			(<?php if ($sh->default_args["gpStatus"] == "on") {
				echo tc("State","On");
			} else {
				echo t("Off");
			}?>)
			</label>
		</div>
		<div class="controls">
			<label class="radio">
			<?php  echo $form->radio('gpStatus', "on", $gpStatus);?> <?php  echo tc("State","On")?>
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
		<label for="infoCID" ><?php echo t("This URL will be visited if you click the <em>i</em> button. If none is set the button will not be clickable.")?></label>
		<div class="controls">
			<label class="radio">
			<?php  echo $form->radio('infoCIDUseDefaults', "1", $infoCID);?> <?php  echo t("Default")?>
			(<?php
				if ($sh->default_args["infoCID"] == 0) {
					echo "<em>".t("No link to info page")."</em>";
				} else {
					$page = Page::getByID($sh->default_args["infoCID"]);
					echo $page->getCollectionName();
				}
				?>)
			</label>
		</div>
		<div class="controls">
			<label class="radio">
			<?php  echo $form->radio('infoCIDUseDefaults', "0", $infoCID);?> <?php  echo t("Choose Page")?>
			</label>
		</div>
		<?php echo $form->hidden('infoCID', $infoCID); ?>
	</div>
<div class="control-group page-selector">
<?php  echo Loader::helper('form/page_selector')->selectPage('infoCIDSelected', $infoCID)?>
</div>
</fieldset>