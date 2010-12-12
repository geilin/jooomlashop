<?php
defined('_JEXEC') or die('Restricted access'); 
?>
<div class="content_warp_div">
<?php if (($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own')) && !$this->print) : ?>
<div class="contentpaneopen_edit<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
<?php echo JHTML::_('icon.edit', $this->article, $this->params, $this->access); ?>
</div>
<?php endif; ?>

<!-- component_header -->
<div id="component_header">
    <div class="component_title">
	<h2 class="title_page_sub main-content-block-title">
		<?php if ($this->params->get('show_title')) : ?>
			<?php if ($this->params->get('link_titles') && $this->article->readmore_link == '') : ?>
			<a href="<?php echo $this->article->readmore_link; ?>"	class="contentpagetitle<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
			<?php echo $this->escape($this->article->title); ?> </a> <?php else : ?>
			<?php echo $this->article->title; ?> <?php endif; ?>
		<?php endif; ?>
	</h2>
</div>
</div><!-- /component_header -->
<!-- component_content -->
<div id="component_content" class="clearfix">
<?php  
	if (!$this->params->get('show_intro')) echo $this->article->event->afterDisplayTitle;
?>

<div class="wp-current-content block_left_ct" class="clearfix">
<?php
if (
($this->params->get('show_create_date'))
|| (($this->params->get('show_author')) && ($this->article->author != ""))
|| (($this->params->get('show_section') && $this->article->sectionid) || ($this->params->get('show_category') && $this->article->catid))
|| ($this->params->get('show_pdf_icon') || $this->params->get('show_print_icon') || $this->params->get('show_email_icon'))
|| ($this->params->get('show_url') && $this->article->urls)
): ?>
<div class="article-toolswrap">
	<div class="article-tools clearfix">
		<div class="article-meta meta">
			<?php if ($this->params->get('show_create_date')) : ?>
				<span class="createdate">
					<?php echo JHTML::_('date', $this->article->created, JText::_('DATE_FORMAT_LC1')) ?>
				</span>
			<?php endif; ?>
			
			<?php if (($this->params->get('show_author')) && ($this->article->author != "")) : ?>
				<span class="createby">
					<?php JText::printf(($this->article->created_by_alias ? $this->article->created_by_alias : $this->article->author) ); ?>
				</span>
			<?php endif; ?>
			
			<?php if (($this->params->get('show_section') && $this->article->sectionid) || ($this->params->get('show_category') && $this->article->catid)) : ?>
			
			<?php if ($this->params->get('show_section') && $this->article->sectionid && isset($this->article->section)) : ?>
				<span class="article-section">			
					<?php if ($this->params->get('link_section')) : ?>
						<a href="<?php echo JRoute::_(ContentHelperRoute::getSectionRoute($this->article->sectionid));?>">
					<?php endif; ?>			
					<?php echo $this->article->section; ?>
					<?php if ($this->params->get('link_section')) : ?>
						</a>
					<?php endif; ?>					
					<?php if ($this->params->get('show_category')) : ?> - <?php endif; ?>
				</span>
			<?php endif; ?> 

			<?php if ($this->params->get('show_category') && $this->article->catid) : ?>
				<span class="article-category">
					<?php if ($this->params->get('link_category')) : ?>
						<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($this->article->catslug, $this->article->sectionid)); ?>">
					<?php endif; ?>
						<?php echo $this->article->category; ?>
					<?php if ($this->params->get('link_section')):?>
						</a>
					<?php endif; ?>
				</span>
			<?php endif; ?>
			<?php endif; ?>
		</div>
		<?php if ($this->params->get('show_pdf_icon') || $this->params->get('show_print_icon') || $this->params->get('show_email_icon')) : ?>
			<div class="buttonheading">
				<?php if (!$this->print) : ?>
				<?php if ($this->params->get('show_email_icon')) : ?>
				<span> 
				<?php echo JHTML::_('icon.email',  $this->article, $this->params, $this->access); ?>
				</span> 
				<?php endif; ?> 
				<?php if ( $this->params->get( 'show_print_icon' )) : ?>
				<span> 
				<?php echo JHTML::_('icon.print_popup',  $this->article, $this->params, $this->access); ?>
				</span> 
				<?php endif; ?> <?php if ($this->params->get('show_pdf_icon')) : ?>
				<span> 
				<?php echo JHTML::_('icon.pdf',  $this->article, $this->params, $this->access); ?>
				</span> 
				<?php endif; ?> 
				<?php else : ?> 
				<span>
					<?php echo JHTML::_('icon.print_screen',  $this->article, $this->params, $this->access); ?>
				</span>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php if ($this->params->get('show_url') && $this->article->urls) : ?>
			<span class="article-url"> 
				<a href="http://<?php echo $this->article->urls ; ?>" target="_blank"><?php echo $this->article->urls; ?></a>
			</span>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>

<?php echo $this->article->event->beforeDisplayContent; ?>

<div class="article-content">
	<?php if (isset ($this->article->toc)) echo $this->article->toc; ?>
	<?php echo $this->article->text; ?>
</div>

<?php if ( intval($this->article->modified) !=0 && $this->params->get('show_modify_date')) : ?>
	<span class="modifydate">
	<?php echo JText::_( 'Last Updated' ); ?> ( <?php echo JHTML::_('date', $this->article->modified, JText::_('DATE_FORMAT_LC2')); ?> )
	</span>
<?php endif; ?>
<?php echo $this->article->event->afterDisplayContent; ?>
</div>
</div>
</div><!-- /component_content -->
<div id="component_footer"><span></span></div>
