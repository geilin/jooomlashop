<?php
/*------------------------------------------------------------------------
 * @version		1.0
 * @package		Component Product
 * @copyright	Wampvn Group
 * @license		GNU/GPL
 * @website          http://wampvn.com
 * @description    template show order from
 -------------------------------------------------------------------------*/

function getImgsrc($row) {

	$regex = "/<img[^>]+src\s*=\s*[\"']\/?([^\"']+)[\"'][^>]*\>/";
	$text   = $row->introtext.$row->fulltext;
	 
	preg_match ($regex, $text, $matches);
	 
	$images = (count($matches)) ? $matches : array();
	$image = $images[0];
	 
	 
	return $image;
}

function clearTag($row, $word_nb = null) {

	$row->introtext = preg_replace('/{([a-zA-Z0-9\-_]*)\s*(.*?)}/i', '', $row->introtext);
	$row->introtext = str_replace( '&nbsp;', ' ', $row->introtext );
	$introtext = htmlspecialchars( strip_tags( $row->introtext ) );

	//  neu co word_nb va lon hon moi chay
	if ($word_nb) {
		$text_arr = explode(" ", $introtext);
		if ( count($text_arr) > intval($word_nb) ) {
			$introtext = implode(" ", array_slice($text_arr, 0, $word_nb)) .'...';
		}
	}

	return $introtext;

}

function getImgTag($row) {

	$regex = "/<img[^>]+src\s*=\s*[\"']\/?([^\"']+)[\"'][^>]*\>/";
	$text   = $row->introtext.$row->fulltext;
	 
	preg_match ($regex, $text, $matches);
	 

	$images = (count($matches)) ? $matches : array();
	if ( count($images) ) {
		if( strpos($images[1],"http://") === false )
		$imgthr =	JURI::Base();
		else
		$imgthr =	'' ;
		$image =  $imgthr . $images[1] . $imgthr2;
	}
	 
	return $image;
}