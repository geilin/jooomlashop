<?php
/*------------------------------------------------------------------------
 # WAMP Co., Ltd - WEB 2.0 DEVELOPMENT
 # Website: http://wampvn.com
 -------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
include_once (dirname(__FILE__).DS.'wp_tool.php');
$document =& JFactory::getDocument();
$document->setMetaData('generator', 'http://wampvn.com');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"	xml:lang="<?php echo $this->language; ?>"	lang="<?php echo $this->language; ?>">
<head>


<!-- CHART -->
<script type="text/javascript" src="http://wamp.vn/demo/bds/templates/bds_sourceland/chart/swfobject.js"></script>
<!-- AND CHART -->

<script type="text/javascript"	src="<?php echo $tmpl_path; ?>js/jquery-1.4.2.min.js"></script>
<script type="text/javascript"	src="<?php echo $tmpl_path; ?>js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="http://cloud.github.com/downloads/malsup/cycle/jquery.cycle.all.2.74.js"></script>
<script type="text/javascript"	src="<?php echo $tmpl_path; ?>js/jquery.colorbox.js"></script>
<jdoc:include type="head" />
<?php JHTML::_('behavior.mootools'); ?>

<!-- CSS -->
<link rel="stylesheet" href="<?php echo $tmpl_sys_path;?>css/system.css" type="text/css" />
<link rel="stylesheet"	href="<?php echo $tmpl_sys_path;?>css/general.css" type="text/css" />
<link rel="stylesheet" type="text/css"	href="<?php echo $tmpl_path;?>css/reset.css" />
<link rel="stylesheet" type="text/css"	href="<?php echo $tmpl_path;?>css/style.css" />
<link rel="stylesheet" type="text/css"	href="<?php echo $tmpl_path;?>css/colorbox.css" />
<!-- END: CSS -->

<!-- JS -->
<script language="javascript" type="text/javascript">
	var wp_root     = '<?php echo JURI::base(); ?>';
	var wp_path_tpl = '<?php echo $tmpl_path; ?>';
</script>
<script type="text/javascript">
     jQuery(document).ready(function() {
          jQuery('#mycarousel').jcarousel( {
            scroll : 5
          });
          jQuery('#mycarousel-up').jcarousel( {
            vertical: true,
            scroll : 1
          });
     });
</script>


<!-- END: JS -->

</head>
<body>



<div class="wp-wrapper grid980"><!-- BEGIN: HEADER -->
	<div class="wp-header">
        <div class="search-info">
        
        	<?php if( $this->countModules('search_pro')) {  ?>
				<jdoc:include type="modules" name="search_pro" style="raw" />
			<?php }else{ ?>
        
            <h3>Bibishop</h3>
            <form action="" method="post" class="search-form">
                <p>
                    <input type="text" value="" name="tb_search" class="search-tb"/>
                    <input type="submit"  class="search-button" value="Tìm"/>
                </p>
            </form>
            <?php }?>
            <p class="cart">
            	<a href="<?php echo JRoute::_('index.php?option=com_products&view=cart');?>"><?php echo JText::_('Xem gỏi hàng');?></a>
            </p><!--End .cart -->
        </div><!--End .search-info -->
        <h1 class="logo"><a href="#">Bibishop</a></h1>
        <div class="slider">
            <div class="slide item-1">
            	<?php if( $this->countModules('titletext')) {  ?>
					<jdoc:include type="modules" name="titletext" style="raw" />
				<?php } ?>
            </div>
        </div><!--End .slider -->
        <div class="main-nav">
        
        	<?php if( $this->countModules('menutop')) {  ?>
				<jdoc:include type="modules" name="menutop"	style="raw" />
			<?php } ?> 
        
        </div><!--End .main-nav -->
    </div><!--End .wp-header -->

	 <div class="wp-content">
        <!-- NEW PRODUCTS -->
        <?php if( $this->countModules('new_product')) {  ?>
			<jdoc:include type="modules" name="new_product" style="raw" />
		<?php } ?>
        <!-- END NEW PRODUCTS -->
        
        <div class="main-content">
        	 <div class="pathWay breadcrumbs">
			 	<?php if( $this->countModules('breadcrumbs')) {  ?>
					<jdoc:include type="modules" name="breadcrumbs" style="raw" />
				<?php } ?>
			 </div>
        	<jdoc:include type="message" />
        	
        	<?php if (JRequest::getVar('view') != 'frontpage') {  ?>
        		<div class="main-content-block">
					<jdoc:include type="component" />
				</div>
			<?php } ?>
        	
            <div class="block-main-content sanphamnu">
                <!-- thoi trang nu -->
                <?php if( $this->countModules('new_female')) {  ?>
					<jdoc:include type="modules" name="new_female" style="raw" />
				<?php } ?>
                <!-- end thoi trang nu -->
            </div><!--End .block-main-content -->
            
            <div class="block-main-content sanphamnam">
                <!-- thoi trang nu -->
                 <?php if( $this->countModules('new_male')) {  ?>
					<jdoc:include type="modules" name="new_male" style="raw" />
				<?php } ?>
                <!-- end thoi trang nu -->
            </div><!--End .block-main-content -->
        </div><!--End .main-content -->
        
        
        <div class="right-content">
        
        	<?php if( $this->countModules('right_cart')) {  ?>
				<jdoc:include type="modules" name="right_cart" style="leftmod" />
			<?php } ?>
        
            <div class="block-right feature">
            	 <?php if( $this->countModules('suportonline')) {  ?>
					<jdoc:include type="modules" name="suportonline" style="raw" />
				<?php } ?>
            </div><!--End .block-right .feature-->
            
            <div class="block-right news">
               <?php if( $this->countModules('right_news')) {  ?>
					<jdoc:include type="modules" name="right_news" style="raw" />
				<?php } ?>
            </div><!--End .block-right .news-->
            
            <div class="block-right phukien">
                <?php if( $this->countModules('right_phukien')) {  ?>
					<jdoc:include type="modules" name="right_phukien" style="raw" />
				<?php } ?>
            </div><!--End .block-right .phukien -->
            
            <?php if( $this->countModules('right_1')) {  ?>
				<jdoc:include type="modules" name="right_1" style="raw" />
			<?php } ?>
			<?php if( $this->countModules('right_2')) {  ?>
				<jdoc:include type="modules" name="right_2" style="raw" />
			<?php } ?>
           
        </div><!--End .right-content -->
    </div><!--End .wp-content -->

</div><!-- END: CONTENT -->

<!-- BEGIN: FOOTER -->

<div class="wp-footer">
    <div class="footer-content grid980">
        <div class="small-nav">
           	<?php if( $this->countModules('menufooter')) { ?>
				<jdoc:include type="modules" name="menufooter" style="raw" /> 
			<?php } ?>
        </div><!--End .small-nav -->
        
        <div class="info">
			<?php if( $this->countModules('footer')) { ?>
				<jdoc:include type="modules" name="footer" style="raw" /> 
			<?php } ?>
		</div><!--End .info -->
        
    </div><!--End .footer-content -->
</div><!--End .wp-footer -->

<!-- END: FOOTER -->
<script type="text/javascript">
	// <![CDATA[		
	var so = new SWFObject("http://wamp.vn/demo/bds/templates/bds_sourceland/chart/ampie.swf", "chart", "520", "400", "8", "#FFFFFF");
	so.addVariable("path", "http://wamp.vn/demo/bds/templates/bds_sourceland/chart/");
	so.addVariable("settings_file", encodeURIComponent("http://wamp.vn/demo/bds/templates/bds_sourceland/chart/ampie_settings.xml"));                // you can set two or more different settings files here (separated by commas)
	so.addVariable("data_file", encodeURIComponent("http://wamp.vn/demo/bds/templates/bds_sourceland/chart/ampie_data.xml"));	
	so.write("flashcontent");
	// ]]>
</script>
<!-- CHART COLUMN -->
<script type="text/javascript">
	// <![CDATA[		
	var so = new SWFObject("http://wamp.vn/demo/bds/templates/bds_sourceland/chartColumn/amcolumn.swf", "chartColumn", "520", "400", "8", "#FFFFFF");
	so.addVariable("path", "http://wamp.vn/demo/bds/templates/bds_sourceland/chartColumn/");
	so.addVariable("settings_file", encodeURIComponent("http://wamp.vn/demo/bds/templates/bds_sourceland/chartColumn/amcolumn_settings.xml"));        // you can set two or more different settings files here (separated by commas)
	so.addVariable("data_file", encodeURIComponent("http://wamp.vn/demo/bds/templates/bds_sourceland/chartColumn/amcolumn_data.xml"));		
	so.write("flashcontentcolumn");
	// ]]>
</script>

</body>
</html>
