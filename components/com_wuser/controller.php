<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com WUser
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    controller.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.controller' );

class WUserController extends JController
{
	function display()
	{
		$user =& JFactory::getUser();		
		if (!$user->guest) {
			$document =& JFactory::getDocument();
			$viewName = JRequest::getVar('view', 'index');
			$viewType = $document->getType();
			$layout = JRequest::getVar('layout', 'default');
			$view = &$this->getView($viewName, $viewType);
			$model =& $this->getModel( $viewName, 'ModelWUser' );
			if (!JError::isError( $model )) {
				$view->setModel( $model, true );
			}		
			$view->setLayout($layout);
			$view->display();
		} else {
			$this->setRedirect(JRoute::_('index.php?option=com_user&view=login' ,''));
		}
	}

	function update()
	{
		global $option;
		$model =& $this->getModel( 'index', 'ModelWUser' );
		$model->update();		
		$this->setRedirect('index.php?option=' . $option , 'Thông tin của bạn đã cập nhật');
	}
	
	function changePass()
	{
		global $option;
		$user	 =& JFactory::getUser();
		$userid = JRequest::getVar( 'id', 0, 'post', 'int' );

		// preform security checks
		if ($user->get('id') == 0 || $userid == 0 || $userid <> $user->get('id')) {
			JError::raiseError( 403, JText::_('Access Forbidden') );
			return;
		}

		//clean request
		$post = JRequest::get( 'post' );
		$post['username']	= JRequest::getVar('username', '', 'post', 'username');
		$post['password']	= JRequest::getVar('password', '', 'post', 'string', JREQUEST_ALLOWRAW);
		$post['password2']	= JRequest::getVar('password2', '', 'post', 'string', JREQUEST_ALLOWRAW);
	
		// get the redirect
		$return = JURI::base();
		
		// do a password safety check
		if(strlen($post['password']) || strlen($post['password2'])) { // so that "0" can be used as password e.g.
			if($post['password'] != $post['password2']) {
				$msg	= JText::_('PASSWORDS_DO_NOT_MATCH');
				// something is wrong. we are redirecting back to edit form.
				// TODO: HTTP_REFERER should be replaced with a base64 encoded form field in a later release
				$return = str_replace(array('"', '<', '>', "'"), '', @$_SERVER['HTTP_REFERER']);
				if (empty($return) || !JURI::isInternal($return)) {
					$return = JURI::base();
				}
				$this->setRedirect('index.php?option=' . $option , $msg ,'error');
				return false;
			}
		}


		// store data
		$model =& $this->getModel( 'index', 'ModelWUser' );

		if ($model->store($post)) {
			$msg	= JText::_( 'Your settings have been saved.' );
		} else {
			//$msg	= JText::_( 'Error saving your settings.' );
			$msg	= $model->getError();
		}

		
		$this->setRedirect('index.php?option=' . $option , $msg);
	}	
}
?>