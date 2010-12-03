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
jimport('joomla.application.component.view');
class NewsLetterViewNewsLetter extends JView
{
	function display($tpl = null)
	{
		global $mainframe;
		$pathway	=& $mainframe->getPathway();
		$pathway->addItem('Đăng ký nhận thông tin mới nhất', '' );
		parent::display($tpl);
	}
}
?>