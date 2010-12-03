<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website      http://wampvn.com
* @description    view download.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');
class ProductViewDownload extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;

		// config 
		$params =& $mainframe->getPageParameters('com_products');
		$layout = JRequest::getVar('layout', 'default');	
//		if ($layout == 'default'){
//			$limit = $params->get('limit1', 12);
//		} else {
//			$limit = $params->get('limit2', 15);
//		}
		$limit = 8;
		$limitstart = JRequest::getVar('limitstart', 0);
		$gid = JRequest::getInt('gid', 0);
		$cid = JRequest::getVar('cid', '');

		// get model
		$model = &$this->getModel();

		$listDownload = $model->getListDownload($limit, $limitstart);

		$total		= $model->getTotal();
		$list 		= $model->getLists();
		$catName 	= $model->getCatName();

		$pagination = new JPagination($total, $limitstart, $limit);
		
		$titleCatName = JFilterOutput::stringURLSafe(trim($catName));
		$titleCatName = str_replace(' ', '-', strtolower($titleCatName));		

		// info view product	
		for($i = 0; $i < count($listDownload); $i++) {	
			$row =& $listDownload[$i];
			$title = JFilterOutput::stringURLSafe($row->name);
			$title = str_replace(' ', '-', strtolower($title));
			$row->link = JRoute::_('index.php?option=' . $option .
			'&controller=download&view=ddetail&id=' . $row->id. ':'. $title);
			
			$row->downloadlink = JRoute::_('index.php?option=com_products' .
			'&controller=download&task=download&id=' . $row->id);
			

			$group = $model->getGroup($row->id);
			$row->group = '';
			$j = 0;
			foreach($group as $result){
				$j++;
				if ($j > 1){
					$row->group .= ', ';
				}
				$row->group .= $result->name;
			}			
		}
		// SEO title
		$doc =& JFactory::getDocument();
		$titleSEO = 'Download ';
		if (!empty($catName)) {
			$titleSEO .= $catName;
		} else {
			$titleSEO = 'Download Game Ứng Dụng';
		}
		$doc->setTitle($titleSEO);
		$doc->setDescription('Các Sản phẩm '. $catName .' tại BBSAIGON.com - SHOP BAN BLACKBERRY');
		
		$this->assignRef('listDownload', $listDownload);
		$this->assignRef('list', $list);
		$this->assignRef('total', $total);
		$this->assignRef('catName', $catName);
		$this->assignRef('titleCatName', $titleCatName);		
		$this->assignRef('catid', $catid);
		$this->assignRef('pagination', $pagination);
		parent::display($tpl);
	}
}
?>