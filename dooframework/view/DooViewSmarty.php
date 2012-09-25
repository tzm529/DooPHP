<?php
/**
 * @author: tzm529
 * email: tzm529@gmail.com
 * smarty template class
**/

Doo::loadCore('smarty/Smarty.class');

class DooViewSmarty extends Smarty
{
	public function __construct()
	{
		parent::__construct();
		$_base = Doo::conf()->SITE_PATH . Doo::conf()->PROTECTED_FOLDER;
		$this->setTemplateDir($_base . '/view/');
		$this->setCompileDir($_base . 'viewc/');
		$this->setCacheDir($_base . '/cache/');
		$this->caching = Doo::conf()->DEBUG_SMARTY;
	}

	public function render($file, $data, $_1 = '', $_2 = '')
	{
		if(is_array($data) && count($data) > 0){
			foreach($data as $k => $v){
				$this->assign($k, $v);
			}
		}
		$this->display($file);
	}

	public function renderc($file, $data, $_1 = '', $_2 = '')
	{
		$this->render($file, $data, $_1, $_2);
	}
}
?>
