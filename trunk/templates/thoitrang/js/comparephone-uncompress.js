/**
* @version	1.0  - 	jQuery Platform
* @package	Compare THE PHONE
* @copyright	Wamp vn Co.,LTD
* @license		MIT
* @website      http://wampvn.com
* @description  WAMP vn - SEO WEB - PR ONLINE BRAND - WEB APP DEVELOPMENT 
*/
function actionToFormCompare() {
    jQuery('.compare_bt a').click(function () {
        var a_class = jQuery(this).attr('class');
        if (a_class == "compare_add") {
            addComparePhone(jQuery(this));
        } else if (a_class == "compare_cancel") {
            cancelComparePhone(jQuery(this));
            togglePhoneClass(jQuery(this));
           
        } else {
            return false;
        }
        
    });
    jQuery('.compare_bt a.compare_cancel_gray').click(function () {
        cancelComparePhone(jQuery(this));
        id = jQuery(this).attr('pid');
        jQuery(".wrp_pk").find("a[" + id + "]").css('font-weight', 'bold');
        checkBT();
    })
}
function togglePhoneClass(phone) {
    if (phone.attr('class') == "compare_add") {
        phone.removeClass('compare_add').addClass('compare_cancel');
        phone.text('Gỡ bỏ');
    } else {
        phone.removeClass('compare_cancel').addClass('compare_add');
        phone.text('Thêm vào');
    }
}
function addComparePhone(phone) {
    id = phone.attr('phid');
    data = 'id=' + id + "&task=addcom&tk=" + token;
    jQuery.ajax({
        type: "POST",
        url: w_root + "index.php?option=com_products&controller=compare",
        data: data,
        success: function (data) {
            if (data != 'stop') {
                jQuery(".add_compare_items").html(data);
                goboPhoneBt();
                togglePhoneClass(phone);
                checkBT();
            } else {
                alert('Chỉ được thêm tối đa 4 điện thoại !');
            }
        }
    })
}
function cancelComparePhone(phone) {
    id = phone.attr('phid');
    if (!id) {
        id = phone.attr('pid');
    }
    data = 'id=' + id + "&task=cancelcom&tk=" + token;
    jQuery.ajax({
        type: "POST",
        url: w_root + "index.php?option=com_products&controller=compare",
        data: data,
        success: function (data) {
            if (data != 'stop') {
                jQuery(".add_compare_items").html(data);
                goboPhoneBt();
                checkBT();
                if (jQuery('#pcount').val() != 0) {
                	styledis = jQuery('#result_compare').css('display');
	                // HIEN SS LAN NUA
	                if (styledis!='none') {
	                	if (jQuery('#pcount').val() != 0) {
	                        jQuery('#phone_compare_list').fadeOut('fast');
	                        data = 'task=comparenow&tk=' + token;
	                        jQuery.ajax({
	                            type: "POST",
	                            url: w_root + "index.php?option=com_products&controller=compare",
	                            data: data,
	                            success: function (data) {
	                                if (data != 'stop') {
	                                    jQuery("#result_compare").html(data);
	                                    jQuery('#result_compare').fadeIn('fast')
	                                }
	                                jQuery('#showlist').fadeTo('fast',1).css('cursor','pointer');
	                                hienDS();
	                                jQuery('a.tltip').hover(function(){var aoffset=jQuery(this).offset();var twarpoffset=jQuery('.tip_warp').offset();var topoffset=aoffset.top-twarpoffset.top+15;jQuery('#'+jQuery(this).attr('rel')).fadeIn('fast').css('top',topoffset+'px');},function(){jQuery('#'+jQuery(this).attr('rel')).fadeOut('slow');});
	                            }
	                        })
	                    } else {
	                        return false
	                    }
	                } // END IF HIEN SS
                } else {
                	aphone = jQuery(".wrp_pk a[class='compare_cancel']");
                    aphone.removeClass('compare_cancel').addClass('compare_add');
                    aphone.text('Thêm vào');
                    if (jQuery('#result_compare').css('display') == 'block') {
                        jQuery('#result_compare').fadeOut('fast');
                        jQuery('#phone_compare_list').fadeIn('fast');
                    }
                    if (jQuery.browser.version == '7.0') {
                    	jQuery('#phone_compare_list').show();
                        jQuery('#result_compare').hide();
                        manul = jQuery('#manu_l').val();
                        proline = jQuery('#proline_l').val();
                        data = 'manul=' + manul + "&proline=" + proline + "&task=listcomparephone&tk=" + token;
                        jQuery.ajax({
                            type: "POST",
                            url: w_root + "index.php?option=com_products&controller=compare",
                            data: data,
                            success: function (data) {
                                if (data != 'stop') {
                                	jQuery("#phone_compare_list").html(data);
                                    actionToFormCompare();
                                }
                            }
                        })
                    }
                    checkBT();
                    jQuery('#showlist').fadeTo('fast',0.5).css('cursor','default');
                    
                } // COUNT LI
            }
        } // SUCESS
    }); // AJAX
}
function goboPhoneBt() {
    jQuery('.compare_bt a.compare_cancel_gray').click(function () {
        cancelComparePhone(jQuery(this));
        id = jQuery(this).attr('pid');
        aphone = jQuery(".wrp_pk a[phid='" + id + "']");
        aphone.removeClass('compare_cancel').addClass('compare_add');
        aphone.text('Thêm vào');
    })
}
function searchCompare() {
	
    jQuery('#compare_search_bt').click(function () {
        jQuery('#phone_compare_list').show();
        jQuery('#result_compare').hide();
        manul = jQuery('#manu_l').val();
        proline = jQuery('#proline_l').val();
        data = 'manul=' + manul + "&proline=" + proline + "&task=listcomparephone&tk=" + token;
        jQuery.ajax({
            type: "POST",
            url: w_root + "index.php?option=com_products&controller=compare",
            data: data,
            success: function (data) {
                if (data != 'stop') {
                	jQuery("#phone_compare_list").html(data);
                    actionToFormCompare();
                }
            }
        })
    })
}
function showAjaxList(page) {
    jQuery('#phone_compare_list').show();
    jQuery('#result_compare').hide();
    curpage = jQuery('#curpage').val();
    manul = jQuery('#manu_l').val();
    proline = jQuery('#proline_l').val();
    data = 'curpage=' + curpage + '&page=' + page + '&manul=' + manul + "&proline=" + proline + "&task=listcomparephone&tk=" + token;
    jQuery.ajax({
        type: "POST",
        url: w_root + "index.php?option=com_products&controller=compare",
        data: data,
        success: function (data) {
            if (data != 'stop') {
                jQuery("#phone_compare_list").html(data);
                actionToFormCompare();
            }
        }
    })
}
function sosanh() {
    jQuery('#gocompare').click(function () {
        if (jQuery('#pcount').val() != 0) {
            jQuery('#phone_compare_list').fadeOut('fast');
            data = 'task=comparenow&tk=' + token;
            jQuery.ajax({
                type: "POST",
                url: w_root + "index.php?option=com_products&controller=compare",
                data: data,
                success: function (data) {
                    if (data != 'stop') {
                        jQuery("#result_compare").html(data);
                        jQuery('#result_compare').fadeIn('fast')
                    }
                    jQuery('#showlist').fadeTo('fast',1).css('cursor','pointer');
                    hienDS();
                    jQuery('a.tltip').hover(function(){var aoffset=jQuery(this).offset();var twarpoffset=jQuery('.tip_warp').offset();var topoffset=aoffset.top-twarpoffset.top+15;jQuery('#'+jQuery(this).attr('rel')).fadeIn('fast').css('top',topoffset+'px');},function(){jQuery('#'+jQuery(this).attr('rel')).fadeOut('slow');});
                }
            })
        } else {
            return false
        }
    })
}
function checkBT() {
	var count_li = jQuery('#pcount').val();
	if (count_li > 0) {
		jQuery('#gocompare').fadeTo('fast',1).css('cursor','pointer');
		jQuery('#removeall').fadeTo('fast',1).css('cursor','pointer');
	} else {
		jQuery('#gocompare').fadeTo('slow',0.5).css('cursor','default');
		jQuery('#removeall').fadeTo('slow',0.5).css('cursor','default');
		
	}
	
}
function hienDS() {
	var flag = jQuery('#result_compare').css('display');
	if (flag != 'none') {
		
		jQuery('#showlist').click(function () {
			 jQuery('#result_compare').fadeOut('fast');
             jQuery('#phone_compare_list').fadeIn('fast');
             jQuery('#showlist').fadeTo('fast',0.5).css('cursor','default');
            
		});
	}
}
function gobotoanbo() {
    jQuery('#removeall').click(function () {
        count_cphone = jQuery('#pcount').val();
        if (count_cphone > 0) {
            data = 'task=removeall&tk=' + token;
            jQuery.ajax({
                type: "POST",
                url: w_root + "index.php?option=com_products&controller=compare",
                data: data,
                success: function (data) {
                    if (data != 'stop') {
                        jQuery(".add_compare_items").html(data);
                        aphone = jQuery(".wrp_pk a[class='compare_cancel']");
                        aphone.removeClass('compare_cancel').addClass('compare_add');
                        aphone.text('Thêm vào');
                        if (jQuery('#result_compare').css('display') == 'block') {
                            jQuery('#result_compare').fadeOut('fast');
                            jQuery('#phone_compare_list').fadeIn('fast');
                        }
                        if (jQuery.browser.version == '7.0') {
                        	jQuery('#phone_compare_list').show();
                            jQuery('#result_compare').hide();
                            manul = jQuery('#manu_l').val();
                            proline = jQuery('#proline_l').val();
                            data = 'manul=' + manul + "&proline=" + proline + "&task=listcomparephone&tk=" + token;
                            jQuery.ajax({
                                type: "POST",
                                url: w_root + "index.php?option=com_products&controller=compare",
                                data: data,
                                success: function (data) {
                                    if (data != 'stop') {
                                    	jQuery("#phone_compare_list").html(data);
                                        actionToFormCompare();
                                    }
                                }
                            })
                        }
                        checkBT();
                        jQuery('#showlist').fadeTo('fast',0.5).css('cursor','default');
                      
                    }
                }
            })
        } else {
            return false
        }
    })
}