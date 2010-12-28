<?php

class JElementPreview extends JElement {

  var   $_name = 'Preview';

  function fetchElement($name, $value, &$node, $control_name)
  {
    $document =& JFactory::getDocument();
	$js_preview_banner = "
	function changeBannerImage() {
			if (document.adminForm.paramsbanner.value !='') {
				document.adminForm.banner_preview.src='../images/banners/' + document.adminForm.paramsbanner.value;
			} else {
				document.adminForm.banner_preview.src='images/blank.png';
			}
			$$('div.jpane-slider')[0].setStyle('height','auto');
			//Accordion.display();
		}
	window.addEvent('domready', function(){ 	
		setTimeout(function() {	changeBannerImage(); }, 2000);	
	
	});";
	$document->addScriptDeclaration($js_preview_banner);
	return '<div id="container_banner_preview"><img src="images/blank.png" id="banner_preview" alt="" /></div>';
  
  }
}