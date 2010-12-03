<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com WUser
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view index.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.filter.filteroutput');
class WUserViewIndex extends JView
{
	function display($tpl = null)
	{
		global $mainframe, $option;
		$pathway	=& $mainframe->getPathway();
		$pathway->addItem('Thông tin tài khoản', '' );
		// get model
		$model = &$this->getModel();
		$userInfo = $model->getUserInfo();
		$user =& JFactory::getUser();
		$userInfo->username = $user->username;
		$userInfo->gid = $user->gid;

		$this->assignRef('userInfo', $userInfo);
		
		// SEO
		$doc =& JFactory::getDocument();
		$doc->setTitle('Các sản phẩm của hàng điện tử');

		parent::display($tpl);
	}
}
?>