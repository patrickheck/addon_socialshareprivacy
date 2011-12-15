<?php   defined('C5_EXECUTE') or die("Access Denied.");
	$sh = Loader::helper('social_share_privacy','social_share_privacy'); 
	$showFacebook = $fbStatus=="on";
	$showTwitter = $twStatus=="on";
    $showGPlus = $gpStatus=="on";
	$sh->renderSocialButtons("",$showFacebook,$showTwitter,$showGPlus,$fbAction);