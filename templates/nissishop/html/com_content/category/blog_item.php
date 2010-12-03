<?php // no direct access/** @version		1.0* @package		Component Product* @copyright	Wampvn Group* @license		GNU/GPL* @website          http://wampvn.com* @description    template show order from*/
defined('_JEXEC') or die('Restricted access'); 
?>

<?php if ($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own')) : ?>
	<div class="contentpaneopen_edit<?php echo $this->item->params->get( 'pageclass_sfx' ); ?>" style="float: left;">
		<?php echo JHTML::_('icon.edit', $this->item, $this->item->params, $this->access); ?>
	</div>
<?php endif;
/// ADMIN TOOL
 ?>

<div class="contentpaneopen<?php echo $this->item->params->get( 'pageclass_sfx' ); ?>">

<?php  if (!$this->item->params->get('show_intro')) :	echo $this->item->event->afterDisplayTitle;endif; ?>



<?php echo $this->item->event->beforeDisplayContent; ?>
<!-- ITEM CONTENT WARP -->
<div class="art_item_warp">
<?php
// SHOW ICON
if (
($this->item->params->get('show_create_date'))
|| (($this->item->params->get('show_author')) && ($this->item->author != ""))
|| (($this->item->params->get('show_section') && $this->item->sectionid) || ($this->item->params->get('show_category') && $this->item->catid))
|| ($this->item->params->get('show_pdf_icon') || $this->item->params->get('show_print_icon') || $this->item->params->get('show_email_icon'))
|| ($this->item->params->get('show_url') && $this->item->urls)
) :
?>
<div class="article-toolswrap"><div class="article-tools clearfix"><div class="article-meta">
<?php if (($this->item->params->get('show_section') && $this->item->sectionid) || ($this->item->params->get('show_category') && $this->item->catid)) : ?>
	<?php if ($this->item->params->get('show_section') && $this->item->sectionid && isset($this->item->section)) : ?>
	<span class="article-section">
		<?php if ($this->item->params->get('link_section')) : ?>
			<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getSectionRoute($this->item->sectionid)).'">'; ?>
		<?php endif; ?>
		<?php echo $this->item->section; ?>
		<?php if ($this->item->params->get('link_section')) : ?>
			<?php echo '</a>'; ?>
		<?php endif; ?>
			<?php if ($this->item->params->get('show_category')) : ?>
			<?php echo ' - '; ?>
		<?php endif; ?>
	</span>
	<?php endif; ?>
	<?php if ($this->item->params->get('show_category') && $this->item->catid) : ?>
	<span class="article-category">
		<?php if ($this->item->params->get('link_category')) : ?>
			<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug, $this->item->sectionid)).'">'; ?>
		<?php endif; ?>
		<?php echo $this->item->category; ?>
		<?php if ($this->item->params->get('link_section')) : ?>
			<?php echo '</a>'; ?>
		<?php endif; ?>
	</span>
	<?php endif; ?>
<?php endif; ?>
</div>

<?php if ($this->item->params->get('show_pdf_icon') || $this->item->params->get('show_print_icon') || $this->item->params->get('show_email_icon')) : ?>
<div class="buttonheading">
	<?php if ($this->item->params->get('show_email_icon')) : ?>
	<span>
	<?php echo JHTML::_('icon.email', $this->item, $this->item->params, $this->access); ?>
	</span>
	<?php endif; ?>

	<?php if ( $this->item->params->get( 'show_print_icon' )) : ?>
	<span>
	<?php echo JHTML::_('icon.print_popup', $this->item, $this->item->params, $this->access); ?>
	</span>
	<?php endif; ?>

	<?php if ($this->item->params->get('show_pdf_icon')) : ?>
	<span>
	<?php echo JHTML::_('icon.pdf', $this->item, $this->item->params, $this->access); ?>
	</span>
	<?php endif; ?>
</div>
<?php endif; ?>

<?php if ($this->item->params->get('show_url') && $this->item->urls) : ?>
	<span class="article-url">
		<a href="http://<?php echo $this->item->urls ; ?>" target="_blank">
			<?php echo $this->item->urls; ?></a>
	</span>
<?php endif; ?>
</div>
</div>
<?php endif; 
// END SHOW ICON?>

<?php	$image = getImgTag($this->item);	$intro_text = clearTag($this->item, 57);	?>	
	<div class="art_pic">		
		<a href="<?php echo $this->item->readmore_link; ?>" class="contentpagetitle<?php echo $this->item->params->get( 'pageclass_sfx' ); ?>">			
<?php //echo $image;?>		
<?php if($image){?>
			<img src="<? echo $image; ?>"   alt="<?php echo $this->item->title; ?>" title="<?php echo $this->item->title; ?>" />
		<?php }else{?>
			<img src="images/noimage.jpg"   alt="<?php echo $this->item->title; ?>" title="<?php echo $this->item->title; ?>" />
		<?php } ?>
		</a>	
				
	</div>	
	<div class="art_text">
			<?php if ($this->item->params->get('show_title')) : ?>		
				<h2 class="article_title<?php echo $this->item->params->get( 'pageclass_sfx' ); ?>">			
						<?php if ($this->item->params->get('link_titles') && $this->item->readmore_link != '') : ?>			
							<a href="<?php echo $this->item->readmore_link; ?>" class="contentpagetitle<?php echo $this->item->params->get( 'pageclass_sfx' ); ?>">				
								<?php echo $this->item->title; ?>			
							</a>			
						<?php else : ?>				
							<a href="<?php echo $this->item->readmore_link; ?>" class="contentpagetitle<?php echo $this->item->params->get( 'pageclass_sfx' ); ?>">				
								<?php echo $this->item->title; ?>			
							</a>			
						<?php endif; ?>		
				</h2>		
			<?php endif; ?>				
			<div class="art_meta">	
				<?php if ( intval($this->item->modified) != 0 && $this->item->params->get('show_modify_date')) : ?>	
					<span class="modifydate">		
						<?php echo JHTML::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC1')); ?>	
					</span>	
				<?php endif; ?>			
				<?php if ($this->item->params->get('show_create_date')) : ?>				
					<span class="createdate">					
						<?php echo JHTML::_('date', $this->item->created, JText::_('DATE_FORMAT_LC2')); ?>				
					</span>			
				<?php endif; ?>			
				<?php if (($this->item->params->get('show_author')) && ($this->item->author != "")) : ?>
					<span class="createby">					
						<?php JText::printf(($this->item->created_by_alias ? $this->item->created_by_alias : $this->item->author) ); ?>				
					</span>			
				<?php endif; ?>		
			</div>				
			<div class="article-content">			
				<?php if (isset ($this->item->toc)) : ?>				
					<?php echo $this->item->toc; ?>			
				<?php endif; ?>						
				<?php echo $intro_text; ?>		
			</div>			
	</div>	
	
<!-- /////////-------------------------------------///////// -->	
	
	<!-- ///////READMORE/////////// -->	
		<?php 
			
		if ($this->item->params->get('show_readmore') && $this->item->readmore) { ?>	
			<p class="readmore_warp">	
				<a href="<?php echo $this->item->readmore_link; ?>" title="<?php echo $this->item->title; ?>" class="readon<?php echo $this->item->params->get('pageclass_sfx'); ?>">			
					<?php if ($this->item->readmore_register) : ?>				
						<?php echo JText::_('Register to read more...'); ?>			
					<?php else : ?>				
						<?php echo JText::_('Read more...'); ?>			
					<?php endif; ?>	</a>	
			</p>	
	<?php } else {  ?>
	<p class="readmore_warp">	
	<a href="<?php echo $this->item->readmore_link; ?>" title="<?php echo $this->item->title; ?>" class="readon<?php echo $this->item->params->get('pageclass_sfx'); ?>">			
	<?php echo JText::_('Read more...'); ?>	
	</a></p>
	<?php } ?>
	<span class="article_separator">&nbsp;</span>
	</div><!-- END ITEM WARP -->
</div>
<div class="clearfix"></div>	

<!-- END: ITEM CONTENT WARP -->
<?php echo $this->item->event->afterDisplayContent; ?>
