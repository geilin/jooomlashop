<?php
/**
* @version		1.0
* @package		Component Newsletter
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    com newsletter.
*/

defined('_JEXEC') or die('Restricted access');
require_once( JPATH_COMPONENT.DS.'controller.php' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_wnewsletter'.DS.'tables');
$document =& JFactory::getDocument();
$document->addStyleSheet( 'components/com_wnewsletter/valid_style.css' );
$controller = new NewsLetterController();
$controller->execute( JRequest::getVar( 'task' ) );
$controller->redirect();

?>