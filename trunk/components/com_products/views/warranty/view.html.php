<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website      http://wampvn.com
* @description    view warranty.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');
class ProductViewWarranty extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;

		// config 
		$params =& $mainframe->getPageParameters('com_products');
		$layout = JRequest::getVar('layout', 'default');	

		// get model
		$model = &$this->getModel();

		$warranty		= $model->getWarranty();

		// SEO title
		$doc =& JFactory::getDocument();
		$titleSEO = 'Download ';
		if (!empty($catName)) {
			$titleSEO .= $catName;
		} else {
			$titleSEO = 'Bảo hành';
		}
		$doc->setTitle($titleSEO);
		$doc->setDescription('Bảo hành tại BiBishop.com - SHOP THOI TRANG');
		
		$id_article = $params->get('id_article', 74);
		$wa_art = $model->getArticle($id_article);
		$this->assignRef('warranty', $warranty);
		$this->assignRef('wa_art', $wa_art);
		
		parent::display($tpl);
	}
}
?>