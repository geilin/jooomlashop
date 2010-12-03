<script type="text/javascript" src="<?php echo JURI::root()?>components/com_products/js/ajaxupload.3.5.js"></script>

<style>
<!--
#upload{
	margin:30px 200px; padding:15px;
	font-weight:bold; font-size:1.3em;
	font-family:Arial, Helvetica, sans-serif;
	text-align:center;
	background:#f2f2f2;
	color:#3366cc;
	border:1px solid #ccc;
	width:150px;
	cursor:pointer !important;
	-moz-border-radius:5px; -webkit-border-radius:5px;
}
.darkbg{
	background:#ddd !important;
}
#status{
	font-family:Arial; padding:5px;
}
ul#files{ list-style:none; padding:0; margin:0; }
ul#files li{ padding:10px; margin-bottom:2px; width:200px; float:left; margin-right:10px;}
ul#files li img{ max-width:180px; max-height:150px; }
.success{ background:#99f099; border:1px solid #339933; }
.error{ background:#f0c6c3; border:1px solid #cc6622; }
-->
</style>

<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view picture.
*/

defined( '_JEXEC' ) or die( 'Restricted access' ); 
		$editor =& JFactory::getEditor();
		JHTML::_('behavior.calendar');
		global $option;		
?>

<script type="text/javascript" >
	jQuery(function(){
		var btnUpload=jQuery('#upload');
		var status=jQuery('#status');
		new AjaxUpload(btnUpload, {
			action: '<?php echo JURI::base()?>/components/com_products/helpers/upload.php',
			name: 'uploadfile',
			onSubmit: function(file, ext){
				 if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
                    // extension is not allowed 
					status.text('Only JPG, PNG or GIF files are allowed');
					return false;
				}
				status.text('Uploading...');
			},
			onComplete: function(file, response){
				//On completion clear the status
				status.text('');
				
				//Add uploaded file to list
				if(response==="success"){
					
					jQuery('<li></li>').appendTo('#files').html('<img src="<?php echo JURI::root()?>images/products/'+file+'" alt="" />'+file).addClass('success');
					jQuery('<input type="hidden" name="filename[]" value="'+file+'" />').appendTo('#files');
				} else{
					jQuery('<li></li>').appendTo('#files').text(file).addClass('error');
				}
			}
		});
		
	});
</script>
	<table class="admintable">
	<tr>
		<td width="100" align="right" class="key">
			Upload hình:
		</td>
		<td>
			<div id="upload" ><span>Chọn file</span></div><span id="status" ></span>
			<ul id="files" ></ul>
		</td>
				<!-- Upload Button, use any id you wish-->
		
		
	</tr>
	 <tr>
		<td width="100" align="right" class="key">
			Thumbnail:
		</td>
		<td>
			<table>
				<tbody>
					<?php 
						if($this->product->images)
						{	
							foreach ($this->product->images as $img){
					?>
						<tr>
							<td>
								<img src="<?php echo JURI::root()?>/images/products/<?php echo $img->filename?>" width="200">
							</td>
							<td valign="middle">
								<a href="#" onclick="document.getElementById('imgId').value=<?php echo $img->id?>;document.getElementById('imgName').value='<?php echo $img->filename?>';submitbutton('delImg')">[Xóa hình]</a>
							</td>
						</tr>
					<?php 
							}	
						}
					?>
				</tbody>
			</table>
		</td>
	</tr>

	</table>