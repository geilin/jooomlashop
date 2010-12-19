<?php
	defined( '_JEXEC' ) or die( 'Restricted access' ); 
	$editor =& JFactory::getEditor();
	JHTML::_('behavior.calendar');
	global $option;		
?>
<script type="text/javascript" src="<?php echo JURI::root()?>components/com_products/js/ajaxupload.3.5.js"></script>
<link rel="stylesheet" href="<?php echo JURI::root()?>components/com_products/css/admin_product_form.css" type="text/css" />	


<script type="text/javascript" >
	jQuery(function(){
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
				status.text('Uploading...');
			},
			responseType: 'json',
			onComplete: function(file, response){
				status.text(''); //clear the status				
				if( response.error === false ){					
					jQuery('<li></li>').addClass('product_image').appendTo('#image_list').html('<img src="<?php echo JURI::root()?>images/products/thumbs/'+response.file+'" alt="'+response.file+'" />');					
					jQuery('<input type="hidden" name="filename[]" value="'+response.file+'" />').appendTo('#image_list');
				} else{
					alert(response.message);
					jQuery('<li></li>').appendTo('#image_list').text(response.file).addClass('error');
				}
			}
		});
		//jQuery('.product_image').hover (function(e) { jQuery(this).addClass('hover'); }, function(e) { jQuery(this).removeClass('hover'); });
		jQuery('#image_<?php echo $this->product->image; ?> span.button_default_image:first').addClass('default_image_checked');
		
		
	});
	
	function delImage(id,filename,proid){
		var id= id;
		var urlx = '<?php echo JURI::base()?>index.php?option=com_products&controller=product&task=delImg&imgId='+id+'&imgName='+filename+'&proid='+proid;
		jQuery.ajax({ url: urlx,
			success: function(date){
				jQuery('#image_'+id).remove();
			}
		});		
		return false;
	}
	function productDefaultImage(id) {
		jQuery('span.button_default_image').removeClass('default_image_checked');		
		jQuery('#image').val(id);	
		jQuery('#image_'+id+' span.button_default_image:first').addClass('default_image_checked');
	}
	
</script>

	<div id="upload_area">		
		<div id="upload" ><span>Thêm hình</span></div><span id="status" ></span>
		<ul id="files"></ul>
	
	
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
							<a href="#" onclick ="delImage('<?php echo $img->id;?>','<?php echo $img->filename;?>','<?php echo $img->proid;?>'); return false;" title="Xoá hình này">
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