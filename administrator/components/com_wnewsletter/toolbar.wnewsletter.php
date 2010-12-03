<?php
/**
* @version		1.0
* @package	Component Administrator wNewsLetter
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    ToolBar wNewsletter
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
require_once( JApplicationHelper::getPath('toolbar_html'));

switch($task){
	case 'edit':
	case 'add':
		TOOLBAR_newsletter::_NEW();
		break;
	case 'sendMail':
		TOOLBAR_newsletter::_SEND();
		break;
	case 'subscriber':
	case 'removeSubscriber':
	case 'saveSubscriber':
		TOOLBAR_subscriber::_DEFAULT();
		break;
	case 'addSubscriber':
	case 'editSubscriber':
		TOOLBAR_subscriber::_NEW();
		break;
	case 'contact':
		TOOLBAR_contact::_DEFAULT();
		break;
	case 'editContact':
		TOOLBAR_contact::_NEW();
		break;
	case 'category':
	case 'removeCategory':
	case 'saveCategory':
		TOOLBAR_category::_DEFAULT();
		break;
	case 'addCategory':
	case 'editCategory':
		TOOLBAR_category::_NEW();
		break;
	default:
		TOOLBAR_newsletter::_DEFAULT();
}


?>