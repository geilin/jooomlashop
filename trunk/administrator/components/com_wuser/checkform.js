		function check(form){
			
			if(form.address.value == "") {				
				message = 'Hãy nhập địa chỉ của bạn ' ;
				alert(message);
				form.address.focus();
				return false;
			}
			if(form.city.value == "") {				
				message = 'Hãy nhập thành phố của bạn ' ;
				alert(message);
				form.city.focus();
				return false;
			}
			if(form.tel.value == "") {				
				message = 'Hãy nhập số điện thoại của bạn ' ;
				alert(message);
				form.tel.focus();
				return false;
			}			
			return true;
		}
