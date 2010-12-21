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
		$this->registerTask( 'undiscount'  , 	'discount'  );
		$this->registerTask( 'noproducts'  , 	'hasproducts'  );
	}
	
	function display()
	{	
		$view = &$this->getView('product', 'html', 'productview');
		$model =& $this->getModel( 'product', 'ModelProduct' );
		if (!JError::isError( $model )) {
			$view->setModel( $model, true );
		}
		
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
    
    function upload() {
         //http://docs.joomla.org/How_to_use_the_filesystem_package
		jimport('joomla.filesystem.file');
        $params = &JComponentHelper::getParams( 'com_products' );
        require_once JPATH_COMPONENT . DS .'helpers' . DS .'image_lib.php';      
        require_once JPATH_COMPONENT . DS .'helpers' . DS .'functions.php';
        
		$file 		= JRequest::getVar( 'uploadfile', '', 'files', 'array' );        
        $upload_dir = JPATH_ROOT . DS .'images'.DS .'products'; 
        $thumb_dir  = $upload_dir .DS .'thumbs';        
        
        $upload_dest = $upload_dir . DS . $file['name'];
        //file exists rename
        if (JFile::exists($upload_dest)) {            
           $upload_dest = $upload_dir . DS . time() . '_' . $file['name'];
        }
        //now move uploaded file to new location
        if (!JFile::upload($file['tmp_name'],  $upload_dest)) {            
            echo json_encode(array('error' => true, 'message' => JText::_('Upload file failed')));
            exit;
        }
        
        $thumb_width = $params->get('thump_width', 90);
        $thumb_height = $params->get('thump_height', 90);
        
        $thumb_width = ($thumb_width>0) ? $thumb_width : 90;
        $thumb_height = ($thumb_height>0) ? $thumb_height : 90;
        
        $configs = array(
            'width' => $thumb_width,
            'height' => $thumb_height,
            'file_to_resize' => $upload_dest,
            'thumb_dir' =>  $thumb_dir
		);        
        
     
        $image_thumb 	= generate_thumb($configs);		
				
					
        if ($image_thumb) {
			$pid 		= JRequest::getVar('pid', 0, 'post', 'int');
			$row_img 	= JTable::getInstance('images', 'Table');
			$row_img->filename = $image_thumb;
			$row_img->proid = $pid;
			
			if (!$row_img->store()){				
				echo json_encode(array('error' => false, 'message' => $row->getError()));
			}		
            echo json_encode(array('error' => false, 'file' => $image_thumb,
				'fid' => $row_img->id,
				'pid' => $pid,
			'message' => 'upload and resize image successfully')
			);
        }
        else 
        {
             echo json_encode(array('error' => true, 'message' => 'error when try to resize image'));
        }        
    }
    
    /**
     * remove image
     */
	function delImg(){
		jimport('joomla.filesystem.file');
		$cid = JRequest::getVar( 'cid', array(), '', 'array');
		$post = JRequest::get('post');
		$imgId = JRequest::getint('imgId');
		$imgName = JRequest::getVar('imgName');
		//$proid = JRequest::getint('proid');
		$db =& JFactory::getDBO();			
		if (!empty($imgId)){
			$query = 'DELETE FROM #__w_images WHERE  id='.$imgId . ' LIMIT 1';
			$db->setQuery($query);
			if (!$db->query()){
				JFile::delete(JPATH_SITE.DS.'images'.DS.'products'.DS.$imgName);
				JFile::delete(JPATH_SITE.DS.'images'.DS.'products'.DS. 'thumbs' .DS.$imgName);			
					
			}
			else
			{				
				echo $db->getErrorMsg();
				exit();				
			}
		}
		exit;
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
	
	
	
	function discount()
	{
		$cid = JRequest::getVar( 'cid', array(), '', 'array' );
		$model	=& $this->getModel( 'product', 'ModelProduct' );	
		
		if( $this->_task == 'discount')
		{		
			$msg = $model->discount($cid, 1);
		}
		else
		{
			$msg = $model->discount($cid, 0);
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