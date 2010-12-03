<?php
/**
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<title><?php echo $this->error->code ?> - <?php echo $this->title; ?></title>
	<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/error.css" type="text/css" />
    <style>
		#outlinewp h3 { font-size:16px;
						background:#3366cc;
						color:#FFFFFF;
						padding:4px;
						 }
		#outlinewp {			width:600px;
						margin:auto;
						}
		#outlinewp div#errorboxbody { color:#0095c5; }
		.msg_er  a { color:#3366cc; 
					 text-decoration:none;
					 font-size:12px;
			}
		.msg_er  a:hover {
			text-decoration:underline;
		}
		h3.er_title {
			margin:0 0 20px 0;
			padding:0;
		 }
	</style>
    
</head>
<body>
	<div align="center">
		<div id="outlinewp">
		<div id="errorboxoutlinewp">
			<div id="errorboxbody">
				
				<h3 class="er_title"><?php echo $this->error->code ?> - Thông báo lỗi <!--<?php //echo $this->error->message ?>--></h3>
					<p style="font-size:12px; text-align:center; color:#5b5b5b;" class="msg_er">
						Bạn đã vào không đúng liên kết, vui lòng quay lại <a href="<?php echo JURI::base(); ?>" >Trang chủ</a>
					</p>
			</div>
		</div>
		</div>
		</div>
	</div>
</body>
</html>
