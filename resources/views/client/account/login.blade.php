@section('title', 'Tài khoản')

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
						@if (session('message'))
							<div class="alert alert-danger">
								<small>Email or password is invalid.</small>
							</div>
						@endif
						
						<form accept-charset='UTF-8' action='{{route('account.postLogin')}}' id='customer_login' method='post'>
							@csrf
							<div class="clearfix large_form">
								<label for="customer_email" class="icon-field"><i class="icon-login icon-envelope "></i></label>
								<input  type="email" value="" name="email" id="customer_email" placeholder="Vui lòng nhập email của bạn" class="text" />
							</div>

							<div class="clearfix large_form large_form-mrb">
								<label for="customer_password" class="icon-field"><i class="icon-login icon-shield"></i></label>
								<input  type="password" value="" name="password" id="customer_password" placeholder="Vui lòng nhập mật khẩu" class="text" size="16" />
							</div>
							
							<div class="clearfix custommer_account_action mt-3">
								<div class="action_bottom button">
									<input class="btn btn-signin" type="submit" value="Đăng nhập" />
								</div>
								<div class="req_pass">
									<p>Bạn chưa có tài khoản?<a href="/account/register" title="Đăng ký"> Đăng ký</a></p>
								</div>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</main>
@endsection

