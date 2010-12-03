<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view category.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
class ProductViewCategory extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;
		$task = JRequest::getVar( 'task' );			
		$limit = JRequest::getVar('limit',$mainframe->getCfg('list_limit'));
		$limitstart = JRequest::getVar('limitstart', 0);
		
		if ($task == '' or $task == 'cancel') 
		{
			JToolBarHelper::title( JText::_( 'QUẢN LÝ DANH MỤC' ) );

			JSubMenuHelper::addEntry( JText::_( 'QUẢN LÝ SẢN PHẨM' ), 'index.php?option=com_products');
			JSubMenuHelper::addEntry( JText::_( 'QUẢN LÝ DANH MỤC' ), 'index.php?option=com_products&controller=category',true);
			JSubMenuHelper::addEntry( JText::_( 'QUẢN LÝ NHÀ SẢN XUẤT' ), 'index.php?option=com_products&controller=manufacturer');


                        $model = &$this->getModel();
			$categories = $model->getCategories();
			$total = $model->getTotal();
			$total = $total > 0 ? $total : 0;
			jimport('joomla.html.pagination');
			$pageNav = new JPagination($total, $limitstart, $limit);

			$this->assignRef('categories', $categories);
			$this->assignRef('total', $total);
			$this->assignRef('pageNav', $pageNav);
		} 
		elseif ($task == "edit" or $task == "add")		
		{
			
			if($task == "edit"){
				JToolBarHelper::title( JText::_( 'CHỈNH SỬA DANH MỤC SẢN PHẨM' ) );
			}else{
				JToolBarHelper::title( JText::_( 'THÊM DANH MỤC SẢN PHẨM' ) );
			}
			
			$model = &$this->getModel();
			$category = $model->getCategory();
			$lists = $model->getLists();

			$this->assignRef('category', $category);
			$this->assignRef('lists', $lists);		
		}
		parent::display($tpl);
	}
}
?>