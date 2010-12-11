<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<span class="breadcrumbs pathway">
<?php for ($i = 0; $i < $count; $i ++) :

	// If not the last item in the breadcrumbs add the separator
	if ($i < $count -1) {
		if(!empty($product[$i]->link)) {
			echo '<a href="'.$product[$i]->link.'" class="pathway">'.$product[$i]->name.'</a>';
		} else {
			echo $product[$i]->name;
		}
		echo ' '.$separator.' ';
	}  else if ($params->get('showLast', 1)) { // when $i == $count -1 and 'showLast' is true
	    echo $product[$i]->name;
	}
endfor; ?>
</span>
 <span class="social-links">
                    <a target="_blank" class="buzz" title="Lưu vào Google Bookmark" href="//www.addthis.com/bookmark.php?pub=berrysg&v=250&source=tbx-250&tt=0&s=google&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->product->name; ?>&content=&lng=vi"><img src="components/com_products/images/googlebuzz-icon.gif" alt"" /></a>
                    <a target="_blank" class="myspace" title="Chia sẻ mục này qua MySpace" href="//www.addthis.com/bookmark.php?pub=berrysg&v=250&source=tbx-250&tt=0&s=myspace&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->product->name; ?>&content=&lng=vi"><img src="components/com_products/images/myspace-icon.gif" alt"" /></a>
                    <a target="_blank"  class="twitter" title="Chia sẻ mục này qua Twitter" href="//www.addthis.com/bookmark.php?pub=chuongvm&v=250&source=tbx-250&tt=0&s=twitter&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->product->name; ?>&content=&lng=en"><img src="components/com_products/images/twitter-icon.gif" alt"" /></a>
                    <a target="_blank" class="faceb" href="http://www.facebook.com/share.php?u=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>" title="Chia sẻ mục này qua Facebook"><img src="components/com_products/images/facebook-icon.gif" alt"" /></a>
                </span>