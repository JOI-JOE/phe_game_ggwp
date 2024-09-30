<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('admin-login/style.css')}}">
    <title>Login Admin</title>
</head>
<body>
    <div class="login-box">
        <div class="login-header">
            <header>Login</header>
        </div>
        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Error!</h5> {{Session::get('error')}}
        </div>
        @endif

        @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5> {{Session::get('success')}}
        </div>
        @endif
        
        <form action="{{route('admin.authenticate')}}" method="POST">
            @csrf
            <div class="input-box">
                <input type="text" class="input-field" value="{{old('email')}}" name="email" placeholder="Email" autocomplete="off" >
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="password" placeholder="Password" autocomplete="off" >
            </div>
            @error('password')
                <small>{{$message}}</small>
            @enderror
            <div class="forgot">
                <section>
                    <input type="checkbox" id="check" name="remember_me" >
                    <label for="check">Remember me</label>
                </section>
                <section>
                    <a href="#">Forgot password</a>
                </section>
            </div>
            <div class="input-submit">
                <button tytpe="submit" class="submit-btn" id="submit"></button>
                <label for="submit">Sign In</label>
            </div>
        </form>

    </div>
</body>
</html>