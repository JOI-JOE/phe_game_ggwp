@extends('client.layouts.app')

@section('content')
<main class="wrapperMain_content">
	<div class="layout-account">
		<div class="container">
			<div class="wrapbox-content-account">
				<div id="customer-login" class="customers_accountForm customer_login">
					<div class="tab-form-account d-flex align-items-center justify-content-center">
						<h4 class="active">
							<a href="/account/login">Đăng nhập</a>
						</h4>
						<h4>
							<a href="/account/register">Đăng ký</a>
						</h4>
					</div>
					<div id="login">
						<div class="accounttype">
							<h2 class="title"></h2>
						</div>
						<form accept-charset='UTF-8' action='/account/login' id='customer_login' method='post'>
							<input name='form_type' type='hidden' value='customer_login'>
							<input name='utf8' type='hidden' value=''>
							<div class="clearfix large_form">
								<label for="customer_email" class="icon-field"><i class="icon-login icon-envelope "></i></label>
								<input required type="email" value="" name="customer[email]" id="customer_email" placeholder="Vui lòng nhập email của bạn" class="text" />
							</div>
							<div class="clearfix large_form large_form-mrb">
								<label for="customer_password" class="icon-field"><i class="icon-login icon-shield"></i></label>
								<input required type="password" value="" name="customer[password]" id="customer_password" placeholder="Vui lòng nhập mật khẩu" class="text" size="16" />
							</div>
							<div class="clearfix large_form sitebox-recaptcha " >
								This site is protected by reCAPTCHA and the Google
								<a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer">Privacy Policy</a>
								and <a href="https://policies.google.com/terms" target="_blank" rel="noreferrer">Terms of Service</a> apply.
							</div>
							<div class="clearfix custommer_account_action">
								<div class="action_bottom button">
									<input class="btn btn-signin" type="submit" value="Đăng nhập" />
								</div>
								<div class="req_pass">
									<p>Bạn quên mật khẩu?<a href="#" onclick="showRecoverPasswordForm();return false;" title="Quên mật khẩu"> Quên mật khẩu?</a></p>
									<p>Bạn chưa có tài khoản?<a href="/account/register" title="Đăng ký"> Đăng ký</a></p>
								</div>
							</div>
						</form>
					</div>
					<div id="recover-password" style="display:none;">
						<!--<div class="accounttype"><h2>Phục hồi mật khẩu</h2></div>	-->

						<form accept-charset='UTF-8' action='/account/recover' method='post'>
							<input name='form_type' type='hidden' value='recover_customer_password'>
							<input name='utf8' type='hidden' value=''>
							<div class="clearfix large_form large_form-mrb">
								<label for="email" class="icon-field"><i class="icon-login icon-envelope "></i></label>
								<input type="email" value="" size="30" name="email" placeholder="Vui lòng nhập email của bạn" id="recover-email" class="text" />
							</div>
							<div class="clearfix large_form sitebox-recaptcha " >
								This site is protected by reCAPTCHA and the Google
								<a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer">Privacy Policy</a>
								and <a href="https://policies.google.com/terms" target="_blank" rel="noreferrer">Terms of Service</a> apply.
							</div>
							<div class="clearfix custommer_account_action">
								<div class="action_bottom button dark">
									<input class="btn" type="submit" value="Gửi email" />
								</div>
								<div class="req_pass">Quay lại <a href="#" onclick="hideRecoverPasswordForm();return false;">đăng nhập</a></div>
							</div>
							<input id='14d28326975b456fb92719b3afcf7f17' name='g-recaptcha-response' type='hidden'>
							<script src='https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-'></script>
							<script>grecaptcha.ready(function() {grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {action: 'submit'}).then(function(token) {document.getElementById('14d28326975b456fb92719b3afcf7f17').value = token;});});</script>
						</form>
					</div>

					<script type="text/javascript">
						function showRecoverPasswordForm() {
							document.getElementById('recover-password').style.display = 'block';
							document.getElementById('login').style.display='none';
						}

						function hideRecoverPasswordForm() {
							document.getElementById('recover-password').style.display = 'none';
							document.getElementById('login').style.display = 'block';
						}

						if (window.location.hash == '#recover') { showRecoverPasswordForm() }
					</script>
				</div>
			</div>
		</div>
	</div>
</main>
@endsection