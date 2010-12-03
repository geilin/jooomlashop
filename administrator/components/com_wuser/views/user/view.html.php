<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com WUser
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view user.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
class WUserViewUser extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;
		$task = JRequest::getVar( 'task' );			
		$limit = JRequest::getVar('limit', 10);
		$limitstart = JRequest::getVar('limitstart', 0);
		
		if ($task == '' or $task == 'user') 
		{			
			$search				= JRequest::getVar( 'search', '');
			$model = &$this->getModel();
			$users = $model->getUsers($search);
			$total = $model->getTotal($search);			
			jimport('joomla.html.pagination');
			$pageNav = new JPagination($total, $limitstart, $limit);
			
			$this->assignRef('users', $users);
			$this->assignRef('total', $total);
			$this->assignRef('search', $search);
			$this->assignRef('pageNav', $pageNav);
		} 
		elseif ($task == "edit" or $task == "add")		
		{
			$model = &$this->getModel();
			$user = $model->getUser();
			$lists = $model->getLists();

			$this->assignRef('user', $user);
			$this->assignRef('lists', $lists);		
		}
		parent::display($tpl);
	}
}
?>