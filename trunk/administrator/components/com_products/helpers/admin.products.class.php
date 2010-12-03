<?php
/**
* @version		1.0
* @package	Component Administrator Product
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    class process image upload, thumbnails. 
*/

class Images{
	
	function upload($file, $path, $override = 0)
	{
		//Import filesystem libraries. Perhaps not necessary, but does not hurt
		jimport('joomla.filesystem.file');
		 
		//Clean up filename to get rid of strange characters like spaces etc
		$filename = JFile::makeSafe($file['name']);
		$filename = str_replace(' ', '-', $filename); 
		//Set up the source and destination of the file
		$src = $file['tmp_name'];
		$dest = $path . $filename;
		 
		//First check if the file has the right extension, we need jpg only
		$ext  = strtolower(JFile::getExt($filename));
		if ( $ext == 'jpg' or $ext == 'gif' or $ext == 'png' or $ext == 'jpeg') {			
			//check exits
			if (!$override){
				if (JFile::exists($dest)){
					echo "<script> alert('Image $filename exists on server');
						window.history.go(-1); </script>\n";
					exit();				
				}				
			}
			if ( JFile::upload($src, $dest) ) {
				return $filename;
		   } else {
			echo "<script> alert('Error upload image');
			window.history.go(-1); </script>\n";
			exit();
		   }
		} else {
			echo "<script> alert('Chi cho phep cac loai anh: jpg, gif, png');
			window.history.go(-1); </script>\n";
			exit();
		}
		return false;
	}
	
	function createThumbs( $pathToImages, $pathToThumbs, $thumbWidth )
	{
	  // open the directory
	  $dir = opendir( $pathToImages );

	  // loop through it, looking for any/all JPG files:
	  while (false !== ($fname = readdir( $dir ))) {
		// parse path for the extension
		$info = pathinfo($pathToImages . $fname);
		// continue only if this is a JPEG image
		if ( strtolower($info['extension']) == 'jpg' )
		{
		  echo "Creating thumbnail for {$fname} <br />";

		  // load image and get image size
		  $img = imagecreatefromjpeg( "{$pathToImages}{$fname}" );
		  $width = imagesx( $img );
		  $height = imagesy( $img );

		  // calculate thumbnail size
		  $new_width = $thumbWidth;
		  $new_height = floor( $height * ( $thumbWidth / $width ) );

		  // create a new temporary image
		  $tmp_img = imagecreatetruecolor( $new_width, $new_height );

		  // copy and resize old image into new image
		  imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );

		  // save thumbnail into a file
		  imagejpeg( $tmp_img, "{$pathToThumbs}{$fname}" );
		}
	  }
	  // close the directory
	  closedir( $dir );
	}

// end class
}
?>