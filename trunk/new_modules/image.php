<?
defined('JPATH_BASE') or die();
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
define('INDEXTEXT', '<html><body></body></html>');

class JImage {
	
	// Source Image Paramaters
	private $file;
	private $image;
	private $imagew;
	private $imageh;
	private $imageq;
	
	// Thumb Paramaters
	private $thumb;
	private $thumbw	= '100';
	private $thumbh = '100';
	private $thumbq = '80';
	public  $square = true;
	
	// Cache Paramaters
	private $cacheDirDepth = 4;
	private $cacheFileName;
	private $cacheDirectory;
	private $cacheDir;
	private $cachePrefix = 'cache_';
	private $imageClass = 'thumb';
	private $alt = 'cached image';
	private $broadDirectories;
	
	private $tempImage;
	
	
	function __construct()
	{
		$this->cacheDirectory = $this->getCacheDirectory();
			
	}

	public function __destruct() {
		
		unset($this->cacheFileName);
		unset($this->cacheDir);
		
		if(is_resource($this->file))
			unset($this->file);
		
		if(is_resource($this->image)) 
			imagedestroy($this->image);

		if(is_resource($this->thumb)) 
			imagedestroy($this->thumb);

		if(is_resource($this->tempImage)) 
			imagedestroy($this->tempImage);
	}
	function __toString(){
		
	}
	function generateThumb($file, $cache=true)
	{
		$this->file = $file;
		if(JFile::exists($file)):
			$this->file = $file;
			$this->loadImage();
		else:
			die('The File: '.$this->file.' does not exist. died at line - '. __LINE__);
		endif;
		$this->cacheDirectory = $this->getCacheDirectory();
		
		$this->generateCacheFileName();
		
		if($cache):
			if(!JFile::exists($this->cacheFileName)):
				$this->thumbMaker();
				$this->saveCacheImage();
				$this->showCachedImage();				
			else:
				$this->showCachedImage();
			endif;
		endif;
		
		$this->__destruct();
	}
	
	private function thumbMaker() 
	{
		if($this->loadImage()):
			if($this->square)
				$this->square();
			
			$this->createEmptyThumb();
						
			imagecopyresampled( 
				$this->thumb, 
				$this->image, 
				0,0,0,0,
				$this->thumbw,
				$this->thumbh,
				imagesx($this->image),
				imagesy($this->image)
			);
		
		else:
			$this->invalidImage('File not found');
			return false;
		endif;
	}
	
	private function loadImage()
	{
		$this->image = imagecreatefromjpeg($this->file);
		$this->imageSize = getimagesize($this->file);
		$this->setThumbHeight();
		return true;
	}
	
	private function createEmptyThumb() {
		$this->thumb = imagecreatetruecolor( $this->getWidth(), $this->getHeight() );
		imagefill( $this->thumb, 0, 0, imagecolorallocate( $this->thumb, 255, 255, 255 ) );
	}
	
	private function square() 
	{
		$this->thumbh = $this->thumbw;
		
		$imageMax = max($this->imageSize[0], $this->imageSize[1]);
		$imageMin = min($this->imageSize[0], $this->imageSize[1]);
		
		$imageSlug = ($imageMax-$imageMin)/2;
		
		$this->tempImage = imagecreatetruecolor($imageMin,$imageMin);
		
		if($this->imageSize[0] > $this->imageSize[1])
			imagecopy($this->tempImage,$this->image,0,0,$imageSlug,0,$this->imageSize[0],$this->imageSize[1]);
		elseif($this->imageSize[0] < $this->imageSize[1])
			imagecopy($this->tempImage,$this->image,0,0,0,$imageSlug,$this->imageSize[0],$this->imageSize[1]);
		else
			imagecopy($this->tempImage,$this->image,0,0,0,0,$this->imageSize[0],$this->imageSize[1]);
		
		imagedestroy($this->image);
		$this->image = imagecreatetruecolor($imageMin,$imageMin);
		imagecopy($this->image,$this->tempImage,0,0,0,0,$imageMin,$imageMin);
		imagedestroy($this->tempImage);
	}
	
	private function setThumbHeight()
	{
		$ratio = $this->thumbw/$this->imageSize[0];
		$this->thumbh = round($this->imageSize[1]*$ratio);
	}	
	
	/**
	 * Save thumbnail to file
	 *
	 */	
	private function saveCacheImage() 
	{
		imagejpeg( $this->thumb, $this->cacheFileName, $this->thumbq);
		imagedestroy($this->image);
		imagedestroy($this->thumb);
	}

	public function setSquare($square) { return $this->square = $square; }
	private function getFileName(){ return $this->file; }
	private function getWidth(){ return $this->thumbw; }
	private function getHeight(){ return $this->thumbh; }
	private function getQuality(){ return $this->thumbq; }
	private function getCacheDirectory(){ return JPATH_CACHE.DS.'media'; }
	
	public function setThumbParams($w = NULL, $h = NULL, $q = NULL, $alt = NULL)
	{
		// Set the width
		if($w) $this->thumbw = $w;
		
		if(!empty($h)) 
			$this->thumbh = $h;
		else if($this->square = true)
			$this->thumbh = $w;

		// Set the quality
		if($q) $this->thumbq = $q;
	}
	
	public function setImageClass($class){$this->imageClass = $class;}
	
	
	/**
	 * Here's where are the chacheing get's done.
	 * First we need to generate the cache name.
	 * Then we need to create the directory path
	 * relative to Cache/media, and based off an
	 * md5_file($filename).
	 */
	
	private function generateCacheFileName() 
	{				
			
		$imageName = JFile::makesafe( basename( $this->getFileName() ) );
		$imageName = JFile::removespace($imageName);
		$imageName = explode('.',$imageName);	
		$imageName = str_replace( '_', '', $imageName[0] );
		
		$cacheFileName  = $imageName;		
		$cacheFileName .= $this->thumbw.'x'.$this->thumbh;
		$cacheFileName .= '_q'.intval( $this->getQuality() );
		if($this->square)
			$cacheFileName .= '_sq';
		$cacheFileName .= '.jpg';
		
		$this->broadDirectories = $this->generateCacheDir().DS;

		$this->cacheFileName = $this->cacheDirectory.$this->broadDirectories.$this->cachePrefix.$cacheFileName;

		return true;		
	}
	
	private function generateCacheDir()
	{
		$md5 = md5_file($this->getFileName());
		
		//$cacheDir = '';
		
		for ( $i = 0; $i < $this->cacheDirDepth; $i++ )
			$this->cacheDir .= DS.substr($md5, 0, $i + 1);
		
		//echo $cacheDir; die;
		// Check if the Directory already exists.
		// If so, Check if it's writable.
		// If not? Try to make it writable.
		// If that that doesn't work?  Quit!
		
		$dir = $this->cacheDirectory.$this->cacheDir;
		
		if(!JFolder::exists($dir)):
			if(JFolder::create($dir, 0777)):
					if(!JFile::exists($dir.DS.'index.html')):
						$open = fopen($dir.DS.'index.html', 'w') or die('Dead at Line: -'.__LINE__);
						fclose($open);
						JFile::write($dir.DS.'index.html', JText::_('INDEXTEXT'));
					endif;
				return $this->cacheDir;
			else:
				die('Couldn\'t create the directory, dead at line - '. __LINE__);
			endif;
		else:
			return $this->cacheDir;
		endif;
		
		return false;
	}
	
	
	private function showCachedImage(){
		jimport('joomla.html.html');
		$src = str_replace(JPATH_ROOT, substr(JURI::base(),0 , -1), $this->cacheFileName);
		echo JHtml::image($src, $this->alt);
		
		//echo '<img src="'.$src.'" class="'.$this->imageClass.'" alt="'.$this->alt.'" />';
	}
	
	/**
	 * Creates error image
	 *
	 * @param string $message
	 */	
	private function invalidImage($message) {
	
		$this->thumb = imagecreate(80,75);
		$black = imagecolorallocate($this->thumb,0,0,0);
		$yellow = imagecolorallocate($this->thumb,255,255,0);
		imagefilledrectangle($this->thumb,0,0,80,75,imagecolorallocate($this->thumb,255,0,0));
		imagerectangle($this->thumb,0,0,79,74,$black);
		imageline($this->thumb,0,20,80,20,$black);
		imagefilledrectangle($this->thumb,1,1,78,19,$yellow);
		imagefilledrectangle($this->thumb,27,35,52,60,$yellow);
		imagerectangle($this->thumb,26,34,53,61,$black);
		imageline($this->thumb,27,35,52,60,$black);
		imageline($this->thumb,52,35,27,60,$black);
		imagestring($this->thumb,1,5,5,$message,$black);
	}
		
}

?>