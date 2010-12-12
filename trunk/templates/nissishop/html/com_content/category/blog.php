<?php
defined('_JEXEC') or die('Restricted access');
$cparams =& JComponentHelper::getParams('com_media');
require_once(JPATH_SITE.DS.'templates'.DS.'thoitrang'.DS.'tpl_function.php');
?>
<div id="component_header">
    <div class="component_title">
		<?php
		if ($this->params->get('show_page_title')) : ?>
		<h2 class="title_page_sub"><?php echo $this->escape($this->params->get('page_title')); ?></h2>
		<div class="h_10"></div>
		<?php endif; ?>
	</div>
</div><!-- /component_header -->


<!-- component_content -->
<div id="component_content" class="clearfix">

	<div class="block_left_ct" class="clearfix">
	<?php if ($this->params->def('show_description', 1) || $this->params->def('show_description_image', 1))
	{
	?>
		<div class="cat">
			<?php if ($this->params->get('show_description_image') && $this->category->image) : ?>
				<img src="<?php echo $this->baseurl . '/' . $cparams->get('image_path') . '/'. $this->category->image;?>" align="<?php echo $this->category->image_position;?>" hspace="6" alt="" />
			<?php endif; ?>
			<?php if ($this->params->get('show_description') && $this->category->description) echo $this->category->description; ?>
		</div><!-- /cat -->
	<?php 
	} 
		if ($this->params->get('num_leading_articles')) {
			for ($i = $this->pagination->limitstart; $i < ($this->pagination->limitstart + $this->params->get('num_leading_articles')); $i++) 
			{  			
				if ($i >= $this->total) break;
				
				$this->item =& $this->getItem($i, $this->params);
				echo $this->loadTemplate('item');
			}
		}
		else
		{
			$i = $this->pagination->limitstart;
		}

	$startIntroArticles = $this->pagination->limitstart + $this->params->get('num_leading_articles');
	$numIntroArticles = $startIntroArticles + $this->params->get('num_intro_articles');
	if (($numIntroArticles != $startIntroArticles) && ($i < $this->total)) {
		$divider = '';
		for ($z = 0; $z < $this->params->get('num_columns'); $z ++)
		{
			$divider = ($z > 0) ? " column_separator" :  ''; 
			for ($y = 0; $y < ($this->params->get('num_intro_articles') / $this->params->get('num_columns')); $y ++)
			{
				if ($i < $this->total && $i < ($numIntroArticles)){
					$this->item =& $this->getItem($i, $this->params);
					echo $this->loadTemplate('item');
					$i ++;
				}
			}
		}
	}
	?>
		<?php if ($this->params->get('num_links') && ($i < $this->total)) : ?>
			<div class="cb blog_more<?php echo $this->params->get('pageclass_sfx');?>">
			<?php
				$this->links = array_splice($this->items, $i - $this->pagination->limitstart);
				echo $this->loadTemplate('links');
			?>
			</div>
		<?php endif; ?>
		<?php if ($this->params->get('show_pagination')): ?>
			<div class="h_10"></div><div class="paging cb"><?php echo $this->pagination->getPagesLinks(); ?></div>
		<?php endif; ?>
	</div>

</div><!-- /component_content -->
<div id="component_footer"><span></span></div>

