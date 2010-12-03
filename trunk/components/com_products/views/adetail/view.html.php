<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view accessory detail.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');
// add css for tab
$document =& JFactory::getDocument();
$document->addStyleSheet( 'components/com_products/css/tab.css' );
$document->addStyleSheet( 'components/com_products/css/tips.css' );

class ProductViewADetail extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;

		// get model
		$model = &$this->getModel();
		$accessory = $model->getADetail();

		$titleCatName = JFilterOutput::stringURLSafe($accessory->category);
		$titleCatName = str_replace(' ', '-', strtolower(trim($titleCatName)));
		$comments = $model->getComment();
		$accessory->linkOrder = JRoute::_('index.php?option=' . $option .
			'&task=addCart&id=' . $accessory->id);
		if (!empty($accessory->description)) {
			$accessory->description = $model->removeBorder($accessory->description);
			$accessory->description = $model->insertNotes($accessory->description);
		}		
		
		$images       = $this->addTabA($accessory->images);
		$rating 	  = $model->getRating($accessory->id);		
		$phukien_khac = $model->getPhukienKhac($accessory->catid,$accessory->id);
		
		// article
		$articles = $model->getArticles();
		// SEO title
		$doc =& JFactory::getDocument();
		$titleSEO = '';		
		if (!empty($accessory->name)) {
			$titleSEO = $accessory->name;
			if (!empty($accessory->category)){
			$titleSEO = $accessory->name . ' | '.$accessory->category;
			}
		}
		for($i = 0; $i < count($comments); $i++) {	
			$comment =& $comments[$i];
			$comment->date = 
			$datetime = date_create($comment->date);
			$comment->date = date_format($datetime, 'd/m/Y');
		}
		$doc->setTitle($titleSEO);		
		$doc->setDescription('Sản phẩm '. $accessory->name .' tại BBSAIGON.com - SHOP BAN BLACKBERRY');
	
		// Assign REF
		$this->assignRef('accessory', $accessory);
		$this->assignRef('rating', $rating);
		$this->assignRef('images', $images);
		$this->assignRef('phukien', $phukien_khac);
		
		$this->assignRef('titleCatName', $titleCatName);
		$this->assignRef('articles', $articles);
		$this->assignRef('comments', $comments);
		parent::display($tpl);
	}
	
	function addTabA($images) {
		
			$regex = "/<img[^>]+src\s*=\s*[\"']\/?([^\"']+)[\"'][^>]*\>/";
	    	preg_match_all ($regex, $images, $matches);
	    	$imgs  = (count($matches)) ? $matches : array();
	
	    	preg_match_all ("/<div[^>]*>(.*)<\/div>/", $images, $ct);
	    	$content = (count($ct)) ? $ct : array();
	    	
	    	$result = array();
	    	$result['img'] = $imgs;
	    	$result['ct']  = $content[1];
	    	
	    	return $result;
	
	}
}
?>