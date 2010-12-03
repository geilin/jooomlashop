<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com WUser
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    index.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
require_once( JPATH_COMPONENT.DS.'controller.php' );
JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

$controller = new WUserController( array('default_task' => 'display'));
$controller->execute( JRequest::getVar( 'task' ) );
$controller->redirect();

?>