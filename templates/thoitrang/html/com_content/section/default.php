<?php // no direct access
/*------------------------------------------------------------------------
 * @version		1.0
 * @package		Component Product
 * @copyright	Wampvn Group
 * @license		GNU/GPL
 * @website          http://wampvn.com
 * @description    template show order from
 -------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access'); ?>
<?php if ($this->params->get('show_page_title')) : ?>
<h2
	class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
<span><?php echo $this->category->title; ?></span></h2>
<?php endif; ?>

<div
	class="category_desc<?php echo $this->params->get( 'pageclass_sfx' ); ?>"
	colspan="2"><?php if ($this->category->image) : ?> <img
	src="images/stories/<?php echo $this->category->image;?>"
	align="<?php echo $this->category->image_position;?>" hspace="6"
	alt="<?php echo $this->this->category->image;?>" /> <?php endif; ?> <?php echo $this->category->description; ?>
</div>

<div class="category_article"><?php
$this->items =& $this->getItems();
echo $this->loadTemplate('items');
?> <?php
if ($this->access->canEdit || $this->access->canEditOwn) :
echo JHTML::_('icon.create', $this->category  , $this->params, $this->access);
endif;
?></div>
