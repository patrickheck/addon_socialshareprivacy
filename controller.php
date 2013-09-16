<?php     
/** Adds Social Buttons to a page
  * Based on a fork of SocialSharePrivacy by heise https://github.com/patrickheck/socialshareprivacy 
  * (original code here: http://www.heise.de/extras/socialshareprivacy/ )
  * @author Patrick Heck <patrick@patrickheck.de>
  * @copyright  Copyright (c) 2011-2013 Patrick Heck
  * @license MIT License
  * @version 1.2.4
  */

defined('C5_EXECUTE') or die(_("Access Denied."));
  
class SocialSharePrivacyPackage extends Package {

	protected $pkgHandle = 'social_share_privacy';
	protected $appVersionRequired = '5.4.2';
	protected $pkgVersion = '1.2.4';
	
	private static $_helper = null;
	
	/**
	  * Gets the description of the package
	  * @returns string
	  */
	public function getPackageDescription() {
		return t("A social sharing block that protects your privacy");
	}
	
	/**
	  * Gets the name of the package
	  * @returns string
	  */
	public function getPackageName() {
		return t("Social Share Privacy");
	}
	
	public function install() {
		$pkg = parent::install();
		// install block		
		BlockType::installBlockTypeFromPackage('social_share_privacy', $pkg);
	}
	
	public function on_start() {
		$req = Request::get();
		$p = $req->getRequestedPage();
		if (!$p->isAdminArea()) {
			self::$_helper = Loader::helper("social_share_privacy", $this->pkgHandle);
			
			// Noticed strange behavior with on_page_output event in some cases
			// This does not work 100% of the cases with that event
			$file = DIR_PACKAGES . '/' . $this->pkgHandle . '/controller.php';
			Events::extend('on_page_view', 'SocialSharePrivacyPackage', 'on_page_view', $file);
		}
	}
	
	public function on_page_view() {
		self::$_helper->on_page_view();
	}
}