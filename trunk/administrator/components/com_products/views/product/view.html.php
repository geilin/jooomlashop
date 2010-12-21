<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view product.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
class ProductViewProduct extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;
		$task = JRequest::getVar( 'task' );		
		$db = & JFactory::getDBO();
		// Initialize variables
		$context			= 'com_products.products';
		$filter_order		= $mainframe->getUserStateFromRequest( $context.'filter_order',		'filter_order',		'',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $context.'filter_order_Dir',	'filter_order_Dir',	'',	'word' );		
		
		$limit		= $mainframe->getUserStateFromRequest('global.list.limit', 'limit', $mainframe->getCfg('list_limit'), 'int');
		$limitstart	= $mainframe->getUserStateFromRequest($context.'limitstart', 'limitstart', 0, 'int');
		$frontpage	= $mainframe->getUserStateFromRequest( $context.'frontpage','frontpage', 0,	'int' );
		$catid		= $mainframe->getUserStateFromRequest( $context.'catid', 'catid', 0, 'int' );
		$manufacturerid	= $mainframe->getUserStateFromRequest( $context.'mid', 'mid', 0, 'int' );
		$search			= $mainframe->getUserStateFromRequest( $context.'search', 'search', '', 'string' );

		if ($task == '' or $task == 'product') 
		{			
			JToolBarHelper::title( JText::_( 'QUẢN LÝ SẢN PHẨM' ) );

			JSubMenuHelper::addEntry( JText::_( 'QUẢN LÝ SẢN PHẨM' ), 'index.php?option=com_products',true);
			JSubMenuHelper::addEntry( JText::_( 'QUẢN LÝ DANH MỤC' ), 'index.php?option=com_products&controller=category');
			JSubMenuHelper::addEntry( JText::_( 'QUẢN LÝ NHÀ SẢN XUẤT' ), 'index.php?option=com_products&controller=manufacturer');
			
			$model 		= &$this->getModel();
            
			$products 	= $model->getProducts($catid, $manufacturerid, $frontpage, $search);
			
			$total 		= $model->getTotal($catid, $manufacturerid, $frontpage, $search);
			
			$lists 		= $model->getListDefault($catid, $manufacturerid, $frontpage);               
            
			// table ordering
			$lists['order_Dir']	= $filter_order_Dir;
			$lists['order']		= $filter_order;
			
			jimport('joomla.html.pagination');
			$pageNav = new JPagination($total, $limitstart, $limit);
			
			$this->assignRef('lists', $lists);
			$this->assignRef('products', $products);
			$this->assignRef('total', $total);
			$this->assignRef('search', $search);
			$this->assignRef('pageNav', $pageNav);
		} 
		elseif ($task == "edit" or $task == "add")		
		{
			
			if($task == "edit"){
				JToolBarHelper::title( JText::_( 'CHỈNH SỬA SẢN PHẨM' ) );
			}else{
				JToolBarHelper::title( JText::_( 'THÊM DANH SẢN PHẨM' ) );
			}
			
			$model = &$this->getModel();
			$product = $model->getProduct();
			$lists = $model->getLists();
			$cid[0] = $product->id; 
			// build the others property
			$query = 'SELECT * FROM #__w_property ORDER BY ordering'
			;
			$db->setQuery( $query );
			$rowsProperty = $db->loadObjectList();
			if ($db->getErrorNum()) {
				echo $db->stderr();
				return false;
			}else{
			  // set value to others property
			  if(intval($cid[0])>0){
		      $intProperty 		=& JTable::getInstance( 'property', 'Table' );
		      $arrprop = $intProperty->int_property();
		      $arr_field_name = array();
		      foreach($rowsProperty as $rowprp) $arr_field_name[] = $arrprop["field_name"].$rowprp->id;
		      
		      if(count($arr_field_name)>0){
		        $sql_field_prop = 'SELECT '.implode(",", $arr_field_name).' FROM #__w_products WHERE id='.$cid[0];
		        
		      	$db->setQuery( $sql_field_prop );
		      	$rowsBizProperty = $db->loadObjectList();
		      	$lists['bizproperties'] = $rowsBizProperty[0];
		      }
		    } else{
		    	$lists['bizproperties']="";
		    }
		  }
			$lists['properties'] = $rowsProperty;
		//	var_dump($lists['properties'],$product);
			$this->assignRef('product', $product);
			$this->assignRef('lists', $lists);		
//			var_dump($this->lists);exit;
		}
		elseif ($task == "copy")		
		{
			$model = &$this->getModel();
			$product = $model->getProduct();
			$lists = $model->getLists();
			$product->id = null;
			$product->date = null;
			$product->productid = null;
			$product->thumbnail = null;
			$cid[0] = $product->id; 
			// build the others property
			$query = 'SELECT * FROM #__w_property ORDER BY ordering'
			;
			$db->setQuery( $query );
			$rowsProperty = $db->loadObjectList();
			if ($db->getErrorNum()) {
				echo $db->stderr();
				return false;
			}else{
			  // set value to others property
			  if(intval($cid[0])>0){
		      $intProperty 		=& JTable::getInstance( 'property', 'Table' );
		      $arrprop = $intProperty->int_property();
		      $arr_field_name = array();
		      foreach($rowsProperty as $rowprp) $arr_field_name[] = $arrprop["field_name"].$rowprp->id;
		      
		      if(count($arr_field_name)>0){
		        $sql_field_prop = 'SELECT '.implode(",", $arr_field_name).' FROM #__w_products WHERE id='.$cid[0];
		        
		      	$db->setQuery( $sql_field_prop );
		      	$rowsBizProperty = $db->loadObjectList();
		      	$lists['bizproperties'] = $rowsBizProperty[0];
		      }
		    } else{
		    	$lists['bizproperties']="";
		    }
		  }	
			$lists['properties'] = $rowsProperty;		  			
			$this->assignRef('product', $product);
			$this->assignRef('lists', $lists);		
		}
		parent::display($tpl);
	}
}
?>