<?php // no direct access
defined('_JEXEC') or die('Restricted access');
$count_articles	= intval($params->get('count', 5));
?>
<?php
$count = count($list);
$link_to_cat = $list[0]->catslug;
$link_to_section = $list[0]->section;
if ($count > 0) { ?>

<div class="wrp_img"><a href="<?php echo $list[0]->link; ?>"> <img
	alt="image" src="<?php echo $list[0]->img; ?>"> </a></div>
<div class="wrp_content"><a class="title_news"
	href="<?php echo $list[0]->link; ?>"> <?php echo $list[0]->text; ?> </a>
<p><?php
$word_nb = 15;
$text_arr = explode(" ", $list[0]->fulltext);
if ( count($text_arr) > intval($word_nb) ) {
	$list[0]->fulltext = implode(" ", array_slice($text_arr, 0, $word_nb)).' ...';
}
echo $list[0]->fulltext;
?></p>
<a href="<?php echo $list[0]->link; ?>" class="view"><?php echo JText::_('READMORE') ?></a>
</div>
<div class="clr"></div>

<?php
unset($list[0]);
if (count($list)>0) {
	?>
<ul class="nav_news_orther">
<?php
foreach ($list as $item) {
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









