<?php
/**
* @version		1.0
* @package		Component Newsletter
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    com newsletter.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.controller' );

class NewsLetterController extends JController
{
	function display()
	{
		$document =& JFactory::getDocument();
		$viewName = JRequest::getVar('view', 'newsletter');
		$viewType = $document->getType();
		$view = &$this->getView($viewName, $viewType);

		$view->setLayout('default');
		$view->display();
	}
	
	function subscriber()
	{
		global $option;
		$row =& JTable::getInstance('subscriber', 'Table');
		if (!$row->bind(JRequest::get('post'))) {
			echo $row->getError();
			exit();
		}
		if (!$row->store()) {
			$msg = 'Email của bạn đã đăng ký rồi. Cảm ơn!';
		} else {
			$msg = 'Cảm ơn bạn đã đăng ký Email nhận tin khuyến mãi!';
		}		
		$this->setRedirect('index.php', $msg);
	}
}
?>