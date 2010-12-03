<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view download detail.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');
// add css for tab
$document =& JFactory::getDocument();
$document->addStyleSheet( 'components/com_products/css/tab.css' );
$document->addStyleSheet( 'components/com_products/css/tips.css' );

class ProductViewDDetail extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;

		// get model
		$model = &$this->getModel();
		$download = $model->getDDetail();
		$download->link = JRoute::_('index.php?option=com_products' .
			'&controller=download&task=download&id=' . $download->id);
		for ($i = 1; $i < 10; $i++){
			if (!empty($download ->{largeimage.$i})) {
				$image[] = $download ->{largeimage.$i};
			}
		}	
		$list = $model->getLists();	
		// SEO title
		$doc =& JFactory::getDocument();
		$titleSEO = '';		
		if (!empty($download ->name)) {
			$titleSEO = $download->name;
		}
		$groupdownload = $model->getGroup($download->id);
		$groupdownload = $this->buildHTMLGroupPhones($groupdownload);
		$doc->setTitle($titleSEO);		
		$doc->setDescription('Download '. $download ->name .' tại BBSAIGON.com - SHOP BAN BLACKBERRY');
	
		// Assign REF
		$this->assignRef('list', $list);
		$this->assignRef('groupdownload', $groupdownload);
		$this->assignRef('download', $download);
		$this->assignRef('image', $image);
		
		$this->assignRef('titleCatName', $titleCatName);
		parent::display($tpl);
	}
	function buildHTMLGroupPhones($groupdownload) {
		$result = null;
		if ($groupdownload) {
			$count = count($groupdownload);
			foreach($groupdownload as $k => $item) {
				if ($count > ($k +1 )) {
					$result .=  $item->name.',';
				} else {
					$result .= $item->name;
				}
			}
		}
		
		return $result;
		
	}
}
?>