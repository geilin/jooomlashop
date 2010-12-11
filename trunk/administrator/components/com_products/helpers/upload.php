<?php
define( '_JEXEC', 1 );
define('JPATH_BASE', '../../../../' );
define('JPATH_HERE', '' );

define( 'DS', DIRECTORY_SEPARATOR );

require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );
require_once ( 'easyphpthumbnail.class.php' );

$mainframe =& JFactory::getApplication('site');

$uploaddir = JPATH_BASE.'images/products/'; 
$thumbdir = JPATH_BASE.'images/products/thumbs/';

$thumb = new easyphpthumbnail;
	$thumb ->Thumbheight =90;
	$thumb ->Thumbwidth = 90;
	// Create the thumbnail and output to file
	$thumb -> Thumblocation = $thumbdir;
	$thumb -> Thumbprefix = '';
    
	$xtimex = JRequest::getVar('xtimex','');
	
	$newname = $xtimex.$_FILES['uploadfile']['name'];
	
	
$file = $uploaddir . basename($newname);
if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
  	echo "success";
  	@$thumb->Createthumb($file,'file');
} else {
  echo "error";
} 
?>