<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website      http://wampvn.com
* @description    controller category.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.controller' );
class ProductControllerCategory extends ProductController
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
		$view = &$this->getView('category', 'html', 'productview');
		$model =& $this->getModel( 'category', 'ModelProduct' );
		if (!JError::isError( $model )) {
			$view->setModel( $model, true );
		}
		$view->setLayout('default');
		$view->display();
	}

	function edit()
	{
		$view = &$this->getView('category', 'html', 'productview');
		$model =& $this->getModel( 'category', 'ModelProduct' );
		if (!JError::isError( $model )) {
			$view->setModel( $model, true );
		}
		$view->setLayout('form');
		$view->display();
	}
	
	function save(){
		$model	=& $this->getModel( 'category', 'ModelProduct' );
		$model->save();
		$this->setRedirect('index.php?option=com_products&controller=category', 'Category changes saved');
	}

	function remove(){
		$cid = JRequest::getVar( 'cid', array(), '', 'array');
		$model	=& $this->getModel( 'category', 'ModelProduct' );
		$model->remove($cid);	
		$this->setRedirect('index.php?option=com_products&controller=category', 'Category removed');
	}
	
	function publish()
	{		
		$cid = JRequest::getVar( 'cid', array(), '', 'array' );
		$model	=& $this->getModel( 'category', 'ModelProduct' );	
		if( $this->_task == 'publish')
		{		
			$model->publish($cid, 1);
		}
		else
		{
			$model->publish($cid, 0);
		}	
		$this->setRedirect( 'index.php?option=com_products&controller=category', 'Publish changed' );
	}

	function saveOrder()
	{		
		$model	=& $this->getModel( 'category', 'ModelProduct' );
		$model->saveOrder();
		$this->setRedirect('index.php?option=com_products&controller=category', 'Ordering saved');
	}
	



// end class
}

// end file
?>