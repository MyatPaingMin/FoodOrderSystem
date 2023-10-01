{{-- Hello --}}
@if(Auth::user())
    <p style='color:red;'>User Logged in</p>
@else
    <p style='color:red;'>User not logged in</p>
@endif


@extends('domain/master')

@section('userform')

{{-- {{url()->current()}} --}}
{{-- {{route('authLoginPage')}} --}}
<div class="login-form">
    <form action="{{route('loginUser')}}" method="post">
        @csrf
        <div class="form-group">
            <label>Email Address</label>
            <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
        </div>
        @error('email')
            <small>{{$message}}</small>
        @enderror
        <div class="form-group">
            <label>Password</label>
            <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
        </div>
        @error('password')
            <small>{{$message}}</small>
        @enderror

        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>

    </form>
    <div class="register-link">
        <p>
            Don't you have account?
            <a href="{{route('authRegisterPage')}}">Sign Up Here</a>
        </p>
    </div>
</div>
@endsection
