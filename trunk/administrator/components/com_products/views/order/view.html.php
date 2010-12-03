<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view order.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
class ProductViewOrder extends JView
{
	function display($tpl = null)
	{
		
		global $option, $mainframe;
		$lists = array();
		$task = JRequest::getVar( 'task' );			
		$limit = JRequest::getVar('limit', 10);
		$limitstart = JRequest::getVar('limitstart', 0);
		
		$context			= 'com_product.orders';
		$filter_order		= $mainframe->getUserStateFromRequest( $context.'filter_order',		'filter_order',		'date',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $context.'filter_order_Dir',	'filter_order_Dir',	'',	'word' );
		
		// table ordering
		$lists['order_Dir']	= $filter_order_Dir;
		$lists['order']		= $filter_order;

		$arr_status = array();
		
		$model = &$this->getModel();
		$search				= JRequest::getVar( 'search', '');
		$orders = $model->getOrders($limitstart, $limit, $search);			
		$order = $model->getOrder();
		
		$arr_status[] = JHTML::_('select.option', '0','Chưa xử lý', 'id', 'title' );
		$arr_status[] = JHTML::_('select.option', '1','Chưa thanh toán', 'id', 'title' );
		$arr_status[] = JHTML::_('select.option', '2','đã thanh toán', 'id', 'title' );
		$lists['status'] = JHTML::_('select.radiolist',   $arr_status, 'status', 'class="inputbox"','id', 'title',$order->status );

		$total = $model->getTotal( $search);
		$total = $total > 0 ? $total : 0;
		jimport('joomla.html.pagination');
		$pageNav = new JPagination($total, $limitstart, $limit);

		$this->assignRef('orders', $orders);
		$this->assignRef('order', $order);
		$this->assignRef('lists', $lists);
		$this->assignRef('total', $total);
		$this->assignRef('search', $search);
		$this->assignRef('pageNav', $pageNav);

		parent::display($tpl);
	}
}
?>