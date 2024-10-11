@section('title', 'Tạo tài khoản')

@extends('client.layouts.app')

@section('content')
<main class="wrapperMain_content">
    <div class="layout-account">
        <div class="container">
            <div class="wrapbox-content-account">
                <div class="userbox customers_accountForm">
                    <div class="tab-form-account d-flex align-items-center justify-content-center">
                        <h4>
                            <a href="{{route('login')}}">Đăng nhập</a>
                        </h4>
                        <h4 class="active">
                            <a href="{{route('register')}}">Đăng ký</a>
                        </h4>
                    </div>
                    <form action='{{route('account.postRegister')}}' id='create_customer' method='POST' enctype="multipart/form-data">
                        @csrf
                        <div id="field-firstname" class="clearfix large_form">
                            <label for="first_name" class="label icon-field"><i class="icon-login icon-user "></i></label>
                            <input type="text"  name="name" placeholder="Tên" id="name"
                                class="text" size="30" />
                            @error('name')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div id="field-email" class="clearfix large_form">
                            <label for="email" class="label icon-field"><i class="icon-login icon-envelope "></i></label>
                            <input  type="email"  placeholder="Email" name="email" id="email"
                                class="text" size="30" />
                            @error('email')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div id="field-password" class="clearfix large_form large_form-mrb">
                            <label for="password" class="label icon-field"><i class="icon-login icon-shield "></i></label>
                            <input  type="password"  placeholder="Mật khẩu" name="password"
                                id="password" class="password text" size="30" />
                            @error('password')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div id="field-password" >
                            <label for="password" class="label icon-field"><i class="icon-login icon-shield "></i></label>
                            <input  type="password"  placeholder="Xác Nhận Mật khẩu" name="verify_password"
                                id="password" class="password text" size="30" />
                            @error('verify_password')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="input-group mt-2">
                            <label><h3>Avatar:</h3></label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input m-2" name="avatar">
                            </div>
                            @error('avatar')
                            <p style="color: red">{{ $message }}</p>
                            @enderror
						</div>
                        
                        <div class="clearfix custommer_account_action mt-3">
                            <div class="action_bottom button dark">
                                <input class="btn" type="submit" value="Đăng ký" />
                            </div>
                            <div class="req_pass">Bạn đã có tài khoản? <a href="{{route('login')}}">Đăng nhập ngay</a></div>
                        </div>
                    </form>
                    <!-- #register -->
                </div>
            </div>
        </div>
    </div>

</main>

@endsection
