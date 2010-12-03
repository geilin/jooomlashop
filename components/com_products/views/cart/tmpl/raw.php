<?php 
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    tpl raw cart.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
session_start();
$Cart = new Shopping_Cart('shopping_cart');
if ($Cart->hasItems()){
?>

	<ul class="cart_list_item">
	<?php 
	$total_price = 0;
	$total_price_vn = 0;
	foreach ( $Cart->getItems() as $id =>$cart ) {
			if ($cart['currency'] == 'USD') {
				$total_price += $cart['count'] * $cart['price'];
			} else {
				$total_price_vn += $cart['count'] * $cart['price'];
			}
		
		echo '<li><p><span class="count" >'.$cart['count']. '</span> x <span>'.$cart['name'].'</span></p>';
		echo '<p class="prices">' .number_format($cart['count'] * $cart['price']) .' '. $cart['currency'] . '</p>';
		echo '</li>';
		}
	?>
	</ul>
	<p class="total_price">Tổng cộng: <span id="total_price_vn_mod"><?php echo number_format($total_price_vn); ?> VNĐ</span></p>
	
	<a class="check_out_bt" href="<?php echo JRoute::_('index.php?option=com_products&view=cart');?>"><?php echo JText::_('Thanh Toán');?></a>



	<?php 
		} else {
			echo '<p class="empty">Mời quý khách hàng chọn Sản phẩm</p>';
		}
	?>
	
	
