<?php // no direct access
defined('_JEXEC') or die('Restricted access');
$count_articles	= intval($params->get('count', 5));
?>
<?php
$count = count($product);
$link_to_cat = $product[0]->catslug;
$link_to_section = $product[0]->section;
if ($count > 0) { ?>

<div class="wrp_img"><a href="<?php echo $product[0]->link; ?>"> <img
	alt="image" src="<?php echo $product[0]->img; ?>"> </a></div>
<div class="wrp_content"><a class="title_news"
	href="<?php echo $product[0]->link; ?>"> <?php echo $product[0]->text; ?> </a>
<p><?php
$word_nb = 15;
$text_arr = explode(" ", $product[0]->fulltext);
if ( count($text_arr) > intval($word_nb) ) {
	$product[0]->fulltext = implode(" ", array_slice($text_arr, 0, $word_nb)).' ...';
}
echo $product[0]->fulltext;
?></p>
<a href="<?php echo $product[0]->link; ?>" class="view"><?php echo JText::_('READMORE') ?></a>
</div>
<div class="clr"></div>

<?php
unset($product[0]);
if (count($product)>0) {
	?>
<ul class="nav_news_orther">
<?php
foreach ($product as $item) {
	?>
	<li><a href="<?php echo $item->link; ?>"><?php echo $item->text; ?></a>
	</li>
	<?php
} // END FOR
?>
</ul>
<?php
} // END UL LIST
}
?>
<?php if ($catid) { ?>
<a href="<?php echo $link_to_cat; ?>" class="xemthem"><?php echo JText::_('READMOREPLUS') ?></a>
<?php } else { ?>
<a href="<?php echo $link_to_section; ?>" class="xemthem"><?php echo JText::_('READMOREPLUS') ?></a>
<?php } ?>









