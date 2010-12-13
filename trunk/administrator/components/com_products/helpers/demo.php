<?php
/*codeigniter image library */

/**
 * @params $opt array() config for resize
 * @return image thumb or false if rezie failed
 */
 
 
 define( '_JEXEC', 1 );
define('JPATH_BASE', '../../../../' );
define('JPATH_HERE', '' );

define( 'DS', DIRECTORY_SEPARATOR );

require_once ( JPATH_BASE .DS.'includes'.DS.'defines.php' );
require_once ( JPATH_BASE .DS.'includes'.DS.'framework.php' );
//require_once ( 'easyphpthumbnail.class.php' );
include_once( dirname( __FILE__ ) . '/image_lib.php' );
$mainframe =& JFactory::getApplication('site');

$uploaddir = JPATH_BASE.'images/products/'; 
$thumbdir = JPATH_BASE.'images/products/thumbs/';

$params = &JComponentHelper::getParams( 'com_products' );
 
function generate_thumb($opt=array()) {
	$config['image_library'] 	= 'gd2';
	$config['source_image'] 	= $opt['file_to_resize'];
	$config['thumb_marker'] 	= ''; //subfix of image
	$config['new_image'] 		= $opt['thumb_dir'];
	//$config['dest_folder']		= $opt['dest_folder'];
	$config['create_thumb'] 	= TRUE;
	$config['width'] 			= $opt['width'];
	$config['height'] 			= $opt['height'];

	$CI_Image_lib = new CI_Image_lib($config);		
	if ( $CI_Image_lib->resize() )
	{
		return $CI_Image_lib->dest_image;
	}
	return false;
}

#demo usage function
//$image_dir  = dirname(__FILE__);
//$thumb_dir = dirname(__FILE__) . '/thumbs';

 
	$xtimex = JRequest::getVar('xtimex','');
	
	$newname = $xtimex.$_FILES['uploadfile']['name'];


$configs = array(
		'width' => $params->get('thump_height','90'),
		'height' => $params->get('thump_width','90'),
		'file_to_resize' => $uploaddir . '/'.$newname,
		'thumb_dir' =>  $thumbdir
		);

if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploaddir.'/'.$newname)) { 
  	$generate_thumb = generate_thumb($configs);
	echo "success";
} else {
  echo "error";
} 
		

?>
