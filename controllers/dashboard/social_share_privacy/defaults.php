<?php  defined('C5_EXECUTE') or die("Access Denied.");
Loader::controller('/dashboard/base');

class DashboardSocialSharePrivacyDefaultsController extends DashboardBaseController {

	public $helpers = array('form');
	
	public function view() {
		$pkg = Package::getByHandle('social_share_privacy');
		$this->set('fbStatus', $pkg->config('FB_STATUS'));
		$this->set('fbAction', $pkg->config('FB_ACTION'));
		$this->set('twStatus', $pkg->config('TW_STATUS'));
		$this->set('gpStatus', $pkg->config('GP_STATUS'));
		$this->set('infoCID', $pkg->config('INFO_CID'));
	}

	public function defaults_updated() {
		$this->set('message', t('Defaults Updated.'));
		$this->view();
	}

	public function set_defaults() {
		if (Loader::helper('validation/token')->validate('set_defaults')) {
				$pkg = Package::getByHandle('social_share_privacy');
				$pkg->saveConfig('FB_STATUS', $this->post('fbStatus'));
				$pkg->saveConfig('FB_ACTION', $this->post('fbAction'));
				$pkg->saveConfig('TW_STATUS', $this->post('twStatus'));
				$pkg->saveConfig('GP_STATUS', $this->post('gpStatus'));
				$pkg->saveConfig('INFO_CID', $this->post('infoCID'));
				$this->redirect('/dashboard/social_share_privacy/defaults', 'defaults_updated');
		} else {
			$this->error->add(Loader::helper('validation/token')->getErrorMessage());
		}
		$this->view();
	}
}
