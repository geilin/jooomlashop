<?php

/**
* @version              $Id: relatedArticlesTags.php 9764 2009-02-27 version 1.3 Modified : 2009-09-08
* @package              Joomla
* @copyright    Copyright (C) 2009 - 2010 Benjamin Agullana. All rights reserved.
* @license              GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Import library dependencies
jimport('joomla.plugin.plugin');
jimport('joomla.filesystem.file'); // file manipulation

$mainframe->registerEvent( 'onAfterDisplayContent', 'plgrelatedarticlestags' );

// define language
JPlugin::loadLanguage('plg_content_relatedArticlesTags', JPATH_ADMINISTRATOR);

function plgRelatedArticlesTags(&$row, &$params, $page=0)
{

  global $mainframe;
    
  // Get Plugin info
	$plugin =& JPluginHelper::getPlugin('content', 'relatedarticlestags');
	$pluginParams  = new JParameter( $plugin->params );
  $live_site = $mainframe->getCfg( 'live_site' );
  $view	= JRequest::getCmd('view');
  $id = JRequest::getVar('id');
  $id = explode(':',$id);
  $id = $id[0];
  // Get words blacklist
  $blacklistwords = Array();
  $blacklistwords = trim($pluginParams->get('blacklistword',''));
   
  // Get number of articles to display
  $limit = $pluginParams->get('limit','5');
  
  // Get order
  $order = $pluginParams->get('order','DESC');
  
  // Get nb of letter to display in tooltips
  $nbtool = $pluginParams->get('nbtool','250');
  
  // Get sections
  $sections = $pluginParams->get('section','');
  
  // If sections exists, add a condition to SQL request
  if(is_numeric($sections)){
    $AND = " AND sectionid = $sections";
  }else{
    $sections = explode(',',$sections);
  }
  
  if(count($sections) > 1){
    $i=0;
    foreach($sections as $section){
      if($i==0){
        $AND = " AND (sectionid = $section";
      }else{
        $AND .= " OR sectionid = $section";
      }
      $i++;
    }
    $AND .= ")";
  }

  // Get categories
  $categories = $pluginParams->get('category','');

  // If sections exists, add a condition to SQL request
  if(is_numeric($categories)){
    $AND .= " AND catid = $categories";
  }else{
    $categories = explode(',',$categories);
  }
  
  if(count($categories) > 1){
    $i=0;
    foreach($categories as $categorie){
      if($i==0){
        $AND .= " AND catid = $categorie";
      }else{
        $AND .= " OR catid = $categorie";
      }
      $i++;
    }
    $AND .= ")";
  }
  
  // Get sections in wich plugin will not appear
  $sectionsNo = $pluginParams->get('sectionno','');
  if(is_numeric($sectionsNo)){
    $sectionsNo = $sectionsNo;    
  }
  if(!is_numeric($sectionsNo) && $sectionsNo != null){
    $sectionsNo = explode(',',$sectionsNo);
  }

  // Get categories in wich plugin will not appear
  $categoriesNo = $pluginParams->get('categoryno','');
  if(is_numeric($categoriesNo)){
    $categoriesNo = $categoriesNo;    
  }
  if(!is_numeric($categoriesNo) && $categoriesNo != null){
    $categoriesNo = explode(',',$categoriesNo);
  }
  
	$html 		= '';
	$db 		= & JFactory::getDBO();
	$user		= & JFactory::getUser();
	$config 	= & JFactory::getConfig();
	$option 	= 'content';
	$document = & JFactory::getDocument();     
	
	//Adding css file
	$document->addStyleSheet($live_site.'/plugins/content/relatedArticlesTags/relatedArticlesTags.css', 'text/css');
	//$document->addScript($live_site.'/plugins/content/relatedArticlesTags/relatedArticlesTags.js', 'text/javascript');
	
	if ($option == 'content' && $view == 'article' && $id) {
	     	 
  	 $blacklistwordArray = explode(',',$blacklistwords);

    //Select current article's metakeys
    $query = "SELECT metakey FROM #__content WHERE id='$id'";
    $db->setQuery( $query );
   
    if ($metakey = trim( $db->loadResult() )) {
      // explode the meta keys on a comma
      $keys = explode( ',', $metakey );
      $likes = array();
      
      $Compteur = 0;
      // assemble any non-blank word(s)
      foreach ($keys as $key) {
         $key = trim( $key );
         // unset all black listed word
         foreach($blacklistwordArray as $blacklistedword)
         {
            $blacklistedword = trim($blacklistedword);
            if($key == $blacklistedword){
              unset($key);
            }
         }
         if ($key) {
            $likes[] = $key;
         }
      }
    }
    if (count( $likes )) {
      // select other articles based on the metakey field 'like' the keys found
      $query = "SELECT id, title, introtext, created, modified,  "
      		 . " CASE WHEN CHAR_LENGTH(alias) THEN CONCAT_WS(':', id, alias) ELSE id END as slug "
             . " FROM #__content"
             . " WHERE id<>$id AND state=1 AND access <=$user->gid AND (metakey LIKE '%";
      $query .= implode( "%' OR metakey LIKE '%", $likes );
      $query .= "%')";
      $query .= $AND;
      
      if($order != "RANDOM"){
        $query .= " ORDER BY created $order";
      }else{
        $query .= " ORDER BY RAND() ";
      }
      $query .= " LIMIT 0,$limit";
      
      $db->setQuery( $query );
      // Adding links to articles wich keywords are matching with current article, if nothing is matching it prints nothing
      if ($related = $db->loadObjectList()) {
      	
        $html .= "<div id='srAll'>";
  	    $html .= "<div class='srHeading'>";
  	    $html .= "Các bài liên quan:";
  	    $html .= "</div>";
  	    $html .= "<ul id='relatelist'>";
  	    
  	    $config =& JFactory::getConfig();
      	$offset = $config->getValue('config.offset');
      	$showdateformat = 'd/m/Y';
         	
	        foreach ($related as $item) {
	          $date_display = '<span class="extranews_date">('.mygetdate($item->created,$offset,$showdateformat).')</span>';
	          $route = ContentHelperRoute::getArticleRoute( $item->slug );
	          $link = JRoute::_($route);
	          
	          //Deleting new line character
	          $introtext = str_replace("\r\n","",$item->introtext);
	          //deleting href tags
	          $introtext = strip_tags(_replaceHref($introtext));
	          
	          $html .= '<li><a href="'.$link.'">'.$item->title.'</a> '.$date_display.'</li>';
	               
	        }
        $html .= "</ul>";
        $html .= "</div>";
       
        
      }else{
        $html = "";
      }
      
      //Looking if current article is in forbidden section or category
      $sql = "SELECT sectionid, catid FROM #__content WHERE id = $id";
      $db->setQuery( $sql );
      if($results = $db->loadObjectList())
      {
        foreach($results as $result)
        {
          if(count( $sectionsNo ) > 1){
            if(in_array($result->sectionid, $sectionsNo))
              $html = "";
          }elseif($result->sectionid = $sectionsNo){
              $html = "";
          }
          
          if(count( $categoriesNo ) > 1){
            if (in_array($result->catid, $categoriesNo))
              $html = "";
          }elseif($result->catid = $categoriesNo){
            $html = "";
          }
          
        }
      }      
    }
  }
  //return all html
  return $html;
}

/**
 * fonction _countWordsAndCut par Benjamin Agullana le 11/06/09
 * Permet de couper une phrases au nombre de caractère voulu, sans couper le dernier mot 
 *  $words -> string, la phrase à couper
 *  $length -> string, la longueur en caractères que la phrase doit faire
 *  @Retourne $words (string) qui est la phrase coupée  
 */
  function _countWordsAndCut($words,$length) {
    if (strlen($words) > $length)
    {
      $words = substr($words, 0, $length);
        
      $last_space = strrpos($words, " ");
         
      $words = substr($words, 0, $last_space);
      $words .= "...";
    }

     $words = _replaceHref($words);
     
     return $words;
  }

/**
 * fonction _replaceHref par Benjamin Agullana le 08/09/2009
 * Permet de retirer les liens href présent dans une chaine de caractères
 *   $words -> string, la phrase comportant les liens href
 *   $length -> string, la longueur en caractères que la phrase doit faire
 *   @Retourne $words (string) qui est la phrase coupée
 */  
  function _replaceHref($wordsWithHref) {
    if($wordsWithoutHref = preg_replace('`(<a[^>]*>)(.*)(<\/a>)`Ui','',$wordsWithHref))
      return $wordsWithoutHref;
    else
      return false;
  }
  function mygetdate($date,$offset,$showdateformat){
//$date - date time, $offset - time offset, $showdateformat - the date format
   if($offset==0)return date("$showdateformat",strtotime($date));
   $_date = new DateTime($date);
   if(abs($offset) == 1)$offset_t = ($offset > 0)?'+1 hour':'-1 hour';
   else $offset_t = ($offset > 0)?'+'.$offset.' hours':'-'.abs($offset).' hour';
   $_date -> modify($offset_t);
   return date("$showdateformat",strtotime($_date->format('Y-m-d H:i:s')));
}

?>
