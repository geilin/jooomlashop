<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com WUser
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    controller.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.controller' );
class WUserController extends JController
{

	function __construct($config = array())
	{
		parent::__construct($config);

		//user
		$this->registerTask( 'edit'  , 	'display'  );		
		$this->registerTask( 'add'  , 	'display'  );
		$this->registerTask( 'user'  , 	'display'  );
		$this->registerTask( 'apply', 	'save'  );
		$this->registerTask( 'unpublish'  , 	'publish'  );

	}
	
	function display()
	{

		switch($this->getTask())
		{
			case 'edit'    :
			case 'add':
				JRequest::setVar( 'layout', 'form'  );
				JRequest::setVar( 'view', 'user' );				
			break;		
		}
		$document =& JFactory::getDocument();
		$viewName = JRequest::getVar('view', 'user');
		$layout = JRequest::getVar('layout', 'default');
		$viewType = $document->getType();
		$view = &$this->getView($viewName, $viewType);
		$model =& $this->getModel( $viewName, 'ModelWUser' );
		if (!JError::isError( $model )) {
			$view->setModel( $model, true );
		}
		$view->setLayout($layout);
		$view->display();
	}

/************************************************************/
/*                          Khu vuc user	                                                  	 */
/************************************************************/

	function save(){
		global $option;
		$model	=& $this->getModel( 'user', 'ModelWUser' );
		$model->saveUser();
		$cid = JRequest::getVar( 'id' );
		switch ($this->_task)
		{
			case 'apply':			
			$this->setRedirect('index.php?option=' . $option. '&task=edit&cid[]='. $cid, 'User changes saved');
			break;
			case 'save':
			default:
			$this->setRedirect('index.php?option=' . $option, 'User changes saved');
			break;
		}
	}

	function remove(){
		global $option;
		$cid = JRequest::getVar( 'cid', array(), '', 'array');
		$model	=& $this->getModel( 'user', 'ModelWUser' );
		$model->removeUser($cid);	
		$this->setRedirect('index.php?option='. $option, 'User removed');
	}

// end
}
?>