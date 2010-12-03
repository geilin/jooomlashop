<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
$folder 			= 	$params->get( 'folder', 'images/stories/fruit' );
$swidth 			= 	$params->get( 'swidth', 430 );
$sheight 			= 	$params->get( 'sheight', 200 );
$orderby 			= 	$params->get( 'orderby', 0);
$sort 				= 	$params->get( 'sort', '1');
$setimagearray 		= 	$params->get( 'setimagearray', '');
$startwith 			= 	$params->get( 'startwith', 0);
$autoresize 		= 	$params->get( 'autoresize', 0);
$showCaption 		= 	$params->get( 'showCaption', 1 );
$showmode 			= 	$params->get( 'showmode', 0 );
$navigation 		= 	$params->get('navigation',"");
$showDescription 	= 	$params->get('showDescription',1);
$descriptions_effect 		= 	$params->get('description_effect',"fade");
$descriptions 		= 	$params->get('description',"");

$play		 		= 	$params->get('play',"1");
$switch_action 			= 	$params->get( 'switch_action', 'click' );
if($showDescription){
	global $iso_client_lang;
	$descriptionArr = preg_split('/<lang=([^>]*)>/', $descriptions , -1 , PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
	$description = '';
	if(count($descriptionArr) > 1){
		for($i=0;$i<count($descriptionArr);$i=$i+2){
			if($descriptionArr[$i] == $iso_client_lang){
				$description = $descriptionArr[($i+1)];
				break;
			}
		}
		if(!$description){
			$description = $descriptionArr[1];
		}
	}
	else{
		$description = $descriptionArr[0];
	}
	
	function parseDescOld ($description) {
		$description = str_replace("<br />", "\n", $description);
		$description = explode("\n",$description);
		$descriptionArray = array();
		foreach($description as $desc){
			if ($desc) {
				$list = split(":", $desc, 2);
				$list[1] = (count($list) > 1) ? split("&", $list[1]) : array();
				$temp = array();
				for ($i = 0; $i < count($list[1]); ++$i) {
					$l = split("=", $list[1][$i]);
					$temp[trim($l[0])] = trim($l[1]);
				}
				$descriptionArray[$list[0]] = $temp;
			}
		}
		return $descriptionArray;
	}
	
	function parseDescNew($description) {
		$regex = '#\[desc ([^\]]*)\]([^\[]*)\[/desc\]#m';

		preg_match_all ($regex, $description, $matches, PREG_SET_ORDER);

		$descriptionArray = array();
		foreach ($matches as $match) {
			$params = parseParams($match[1]);
			if (is_array($params)) {
				$img = isset($params['img'])?trim($params['img']):'';
				if (!$img) continue;
				$url = isset($params['url'])?trim($params['url']):'';
				$descriptionArray[$img] = array('url'=>$url,'caption'=>str_replace("\n","<br />",trim($match[2])));
			}
		}
		return $descriptionArray;
	}

	function parseParams($params) {
		$params = html_entity_decode($params, ENT_QUOTES);
		$regex = "/\s*([^=\s]+)\s*=\s*('([^']*)'|\"([^\"]*)\"|([^\s]*))/";
		preg_match_all($regex, $params, $matches);
		
		 $paramarray = null;
		 if(count($matches)){
			$paramarray = array();
				for ($i=0;$i<count($matches[1]);$i++){ 
					$key = $matches[1][$i];
					$val = $matches[3][$i]?$matches[3][$i]:($matches[4][$i]?$matches[4][$i]:$matches[5][$i]);
					$paramarray[$key] = $val;
				}
			}
			return $paramarray;
	}
	
	//Parse description. Description in format: [desc img="imagename" url="link"]Description goes here[/desc]
	$descriptionArray = parseDescNew ($description);
	if (!count($descriptionArray)) $descriptionArray = parseDescOld ($description);	
}
$folder = checkURL($folder);
if(!$folder){ echo "This folder doesn't exsits."; }
else{
	if (trim($setimagearray) != "")	$images = explode(",", $setimagearray);
	else $images = getFileInDir($folder, $orderby, $sort );
	if (count($images) > 0) {
		$imgcount = 0;
		$firstImage = '';
		$transDetails = '';
		$captionDetails = '';
		$imageArray = array();
		$captionArray = array();
		$listDescription = "";
		foreach($images as $img) {
			
			if ($imgcount++ == 0) {
				if ($startwith)
				$firstImage = $folder . $startwith;
				else
				$firstImage = $folder . $img;
			}
			$imageArray[] = "$folder"."$img";
			if($showDescription) {
				$captionsArray[] = (isset($descriptionArray[$img]) && isset($descriptionArray[$img]['caption'])) ? str_replace("'", "\'", $descriptionArray[$img]['caption']) :'';
				$urlsArray[] = (isset($descriptionArray[$img]) && isset($descriptionArray[$img]['url'])) ? $descriptionArray[$img]['url'] :'';
			}
		}
		
		if ($showDescription) {
			$listCaption = " captions: ['" . implode("','", $captionsArray) . "'],";
			$listURL = " urls: ['" . implode("','", $urlsArray) . "'],";
		}
		
		
		echo '<script src="'.JURI::base().'modules/mod_wpslideshow/wp_slideshow/wp.slideshow.js" type="text/javascript"></script>' . "\n";
		$css_path = JURI::base().'modules/mod_wpslideshow/wp_slideshow/';
	
				
		JHTML::stylesheet('wp.slideshow.css', $css_path);
		if ($play == 1 ) {
			$cplay = 'false';
		} else {
			$cplay = 'true';
		}
		?>
		<script type="text/javascript">
			jQuery().ready(function() {
				jQuery('.panel h2.title').hide();
				jQuery('.wp-slider-wrapper').fadeIn(1200);
				jQuery('#wp-slider').codaSlider({
											autoSlide: true,
											autoSlideInterval: 6000,
											slideEaseDuration: 1000,
											autoSlideStopWhenClicked: <?php echo $cplay; ?>,
											dynamicArrows: false
										   });
			}); // END ONLOAD PAGE
		</script>
		<div class="wp-slider-wrapper">
			<div class="corner_t"></div>
			<div class="corner_b"></div>
			<div class="wp-slider preload" id="wp-slider">
			<?php foreach ($imageArray as $i => $img) {?>
				<div class="panel">
					<div class="panel-wrapper">
						<?php if (isset($captionsArray[$i])) { ?><h2 class="title"><?php echo $captionsArray[$i]; ?></h2><?php } ?>
						<a href="<?php echo $urlsArray[$i]; ?>" ><img src="<?php echo JURI::base().$imageArray[$i]; ?>" alt="<?php echo $captionsArray[$i]; ?>"/></a>
					</div>	
				</div>
			<?php } ?>
			</div><!-- wp-slider -->
		</div><!-- WAMP-slider-wrapper -->
		<?php
	}
}
function processImage ( &$img, $width, $height, $keepratio=1) {
	if(!$img) return;
	if (substr($img, 0, 4)!='http') {
		$img = $img;
	}
	$img = str_replace(JURI::base(),'',$img);
	$img = str_replace("'",'',$img);
	$img = rawurldecode($img);
	$imagesurl = (file_exists(JPATH_SITE .'/'.$img)) ? jaResize($img,$width,$height, $keepratio) :  '' ;
	return $imagesurl;
}
function jaResize($image,$max_width,$max_height, $keepratio=1){
	$path = JPATH_SITE;
	$sizeThumb = getimagesize(JPATH_SITE.'/'.$image);
	$width = $sizeThumb[0];
	$height = $sizeThumb[1];
	if(!$max_width && !$max_height) {
		$max_width = $width;
		$max_height = $height;
	}else{
		if(!$max_width) $max_width = 1000;
		if(!$max_height) $max_height = 1000;
	}
	if ($keepratio) {
		$x_ratio = $max_width / $width;
		$y_ratio = $max_height / $height;
		if (($width <= $max_width) && ($height <= $max_height) ) {
			$tn_width = $width;
			$tn_height = $height;
		} else if (($x_ratio * $height) < $max_height) {
			$tn_height = ceil($x_ratio * $height);
			$tn_width = $max_width;
		} else {
			$tn_width = ceil($y_ratio * $width);
			$tn_height = $max_height;
		}
	}else{
		$tn_width = $max_width;
		$tn_height = $max_height;
	}
	// read image
	$ext = strtolower(substr(strrchr($image, '.'), 1)); // get the file extension
	$rzname = strtolower(substr($image, 0, strpos($image,'.')))."_{$tn_width}_{$tn_height}.{$ext}"; // get the file extension
	$resized = $path.'/images/resized/'.$rzname;
	if(file_exists($resized)){
		$smallImg = getimagesize($resized);
		if (($smallImg[0] <= $tn_width && $smallImg[1] == $tn_height) ||
				($smallImg[1] <= $tn_height && $smallImg[0] == $tn_width)) {
			return "images/resized/".$rzname;
		}
	}
	
	if(!file_exists($path.'/images/resized/') && !mkdir($path.'/images/resized/',0755)) return '';
	$folders = explode('/',$image);
	$tmppath = $path.'/images/resized/';
	for($i=0;$i < count($folders)-1; $i++){
		if(!file_exists($tmppath.$folders[$i]) && !mkdir($tmppath.$folders[$i],0755)) return '';
		$tmppath = $tmppath.$folders[$i].'/';
	}
	switch ($ext) {
	case 'jpg':     // jpg
		$src = imagecreatefromjpeg(JPATH_SITE.'/'.$image);
		break;
	case 'png':     // png
		$src = imagecreatefrompng(JPATH_SITE.'/'.$image);
		break;
	case 'gif':     // gif
		$src = imagecreatefromgif(JPATH_SITE.'/'.$image);
		break;
	default:
	}
	$dst = imagecreatetruecolor($tn_width,$tn_height);
	//imageantialias ($dst, true);
	if (function_exists('imageantialias')) imageantialias ($dst, true);
	imagecopyresampled ($dst, $src, 0, 0, 0, 0, $tn_width, $tn_height, $width, $height);
	imagejpeg($dst, $resized, 90); // write the thumbnail to cache as well...
	
	return "images/resized/".$rzname;
}
function getFileInDir($folder, $orderby, $sort){
	$imagePath 	= JPATH_SITE ."/".$folder;
	$imgFiles 	= JFolder::files( $imagePath );
	$folderPath = $folder .'/';
	$imageFile = array();
	$i = 0;
	foreach ($imgFiles as $file){
		$i_f 	= $imagePath .'/'. $file;
		if ( eregi( "bmp|gif|jpg|png|jpeg", $file ) && is_file( $i_f ) ) {
			$imageFile[$i][0] = $file;
			$imageFile[$i][1] = filemtime($i_f)	;
			$i++;
		}
	}
	$images = sortImage($imageFile, $orderby , $sort);
	return $images;
}
function sortImage($image, $orderby , $sort){
	$sortObj = array();
	$imageName = array();
	if($orderby == 1){
		for($i=0;$i<count($image);$i++){
			$sortObj[$i] = $image[$i][1];
			$imageName[$i] = $image[$i][0];
		}
	}
	else{
		for($i=0;$i<count($image);$i++){
			$sortObj[$i] = $image[$i][0];
		}
		$imageName = $sortObj;
	}
	if($sort == 1) array_multisort($sortObj, SORT_ASC, $imageName);
	elseif($sort == 2)	array_multisort($sortObj, SORT_DESC, $imageName);
	else shuffle($imageName);
	return $imageName;
}
function checkURL($url){
	if(is_dir($url)){ $url = (substr($url,-1,1) == "/") ? $url : $url."/";	return $url; }
	else { return false; }	
}
function buildThumbnail ($imageArray, $twidth, $theight) {
	$thumbs = array();
	foreach ($imageArray as $image) {
		if ($image1 = processImage ( $image, $twidth, $theight, 0 )) {
			$thumbs[] = "$image1";
		}
	}
	return $thumbs;
}
?>
