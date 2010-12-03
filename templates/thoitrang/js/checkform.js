var r = new RegExp("[\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-]", "i");
		function isEmail(str) {
			  // are regular expressions supported?
			  var supported = 0;
			  if (str.indexOf(" ")>1) { return false;}
			  if (window.RegExp) {
				var tempStr = "a";
				var tempReg = new RegExp(tempStr);
				if (tempReg.test(tempStr)) supported = 1;
			  }
			  if (!supported) 
				return (str.indexOf(".") > 3) && (str.indexOf("@") > 1);
			  var r1 = new RegExp("(\\.@)|(@.*@)|(\\.\\.)|(@\\.)|(^\\.)");
			  var r2 = new RegExp("^.+\\@(\\[?)[a-zA-Z0-9\\-\\.]+\\.([a-zA-Z]{2,3}|[0-9]{1,3})(\\]?)$");
			  return (!r1.test(str) && r2.test(str));
		}
	
		function check(form){
			
			if(form.username.value.length < 2) {				
				message = 'Hãy nhập một tên đăng nhập hợp lệ, không khoảng trắng' ;
				alert(message);
				form.username.focus();
				return false;
			}
			if(!isEmail(form.email.value)) {				
				message = 'Hãy nhập một địa chỉ Email hợp lệ ' ;
				alert(message);
				form.email.focus();
				return false;
			}
			if(form.password.value.length < 6) {				
				message = 'Hãy nhập một mật khẩu hợp lệ, không dấu cách, nhiều hơn 6 kí tự và nằm trong khoảng 0-9,a-z,A-Z ' ;
				alert(message);
				form.password.focus();
				return false;
			}
			if(form.password2.value == "") {				
				message = 'Hãy xác nhận mật khẩu. ' ;
				alert(message);
				form.password2.focus();
				return false;
			}
			if ((form.password.value != "") && (form.password.value != form.password2.value)) {				
				message = 'Mật khẩu và phần xác nhận không khớp nhau, xin hãy thử lại. ' ;
				alert(message);
				form.password.focus();
				return false;
			}
			if (r.exec(form.password.value)) {				
				message = 'Hãy nhập Mật khẩu hợp lệ, không dấu cách, nhiều hơn 6 kí tự và chứa 0-9,a-z,A-Z ' ;
				alert(message);
				form.password.focus();
				return false;
			}
			if(form.name.value == "") {				
				message = 'Hãy nhập tên của bạn ' ;
				alert(message);
				form.name.focus();
				return false;
			}
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
			if(form.security_code.value == "") {				
				message = 'Xin lỗi, bạn chưa nhập mã số đăng ký ' ;
				alert(message);
				form.security_code.focus();
				return false;
			}
			return true;
		}
		
		function checkComment(form)
		{
			
			if(form.rating.value == 0) {				
				message = 'Hãy đánh giá sản phẩm!' ;
				alert(message);
				form.rating.focus();
				return false;
			}
			if(form.name.value == "") {				
				message = 'Hãy nhập tên của bạn! ' ;
				alert(message);
				form.name.focus();
				return false;
			}
			if(form.comment_title.value == "") {				
				message = 'Hãy nhập tiêu đề ' ;
				alert(message);
				form.comment_title.focus();
				return false;
			}
			if(!isEmail(form.email.value)) {				
				message = 'Hãy nhập một địa chỉ Email hợp lệ ' ;
				alert(message);
				form.email.focus();
				return false;
			}
			
			if(form.content.value == "") {				
				message = 'Hãy nhập nội dung ' ;
				alert(message);
				form.content.focus();
				return false;
			}
			
			return true;
		}
		
		function checkOrder(form)
		{
			
			
			
			if(form.cartinfo.value == "") {								
				alert('Giỏ hàng của bạn chưa có sản phẩm');					
				return false;
			}
			
			if(form.name.value==""){
				alert('Xin vui lòng nhập Tên');	
				form.name.focus();
				return false;
			}
			
			if(form.address.value==""){
				//alert('Xin vui lòng nhập Địa chỉ');	
				//form.address.focus();				
				//return false;
			}
			
			if(!isEmail(form.email.value)) {				
				message = 'Hãy nhập một địa chỉ Email hợp lệ ' ;
				alert(message);
				form.email.focus();
				return false;
			}
			
			if(form.phone.value==""){
				alert('Xin vui lòng nhập Số điện thoại');	
				form.phone.focus();				
				return false;
			}
			
			
			if(form.message.value == "") {				
				//ms = 'Hãy nhập nội dung ' ;
				//alert(ms);
				//form.message.focus();
				//return false;
			}
			return true;
		}
		
		function checkContact(form)
		{
			if(form.name.value == "") {				
				message = 'Hãy nhập tên của bạn ' ;
				alert(message);
				form.name.focus();
				return false;
			}
			if(!isEmail(form.email.value)) {				
				message = 'Hãy nhập một địa chỉ Email hợp lệ ' ;
				alert(message);
				form.email.focus();
				return false;
			}
			if(form.address.value == "") {				
				message = 'Hãy nhập số điện thoại của bạn ' ;
				alert(message);
				form.address.focus();
				return false;
			}
			if(form.phone.value == "") {				
				message = 'Hãy nhập số điện thoại của bạn ' ;
				alert(message);
				form.phone.focus();
				return false;
			}
			if(form.subject.value == "") {				
				message = 'Hãy nhập nội dung ' ;
				alert(message);
				form.subject.focus();
				return false;
			}
			if(form.text.value == "") {				
				message = 'Hãy nhập nội dung ' ;
				alert(message);
				form.text.focus();
				return false;
			}
			return true;
		}
		
		function checkTellAFriend(form)
		{
			if(form.tell_name.value == "") {				
				message = 'Hãy nhập tên của bạn ' ;
				alert(message);
				form.tell_name.focus();
				return false;
			}
			if(!isEmail(form.tell_email.value)) {				
				message = 'Hãy nhập một địa chỉ Email hợp lệ ' ;
				alert(message);
				form.tell_email.focus();
				return false;
			}
			if(!isEmail(form.tell_emailfriend.value)) {				
				message = 'Hãy nhập một địa chỉ Email hợp lệ ' ;
				alert(message);
				form.tell_emailfriend.focus();
				return false;
			}
			if(form.tell_content.value == "") {				
				message = 'Hãy nhập nội dung ' ;
				alert(message);
				form.tell_content.focus();
				return false;
			}
			return true;
		}		

