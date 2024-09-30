@extends('client.layouts.app')

@section('content')
<main class="wrapperMain_content">
    <div class="layout-account">
        <div class="container">
            <div class="wrapbox-content-account">
                <div class="userbox customers_accountForm">
                    <div class="tab-form-account d-flex align-items-center justify-content-center">
                        <h4>
                            <a href="/account/login">Đăng nhập</a>
                        </h4>
                        <h4 class="active">
                            <a href="/account/register">Đăng ký</a>
                        </h4>
                    </div>
                    <form accept-charset='UTF-8' action='/account' id='create_customer' method='post'>
                        <input name='form_type' type='hidden' value='create_customer'>
                        <input name='utf8' type='hidden' value=' ✓'>

                        <div id="field-lastname" class="clearfix large_form">
                            <label for="last_name" class="label icon-field"><i class="icon-login icon-user "></i></label>
                            <input required type="text" value="" name="customer[last_name]" placeholder="Họ" id="last_name"
                                class="text" size="30" />
                        </div>
                        <div id="field-firstname" class="clearfix large_form">
                            <label for="first_name" class="label icon-field"><i class="icon-login icon-user "></i></label>
                            <input required type="text" value="" name="customer[first_name]" placeholder="Tên" id="first_name"
                                class="text" size="30" />
                        </div>
                        <div id="field-gender" class="clearfix large_form">
                            <input id="radio1" type="radio" value="0" name="customer[gender]" />
                            <label for="radio1">Nữ</label>
                            <input id="radio2" type="radio" value="1" name="customer[gender]" />
                            <label for="radio2">Nam</label>
                        </div>
                        <div id="field-birthday" class="clearfix large_form">
                            <label for="birthday" class="label icon-field"><i class="icon-login icon-envelope "></i></label>
                            <input type="text" value="" placeholder="mm/dd/yyyy" name="customer[birthday]" autocomplete="off"
                                id="birthday" class="text" size="30" />
                        </div>
                        <div id="field-email" class="clearfix large_form">
                            <label for="email" class="label icon-field"><i class="icon-login icon-envelope "></i></label>
                            <input required type="email" value="" placeholder="Email" name="customer[email]" id="email"
                                class="text" size="30" />
                        </div>
                        <div id="field-password" class="clearfix large_form large_form-mrb">
                            <label for="password" class="label icon-field"><i class="icon-login icon-shield "></i></label>
                            <input required type="password" value="" placeholder="Mật khẩu" name="customer[password]"
                                id="password" class="password text" size="30" />
                        </div>
                        <div class="clearfix large_form sitebox-recaptcha ">
                            This site is protected by reCAPTCHA and the Google
                            <a href="https://policies.google.com/privacy" target="_blank" rel="noreferrer">Privacy Policy</a>
                            and <a href="https://policies.google.com/terms" target="_blank" rel="noreferrer">Terms of Service</a>
                            apply.
                        </div>
                        <div class="clearfix custommer_account_action">
                            <div class="action_bottom button dark">
                                <input class="btn" type="submit" value="Đăng ký" />
                            </div>
                            <div class="req_pass">Bạn đã có tài khoản? <a href="/account/login">Đăng nhập ngay</a></div>
                        </div>

                        <input id='84bc026bdada4e3c8055fa6dd6bc9992' name='g-recaptcha-response' type='hidden'>
                        <script src='https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-'></script>
                        <script>
                            grecaptcha.ready(function() {
                                grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {
                                    action: 'submit'
                                }).then(function(token) {
                                    document.getElementById('84bc026bdada4e3c8055fa6dd6bc9992').value = token;
                                });
                            });
                        </script>
                    </form>
                    <!-- #register -->
                    <!-- #customer-register -->
                </div>
            </div>
        </div>
    </div>

</main>

@endsection

@section('customJs')
<script>
	$(document).ready(function() {
		$(function() {
			$("#birthday").datepicker({
				changeMonth: true,
				changeYear:true,
				yearRange: "-60:+0",
			});
			$.datepicker.regional["vi-VN"] =
				{
				closeText: "Đóng",
				prevText: "Trước",
				nextText: "Sau",
				currentText: "Hôm nay",
				monthNames: ["Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"],
				monthNamesShort: ["Một", "Hai", "Ba", "Bốn", "Năm", "Sáu", "Bảy", "Tám", "Chín", "Mười", "Mười một", "Mười hai"],
				dayNames: ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"],
				dayNamesShort: ["CN", "Hai", "Ba", "Tư", "Năm", "Sáu", "Bảy"],
				dayNamesMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
				weekHeader: "Tuần",
				dateFormat: "mm/dd/yy",
				firstDay: 1,
				isRTL: false,
				showMonthAfterYear: false,
				yearSuffix: ""
			};

			$.datepicker.setDefaults($.datepicker.regional["vi-VN"]);
		});
	})
</script>	
@endsection