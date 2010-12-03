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
class ProductControllerManufacturer extends ProductController
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
		$view = &$this->getView('manufacturer', 'html', 'productview');
		$model =& $this->getModel( 'manufacturer', 'ModelProduct' );
		if (!JError::isError( $model )) {
			$view->setModel( $model, true );
		}
		$view->setLayout('default');
		$view->display();
	}

	function edit()
	{
		$view = &$this->getView('manufacturer', 'html', 'productview');
		$model =& $this->getModel( 'manufacturer', 'ModelProduct' );
		if (!JError::isError( $model )) {
			$view->setModel( $model, true );
		}
		$view->setLayout('form');
		$view->display();
	}
	
	function save(){
		$model	=& $this->getModel( 'manufacturer', 'ModelProduct' );
		$model->save();
		$this->setRedirect('index.php?option=com_products&controller=manufacturer', 'Manufacturer changes saved');
	}

	function remove(){
		$cid = JRequest::getVar( 'cid', array(), '', 'array');
		$model	=& $this->getModel( 'manufacturer', 'ModelProduct' );
		$model->remove($cid);	
		$this->setRedirect('index.php?option=com_products&controller=manufacturer', 'Manufacturer removed');
	}
	
	function removeManufacturerImage(){
		$cids = JRequest::getVar( 'cid', array(), '', 'array');
		$model	=& $this->getModel( 'manufacturer', 'ModelProduct' );
		$model->removeManufacturerImage($cids[0]);	
		$this->setRedirect('index.php?option=com_products&controller=manufacturer&task=edit&cid[]='. $cids[0], 'Image removed');
	}
	
	function publish()
	{		
		$cid = JRequest::getVar( 'cid', array(), '', 'array' );
		$model	=& $this->getModel( 'manufacturer', 'ModelProduct' );	
		if( $this->_task == 'publish')
		{		
			$model->publish($cid, 1);
		}
		else
		{
			$model->publish($cid, 0);
		}	
		$this->setRedirect( 'index.php?option=com_products&controller=manufacturer', 'Publish changed' );
	}

	function saveOrder()
	{
		$model	=& $this->getModel( 'manufacturer', 'ModelProduct' );
		$model->saveOrder();
		$this->setRedirect('index.php?option=com_products&controller=manufacturer', 'Ordering saved');
	}
	



// end class
}

// end file
?>