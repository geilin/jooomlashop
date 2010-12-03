<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view manufacturer.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
class ProductViewProperty extends JView
{
	function display($tpl = null)
	{
		global $mainframe;
		$task = JRequest::getVar( 'task' );					
		$limit = JRequest::getVar('limit',$mainframe->getCfg('list_limit'));
		$limitstart = JRequest::getVar('limitstart', 0);
		
		if ($task == '' or $task == 'cancel') 
		{
			$model = &$this->getModel();
			$properties = $model->getProperties();
			$total = $model->getTotal();
			jimport('joomla.html.pagination');
			$total = $total > 0 ? $total : 0;
			$pageNav = new JPagination($total, $limitstart, $limit);

			$this->assignRef('properties', $properties);
			$this->assignRef('total', $total);
			$this->assignRef('pageNav', $pageNav);
		} 
		elseif ($task == "edit" or $task == "add")		
		{
			$model = &$this->getModel();
			$property = $model->getProperty();
			$lists = $model->getLists();
			
			$opt_type[] = JHTML::_('select.option', 'Plan Text', 'Plan Text');
			$opt_type[] = JHTML::_('select.option', 'HTML', 'HTML');
			$lists['datatype'] = JHTML::_('select.genericlist', $opt_type, 'datatype', 'class="inputbox"', 'value', 'text', $property->datatype);

			$this->assignRef('property', $property);			
			$this->assignRef('lists', $lists);		
		}
		parent::display($tpl);
	}
}
?>