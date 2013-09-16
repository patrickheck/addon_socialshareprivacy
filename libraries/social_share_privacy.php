<?php
/**
  * This loads the necessary css and js files
  * @author Patrick Heck <patrick@patrickheck.de>
  * @copyright  Copyright (c) 2011-2012 Patrick Heck
  * @license MIT License
  */

defined('C5_EXECUTE') or die("Access Denied.");

class SocialSharePrivacy {

	protected $pkgHandle = 'social_share_privacy';
	
	/**
	  * This add the js and the css to the header items. It is usually called from the SSPHelper.
	  */
	public function on_page_view() {
		$html = Loader::helper("html");
		$v = View::getInstance();
		$v->addHeaderItem($html->css('socialshareprivacy.css',$this->pkgHandle));
		$v->addFooterItem($html->javascript('jquery.socialshareprivacy.min.js',$this->pkgHandle));
	}
}