@extends('user.layout.master');

@section('content')

<div class="container d-flex justify-content-center position-relative">
    <a href="{{route('userHome')}}" class="position-absolute top-0 left-1">
        <i class="fa-solid fa-arrow-left"></i>
    </a>
    <form action="{{route('updatePassword')}}" method="POST" class="col-4 p-3 bg-white border-1 border-secondary">
        @csrf
        <div class="mb-3">
            <label for="oldpassword" class="form-label">Enter your old password</label>
            <input type="" name="oldpassword" class="form-control @if(session('wrongPassword')) is-invalid @endif  @error('oldpassword')  is-invalid @enderror" id="oldpassword" placeholder="">
            @error('oldpassword')
                <small style="color: red;"> {{$message}} </small>
            @enderror
            @if(session('passWrong'))
                <small style="color: red;"> {{session('passWrong')}} </small>
            @endif
        </div>

        <div class="mb-3">
            <label for="newpassword" class="form-label">Enter your new password</label>
            <input type=""  name="newpassword" class="form-control @if(session('samePassword')) is-invalid @endif @error('newpassword')  is-invalid @enderror" id="newpassword" placeholder="">
            @error('newpassword')
                <small style="color: red;"> {{$message}} </small>
            @enderror
            @if(session('passSame'))
                <small style="color: red;"> {{session('passSame')}} </small>
            @endif
        </div>

        <div class="mb-3">
            <label for="confirmpassword" class="form-label">Confirm your password</label>
            <input type="" name="confirmPassword" class="form-control  @error('confirmPassword')  is-invalid @enderror" id="oldpassword" placeholder="">
            @error('confirmPassword')
                <small style="color: red;"> {{$message}} </small>
            @enderror
        </div>
        <div class="row">
            <input type="submit" value="Save" class="border rounded text-white btn btn-primary offset-3 col-6">
        </div>
    </form>
</div>

@endsection
