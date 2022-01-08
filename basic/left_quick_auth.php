    <div id="side_bar" class="fl_l">
		<div id="quick_login">
  <div>
  </div>
<form method="post" name="login" id="quick_form" action="">

    <div class="label"><?=$MESS['Phone_or_email'];?></div>
    <div class="labeled">
		<input type="text" name="email" class="text" id="quick_email" autocomplete="on">
	</div>
    <div class="label"><?=$MESS['Password'];?></div>
    <div class="labeled">
		<input type="password" name="pass" class="text" id="quick_pass" autocomplete="off" required>
	</div>
    <input type="submit" class="submit">
	
</form>

	<div class='btn_blue btn_tmpl'>
		<button class="" id="quick_login_button"><?=$MESS['Login'];?></button>
	</div>
	<div class='btn_blue btn_tmpl' id='reg_btn' >
		<button class="" id="quick_login_button"><?=$MESS['Reg'];?></button>
	</div>
  <button class="flat_button button_wide button_big" id="quick_reg_button" style="display: none" onclick=""><?=$MESS['Reg'];?></button>
  <div class="clear forgot"><a id="quick_forgot" href="/restore" target="_top"><?=$MESS['Forgot_your_password'];?></a>
  <div class="checkbox ta_l" id="quick_expire" onclick=""><div></div>Чужой компьютер</div></div>
</div>
    <div id="left_ads" style="display: none;"></div>
</div>