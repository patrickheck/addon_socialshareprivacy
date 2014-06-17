<?php     
/** Adds Social Buttons to a page
  * Based on a fork of SocialSharePrivacy by heise https://github.com/patrickheck/socialshareprivacy 
  * (original code here: http://www.heise.de/extras/socialshareprivacy/ )
  * @author Patrick Heck <patrick@patrickheck.de>
  * @copyright  Copyright (c) 2011-2013 Patrick Heck
  * @license MIT License
  * @version 1.3
  */

defined('C5_EXECUTE') or die(_("Access Denied."));
  
class SocialSharePrivacyPackage extends Package {

	protected $pkgHandle = 'social_share_privacy';
	protected $appVersionRequired = '5.6.1';
	protected $pkgVersion = '1.3.1';
	
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
		
		$pkg->saveConfig('FB_STATUS', 'on');
		$pkg->saveConfig('FB_ACTION', 'like');
		$pkg->saveConfig('TW_STATUS', 'on');
		$pkg->saveConfig('GP_STATUS', 'on');
		$pkg->saveConfig('INFO_CID', '0');
		
		Loader::model('single_page');
		// add page for configuration
		$p = SinglePage::add('dashboard/social_share_privacy', $pkg);
		if (is_object($p)) {
			$p->update(array('cName'=>t("Social Share Privacy"), 'cDescription'=>''));
		}
		
		$p1 = SinglePage::add('dashboard/social_share_privacy/defaults', $pkg);
		if (is_object($p1)) {
			$p1->update(array('cName'=>t('Defaults'), 'cDescription'=>''));
		}
	}

	public function upgrade() {
		$pkg = Package::getByHandle($this->pkgHandle);
		parent::upgrade();
		
		if ($pkg->config('FB_STATUS') == '') {
			$pkg->saveConfig('FB_STATUS', 'on');
		}
		if ($pkg->config('FB_ACTION') == '') {
			$pkg->saveConfig('FB_ACTION', 'like');
		}
		if ($pkg->config('TW_STATUS') == '') {
			$pkg->saveConfig('TW_STATUS', 'on');
		}
		if ($pkg->config('GP_STATUS') == '') {
			$pkg->saveConfig('GP_STATUS', 'on');
		}
		if ($pkg->config('INFO_CID') == '') {
			$pkg->saveConfig('INFO_CID', '0');
		}
		
		Loader::model('single_page');
		// add page for configuration
		$p = SinglePage::add('dashboard/social_share_privacy', $pkg);
		if (is_object($p)) {
			$p->update(array('cName'=>t("Social Share Privacy"), 'cDescription'=>''));
		}
		
		$p1 = SinglePage::add('/dashboard/social_share_privacy/defaults', $pkg);
		if (is_object($p1)) {
			$p1->update(array('cName'=>t('Defaults'), 'cDescription'=>''));
		}
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