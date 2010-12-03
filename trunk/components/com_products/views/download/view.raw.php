<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view tellafriend.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
class ProductViewDownload extends JView
{
	function display($tpl = null)
	{
		$catid = JRequest::getVar('cid', 0);
		// get model
		$model = &$this->getModel();		
		$arr['subCat'] = $model->ajaxSubCategory($catid);
		echo json_encode($arr);
	}
}
?>