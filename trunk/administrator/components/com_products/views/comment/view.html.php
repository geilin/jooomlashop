<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view comment.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
class ProductViewComment extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;
		$task = JRequest::getVar( 'task' );			
		$limit = JRequest::getVar('limit',$mainframe->getCfg('list_limit'));
		$limitstart = JRequest::getVar('limitstart', 0);
		
		if ($task == '' or $task == 'cancel') 
		{
			$model = &$this->getModel();
			$search				= JRequest::getVar( 'search', '');
			$pid = JRequest::getVar('pid', 0);
			$comments = $model->getComments($limitstart, $limit, $search, $pid);			
			$total = $model->getTotal( $search, $pid );
			$total = $total > 0 ? $total : 0;
			jimport('joomla.html.pagination');
			$pageNav = new JPagination($total, $limitstart, $limit);

			$this->assignRef('comments', $comments);
			$this->assignRef('total', $total);
			$this->assignRef('search', $search);
			$this->assignRef('pageNav', $pageNav);
		} 
		elseif ($task == "edit" or $task == "add")		
		{
			$model = &$this->getModel();
			$comment = $model->getComment();
			$lists = $model->getLists();

			$this->assignRef('comment', $comment);
			$this->assignRef('lists', $lists);		
		}
		parent::display($tpl);
	}
}
?>