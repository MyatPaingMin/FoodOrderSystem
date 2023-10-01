@extends('./domain/master')
@section('userform') 
        <div class="login-form">
            <form action="{{route('registerAdmin')}}" method="POST">
        {{-- username,email,gender,phone,address,password,passwordConfirm --}}
                @csrf
                <div class="form-group">
                    <label>Username</label>
                    <input class="au-input au-input--full" type="text" name="username" value="{{old('username')}}" placeholder="Username">
                </div>
                @error('username')
                    <small style="color: red;">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label>Email Address</label>
                    <input class="au-input au-input--full" type="email" name="email" value="{{old('email')}}" placeholder="Email">
                </div>
                @error('email')
                    <small style="color: red;">{{$message}}</small>
                @enderror

                <div class="form-group">
                    <label>Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="male" id="male">
                        <label class="form-check-label" for="male">
                          Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="female" id="female">
                        <label class="form-check-label" for="female">
                          Female
                        </label>
                    </div>
                    {{-- <input class="au-input au-input--full" type="text" name="gender" value="{{old('gender')}}" placeholder="Email"> --}}
                </div>
                @error('gender')
                    <small style="color: red;">{{$message}}</small>
                @enderror

                <div class="form-group">
                    <label>Phone</label>
                    <input class="au-input au-input--full" type="text" name="phone" value="{{old('phone')}}" placeholder="Email">
                </div>
                @error('phone')
                    <small style="color: red;">{{$message}}</small>
                @enderror

                <div class="form-group">
                    <label>Address</label>
                    <input class="au-input au-input--full" type="text" name="address" value="{{old('address')}}" placeholder="Email">
                </div>
                @error('address')
                    <small style="color: red;">{{$message}}</small>
                @enderror

                <div class="form-group">
                    <label>Password</label>
                    <input class="au-input au-input--full" type="password" name="password" value="{{old('password')}}" placeholder="Password">
                </div>
                @error('password')
                    <small style="color: red;">{{$message}}</small>
                @enderror

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input class="au-input au-input--full" type="password" name="passwordConfirmation" value="{{old('password_confirmation')}}" placeholder="Confirm Password">
                </div>
                @error('password_confirmation')
                    <small style="color: red;">{{$message}}</small>
                @enderror

                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
            </form>
            <div class="register-link">
                <p>
                    Already have account?
                    <a href="{{route('authLoginPage')}}">Sign In</a>
                </p>
            </div>
        </div>
@endsection
