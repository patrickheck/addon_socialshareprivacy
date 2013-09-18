<?php defined('C5_EXECUTE') or die("Access Denied.");
/**
  * This generates the javascript call for the jquery plugin 
  */
$sh = Loader::helper('social_share_privacy','social_share_privacy'); 
$c = Page::getCurrentPage();
?>
<div id="<?php  echo $target_id?>" class="social-share-privacy <?php  echo $c->isEditMode()?"editmode":""?>" ></div>
<script type="text/javascript">
    jQuery(document).ready(function($){
      if( jQuery().socialSharePrivacy && $('#<?php  echo $target_id?>').length > 0){
        $('#<?php  echo $target_id?>').socialSharePrivacy({
  services : {
    facebook : {
		'status' 		: '<?php echo $fbStatus?>',
		'txt_info' 		: '<?php echo t("2 clicks for increased privacy: Only after clicking here the button will become active and allow connecting to Facebook. Data will already be transferred upon activation &ndash; see <em>i</em>")?>',
		'txt_fb_off' 	: '<?php echo t("not connected to Facebook")?>',
		'txt_fb_on' 	: '<?php echo t("connected to Facebook")?>',
		'display_name' 	: '<?php echo t("Facebook")?>',
		'language' 		: '<?php echo ACTIVE_LOCALE?>',
		'action' 		: '<?php echo $fbAction?>',
		'dummy_caption'	: '<?php if ($fbAction == "recommend") { echo t("Recommend"); } else { echo t("Like"); }?>'
    }, 
    twitter : {
		'status' 			: '<?php echo $twStatus?>',
		 'txt_info' 		: '<?php echo t("2 clicks for increased privacy: Only after clicking here the button will become active and allow connecting to Twitter. Data will already be transferred upon activation &ndash; see <em>i</em>")?>',
		'txt_twitter_off' 	: '<?php echo t("not connected to twitter")?>',
		'txt_twitter_on' 	: '<?php echo t("connected to twitter")?>',
		'display_name' 		: '<?php echo t("Twitter")?>',
		'language' 			: '<?php echo LANGUAGE?>',
		'dummy_caption'		: '<?php echo t("Tweet")?>'
    },
    gplus : {
      'status' 			: '<?php  echo $gpStatus?>',
	  'txt_info' 		: '<?php  echo t("2 clicks for increased privacy: Only after clicking here the button will become active and allow connecting to Google+. Data will already be transferred upon activation &ndash; see <em>i</em>")?>',
	  'txt_glus_off' 	: '<?php  echo t("not connected to google+")?>',
	  'txt_gplus_on' 	: '<?php  echo t("connected to google+")?>',
	  'display_name' 	: '<?php  echo t("Google+")?>',
	  'language' 		: '<?php  echo LANGUAGE?>'
    }
  },
  'info_link' : '<?php  echo $infoURL?>',
  'txt_help' : '<?php  echo t("If you activate these buttons, data will be transferred to Facebook, Twitter or Google in the USA. This data might also be stored there.")?>',
  'settings_perma' : '<?php  echo t("Activate permanently and confirm transfer of data:")?>',
  'css_path' : ''
  <?php if ($uri != "" ) {?>,
  'uri' : '<?php echo $uri ?>'
  <?php } ?>
}); 
      }
    });
</script>