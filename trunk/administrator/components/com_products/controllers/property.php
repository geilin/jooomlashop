<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website      http://wampvn.com
* @description    controller manufacturer.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.controller' );
class ProductControllerProperty extends ProductController
{

	function __construct($config = array())
	{
		parent::__construct($config);

		//product
		$this->registerTask( 'apply', 	'save'  );
		$this->registerTask( 'add', 	'edit'  );
		$this->registerTask( 'unpublish'  , 	'publish'  );
	}
	
	function display()
	{
		$view = &$this->getView('property', 'html', 'productview');
		$model =& $this->getModel( 'property', 'ModelProduct' );
		if (!JError::isError( $model )) {
			$view->setModel( $model, true );
		}
		$view->setLayout('default');
		$view->display();
	}

	function edit()
	{
		$view = &$this->getView('property', 'html', 'productview');
		$model =& $this->getModel( 'property', 'ModelProduct' );
		if (!JError::isError( $model )) {
			$view->setModel( $model, true );
		}
		$view->setLayout('form');
		$view->display();
	}
	
	function save(){
		$model	=& $this->getModel( 'property', 'ModelProduct' );
		$model->save();
		$this->setRedirect('index.php?option=com_products&controller=property', 'Property changes saved');
	}

	function remove(){
		$cid = JRequest::getVar( 'cid', array(), '', 'array');
		$model	=& $this->getModel( 'property', 'ModelProduct' );
		$model->remove($cid);	
		$this->setRedirect('index.php?option=com_products&controller=property', 'Property removed');
	}
	
	function publish()
	{		
		$cid = JRequest::getVar( 'cid', array(), '', 'array' );
		$model	=& $this->getModel( 'property', 'ModelProduct' );	
		if( $this->_task == 'publish')
		{		
			$model->publish($cid, 1);
		}
		else
		{
			$model->publish($cid, 0);
		}	
		$this->setRedirect( 'index.php?option=com_products&controller=property', 'Publish changed' );
	}

	function saveOrder()
	{
		$model	=& $this->getModel( 'property', 'ModelProduct' );
		$model->saveOrder();
		$this->setRedirect('index.php?option=com_products&controller=property', 'Ordering saved');
	}
	



// end class
}

// end file
?>