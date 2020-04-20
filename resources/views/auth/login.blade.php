@extends('frontend.layouts.app')

@section('content')

    <!-- <div class="row">
        <div class="col s12 m6 offset-m3">
            <div class="card">

                <h4 class="center indigo-text uppercase p-t-30">{{ __('Login') }}</h4>

                <div class="p-20">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="{{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="helper-text" data-error="wrong" data-success="right">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <p>
                            <label>
                                <input type="checkbox" name="remember" class="filled-in" {{ old('remember') ? 'checked' : '' }} />
                                <span>{{ __('Remember Me') }}</span>
                            </label>
                        </p>

                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" class="waves-effect waves-light btn indigo">
                                    {{ __('Login') }}
                                </button>

                                <a class="indigo-text p-l-15" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3>Log in</h3>
                <form action="{{ route('login') }}" method="POST" class="was-validated">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required autofocus>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label><a href="{{ route('password.request') }}" style="float:right">Forgot Password</a>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Please fill out this field.</div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="col-12 btn btn-info">LOG IN WITH EMAIL</a>
                        <p class="col-12 text-center" style="margin-top:12px;">---or use Facebook---</p>
                        <a class="col-12 btn btn-primary">CONNECT WITH FACEBOOK</a>
                    </div>
                </form>
            </div>
            
            <div class="col-sm-2" style="margin-top:21vh;">
                <a href="{{ route('register') }}">Not registered yet?</p>
                <a href="{{ route('styleprof.index') }}"> <h5><u>Get Started</u></h5></a>
            </div>
            <div class="col-sm-6">
                <div class="container">
                    <div class="row"> 
                        <img src="{{ asset('assets/images/lis.png') }}" style="width:100%">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
@endsection
