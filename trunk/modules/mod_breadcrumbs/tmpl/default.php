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
