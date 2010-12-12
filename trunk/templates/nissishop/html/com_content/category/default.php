<?php
defined('_JEXEC') or die('Restricted access'); 
?>

<div id="component_header">
    <div class="component_title">
	<?php if ($this->params->get('show_page_title')) : ?>
	<h2
		class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
	<span><?php echo $this->category->title; ?></span></h2>
	<?php endif; ?>
	</div>
</div><!-- /component_header -->
<!-- component_content -->
<div id="component_content" class="clearfix">
	<div class="category_desc<?php echo $this->params->get( 'pageclass_sfx' ); ?>" colspan="2">
		<?php if ($this->category->image) : ?> 
		<img src="images/stories/<?php echo $this->category->image;?>" align="<?php echo $this->category->image_position;?>" hspace="6" alt="<?php echo $this->this->category->image;?>" /> 
		<?php endif; ?> 
		<?php echo $this->category->description; ?>
	</div>

	<div class="category_article">
	<?php
	$this->items =& $this->getItems();
	echo $this->loadTemplate('items');
	?> 
	<?php
	if ($this->access->canEdit || $this->access->canEditOwn) :
		echo JHTML::_('icon.create', $this->category  , $this->params, $this->access);
	endif;
	?>
	</div>
</div><!-- /component_content -->
<div id="component_footer"><span></span></div>