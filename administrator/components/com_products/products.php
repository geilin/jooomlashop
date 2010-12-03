<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    index.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
include( JPATH_COMPONENT.DS.'helpers/easyphpthumbnail.class.php' );
include( JPATH_COMPONENT.DS.'helpers/functions.php' );
JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

require_once (JPATH_COMPONENT.DS.'controller.php');

// Require specific controller if requested
if(!$controller = JRequest::getVar('controller')) {
	$controller = "product"; //if no controller specified, set to default controller
}
require_once (JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php');
$classname	= 'ProductController'.ucfirst($controller);

$controller	= new $classname( );

$controller->execute( JRequest::getVar( 'task' ) );
$controller->redirect();

?>