<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
?>
<div class="wpmod_warp padding_top_3">
<?php
$count = count($list); 
foreach ($list as $i => $item) { 
	$class_last = "";
	if (!($i < ($count-1))) {
		$class_last = "no_border_last";
	} 
	?>
	<div class="wp_mod_right_ct_item <?php echo $class_last; ?>">
		<?php if ($item->img) { // Co IMAGE ?>
		<div class="pic_a">
			<a class="pic_a_warp" href="<?php echo $item->link; ?>">
				<span>
				<img src="<?php echo $item->img; ?>" />
				</span>
			</a>
		</div>
		<?php } else { // No IMAGE ?>
		<div class="no_image_small">
			<a href="<?php echo $item->link; ?>" class="no_image_small_a">
				<span>NO IMAGE</span>
			</a>
		</div>
		<?php } ?>
		<div class="p_a">
			<a  href="<?php echo $item->link; ?>">
			<?php 
				$word_nb = 6;
				$text_arr = explode(" ", $item->text);
				if ( count($text_arr) > intval($word_nb) ) {
						$item->text = implode(" ", array_slice($text_arr, 0, $word_nb)) .'...';
				}
				echo $item->text;
			?>
			</a>
		</div>
		<div class="clearfix"></div>
	</div>
<?php } ?>
</div>