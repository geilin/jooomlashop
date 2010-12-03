<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    index.
*/

defined('_JEXEC') or die('Restricted access');

require_once( JPATH_COMPONENT.DS.'shopping_cart.class.php' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_products'.DS.'tables');
$document =& JFactory::getDocument();
$document->addStyleSheet( 'components/com_products/css/valid_style.css' );
$document->addStyleSheet( 'components/com_products/css/cart.css' );

require_once (JPATH_COMPONENT.DS.'controller.php');

// Require specific controller if requested
if(!$controller = JRequest::getVar('controller')) {
	$controller = "product"; //if no controller specified, set to default controller
}
require_once (JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php');
// JRequest::setVar( 'view', $controller );
// Create the controller
$classname	= 'ProductController'.ucfirst($controller);

$controller	= new $classname( );

// Perform the Request task
$controller->execute( JRequest::getVar('task'));
$controller->redirect();

?>