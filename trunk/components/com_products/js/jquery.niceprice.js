(function($) {
	$.fn.niceprice = function(options) {
		var defaults = {			
			separator: '.', 
			display: 'saleprice_format', 
			thousandsSeparator: ',',
			lenth: 3
			
		};
		var options = $.extend(defaults, options);
		return this.each(function() {
			var obj = $(this);			
			var lenth = options.lenth;
			var showprice = $('#'+options.display);
			var separator = options.separator;		
			
			
			function setFormat() {
				var str = obj.val();
				var price = format(str);
				if (str != price) showprice.html(price); //obj.val(price);
			}
			
			function format(str) {				
				var l = str.length;
				var segment = Math.ceil(l/lenth);	
				var start = null;
				var formatstr = [];
				var size = lenth;
				while ( l > 0 ) {		
					size = (size < l) ? size: l;
					if ( size > l ) {
						size = l;
						start = 0;
						l = 0;
					}
					else {
						start = l - size;
						l = l - size;
					}
					segment--;		
					formatstr[segment] = str.substr(start, size);		

				}
				return formatstr.join(separator);
			
			}
			
			
			$(this).bind('keyup', setFormat);
			if ($(this).val().length>0) setFormat();			
		
		});
		};
	})(jQuery);