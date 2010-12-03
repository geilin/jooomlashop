<?php

defined( '_JEXEC' ) or die( 'Restricted access' );
include_once (dirname(__FILE__).DS.'/ja_vars.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
    <jdoc:include type="head" />
    <?php JHTML::_('behavior.mootools'); ?>

    <link rel="stylesheet" href="<?php echo $tmpTools->baseurl(); ?>templates/system/css/system.css" type="text/css" />

    <link rel="stylesheet" href="<?php echo $tmpTools->baseurl(); ?>templates/system/css/general.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/template.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/gridsystem.css" type="text/css" />

    <script language="javascript" type="text/javascript" src="<?php echo $tmpTools->templateurl(); ?>/js/ja.script.js"></script>
    <?php if ($tmpTools->getParam('rightCollapsible')): ?>
    <script language="javascript" type="text/javascript">
    var rightCollapseDefault='<?php echo $tmpTools->getParam('rightCollapseDefault'); ?>';
    var excludeModules='<?php echo $tmpTools->getParam('excludeModules'); ?>';
    </script>
    <script language="javascript" type="text/javascript" src="<?php echo $tmpTools->templateurl(); ?>/js/ja.rightcol.js"></script>
    <?php endif; ?>

    <?php  if($this->direction == 'rtl') : ?>
    <link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/template_rtl.css" type="text/css" />

    <?php else : ?>
    <link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/menu.css" type="text/css" />
    <?php endif; ?>

    <?php if ($this->countModules('hornav')): ?>
    <?php if ($tmpTools->getParam('horNavType') == 'css'): ?>
    <link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/ja-sosdmenu.css" type="text/css" />
    <script language="javascript" type="text/javascript" src="<?php echo $tmpTools->templateurl(); ?>/js/ja.cssmenu.js"></script>
    <?php else: ?>
    <link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/css/ja-sosdmenu.css" type="text/css" />
    <script language="javascript" type="text/javascript" src="<?php echo $tmpTools->templateurl(); ?>/js/ja.moomenu.js"></script>
    <?php endif; ?>
    <?php endif; ?>

    <?php if ($tmpTools->getParam('theme_header') && $tmpTools->getParam('theme_header')!='-1') : ?>
    <link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/styles/header/<?php echo $tmpTools->getParam('theme_header'); ?>/style.css" type="text/css" />
    <?php endif; ?>
    <?php /*if ($tmpTools->getParam('theme_background') && $tmpTools->getParam('theme_background')!='-1') : ?>
    <link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/styles/background/<?php echo $tmpTools->getParam('theme_background'); ?>/style.css" type="text/css" />
    <?php endif;*/ ?>
    <?php if ($tmpTools->getParam('theme_elements') && $tmpTools->getParam('theme_elements')!='-1') : ?>
    <link rel="stylesheet" href="<?php echo $tmpTools->templateurl(); ?>/styles/elements/<?php echo $tmpTools->getParam('theme_elements'); ?>/style.css" type="text/css" />
    <?php endif; ?>    
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
        <!-- page content -->
        <div id="content_wrapper" class="clearfix">
            <div id="left"  class="clearfix">
                <div style="width: 200px;">
                <?php if ($this->countModules('left')): ?>
                    <jdoc:include type="modules" name="left" style="xhtml" />               
                    <?php endif; ?>
                </div>
                
                
            </div>
            <div id="main_content"  class="clearfix">
                <div style="width: 540px;">                    
                    sdfsdfsdfsdf
                </div>
            </div>
            <div id="right"  class="clearfix">
                 <div style="width: 200px;">                    
                   sfsdfsdfsdf
                </div>
                
            </div>
        </div>
        <!-- /page content -->
        <!-- footer -->
        <div id="footer">
            <div id="footer_wrapper">
            <jdoc:include type="modules" name="footerlinks" />
            <jdoc:include type="modules" name="footer" />        
            </div>
        </div>
        <!-- /footer -->
    </div>
    
    
<div id="container_96" class="container_96 clearfix">        

<div class="grid_96 alpha omega">            



        </div>
        <!-- /HEADER -->
<div class="grid_96 alpha omega">
             
            <div class="grid_20 alpha">
                <?php if ($this->countModules('left')): ?>
                <jdoc:include type="modules" name="left" style="xhtml" />               
                <?php endif; ?>
            </div>
                  <!-- MAIN CONTENT -->   
                  <div class="grid_54">
                      <jdoc:include type="message" />
                    <?php if(!$tmpTools->isFrontPage()) : ?>
                    <div id="ja-pathway">
                        <jdoc:include type="module" name="breadcrumbs" />
                    </div>
                    <?php endif ; ?>
                    <?php if($tmpTools->isFrontPage()) : ?>	
                    <div id="selloff">
                        <!-- product selloff -->
                        <image src="<?php echo $tmpTools->templateurl(); ?>/my_images/selloff.jpg" alt="selloff"/>
                        <!-- /product selloff -->
                        <?php if ($this->countModules('selloff')) : ?>
                        <jdoc:include type="module" name="selloff" />
                        <?php endif; ?>
                    </div>
                    <?php endif ; ?>
                      <div id="joomla_component">
                        <jdoc:include type="component" />
                      </div>
                  </div>
                  <!-- /MAIN CONTENT -->
        <div class="grid_20 omega">


        <?php if ($this->countModules('right')): ?>
        <!-- BEGIN: RIGHT COLUMN -->

        <jdoc:include type="modules" name="right" style="jarounded" />

        <!-- END: RIGHT COLUMN -->
        <?php endif; ?>


        </div>
</div>
    <!-- footer -->    
    <div class="grid_96 alpha omega clearfix footer_outer">
        <div class="grid_96 alpha omega footer_wrapper">
            <div id="footnav">
                
            </div>
            <div class="copyright">
                
            </div>
            <div id="validxhtml">
                <div class="ja-cert">
                    <jdoc:include type="modules" name="syndicate" />
                    <a href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank" title="<?php echo JText::_("CSS Validity");?>" style="text-decoration: none;">
                    <img src="<?php echo $tmpTools->templateurl(); ?>/images/but-css.gif" border="none" alt="<?php echo JText::_("CSS Validity");?>" />
                    </a>
                    <a href="http://validator.w3.org/check/referer" target="_blank" title="<?php echo JText::_("XHTML Validity");?>" style="text-decoration: none;">
                    <img src="<?php echo $tmpTools->templateurl(); ?>/images/but-xhtml10.gif" border="none" alt="<?php echo JText::_("XHTML Validity");?>" />
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /footer -->
</div>
<!-- /container -->
</body>
</html>
