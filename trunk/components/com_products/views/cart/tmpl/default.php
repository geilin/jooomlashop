<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    tpl cart.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
$Cart = new Shopping_Cart('shopping_cart');
$msie='/msie\s(5\.[5-9]|[7]\.[0-9]*).*(win)/i';
$isIE7 =  preg_match($msie,$_SERVER['HTTP_USER_AGENT']);

?>

    <h1 class="title_page_sub head_com">Chi tiết giỏ hàng
        <span>
             <a id="print" title="In trang này" onclick="javascript:window.print(); return false;" href="#">In trang này</a>
            <script type="text/javascript">addthis_pub             = ''; addthis_logo            = '';addthis_logo_background = 'EFEFFF';addthis_logo_color      = '666699';addthis_brand           = 'hangdientu.vn';addthis_options         = 'facebook, myspace, twitter,  google';</script><a href="http://www.addthis.com/bookmark.php" onmouseover="return addthis_open(this, '', '[URL]', '[TITLE]')" onmouseout="addthis_close()" onclick="return addthis_sendto()"><img src="<?php echo JURI::base(); ?>templates/wp_hangdientu/images/share.gif" width="16" height="16" border="0" alt="" /></a><script type="text/javascript" src="http://s7.addthis.com/js/152/addthis_widget.js"></script>
        </span>
    </h1>
    <div id="module_center">
        <?php if ( $Cart->hasItems() ) { ?>
        <form action="index.php" method="get">
            <table id="cart">
            	<tr class="table-th">
            		<td>Sản Phẩm</td>
            		<td>Số Lượng</td>
            		<td>Xóa</td>
            		<td>Cập Nhật</td>
            		<td>Đơn Giá</td>
            		<td>Thành Tiền</td>
            	</tr>
            	<?php
            		$total_price = $total_price_vn = $i = 0;
            		$cartinfo = '';
            		$carts = $Cart->getItems();
            		$soluong = count($carts);
            		foreach ( $carts as $id =>$cart ) {
            			if ($cart['currency'] == 'USD') {
            				$total_price += $cart['count'] * $cart['price'];
            			} else {
            				$total_price_vn += $cart['count'] * $cart['price'];
            			}
            			$cartinfo .= $cart['name'] . ' x '. $cart['count'] . '<br/>';
            			$currency = $cart['currency']; //== 'USD' ? '$' : 'đ';
            			$i++;
            	?>

            		<tr>
            			<td>
            				<span class="item-name"><?php echo $cart['name']; ?></span>



            				<?php $filename =  ProductViewCart::getImage($cart['id'])?>

            				<?php if($filename && file_exists('images/products/thumbs/'.$filename)){
            					$image = JURI::base().'images/products/thumbs/'. $filename;
            				}else{
            					$image = JURI::base().'components/com_products/images/noimage.jpg';
            				}

            				?>
            				<img class="cart-item-preview" src="<?php echo $image;?>" width="120" height="180" />
            			</td>
            			<td class="quantity"><input type="text" maxlength="3" name="quantity[<?php echo $id; ?>]" size="3" value="<?php echo $cart['count']; ?>" tabindex="<?php echo $i; ?>" /></td>
            			<td class="remove"><input type="checkbox" name="remove[]" value="<?php echo $id; ?>" /></td>
            			<td class="update"><input type="submit" name="update" value="" class="update_cart"/></td>
            			<td class="unit_price"><?php echo number_format($cart['price']).' '.$currency; ?></td>
            			<td class="extended_price"><?php echo number_format($cart['price'] * $cart['count']).' '.$currency; ?></td>
            		</tr>
            	<?php
            		}
            	?>
            </table>
            <!-- Tong gia -->
            <p id="total_price_vn">Tổng cộng: <span><?php echo number_format($total_price_vn); ?> VNĐ</span></p>
            <input type="hidden" name="msg" value="Bạn đã cập nhật giỏ hàng thành công" />
            <input type="hidden" name="option" value="com_products" />
            <input type="hidden" name="task" value="updateCart" />

        </form>
        <?php } else { ?>
        <p class="center-warning">Chưa có sản phẩm trong giỏ hàng của quý khách</p>
        <?php } ?>
        <!-- /content mod -->
	</div>

<!-- order form -->
<?php if ( $Cart->hasItems() ) { ?>
<div class="order">
    <h3 class="order-title">GỬI ĐƠN ĐẶT HÀNG</h3>
    <form action="index.php" method="post" name="order" onsubmit="return checkOrder(this);">
        <p>
            <label><?php echo JText::_('Tên');?> <span>(*)</span></label>
            <input type="text" name="name" class="order-form-tb" />
        </p>
        <?php
            $sex = array(
            0 => array('value'=>0 , 'text'=>JText::_('Nữ')),
            1 => array('value'=>1 , 'text'=>JText::_('Nam'))
            );
        ?>
        <!-- 
        <p>
            <label><?php echo JText::_('Tên');?> <span>(*)</span></label>
            <input type="text" name="name" class="order-form-tb" />
        </p>
         -->
        <!-- 
        <p>
            <label><?php echo JText::_('Giới tính');?></label>
            <?php echo JHTML::_('select.genericlist', $sex, 'sex', 'class="order-form-tb" style="width: 100px;"'. '', 'value', 'text');?>
        </p>
         -->
        <p>
            <label><?php echo JText::_('Địa chỉ');?></label>
            <input type="text" name="address" class="order-form-tb" />
        </p>
        <p>
            <label><?php echo JText::_('Email');?><span>(*)</span></label>
            <input type="text" name="email" class="order-form-tb" />
        </p>
        <p>
            <label><?php echo JText::_('Điện thoại');?><span>(*)</span></label>
            <input type="text" name="phone" class="order-form-tb" />
        </p>
        <p>
            <input type="hidden" name="cartinfo" id="cartinfo" value="<?php echo $cartinfo; ?>" />
            <input type="hidden" name="date" value="<?php echo date( 'Y-m-d' ); ?>" />
            <input type="hidden" name="task" value="order" />
            <input type="hidden" name="option" value="<?php echo $option; ?>" />
        	Kiểu gõ:
        	<input type="radio" checked="" value="0" onfocus="setTypingMode(0);" name="optInput"/>
        	Off
        	<input type="radio" onfocus="setTypingMode(1);" value="1" name="optInput"/>
        	Telex
        	<input type="radio" value="2" onfocus="setTypingMode(2);" name="optInput"/>
        	VNI
        	<input type="radio" onfocus="setTypingMode(3);" value="3" name="optInput"/>
        	VIQR
        </p>
        <p>
            <label>Nội dung yêu cầu </label>
            <textarea name="message" onkeyup="javascript:initTyper(this);" id="message"  class="order-form-tb" cols="10" rows="10" ></textarea>
        </p>
        <p>
            <input type="submit" value="Gửi" class="order-form-bt" />
        </p>
    </form>
</div>
<? } ?>
<!-- add javacript -->
<script type="text/javascript" src="<?php echo JURI::base(); ?>templates/thoitrang/js/checkform.js"></script>
<script type="text/javascript" src="<?php echo JURI::base(); ?>components/com_products/js/jquery.color.js"></script>
<script type="text/javascript" src="<?php echo JURI::base(); ?>components/com_products/js/cart.js"></script>
<script type="text/javascript" src="<?php echo JURI::base(); ?>components/com_products/js/vietuni.js"></script>