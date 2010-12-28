<?php
/**
* @version		$Id: helper.php 14401 2010-01-26 14:10:00Z louis $
* @package		Joomla
* @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

class modSimpleBannersHelper
{
	
	function renderBanner($params)
	{
		$baseurl = JURI::base();
		$banner = $params->get('banner');
		
		$html = '';
		if ( !$params->get('isflash') )
		{
	
			$image 	= '<img src="'.$baseurl.'images/banners/' . $banner . '" alt="'.JText::_('Banner').'" />';
			$banner_link = $params->get( 'banner_link', '');			
			
			if ( $banner_link )
			{
				
				$a = '<a href="'. $banner_link .'" target="_blank">';
				$html = $a . $image . '</a>';
			}
			else
			{
				$html = $image;
			}
		}
		else
		{
			
			
			$width = $params->get( 'banner_width');
			$height = $params->get( 'banner_height');

			$imageurl = $baseurl . 'images/banners/' . $banner;
			$html =	"<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" border=\"0\" width=\"$width\" height=\"$height\">
					 <param name=\"wmode\" value=\"transparent\"> 
					<param name=\"movie\" value=\"$imageurl\"><embed src=\"$imageurl\" loop=\"false\" wmode=\"transparent\" pluginspage=\"http://www.macromedia.com/go/get/flashplayer\" type=\"application/x-shockwave-flash\" width=\"$width\" height=\"$height\"></embed>
					</object>";
		}
		return $html;
	}
}
