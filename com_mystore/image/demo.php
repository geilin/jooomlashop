<?php
session_start();
function print_log($log) {
    echo '<pre>' . print_r($log, true) .'</pre>';
    clear_log();
}
function clear_log($log=null) {
    session_destroy();
}

function log_message($type, $message) {
    $_SESSION['log'][$type][] = $message;
}
require_once 'image_lib.php';



/*

$image_dir = dirname(__FILE__);
$thumb_dir = $image_dir . '/thumb';

$config['image_library']    = 'gd2';
$config['source_image']     = $image_dir . '/xinh_thumb.jpg';
$config['new_image']        = $thumb_dir;
$config['create_thumb']     = TRUE;
//$config['maintain_ratio']   = FALSE; //TRUE;//default true
$config['master_dim']       = 'height'; //'width'; //TRUE;
$config['width']            = 275;
$config['height']           = 250;

$imglib = new CI_Image_lib($config);
if ( !$imglib->resize() ) {
    echo $imglib->display_errors();
}*/











$config['source_image'] = 'cute.jpg';
$config['new_image']        = './thumb/wt_cute.jpg';
$config['wm_text'] = 'Copyright 2010 - Nissi Audio';
$config['wm_type'] = 'text';
$config['wm_font_path'] = './fonts/osaka-re.ttf';
$config['wm_font_size'] = '16';
$config['wm_font_color'] = '#3f0101';
$config['wm_shadow_color'] = '#a7a6aa';
$config['wm_shadow_distance'] = 1;
//$config['wm_vrt_alignment'] = 'bottom';
$config['wm_vrt_alignment'] = 'middle';
$config['wm_hor_alignment'] = 'center';
//wm type = image
$config['wm_opacity'] = 10;
//$config['wm_padding'] = '20';
$imglib = new CI_Image_lib();
$imglib->initialize($config);

if ( !$imglib->watermark() ) {
    
    echo $imglib->display_errors();
}

print_log($_SESSION['log']);