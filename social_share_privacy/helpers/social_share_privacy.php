<?php  defined('C5_EXECUTE') or die("Access Denied.");

/**
 * Adds a Social Sharing block
 * @author Patrick Heck <patrick@patrickheck.de>
 */
class SocialSharePrivacyHelper {
	
	private $idPrefix = "social-share-privacy";
	protected $pkgHandle = 'social_share_privacy';
	
	private static $_library = null;
	
	public function __construct() {
		Loader::library("social_share_privacy", $this->pkgHandle);
		self::$_library = new SocialSharePrivacy;
	}
	
	/**
	  * This calls the library function that loads the needed css and js files
	  */
	public function on_page_view() {
		if (method_exists(self::$_library, "on_page_view")) {
			self::$_library->on_page_view();
		}
	}
	
	/**
	 * Renders the Social Buttons
	 * 
	 * @param string uri which URI to bookmark
	 * @param bool $showFacebook 
	 * @param bool $showTwitter
	 * @param bool $showGPlus
	 * @param string $fBAction Caption to be displayed on Facebook button. Currently either "like" or "recommend"
	 * @returns bool always returns true
	 */
	public function renderSocialButtons($uri="",$showFacebook=true,$showTwitter=true,$showGPlus=true,$fbAction="like",$infoURL="") {
		$target_id = $this->idPrefix . "-" . uniqid();
		$args["target_id"] = $target_id;
		$args["fbStatus"] = $showFacebook?"on":"off";
		$args["twStatus"] = $showTwitter?"on":"off";
		$args["gpStatus"] = $showGPlus?"on":"off";
		$args["fbAction"] = $fbAction;
		$args["uri"] = $uri;
		if ($infoURL == "") {
			$infoURL = t("http://www.heise.de/ct/artikel/2-Klicks-fuer-mehr-Datenschutz-1333879.html");
		}
		$args["infoURL"] = $infoURL;
		
		Loader::packageElement('social_buttons', $this->pkgHandle, $args);
		return true;
	}
	
	/**
	 * Find the image path for a service placeholder-icon
	 * This is only actively used in scrapbook code and might be removed from future versions
	 * 
	 * @param string $service name of the service to find a button for
	 * @returns string path to image file
	 */
	public function getServiceImage($service) {
		$img_loc_name = "dummy_" .$service. "_" . LANGUAGE . ".png";
		$img_def_name = "dummy_" .$service. ".png";
		// Check if a localized image exists otherwise fall back to default
		if ( file_exists( DIR_BASE . '/' . DIRNAME_PACKAGES . '/' . $this->pkgHandle . '/' . DIRNAME_CSS . '/images/' . $img_loc_name ) ) {
			$dummyImg = DIR_REL . '/' . DIRNAME_PACKAGES . '/' . $this->pkgHandle . '/' . DIRNAME_CSS . '/images/' . $img_loc_name;
		} elseif ( file_exists( DIR_BASE . '/' . DIRNAME_PACKAGES . '/' . $this->pkgHandle . '/' . DIRNAME_CSS . '/images/' . $img_def_name ) ) {
			$dummyImg = DIR_REL . '/' . DIRNAME_PACKAGES . '/' . $this->pkgHandle . '/' . DIRNAME_CSS . '/images/' . $img_def_name;
		} else {
			$dummyImg = "";
		}
		return $dummyImg;
	}
}