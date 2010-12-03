<?php defined( '_JEXEC' ) or die( 'Restricted access' ); ?>

<h2 style="font-size:16px; color:#5b5b5b; padding:0; marign:10px 0;"> Quản lý thông tin tài khoản</h2>
<strong> Thay đổi thông tin tài khoản</strong>
	<form action="index.php" method="post" name="userForm" id="userForm">

	<table cellpadding="0" cellspacing="3" border="0" width="100%" class="contentpane">
	<tr>
		<td width="30%" >
			<label id="namemsg" for="username">
				Tên đăng nhập:
			</label>
		</td>
		<td>
			<input type="text" name="username" id="username" size="40" value="<?php echo $this->userInfo->username;?>" class="inputbox" maxlength="50" readonly=""/> Không được thay đổi
		</td>
	</tr>
	<tr>
		<td width="30%" >
			<label id="namemsg" for="name">
				Giới tính:
			</label>
		</td>
		<td>
			<label class="frg">
			<input type="radio" <?php if ($this->userInfo->sex == 1) echo 'checked="checked"';?> value="1" name="sex"/>
			Nam
			</label>
			<label class="frg">
			<input type="radio" <?php if ($this->userInfo->sex == 0) echo 'checked="checked"';?> value="0" name="sex"/>
			Nữ
			</label>
		</td>
	</tr>
	<tr>
		<td width="30%" >
			<label id="namemsg" for="address">
				Địa chỉ:
			</label>
		</td>
		<td>
			<input type="text" name="address" id="address" size="40" value="<?php echo $this->userInfo->address;?>" class="inputbox" maxlength="50" /> *
		</td>
	</tr>
	<tr>
		<td width="30%" >
			<label id="namemsg" for="city">
				Thành phố:
			</label>
		</td>
		<td>
			<input type="text" name="city" id="city" size="40" value="<?php echo $this->userInfo->city;?>" class="inputbox" maxlength="50" /> *
		</td>
	</tr>
	<tr>
		<td width="30%" >
			<label id="namemsg" for="tel">
				Điện thoại:
			</label>
		</td>
		<td>
			<input type="text" name="tel" id="tel" size="40" value="<?php echo $this->userInfo->tel;?>" class="inputbox" maxlength="50" /> *
		</td>
	</tr>
	
	<tr>
		<td width="100" align="right" class="key">
		</td>
		<td>
			<input id="button" class="capnhat" type="submit" value=""/>
		</td>
	</tr>	
	</table>

		<input type="hidden" name="id" value="<?php echo $this->userInfo->id; ?>" />
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="update" />
	</form>
	
<strong> Thay đổi mật khẩu</strong>
	<form action="index.php" method="post" name="passForm" id="passForm">

	<table cellpadding="0" cellspacing="3" border="0" width="100%" class="contentpane">
	<tr>
		<td width="30%" >
			<label id="namemsg" for="password">
				Mật khẩu mới:
			</label>
		</td>
		<td>
			<input type="password" name="password" id="password" size="40" value="" class="inputbox" maxlength="50" />
		</td>
	</tr>
	<tr>
		<td width="30%" >
			<label id="namemsg" for="password2">
				Nhập lại mật khẩu:
			</label>
		</td>
		<td>
			<input type="password" name="password2" id="password2" size="40" value="" class="inputbox" maxlength="50" />
		</td>
	</tr>	
	<tr>
		<td width="30%" >
		</td>
		<td>
			<input id="button" class="capnhat" type="submit" value=""/>
		</td>
	</tr>	
	</table>
		<input type="hidden" name="username" value="<?php echo $this->userInfo->username; ?>" />
		<input type="hidden" name="gid" value="<?php echo $this->userInfo->gid; ?>" />
		<input type="hidden" name="id" value="<?php echo $this->userInfo->userid; ?>" />
		<input type="hidden" name="option" value="com_user" />
		<input type="hidden" name="task" value="save" />
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>


