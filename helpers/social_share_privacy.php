<?php
/**
 * Adds a Social Sharing block
 * @author Patrick Heck <patrick@patrickheck.de>
 * @copyright  Copyright (c) 2011-2012 Patrick Heck
 * @license MIT License
 */
defined('C5_EXECUTE') or die("Access Denied.");

class SocialSharePrivacyHelper {
	
	private $idPrefix = "social-share-privacy";
	protected $pkgHandle = 'social_share_privacy';
	
	private static $_library = null;
	
	public $default_args;
	
	public function __construct() {
		Loader::library("social_share_privacy", $this->pkgHandle);
		self::$_library = new SocialSharePrivacy;
		
		$pkg = Package::getByHandle($this->pkgHandle);
		
		$this->default_args = array(
			"fbStatus" => $pkg->config('FB_STATUS'),
			"fbAction" => $pkg->config('FB_ACTION'),
			"twStatus" => $pkg->config('TW_STATUS'),
			"gpStatus" => $pkg->config('GP_STATUS'),
			"infoCID"  => $pkg->config('INFO_CID'),
		);
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
	 * @param string $uri Which URI to bookmark
	 * @param bool $showFacebook If true facebook button is displayed
	 * @param bool $showTwitter If true twitter button is displayed
	 * @param bool $showGPlus If true Google+ button is displayed
	 * @param string $fBAction Caption to be displayed on Facebook button. Currently either "like" or "recommend"
	 * @param string $infoURL The URI that is displayed if the "i" button is pressed
	 * @returns bool always returns true
	 */
	public function renderSocialButtons($uri="",$args=NULL,$showTwitter=NULL,$showGPlus=NULL,$fbAction=NULL,$infoURL=NULL) {
		$target_id = $this->idPrefix . "-" . uniqid();
		
		if ( ! is_array($args)) {
			
			// old format was used
			$showFacebook = $args;
			$args = array();
			
			if ($showFacebook != NULL) {
				$args["fbStatus"] = $showFacebook?"on":"off";
			}
			if ($showTwitter != NULL) {
				$args["twStatus"] = $showTwitter?"on":"off";
			}
			if ($showGPlus != NULL) {
				$args["gpStatus"] = $showGPlus?"on":"off";
			}
			if ($fbAction != NULL) {
				$args["fbAction"] = $fbAction;
			}
			if ($infoURL != NULL) {
				$args["infoURL"] = $infoURL;
			}
		}
		$args = array_merge($this->default_args, $args);
		$args["target_id"] = $target_id;
		$args["uri"] = $uri;
		
		if ( ! isset($args["infoURL"])) {
			if ($args["infoCID"] == 0) {
				$args["infoURL"] = "";
			} else {
				$page = Page::getByID($args["infoCID"]);
				$args["infoURL"] = Loader::helper("navigation")->getCollectionURL($page);
			}
		}
		
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