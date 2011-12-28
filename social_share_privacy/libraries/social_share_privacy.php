<?php
/**
  * This loads the necessary css and js files
  */
class SocialSharePrivacy {

	protected $pkgHandle = 'social_share_privacy';
	
	public function on_page_view() {
		$html = Loader::helper("html");
		$v = View::getInstance();
		$v->addHeaderItem($html->css('socialshareprivacy.css',$this->pkgHandle));
		$v->addHeaderItem($html->css('social_buttons.css',$this->pkgHandle));
		$v->addFooterItem($html->javascript('jquery.socialshareprivacy.min.js',$this->pkgHandle));
	}
}