<?php
	defined( '_JEXEC' ) or die( 'Restricted access' ); 
	$editor =& JFactory::getEditor();
	JHTML::_('behavior.calendar');
	global $option;		
?>
<script type="text/javascript" src="<?php echo JURI::root()?>components/com_products/js/ajaxupload.3.5.js"></script>
<link rel="stylesheet" href="<?php echo JURI::root()?>components/com_products/css/admin_product_form.css" type="text/css" />
<script type="text/javascript" >
	var upload_url = '<?php echo JURI::root()?>images/products/';
	jQuery(function(){
		var productImage = '<?php echo $this->product->image; ?>';
		var btnUpload 	= jQuery('#upload');
		var status 		= jQuery('#status');
		new AjaxUpload(btnUpload, {			
            action: '<?php echo JURI::base()?>index.php?option=com_products&task=upload&format=raw',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					status.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				btnUpload.addClass('loading');
				status.text('Uploading...');
			},
			data: {'pid': '<?php echo $this->product->id; ?>'},
			responseType: 'json',
			onComplete: function(file, response){				
				btnUpload.removeClass('loading');
				status.text('');
				if( response.error === false ){
					var html = generateHTML(response);					
					jQuery('#image_list').prepend(html);					
					reInitModalBox();
					if ( productImage == '' ) {						
						productDefaultImage(response.fid);
						productImage = response.fid;
					}
					if ( response.pid == 0 ) {
						jQuery('<input type="hidden" name="images[]" value="'+response.fid+'" />').appendTo('#product_images');
					}
				} else{
					jQuery('#status').text(response.message);
				}
			}
		});
		//jQuery('.product_image').hover (function(e) { jQuery(this).addClass('hover'); }, function(e) { jQuery(this).removeClass('hover'); });
		jQuery('#image_<?php echo $this->product->image; ?> span.button_default_image:first').addClass('default_image_checked');
				
	});
	
	function delImage(id,filename){
		var button = jQuery('#image_'+id+' span.button_delete:first').addClass('loading');
		var urlx = '<?php echo JURI::base()?>index.php?option=com_products&controller=product&task=delImg&format=raw&imgId='+id+'&imgName='+filename;
		jQuery.ajax({ url: urlx,
			success: function(date){
				setTimeout(function() {
					jQuery('#image_'+id).remove();
					checkdefautlImage(id);
				}, 1000);
			}
		});		
		return false;
	}
	
	function productDefaultImage(id) {
		jQuery('span.button_default_image').removeClass('default_image_checked');		
		jQuery('#image').val(id);	
		jQuery('#image_'+id+' span.button_default_image:first').addClass('default_image_checked');
	}
	
	function generateHTML(data) {		
		var img = '<img src="'+upload_url+'thumbs/'+data.file+'" alt="'+data.file+'">';		
		var del = '<a href="javascript:void(0);" onclick="delImage('+data.fid+', \''+data.file+'\'); return false" title="Xóa hình này"><span class="button button_delete"> </span></a>';
		var zoom = '<a href="'+upload_url+data.file+'" class="modal" title="Xem hình lớn"><span class="button button_zoom"> </span></a>';
		var setdefault = '<a href="javascript:productDefaultImage('+data.fid+');" title="Chọn hình này làm hình chính cho sản phẩm"><span class="button button_default_image"> </span></a>';
		
		var div = '<div class="image_controls">'+del+zoom+setdefault+'</div>';
		var li = '<li class="product_image hover" id="image_'+data.fid+'">'+img+div+'</li>'
		return jQuery(li);
	}
	function reInitModalBox() {	
		$$('a.modal').each(function(el) {
			el.addEvent('click', function(e) {
				new Event(e).stop();
				SqueezeBox.fromElement(el);
			});
		});

	}
	
	function checkdefautlImage(id) {
		if ( id == jQuery('#image').val() ) {
			var li = jQuery('li.product_image:first');
			if ( li ) {
				var newid = li.attr('id');
				newid = parseInt(newid.replace('image_', ''));
				jQuery('#image').val(newid);
				var span = li.find('span.button_default_image:first');
				span.addClass('default_image_checked');
			}
			else 
			{
				jQuery('#image').val(0);
			}
		}
		//do nothing
	}	
	
</script>

	<div id="upload_area">		
		<span id="upload"><span>Thêm hình</span></span><span id="status"></span>
		<div class="clr"></div>
	</div>
	<div id="product_images">
		<ul id="image_list">
			<?php 
			if($this->product->images)
			{	
				foreach ($this->product->images as $img){
				?>
				<li id="image_<?php echo $img->id;?>" class="product_image hover">					
					<img src="<?php echo JURI::root()?>/images/products/thumbs/<?php echo $img->filename?>">						
						<div class="image_controls">
							<a href="#" onclick ="delImage('<?php echo $img->id;?>','<?php echo $img->filename;?>'); return false;" title="Xoá hình này">
							<span class="button button_delete"> </span>
							</a>
							<a href="<?php echo JURI::root()?>/images/products/<?php echo $img->filename?>" class="modal"  title="Xem hình lớn"><span class="button button_zoom"> </span></a>
							<a href="javascript:productDefaultImage(<?php echo $img->id;?>);" title="Chọn hình này làm hình chính cho sản phẩm"><span class="button button_default_image"> </span></a>
						</div>
				</li>
				<?php 
				}	
			}
			?>
		</ul>		
	</div>