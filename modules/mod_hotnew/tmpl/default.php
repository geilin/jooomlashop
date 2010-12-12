<?php // no direct access
defined('_JEXEC') or die('Restricted access'); 
?>
<h3 class="block-right-title">Tin tức</h3>
<?php foreach ($product as $i => $item) 	{ ?>
		
        <p>
            <a href="<?php echo $item->link; ?>">
            	<?php if($item->img){ ?>
					<img src="<?php echo $item->img; ?>"  width="55" height="55"/>
				<?php }else{ ?>
					<img src="images/noimage.jpg"  width="55" height="55"/>
				<?php } ?>
			</a>
            <a href="<?php echo $item->link; ?>">
				<?php 
					$word_nb = 12;
					$text_arr = explode(" ", $item->text);
					if ( count($text_arr) > intval($word_nb) ) {
							$item->text = implode(" ", array_slice($text_arr, 0, $word_nb)) .'...';
					}
					echo $item->text;
				?>
			</a>
        </p>

<?php }?>	

</table>




