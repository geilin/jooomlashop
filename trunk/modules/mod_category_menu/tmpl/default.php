<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

?>
<?php  if ( $categories ): ?>
	<ul class="menu">
		<?php foreach($categories as $id => $name):?>
		<?php if  ( $catid == $id ) :?>
		<li class="active">
			<a href="<?php echo JRoute::_('index.php?option=com_products&view=category&catid=' . $id);?>"><?php echo $name; ?></a>
		</li>
		<?php else: ?>
		<li>
			<a href="<?php echo JRoute::_('index.php?option=com_products&view=category&catid=' . $id);?>"><?php echo $name; ?></a>
		</li>		
		<?php endif; ?>
		
		<?php endforeach;?>
	<ul class="menu"> 
 <?php endif;?>