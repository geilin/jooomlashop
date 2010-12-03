<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com WUser
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    index.
*/

defined('_JEXEC') or die('Restricted access');
require_once( JPATH_COMPONENT.DS.'controller.php' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_wuser'.DS.'tables');
$controller = new WUserController();
$controller->execute( JRequest::getVar( 'task' ) );
$controller->redirect();

?>