<div id="quick_login">
  <form method="POST" name="login" id="quick_login_form" action="">
    <div class="label">Email</div>
    <div class="labeled"><input type="text" name="login" class="text" id="quick_email"></div>
    <div class="label">Пароль</div>
    <div class="labeled"><input type="password" name="password" class="text" id="quick_pass"></div>
    <input type="hidden" name="op" value="a_login_attempt">
    <input type="hidden" name="act" value="login">
    <input type="submit" class="submit">
  <div class="button_blue button_wide button_big" id="quick_auth_button"><button id="quick_login_button" onclick="javascript:document.quick_login_form.submit();">Вход</button></div>
  <div id="login_err" class="msg dn"></div>
  </form>
  <div class="button_blue button_wide button_big" id="quick_reg_button"><a href="/regme.php"><button>Регистрация</button></a></div>
  <div class="clear forgot"><a id="quick_forgot" href="/restore" target="_top">Забыли пароль?</a></div>
</div>