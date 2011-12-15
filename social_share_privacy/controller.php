<?php      
defined('C5_EXECUTE') or die(_("Access Denied."));

/** Adds Social Buttons to a page
  * Based on SocialShareProvacy by heise http://www.heise.de/extras/socialshareprivacy/ 
  * @author Patrick Heck <patrick@patrickheck.de>
  * @version 1.1
  */
class SocialSharePrivacyPackage extends Package {

	protected $pkgHandle = 'social_share_privacy';
	protected $appVersionRequired = '5.4.2';
	protected $pkgVersion = '1.1';
	
	private static $_helper = null;
	
	public function getPackageDescription() {
		return t("A social sharing block that protects your privacy");
	}
	
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
		// echo "running on_page_view of controller";
		self::$_helper->on_page_view();
	}
}