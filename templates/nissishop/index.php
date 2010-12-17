<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
include_once (dirname(__FILE__).DS.'/ja_vars.php');
$hasRight = $this->countModules('right');
$columClass = ($hasRight > 0) ? 'hasright ': '';
$siteName = $tmpTools->sitename();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
    <jdoc:include type="head" />
    <?php JHTML::_('behavior.mootools'); ?>  
    <link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/template.css" type="text/css" />	
    <link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/gridsystem.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/product.css" type="text/css" />
    <!--[if lte IE 7]>
    <link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/iefix.css" type="text/css" />    
    <![endif]-->     
</head>

<body>
    <div id="container">
        <!-- header -->
        <div id="header">
            <h1 class="logo">
                <a href="index.php" title="<?php echo $siteName; ?>"><span><?php echo $siteName; ?></span></a>
            </h1>
        </div>
        <!-- /header -->
        <!-- navigation -->
        <div id="navigation">
            <?php if ($this->countModules('hornav')): ?>
                <div id="mainnav" class="clearfix">	
                <jdoc:include type="modules" name="hornav" />
                </div>
            <?php endif; ?>
        </div>
        <!-- /navigation -->        
        <!-- content_wrapper -->
        <div id="content_wrapper" class="<?php echo $columClass; ?>clearfix">
            <!-- left colum -->
            <div id="left"  class="clearfix">          
                <?php if ($this->countModules('left')): ?>
                    <jdoc:include type="modules" name="left" style="missishop" />               
                    <?php endif; ?>
            </div>
            <!-- /left colum -->
            <!-- main content -->
            <div id="main_content" class="clearfix">                
                   <jdoc:include type="message" />
                    <?php if(!$tmpTools->isFrontPage()) : ?>
                    <div id="ja-pathway">
                        <jdoc:include type="module" name="breadcrumbs" />
                    </div>
                    <?php endif ; ?>
                    <?php if($tmpTools->isFrontPage()) : ?>	
                    <div id="selloff">
                        <!-- product selloff -->
                        <image src="<?php echo $tmpTools->templateurl(); ?>/my_images/selloff.jpg" alt="đang khuyến mãi" style="margin-bottom:10px;" />						
                        <!-- /product selloff -->
                        <?php if ($this->countModules('selloff')) : ?>                        
                        <jdoc:include type="modules" name="selloff"  style="missishop"  />
                        <?php endif; ?>
                    </div>
                    <?php endif ; ?>
                      <div id="component">
                        <jdoc:include type="component" />
                      </div>                   
            </div>
            <!-- /main content -->
            <!-- right -->
            <?php if ($hasRight): ?>
            <div id="right"  class="clearfix">
                <jdoc:include type="modules" name="right" style="missishop" />
            </div>
            <?php endif; ?>
            <!-- /right -->
        </div>
        <!-- /content_wrapper -->
        <!-- footer -->
        <div id="footer">
            <div id="footer_wrapper">
            <div class="footerlinks" class="clearfix"><jdoc:include type="modules" name="footerlinks" /></div>            
            <div class="copyright"><jdoc:include type="modules" name="footer" /></div>
                 
            </div>
        </div>
        <!-- /footer -->
    </div>
</body>
</html>
