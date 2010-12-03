<?php
/**
* @author Le Van Hen
* @licence http://wampvn.com
* tu dong sinh ra keyword, description theo title va noi dung
* version 1.0
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Import library dependencies
jimport('joomla.event.plugin');

class plgSystemWampSEO extends JPlugin
{
  
	// Constructor
    function plgSystemWampSEO( &$subject, $params )
    {
		parent::__construct( $subject, $params );
    }

    function onAfterDispatch()
    {
		global $mainframe, $thebuffer;
		$document =& JFactory::getDocument();
        $docType = $document->getType();

    	// only mod site pages that are html docs (no admin, install, etc.)
      	if (!$mainframe->isSite()) return ;
    	if ($docType != 'html') return ;

		// load plugin parameters
		$plugin =& JPluginHelper::getPlugin('system', 'WampSEO');
		$pluginParams = new JParameter( $plugin->params );
		
		$titOrder = $pluginParams->def('titorder', 0);
		$fptitle = $pluginParams->def('fptitle','Home');
		$fptitorder = $pluginParams->def('fptitorder', 0);
		$pageTitle = $document->getTitle();
		$sitename = $mainframe->getCfg('sitename');
		$sep = str_replace('\\','',$pluginParams->def('separator','|')); //Sets and removes Joomla escape char bug.
		
		if ($this->isFrontPage()):
			if ($fptitorder == 0):
				$newPageTitle = $fptitle . ' ' . $sep . ' ' . $sitename;
			elseif ($fptitorder == 1):
				$newPageTitle = $sitename . ' ' . $sep . ' ' . $fptitle;
			elseif ($fptitorder == 2):
				$newPageTitle = $fptitle;
			elseif ($fptitorder == 3):
				$newPageTitle = $sitename;
			endif;
		else:
			if ($titOrder == 0):
				$newPageTitle = $pageTitle . ' ' . $sep . ' ' . $sitename;
			elseif ($titOrder == 1):
				$newPageTitle = $sitename . ' ' . $sep . ' ' . $pageTitle;
			elseif ($titOrder == 2):
				$newPageTitle = $pageTitle;
			endif;
		endif;

		// Set the Title
		$document->setTitle ($newPageTitle);

	}

	function onPrepareContent( &$article, &$params, $limitstart )
	{
		global $mainframe;

		$document =& JFactory::getDocument();
		$plugin =& JPluginHelper::getPlugin('system', 'WampSEO');
		$pluginParams = new JParameter( $plugin->params );
		$blackList = $pluginParams->def('blacklist', 'la, cac, cung, nhung');
		$minLength = $pluginParams->def('lengthofword', '3' );
		$count = $pluginParams->def('count', '20' );
		$saveAll = $pluginParams->def('regenerateall',0);
		$usetitle = $pluginParams->def('usetitleorcontent',0);
		$title = $article->title;
		$thelength = $pluginParams->def('length', 200);
		$thecontent = $title . '. ' .$article->text;
		$thecontent = substr($thecontent,0,$thelength);
		$fpdesc = $pluginParams->def('fpdesc', 0);
		$credit = $pluginParams->def('credittag', 0);

		//Checks to see whether FP should use standard desc or auto-generated one.
		if ($this->isFrontPage() && $fpdesc == 0) {
			$document->setDescription($mainframe->getCfg('MetaDesc'));
			return;
		}
		
		//Bit of code to grab only the first content item in category list.
		if ($document->getDescription() != '') {
			if ($document->getDescription() != $mainframe->getCfg('MetaDesc')) return;
		}
		
		// Clean things up and prepare auto-generated Meta Description tag.
		$thecontent = $this->CleanText($thecontent);

		
		// Truncate the string to the length parameter - rounding to nearest word
		$thecontent = $thecontent . ' ';
		$thecontent = substr($thecontent,0,$thelength);
		$thecontent = substr($thecontent,0,strrpos($thecontent,' '));

		// Set the description
		$document->setDescription($thecontent);

    // check if title or content used for keywords
    if ($usetitle == 0):
     $keys = $title; 
    elseif ($usetitle == 1):
     $keys = $thecontent;
    elseif ($usetitle == 2):
     $keys = $title . ' ' . $thecontent;
    endif; 
    
    
    // Set the keywords
	$keys = $this->trans_vi($keys);
    $keywords = $this->generatekeywords($keys, $blackList, $count, $minLength);
    $document->setMetaData('keywords', $keywords);


    // save the modified keywords for all postings
		if ($saveAll == 0) {
		  	$db =& JFactory::getDBO();
				$query = "SELECT `id`, `sectionid`, `catid`, `title`, `introtext`, `fulltext`, `created_by_alias`, `created_by` FROM #__content";
				$db->setQuery($query);
				$rows =  $db->loadAssocList();
				foreach ( $rows as $row ) {
								
						// create the keywords for the article
						if ($usetitle == 0):
						 $keys = $row['title'];
						elseif ($usetitle == 1): 
						 $keys = $row['introtext'] . " " . $row['fulltext'];
						elseif ($usetitle == 2):
						 $keys = $row['title'] . " " . $row['introtext'] . " " . $row['fulltext'];
						endif;
						
						$keywords = $this->generatekeywords($keys, $blackList, $count, $minLength);
					 
						$query = "UPDATE #__content SET `metakey` = '" . $keywords . "' WHERE `id` = " . $row['id'];
						$db->setQuery($query);
						$db->query();									
				}
     }


		// Set optional Generator tag for WampSEO credit.
		if ($credit == 0) {
			$document->setMetaData('generator', 'WampSEO (http://wampvn.com)');
		}
		
	}

	
	/* CleanText function scooped from JoomSEO plugin. Cheers guys. */
	function CleanText($text) {
		// remove any javascript - OLLY
		// http://forum.joomla.org/index.php?topic=194800.msg1036857
		$regex = "'<script[^>]*?>.*?</script>'si";
		$text = preg_replace($regex, " ", $text);
		$regex = "'<noscript[^>]*?>.*?</noscript>'si";
		$text = preg_replace($regex, " ", $text);
   
		// convert html entities to chars
		// this doesnt remove &nbsp; but converts it to ascii 160
		// we handle that further down changing chr(160) to a space
		//$text = html_entity_decode($text,ENT_QUOTES,'UTF-8');
		if(( version_compare( phpversion(), '5.0' ) < 0 )) {
		require_once(JPATH_SITE.DS.'libraries'.DS.'tcpdf'.DS.'html_entity_decode_php4.php');
		$text = html_entity_decode_php4($text,ENT_QUOTES,'UTF-8');
		}else{
		$text = html_entity_decode($text,ENT_QUOTES,'UTF-8');
		}
		// strip any remaining html tags
		$text = strip_tags($text);
		
		// remove any mambot codes
		$regex = '(\{.*?\})';
		$text = preg_replace($regex, " ", $text);
		
		// remove any extra spaces
		while (strchr($text,"  ")) {
			$text = str_replace("  ", " ",$text);
		}
		
		// general sentence tidyup
		for ($cnt = 1; $cnt < strlen($text); $cnt++) {
			// add a space after any full stops or comma's for readability
			// added as strip_tags was often leaving no spaces
			if (($text{$cnt} == '.') || ($text{$cnt} == ',')) {
				if ($text{$cnt+1} != ' ') {
					$text = substr_replace($text, ' ', $cnt + 1, 0);
				}
			}
		}
		
		// remove quotes
		$text = str_replace("\"", "", $text);

		return trim($text);
	}
	
	function isFrontPage()
	{
		$menu = & JSite::getMenu();
		if ($menu->getActive() == $menu->getDefault()) {
			return true;
		}
		return false;
	}

	function killTitleinBuffer ($buff, $tit)
	{
		$cleanTitle = $buff;
		if (substr($buff, 0, strlen($tit)) == $tit) {
			$cleanTitle = substr($buff, strlen($tit) + 1);
		} 
		return $cleanTitle;
	}

  // generate keywords
  function generatekeywords($keys, $blackList, $count, $minLength) {

	  $keys = preg_replace('/<[^>]*>/', ' ', $keys);	
	  $keys = preg_replace('/[\.;:|\'|\"|\`|\,|\(|\)|\-]/', ' ', $keys);	
	  $keysArray = explode(" ", $keys);
	  $keysArray = array_count_values(array_map('strtolower', $keysArray));
	
  	$blackArray = explode(",", $blackList);
	
	  foreach($blackArray as $blackWord){
		  if(isset($keysArray[trim($blackWord)]))
			  unset($keysArray[trim($blackWord)]);
	  }
	
	  arsort($keysArray);
	
	  $i = 1;
	  $keywords = '';
	  foreach($keysArray as $word=>$instances){
		  if($i > $count)
			  break;
		  if(strlen(trim($word)) >= $minLength ) {
			  $keywords .= $word . ", ";
			  $i++;
		  }
	  }
	
	  $keywords = rtrim($keywords, ", ");
	  return($keywords);
  }	
	// xu ly tieng viet
	function trans_vi($string){
		$trans = array(
		"đ"=>"d","ă"=>"a","â"=>"a","á"=>"a","à"=>"a","ả"=>"a","ã"=>"a","ạ"=>"a",
		"ấ"=>"a","ầ"=>"a","ẩ"=>"a","ẫ"=>"a","ậ"=>"a",
		"ắ"=>"a","ằ"=>"a","ẳ"=>"a","ẵ"=>"a","ặ"=>"a",
		"é"=>"e","è"=>"e","ẻ"=>"e","ẽ"=>"e","ẹ"=>"e",
		"ế"=>"e","ề"=>"e","ể"=>"e","ễ"=>"e","ệ"=>"e",
		"í"=>"i","ì"=>"i","ỉ"=>"i","ĩ"=>"i","ị"=>"i",
		"ư"=>"u","ô"=>"o","ơ"=>"o","ê"=>"e",
		"Ư"=>"u","Ô"=>"o","Ơ"=>"o","Ê"=>"e",
		"ú"=>"u","ù"=>"u","ủ"=>"u","ũ"=>"u","ụ"=>"u",
		"ứ"=>"u","ừ"=>"u","ử"=>"u","ữ"=>"u","ự"=>"u",
		"ó"=>"o","ò"=>"o","ỏ"=>"o","õ"=>"o","ọ"=>"o",
		"ớ"=>"o","ờ"=>"o","ở"=>"o","ỡ"=>"o","ợ"=>"o",
		"ố"=>"o","ồ"=>"o","ổ"=>"o","ỗ"=>"o","ộ"=>"o",
		"ú"=>"u","ù"=>"u","ủ"=>"u","ũ"=>"u","ụ"=>"u",
		"ứ"=>"u","ừ"=>"u","ử"=>"u","ữ"=>"u","ự"=>"u",'ý'=>'y','ỳ'=>'y','ỷ'=>'y','ỹ'=>'y','ỵ'=>'y', 'Ý'=>'Y','Ỳ'=>'Y','Ỷ'=>'Y','Ỹ'=>'Y','Ỵ'=>'Y',
		"Đ"=>"D","Ă"=>"A","Â"=>"A","Á"=>"A","À"=>"A","Ả"=>"A","Ã"=>"A","Ạ"=>"A",
		"Ấ"=>"A","Ầ"=>"A","Ẩ"=>"A","Ẫ"=>"A","Ậ"=>"A",
		"Ắ"=>"A","Ằ"=>"A","Ẳ"=>"A","Ẵ"=>"A","Ặ"=>"A",
		"É"=>"E","È"=>"E","Ẻ"=>"E","Ẽ"=>"E","Ẹ"=>"E",
		"Ế"=>"E","Ề"=>"E","Ể"=>"E","Ễ"=>"E","Ệ"=>"E",
		"Í"=>"I","Ì"=>"I","Ỉ"=>"I","Ĩ"=>"I","Ị"=>"I",
		"Ư"=>"U","Ô"=>"O","Ơ"=>"O","Ê"=>"E",
		"Ư"=>"U","Ô"=>"O","Ơ"=>"O","Ê"=>"E",
		"Ú"=>"U","Ù"=>"U","Ủ"=>"U","Ũ"=>"U","Ụ"=>"U",
		"Ứ"=>"U","Ừ"=>"U","Ử"=>"U","Ữ"=>"U","Ự"=>"U",
		"Ó"=>"O","Ò"=>"O","Ỏ"=>"O","Õ"=>"O","Ọ"=>"O",
		"Ớ"=>"O","Ờ"=>"O","Ở"=>"O","Ỡ"=>"O","Ợ"=>"O",
		"Ố"=>"O","Ồ"=>"O","Ổ"=>"O","Ỗ"=>"O","Ộ"=>"O",
		"Ú"=>"U","Ù"=>"U","Ủ"=>"U","Ũ"=>"U","Ụ"=>"U",
		"Ứ"=>"U","Ừ"=>"U","Ử"=>"U","Ữ"=>"U","Ự"=>"U",);
		$string = strtr($string, $trans);
		return $string;
		}
}