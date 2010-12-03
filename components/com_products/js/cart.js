//jQuery.noConflict();
jQuery(function() {
	jQuery("#cart tr .remove input").click(function() {
		var orderCode = jQuery(this).val();
		jQuery.ajax({
			type: "GET",
			url: "index.php",
			data: "option=com_products&task=updateCart&remove[]=" + orderCode,
			success: function() {
				jQuery("#cart tr .remove input[value=" + orderCode + "]").parent().parent().fadeOut(0, function() {
					jQuery(this).remove();
					calcPrice();
					showModCart();
					jQuery(".message").html('<ul><li>Bạn đã xóa sản phẩm thành công</li></ul>')
				});
			},
			error: function() {
				window.location("index.php?option=com_products&view=cart&remove[]="+orderCode);
			}
		});
	});
	
	jQuery("#cart tr .quantity input").change(function() {
		var orderCode = jQuery(this).attr("name").slice(9, -1);
		var quantity = jQuery(this).val();
		if (quantity > 0) {
		jQuery.ajax({
			type: "GET",
			url: "index.php",
			data: "option=com_products&task=updateCart&quantity[" + orderCode + "]=" + quantity,
			success: function() {
				var startColor = jQuery("#cart tr .quantity input[name*=" + orderCode + "]").parent().parent().hasClass("odd") ? "#eee" : "#fff";
				jQuery("#cart tr .quantity input[name*=" + orderCode + "]").parent().parent().find("td").animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: startColor }, 100);
				calcPrice();
				showModCart();
				jQuery(".message").html('<ul><li>Bạn đã cập nhật giỏ hàng thành công</li></ul>');
			},
			error: function() {
				window.location("index.php?option=com_products&view=cart&quantity[" + orderCode + "]=" + quantity);
			}
		});
		} else {			
			alert('Vui lòng nhập số lượng');
		}
	});
});

function calcPrice() {
	var totalPrice = 0; // tong gia tieng usd
	var totalPriceVN = 0; // tong gia tien vnd
	var total = 0; //tong so san pham
	jQuery("#cart tr .quantity").parent().each(function() {
		var quantity = jQuery(".quantity input", this).val();
		total += parseInt(quantity);		
		var unitPrice = jQuery(".unit_price", this).text();
		unitPrice = unitPrice.substring(0,unitPrice.length - 4)
		unitPrice	= unitPrice.replace(',', '');
		unitPrice	= unitPrice.replace(',', '');
		unitPrice	= unitPrice.replace(',', '');
		var currency = jQuery(".unit_price", this).text();
		currency = currency.substring(currency.length - 3, currency.length);
		
		var extendedPrice = quantity*unitPrice;
		if (currency == 'USD') {
			totalPrice += extendedPrice;
		} else {
			totalPriceVN += extendedPrice;	
		}
		
		//alert(totalPriceVN);
		jQuery(".extended_price", this).html(formatNumber(extendedPrice + '')+' '+currency);
		//jQuery("#total_price").html(formatNumber(totalPrice + ''));
		jQuery("#total_price_vn").html(formatNumber(totalPriceVN + ''));
	});
	
	if ( total == 0 ) {
		jQuery("#cartinfo").val('');
		jQuery("#cart").parent().replaceWith("<p class='center'>Chưa có sản phẩm trong giỏ hàng.</p>");
	}
}



function addCart(){
	var productId = jQuery('#productId').val();
	var amount = jQuery('#amount').val();
	jQuery.ajax({
			type: "GET",
			url: "index.php",
			data: "option=com_products&task=addtoCart&format=raw&id=" + productId + "&quantity=" + amount,
			success: function(msg) {
				jQuery("#mod_cart").html(msg);
			}
		});
}



function showModCart()
{
		jQuery.ajax({
			type: "GET",
			url: "index.php",
			data: "option=com_products&task=showModCart&format=raw",
			success: function(msg) {
				jQuery("#mod_cart").html(msg);
			}
		});
}

function formatNumber(strNumber)
{
	var inttemp1,inttemp2="";
	var intstop = parseInt((strNumber.length-1)/3);
	inttemp1= strNumber;	
	for(i=0;i<intstop;i++)
	{	
		inttemp2="," + inttemp1.substring(inttemp1.length - 3) + inttemp2;
		inttemp1=inttemp1.substring(0,inttemp1.length - 3);		
	}	
	return inttemp1 + inttemp2;
}