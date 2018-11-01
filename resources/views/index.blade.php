<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Day 001 Login Form</title>


    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

    <link rel="stylesheet" href="{{ asset('css/login_style.css') }}">


</head>

<body>

<div class="login-wrap">
    <div class="login-html">
        @if (Session::has('error'))
            <p class="text-danger" style="color: red">
                <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
                {{ Session::get('error') }}
            </p>
        @endif
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
            <div class="sign-in-htm">
                <form method="post" action="{{ route('check_login') }}">
                    @csrf
                    <div class="group">
                        <label for="email" class="label">Email</label>
                        <input id="email" type="text" name="email" class="input" value="{{ old('email') }}">
                    </div>
                    @if($errors->has('email'))
                        <p class="text-danger" style="color: red">{{ $errors->first('email') }}</p>
                    @endif
                    <div class="group">
                        <label for="password" class="label">Password</label>
                        <input id="password" type="password" name="password" class="input" data-type="password">
                    </div>
                    @if($errors->has('password'))
                        <p class="text-danger" style="color: red">{{ $errors->first('password') }}</p>
                    @endif
                    <div class="group">
                        <input id="check" type="checkbox" class="check" checked>
                        <label for="check"><span class="icon"></span> Keep me Signed in</label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Sign In">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a href="#forgot">Forgot Password?</a>
                    </div>
                </form>
            </div>
            <div class="sign-up-htm">
                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id="user" type="text" class="input">
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <label for="pass" class="label">Repeat Password</label>
                    <input id="pass" type="password" class="input" data-type="password">
                </div>
                <div class="group">
                    <label for="pass" class="label">Email Address</label>
                    <input id="pass" type="text" class="input">
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Sign Up">
                </div>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <label for="tab-1">Already Member?</label>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>
