<?php  defined('C5_EXECUTE') or die("Access Denied.");
	$sh = Loader::helper('social_share_privacy','social_share_privacy'); 
	$args = compact("fbStatus","fbAction","twStatus","gpStatus","infoURL","infoCID");
	foreach ($args as $key=>&$arg) {
		// remove arguments that are empty
		// this will make renderSocialButtons() use the defaults
		if ($arg == "") {
			unset($args[$key]);
		}
	}
	$sh->renderSocialButtons("",$args);