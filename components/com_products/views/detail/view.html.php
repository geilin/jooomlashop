<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');

class ProductViewDetail extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe, $layout;
		
		// get data
		$model = &$this->getModel();
		$product = $model->getDetail();
		
		$images 	= $model->getImages();		
		$relative 	= $model->getRelative();
		
		
		$titleCatName = JFilterOutput::stringURLSafe($product->category);
		$titleCatName = str_replace(' ', '-', strtolower(trim($titleCatName)));
		
		$title = JFilterOutput::stringURLSafe($product->name);
		$title = str_replace(' ', '-', strtolower($title));
			
		
		$product->link = JRoute::_('index.php?option=' . $option . '&view=detail&id=' . $product->id . ':'.$title);	
		
        
		$document =& JFactory::getDocument();     

		$document->addScript('components/com_products/js/jquery-1.3.2.js');
		$document->addScript('components/com_products/js/colorbox/jquery.colorbox.js');
		$document->addStyleSheet('components/com_products/js/colorbox/colorbox.css');        
		$document->addScriptDeclaration('if($===jQuery){jQuery.noConflict();} jQuery(document).ready(function(){ jQuery("a[rel=\'product_image\']").colorbox({current: "Ảnh {current} / {total}"}); });');

		$titleSEO = '';		
		if ($product->name) {
			$titleSEO = $product->name;
			if ($product->category){
				$titleSEO = $product->name . ' | '.$product->category;
			}
		}
        
        $document->setTitle($titleSEO . ' | '. $mainframe->getCfg('sitename')); 
		
		$app =& JFactory::getApplication();
		$pathway = $app->getPathway();    
		$pathway->addItem($product->name);		
		
	
		$this->assignRef('relative', $relative);
		$this->assignRef('images', $images);
		$this->assignRef('product', $product);		
		$this->assignRef('titleCatName', $titleCatName);
		parent::display($tpl);
	}
	
}
?>