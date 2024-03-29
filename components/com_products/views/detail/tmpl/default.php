<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    tpl detail.
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 
$tmpl_path = JURI::base().'templates/bbsaigon/';




?>
<link type="text/css" media="screen" rel="stylesheet" href="<?php echo $tmpl_path; ?>js/zoombox/zoombox.css" />
<script src="<?php echo $tmpl_path; ?>js/jquery.zoombox-min.js" type="text/javascript"></script>
<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery("a[rel='product']").colorbox();
			});
</script>
<!-- javascript for tab -->
		<script type="text/javascript" charset="utf-8">
                jQuery(function () {
                        var tabContainers = jQuery('div.tabs > div');
                        tabContainers.hide().filter(':first').show();
                        jQuery('div.tabs ul.tabNavigation span').click(function () {
                                tabContainers.hide();
                                tabContainers.filter(jQuery(this).attr('rel')).show();
                                jQuery('div.tabs ul.tabNavigation span').removeClass('selected');
                                jQuery(this).addClass('selected');
                                return false;
                        }).filter(':first').click();
                });
				function toggle(id) {				
					jQuery('.article'+id).toggle();
					if (jQuery('.article'+id).css('display') == 'block') {
						 jQuery('#fix_htab').hide();
					} else {
						 jQuery('#fix_htab').show();
					}
					jQuery('.border_tab_div .article_head a').removeClass('blue');
					jQuery('.a_art_'+id).addClass('blue');
					for (i=1; i <= 5; i++){
						if (i != id){
						jQuery('.article'+i).hide();
						}
					}					
				}
        </script>
        
        

<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#gallery-slider').cycle({
			fx:     'turnDown',
			speed:  'fast',
			timeout: 0,
			pager:  '#nav-gallery ul',

			// callback fn that creates a thumbnail to use as pager anchor
			pagerAnchorBuilder: function(idx, slide) {
				return '<li><a href="#"><img src="' + slide.src + '" width="50" height="50" /></a></li>';
			}
		});
	});

</script>

<div id="pro_detail">
	<!-- thong tin san pham -->
	<div id="intro_pro_detail">
        <div id="wp_pathway">
            <h2 class="product_title"><?php echo $this->product->name; ?>
            	<!-- 
                <span>
                    <a target="_blank" class="buzz" title="Lưu vào Google Bookmark" href="//www.addthis.com/bookmark.php?pub=berrysg&v=250&source=tbx-250&tt=0&s=google&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->product->name; ?>&content=&lng=vi"><img src="components/com_products/images/googlebuzz-icon.gif" alt"" /></a>
                    <a target="_blank" class="myspace" title="Chia sẻ mục này qua MySpace" href="//www.addthis.com/bookmark.php?pub=berrysg&v=250&source=tbx-250&tt=0&s=myspace&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->product->name; ?>&content=&lng=vi"><img src="components/com_products/images/myspace-icon.gif" alt"" /></a>
                    <a target="_blank"  class="twitter" title="Chia sẻ mục này qua Twitter" href="//www.addthis.com/bookmark.php?pub=chuongvm&v=250&source=tbx-250&tt=0&s=twitter&url=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>&title=<?php echo $this->product->name; ?>&content=&lng=en"><img src="components/com_products/images/twitter-icon.gif" alt"" /></a>
                    <a target="_blank" class="faceb" href="http://www.facebook.com/share.php?u=<?php echo 'http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>" title="Chia sẻ mục này qua Facebook"><img src="components/com_products/images/facebook-icon.gif" alt"" /></a>
                </span>
               -->
            </h2>
        </div>
		<div class="pro_img">
			<div class="pro_img_wrap" align="center">
			
				
				<div id="gallery-slider">
					<?php $ii =0;?>
                    <?php if(!empty($this->images)){?>
                        <?php foreach($this->images as $image) : ?>
                        <?php if(file_exists('images/products/thumbs/'.$image->filename)){?>
                            <img src="<?php echo JURI::base(); ?>images/products/thumbs/<?php echo $image->filename?>"	alt=""	title="" width="120" height="180" />
                           
                        <?php }?> 
                        <?php if($ii==2) break;?>
                        <?php $ii++;?>
                        <?php endforeach ?>
                    <?php }else{ ?>
                    <img src="<?php echo JURI::base(); ?>components/com_products/images/noimage.jpg" alt="" width="150" height="190"/>
                    <?php } ?>
				</div>
			
				<!--
				<?php if ($this->imgDefault->filename && file_exists('images/products/thumbs/'.$this->imgDefault->filename)) { ?>
					<a href="<?php echo JURI::base(); ?>images/products/<?php echo $this->imgDefault->filename; ?>" rel="product" class="zoom_pro_i" >
						<img src='<?php echo JURI::base(); ?>images/products/thumbs/<?php echo $this->imgDefault->filename; ?>' alt="<?php echo $this->product->name; ?>"  width="150" height="180"/>
					</a>
				<?php }else{ ?>
					<img src='<?php echo JURI::base(); ?>components/com_products/images/noimage.jpg' alt="<?php echo $this->product->name; ?>"  width="150" height="180" />
				<?php } ?>
				-->
			</div>
			<?php if (!empty($this->product->saleprice)) {?>
			<p class="prices"><?php echo number_format($this->product->saleprice).' '.$this->product->currency;  ?></p>
			<?php } ?>

            <?php $jj=0;?>
            <?php foreach($this->images as $img) : ?>
            <?php if($jj ==0){
            	$class = 'theFirst';
            }else{
            	$class = 'theSeconce';
            }?>
            <a rel="product" class="zoom_pro_i <? echo $class; ?>" title="Xem ảnh lớn"	href="<?php echo JURI::base(); ?>images/products/<?php echo $img->filename ?>">Xem ảnh lớn</a>
            <?php	$jj++;	?>
            <?php endforeach ?>
		</div>
		<div class="pro_desc">
            <table>
                <?php if (!empty($this->product->intro)) {?>
                <tr>
                    <td class="fea_title">Mô tả sản phẩm:</td>
                    <td class="fea-detail"><?php echo $this->product->intro; ?></td>
                </tr>
                <?php } ?>
               
          
                <tr>
                    <td class="fea_title">Số lượt xem:</td>
                    <td  class="fea-detail"><?php echo $this->product->hits; ?> lần <span class="small_text">(kể từ ngày <?php $date = new DateTime($this->product->date); echo $date->format('d/m/Y'); ?>)</span></td>
                </tr>

                <tr style="border: none" >
                    <td colspan="2">
                        <div class="product_cart">
                        	<form action="#" method="POST" name="addToCart" id="addToCart">
                        		Số lượng: <input type="text" name="amount" id="amount" value="1" size="5" class="amount">
                        		<input type="hidden" id="productId" name="productId" value="<?php echo $this->product->id; ?>" />
                                <p>
                                    <a class="addcart product_cart_bt" href="javascript:addCart()" /><?php echo JText::_('Đặt hàng');?></a>
                            		<a class="viewcart product_cart_bt" href="<?php echo JRoute::_('index.php?option=com_products&view=cart');?>"/><?php echo JText::_('Giỏ hàng');?></a>
                                </p>
                        		<!-- <input type ="submit" value="add" name="addCart" id="addCart"/> -->
                        	</form>
                        </div>
                    </td>
                </tr>
            </table>
		</div>
		<?php if(count($this->images)>1){?>
        <div id="nav-gallery">
            <ul></ul>
        </div>
        <?php } ?>
	</div>

<!-- END DETAIL INFO -->

<?php echo $this->loadTemplate('phukien'); ?>
<!-- bat dau cac thong tin trong tabs -->
    <div class="tabs" id="tabs">
        <ul class="tabNavigation" >
		<?php 
			if ($this->product->shortdesc)
           		echo '<li><span rel="#first" class="tab thongtin_tab">Thông tin chi tiết</span></li>';
			if (!empty($this->images11))	
				echo '<li><span rel="#second" class="tab hinhanh_tab">Hình ảnh</span></li>';
			if (!empty($this->properties))	
				echo '<li><span rel="#six" class="tab hinhanh_tab">Thuộc Tính</span></li>';
			 if (!empty($this->articles))
				echo '<li><span rel="#third" class="tab hinhanh_tab">Bài viết</span></li>';			
           		
		?>
        </ul>
        <!-- FIRST TAB CT -->
	        <div id="first" class="tab_div">
				<div class="tab_div_r">
					<div class="border_tab_div">
					<?php echo $this->product->shortdesc; ?>
				   <?php //echo $this->loadTemplate('infotbl'); ?>
				   </div>
				</div>
	        </div>
        <!-- END: FIRST TAB CT -->
        <div id="second" align="center" class="tab_div">
		<div class="tab_div_r">
			<div class="border_tab_div">
				<?php echo $this->loadTemplate('imgtab'); ?>
			</div>	
		</div>
        </div>
        <!--  Tab video -->
        <div id="six" align="center" class="tab_div">
		<div class="tab_div_r">
			<div class="border_tab_div">
			
				<?php echo $this->loadTemplate('properties'); ?>
			</div>	
		</div>
        </div>
        
        
        <div id="third" class="tab_div">
		<div class="tab_div_r">
            <div class="border_tab_div">

				<?php
				if (!empty($this->articles)){
					$i = 0;
					foreach ($this->articles as $article) {
						$date = new DateTime($article->date);						
						$article->date = $date->format('d/m/Y');
						$i++;
						echo '<p class="article_head"><a class="a_art_'.$i.'" onclick="toggle('.$i.');" href="javascript:void(0)">'.$article->title.'</a> <span class="small_text">('.$article->date.')</span></p>';
					}
					$i = 0;
					foreach ($this->articles as $article) {	
						$i++;
						echo '<div style="display: none" class="article'.$i.'">
									<div class="sep_news clearfix"></div>
									<div style="padding:0; margin:0; height:11px;"></div>
									<h2 class="contentheading">'.$article->title.'</h2>
									<div class="h_10"></div>';
						if($article->fulltext != ''){
							echo $article->fulltext;
						}else{
							echo $article->introtext;
						}
						echo '</div>';
					}
				}
				?>
				<div id="fix_htab" style="height:4px;"></div>						
			</div>
		</div>
        </div>
		<div id="five" class="tab_div">
		<div class="tab_div_r">
            <div class="border_tab_div">
				<?php 
				if (!empty($this->product->video)) {
					echo $this->product->video;
				}
				?>
			</div>
		</div>
        </div>
        <!-- tab comment-->
		
		
		<!-- end tab 4 -->
    </div>
<!-- ket thuc cac thong tin trong tabs -->
</div>

<script type="text/javascript" src="<?php echo JURI::base(); ?>components/com_products/js/vietuni.js"></script>
<script type="text/javascript" src="<?php echo JURI::base(); ?>components/com_products/js/cart.js"></script>
<script type="text/javascript" src="<?php echo JURI::base(); ?>templates/bbsaigon/js/checkform.js"></script>