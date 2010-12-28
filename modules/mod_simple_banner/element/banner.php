<?php

class JElementBanner extends JElement {

  var   $_name = 'Banner';

  function fetchElement($name, $value, &$node, $control_name)
  {
    	
		print_r($name);
		print_r($value);
		
		
		
		
		
		// Imagelist
		$javascript			= 'onchange="changeBannerImage();"';
		$directory			= '/images/banners';
		
		return JHTML::_('list.images',  $control_name . '['.$name.']', $value, $javascript, $directory, "bmp|gif|jpg|png|swf"  );
  
  }
}