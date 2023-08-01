<!DOCTYPE html>
<html>

<head>
    <title>{{$appName}} - Login</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href={{asset('/css/login.css')}} />
</head>

<body>
    <div class="dv-base">
        <div class="dv-top">
            <label>{{$appName}}</label>
        </div>
        <div class="dv-sign-in-header">
            <label>Sign In</label>
            <br />
            <span>Welcome back! Sign in to your account.</span>
        </div>

        <div class="dv-form">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $err)
                        <span>{{ucfirst($err)}}</span> <br />
                        @endforeach
                    </div>
                    @endif

                    {{Form::open(['route' => 'loginUser', 'method' => 'POST'])}}
                    <div class="form-group">
                        {{Form::label('email', 'Email')}}
                        {{Form::text('email', null, ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('password', 'Password')}}
                        {{Form::password('password', ['class' => 'form-control'])}}
                        <div class="dv-forgot-password">
                            <label>
                                <input type="checkbox"></input>
                                <span>Remember me</span>
                            </label>
                            <a>Forgot password?</a>
                        </div>
                    </div>
                    <div class="dv-submit">
                        {{Form::submit('Sign in', ['class' => 'btn btn-primary'])}}
                    </div>
                    {{Form::close()}}

                    <div class="dv-social-login">
                        <span>or sign in using</span>
                        <div class="dv-social-icons">
                            <div>
                                <span class="spn-facebook"></span>
                                <span class="spn-google"></span>
                                <span class="spn-twitter"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>

        <div class="dv-sign-up-text">
            <span>Don't have an account?</span> <label>Sign up</label>
        </div>
    </div>
</body>

</html>