<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view search.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');
class ProductViewSearch extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;

		// config 
		$params 	=& $mainframe->getPageParameters('com_products');
		$limit 		= $params->get('limit2', 12);
		$limitstart = JRequest::getVar('limitstart', 0);
		$keyword	= trim(JRequest::getString('keyword', ''));
		$type 		= JRequest::getString('type', '');
		// get model
		$model = &$this->getModel();

		$listProduct 	= $model->getListProduct($keyword, $limit, $limitstart);
		$listAccessory 	= $model->getListAccessory($keyword, $limit, $limitstart);
		$listNews 		= $model->getListNews($keyword, $limit, $limitstart);
		$total 			= $model->getTotal($keyword);
		$totalAccessory = $model->getTotalAccessory($keyword);
		$totalNews 		= $model->getTotalNews($keyword);
		$catName = $model->getCatName();

		$pagination		= new JPagination($total, $limitstart, $limit);
		$pagAccessory 	= new JPagination($totalAccessory, $limitstart, $limit);
		$pagNews	 	= new JPagination($totalNews, $limitstart, $limit); 

		// info view product
		$keywords = split(" ",$keyword);
		for($i = 0; $i < count($listProduct); $i++) {	
			$row =& $listProduct[$i];
			$title = JFilterOutput::stringURLSafe($row->name);
			$title = str_replace(' ', '-', strtolower($title));
			$row->link = JRoute::_('index.php?option=' . $option .
			'&view=detail&id=' . $row->id .':'. $title);				
			$row->rating = $model->getRating($row->id);
			$row->bold_name = $row->name;
			if (!empty($keyword)){
			for ($j=0; $j<count($keywords ); $j++) {
				$replace = '<font color=red>'.$keywords[$j].'</font>';
				$row->bold_name =  $model->highlight($row->bold_name, $keywords[$j]);
			}
			}
		}
		
		for($i = 0; $i < count($listAccessory); $i++) {	
			$row =& $listAccessory[$i];
			$title = JFilterOutput::stringURLSafe($row->name);
			$title = str_replace(' ', '-', strtolower($title));
			$row->link = JRoute::_('index.php?option=' . $option .
			'&controller=accessory&view=adetail&id=' . $row->id .':'. $title);				
			$row->rating = $model->getRating($row->id);
			$row->bold_name = $row->name;
			if (!empty($keyword)){
			for ($j=0; $j<count($keywords ); $j++) {
				$replace = '<font color=red>'.$keywords[$j].'</font>';					
				$row->bold_name =  $model->highlight($row->bold_name, $keywords[$j]);
			}
			}
		}
		require_once (JPATH_SITE.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');
		for($i = 0; $i < count($listNews); $i++) {	
			$row =& $listNews[$i];
			$row->introtext = strip_tags($row->introtext) . ' ';
			$row->introtext = substr($row->introtext,0,200);
			$row->introtext = substr($row->introtext,0,strrpos($row->introtext,' ')). '... ';
			$row->link = JRoute::_(ContentHelperRoute::getArticleRoute($row->id.':'.$row->alias, $row->categorid.':'.$row->category, $row->sectionid));	
			if (!empty($keyword)){
			for ($j=0; $j<count($keywords ); $j++) {
				$replace = '<font color=red>'.$keywords[$j].'</font>';					
				$row->title =  $model->highlight($row->title, $keywords[$j]);
				$row->introtext =  $model->highlight($row->introtext, $keywords[$j]);
			}
			}			
		}
		
		if (!empty($type)){
			if ($type == 'product') {			
				$this->setLayout('product');
			} elseif ($type == 'accessory') {			
				$this->setLayout('accessory');
			} elseif ($type == 'news') {
				$this->setLayout('news');
			}
		}
		
		// SEO title
		$doc =& JFactory::getDocument();
		$titleSEO = '';		
		if (!empty($keyword)) {
			$titleSEO = 'Kết quả tìm ' .$keyword;
		}
		$doc->setTitle($titleSEO);		
		$doc->setDescription('Kết quả tìm từ khóa '. $keyword .' tại BiBishop.com - SHOP THOI TRANG');
		
		$text_price = $params->get('text_price', 'Sắp có hàng');
		
		// REF ASS
		$this->assignRef('text_price', $text_price);
		$this->assignRef('listProduct', $listProduct);
		$this->assignRef('listAccessory', $listAccessory);
		$this->assignRef('listNews', $listNews);
		$this->assignRef('total', $total);
		$this->assignRef('totalAccessory', $totalAccessory);
		$this->assignRef('totalNews', $totalNews);
		$this->assignRef('keyword', $keyword);
		$this->assignRef('pagination', $pagination);
		$this->assignRef('pagAccessory', $pagAccessory);
		$this->assignRef('pagNews', $pagNews);
		$this->assignRef('limit', $limit);
		parent::display($tpl);
	}
	
	function checkImage($proid){
		$model = &$this->getModel();
		$imgDefault = $model->getImageDefault($proid);
		return $imgDefault->filename;
	}
}
?>