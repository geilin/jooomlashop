<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website      http://wampvn.com
* @description    controller product.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.controller' );
class ProductControllerProduct extends ProductController
{

	function __construct($config = array())
	{
		parent::__construct($config);

		//product
		$this->registerTask( 'apply', 	'save'  );
		$this->registerTask( 'add', 	'edit'  );
		$this->registerTask( 'unpublish'  , 	'publish'  );
		$this->registerTask( 'nofrontpage'  , 	'frontpage'  );
		$this->registerTask( 'nolowprice'  , 	'lowprice'  );
		$this->registerTask( 'noproducts'  , 	'hasproducts'  );
	}
	
	function display()
	{	
		$view = &$this->getView('product', 'html', 'productview');
		$model =& $this->getModel( 'product', 'ModelProduct' );
		if (!JError::isError( $model )) {
			$view->setModel( $model, true );
		}
				//table ordering
		
		$view->setLayout('default');
		$view->display();
	}
	
	function edit()
	{
		$view = &$this->getView('product', 'html', 'productview');
		$model =& $this->getModel( 'product', 'ModelProduct' );
		if (!JError::isError( $model )) {
			$view->setModel( $model, true );
		}
		$view->setLayout('form');
		$view->display();
	}
	
	
	function copy()
	{
		$view = &$this->getView('product', 'html', 'productview');
		$model =& $this->getModel( 'product', 'ModelProduct' );
		if (!JError::isError( $model )) {
			$view->setModel( $model, true );
		}
		$view->setLayout('form');
		$view->display();
	}
	
	function save(){

		$model	=& $this->getModel( 'product', 'ModelProduct' );
		$id = $model->save();		
		switch ($this->_task)
		{
			case 'apply':			
				$this->setRedirect('index.php?option=com_products&task=edit&cid[]='. $id, 'Product changes saved');
				break;
			case 'save':
			default:
				$this->setRedirect('index.php?option=com_products', 'Product changes saved');
				break;
		}
	}

	function remove(){
		$cid = JRequest::getVar( 'cid', array(), '', 'array');
		$model	=& $this->getModel( 'product', 'ModelProduct' );
		$model->remove($cid);	
		$this->setRedirect('index.php?option=com_products', 'Product removed');
	}
	function delImg(){
		$cid = JRequest::getVar( 'cid', array(), '', 'array');
		$post = JRequest::get('post');
		$imgId = JRequest::getint('imgId');
		$imgName = JRequest::getVar('imgName');
		$db =& JFactory::getDBO();			
		if (!empty($imgId)){
			$query = 'DELETE FROM #__w_images WHERE  id='.$imgId;
			$db->setQuery($query);
			if (!$db->query()){
				echo $db->getErrorMsg();
				exit();			
			}else{
				unlink(JPATH_SITE.DS.'images'.DS.'products'.DS.$imgName);
				unlink(JPATH_SITE.DS.'images'.DS.'products'.DS.'thumbs'.DS.$imgName);
			}
		}
		exit;
		//$this->setRedirect('index.php?option=com_products&task=edit&cid[]='.$post['id'], 'Image removed');
	}
	function removeProductImage(){
		$cid = JRequest::getVar( 'cid', array(), '', 'array');
		$type = JRequest::getVar( 'type');
		$model	=& $this->getModel( 'product', 'ModelProduct' );
		$model->removeProductImage($cid[0], $type);	
		$this->setRedirect('index.php?option=com_products&task=edit&cid[]='. $cid[0]);
	}
	
	function publish()
	{
		$cid = JRequest::getVar( 'cid', array(), '', 'array' );
		$model	=& $this->getModel( 'product', 'ModelProduct' );	
		if( $this->_task == 'publish')
		{		
			$model->publish($cid, 1);
		}
		else
		{
			$model->publish($cid, 0);
		}	
		$this->setRedirect( 'index.php?option=com_products');
	}
	
	
	
	function lowprice()
	{
		$cid = JRequest::getVar( 'cid', array(), '', 'array' );
		$model	=& $this->getModel( 'product', 'ModelProduct' );	
		
		if( $this->_task == 'lowprice')
		{		
			$msg = $model->lowprice($cid, 1);
		}
		else
		{
			$msg = $model->lowprice($cid, 0);
		}	
		$this->setRedirect( 'index.php?option=com_products', $msg);
	}
	
	function hasproducts()
	{
		$cid = JRequest::getVar( 'cid', array(), '', 'array' );
		$model	=& $this->getModel( 'product', 'ModelProduct' );	
		if( $this->_task == 'hasproducts')
		{		
			$msg = $model->hasproducts($cid, 1);
		}
		else
		{
			$msg = $model->hasproducts($cid, 0);
		}	
		$this->setRedirect( 'index.php?option=com_products', $msg);
	}
	
	
	
	function frontpage()
	{
		$cid = JRequest::getVar( 'cid', array(), '', 'array' );
		$model	=& $this->getModel( 'product', 'ModelProduct' );	
		if( $this->_task == 'frontpage')
		{		
			$msg = $model->frontpage($cid, 1);
		}
		else
		{
			$msg = $model->frontpage($cid, 0);
		}	
		$this->setRedirect( 'index.php?option=com_products', $msg);
	}

	function saveOrder()
	{
		$model	=& $this->getModel( 'product', 'ModelProduct' );
		$model->saveOrder();
		$this->setRedirect('index.php?option=com_products', 'Ordering saved');
	}
	



// end class
}

// end file
?>