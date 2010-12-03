<?php // no direct access
/*------------------------------------------------------------------------* @version		1.0* @package		Component Product* @copyright	Wampvn Group* @license		GNU/GPL* @website          http://wampvn.com* @description    template show order from-------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access');
$cparams =& JComponentHelper::getParams('com_media');
require_once(JPATH_SITE.DS.'templates'.DS.'thoitrang'.DS.'tpl_function.php');
?>
<?php
// TITLE PAGE
if ($this->params->get('show_page_title')) : ?>
<h1 class="title_page_sub"><?php echo $this->escape($this->params->get('page_title')); ?></h1>
<div class="h_10"></div>
<?php
endif;
// -----------------------------------------------------------------------------------------
?>
<div class="block_left_ct" class="clearfix"><?php if ($this->params->def('show_description', 1) || $this->params->def('show_description_image', 1)) :?>
<div class="cat"><?php if ($this->params->get('show_description_image') && $this->category->image) : ?>
<img
	src="<?php echo $this->baseurl . '/' . $cparams->get('image_path') . '/'. $this->category->image;?>"
	align="<?php echo $this->category->image_position;?>" hspace="6" alt="" />
<?php endif; ?> <?php if ($this->params->get('show_description') && $this->category->description) : ?>
<?php echo $this->category->description; ?> <?php endif; ?></div>
<?php endif; ?> <?php if ($this->params->get('num_leading_articles')) : ?>
<?php for ($i = $this->pagination->limitstart; $i < ($this->pagination->limitstart + $this->params->get('num_leading_articles')); $i++) : ?>
<?php if ($i >= $this->total) : break; endif; ?> <?php
$this->item =& $this->getItem($i, $this->params);
echo $this->loadTemplate('item');
?> <?php endfor; ?> <?php else : $i = $this->pagination->limitstart; endif; ?>

<?php
$startIntroArticles = $this->pagination->limitstart + $this->params->get('num_leading_articles');
$numIntroArticles = $startIntroArticles + $this->params->get('num_intro_articles');
if (($numIntroArticles != $startIntroArticles) && ($i < $this->total)) : ?>
<?php
$divider = '';
for ($z = 0; $z < $this->params->get('num_columns'); $z ++) :
if ($z > 0) : $divider = " column_separator"; endif; ?> <?php for ($y = 0; $y < ($this->params->get('num_intro_articles') / $this->params->get('num_columns')); $y ++) :
if ($i < $this->total && $i < ($numIntroArticles)) :
$this->item =& $this->getItem($i, $this->params);
echo $this->loadTemplate('item');
$i ++;
endif;
endfor; ?> <?php endfor; ?> <?php endif; ?> <?php if ($this->params->get('num_links') && ($i < $this->total)) : ?>
<div
	class="cb blog_more<?php echo $this->params->get('pageclass_sfx') ?>">
<?php				$this->links = array_splice($this->items, $i - $this->pagination->limitstart);				echo $this->loadTemplate('links');			?>
</div>
<?php endif; ?> <?php if ($this->params->get('show_pagination')) {?>
<div class="h_10"></div>
<div class="paging cb"><?php echo $this->pagination->getPagesLinks(); ?>
</div>
<?php } ?></div>

