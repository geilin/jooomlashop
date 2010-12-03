<?php
/**
* @version		1.0
* @package	Component Administrator wNewsletter
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    com wNewsletter.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
require_once( JApplicationHelper::getPath( 'admin_html' ) );
require_once( JPATH_COMPONENT.DS.'admin.wnewsletter.class.php');
require_once( JPATH_COMPONENT.DS.'controller.php' );
JTable::addIncludePath(JPATH_COMPONENT.DS.'tables');

$id 	= JRequest::getVar( 'id', '', 'get', 'int', 0 );
$cid 	= JRequest::getVar( 'cid', '', 'post', 'array', array(0) );

switch ($task) {
	//save status and ordering
	case "confirmed":
		confirmed( $cid, 1, $option );
		break;
	case "unconfirmed":
		confirmed( $cid, 0, $option );
		break;
	case 'send':
		SendMail::send();		
		break;
	// process product by controller
	default:
		$controller = new wNewsLetterController(	array('default_task' => 'showNewsLetter') );
		$controller->execute( JRequest::getVar( 'task' ) );
		$controller->redirect();
}

function confirmed( $cid, $confirmed, $option ) {
	global $mainframe;
	$database =& JFactory::getDBO();
	if (count( $cid ) < 1) {
		$action = $confirmed ? 'confirmed' : 'unconfirmed';
		JError::raiseWarning('ERROR_CODE', JText::_('Select an Item to '.$action));
	}
    $cids = implode( ',', $cid );
	$database->setQuery( "UPDATE #__w_newsletter_subscribers SET confirmed=".$confirmed." WHERE id IN ($cids)");
	if (!$database->query()) {
		JError::raiseWarning('ERROR_CODE', JText::_($database->getErrorMsg()));
	}
 	if (count( $cid ) == 1) {
		$row =& JTable::getInstance('subscriber', 'Table'); 
		$row->checkin( $cid[0] );
	}
	$mainframe->redirect( "index2.php?option=$option&task=subscriber" );
}
?>