<?php  
	/**
	 * A C5 wrapper wrapper for the jquery socialshareprivacy plugin
	 * ( http://www.heise.de/extras/socialshareprivacy/ )
	 * @author Patrick Heck <patrick@patrickheck.de>
	 */
defined('C5_EXECUTE') or die("Access Denied.");

	class SocialSharePrivacyBlockController extends BlockController {
		
		protected $btTable = 'btSocialSharePrivacy';
		protected $btInterfaceWidth = "350";
		protected $btInterfaceHeight = "300";
		protected $btCacheBlockRecord = true;
	    protected $btCacheBlockOutput = true;
	    protected $btCacheBlockOutputOnPost = true;
	    protected $btCacheBlockOutputForRegisteredUsers = true;
	    protected $btCacheBlockOutputLifetime = 300;
		
		/** 
		 * Used for localization. If we want to localize the name/description we have to include this
		 */
		public function getBlockTypeDescription() {
			return t("A social sharing block that protects your privacy");
		}
		
		public function getBlockTypeName() {
			return t("Social Share Privacy");
		}
		
	} 