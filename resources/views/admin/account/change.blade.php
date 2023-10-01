@extends('admin.layout.master');

@section('main_content')


<div class="container d-flex justify-content-center">



    <form action="{{route('changepassword')}}" method="post" class="col-4 p-3 bg-white border-1 border-secondary">
        @csrf
        <div class="mb-3">
            <label for="oldpassword" class="form-label">Enter your old password</label>
            <input type="" name="oldPassword" class="form-control @if(session('wrongPassword')) is-invalid @endif  @error('oldPassword')  is-invalid @enderror" id="oldpassword" placeholder="">
            @error('oldPassword')
                <small style="color: red;"> {{$message}} </small>
            @enderror
            @if(session('wrongPassword'))
                <small style="color: red;"> {{session('wrongPassword')}} </small>
            @endif
        </div>

        <div class="mb-3">
            <label for="newpassword" class="form-label">Enter your new password</label>
            <input type=""  name="newPassword" class="form-control @if(session('samePassword')) is-invalid @endif @error('newPassword')  is-invalid @enderror" id="newpassword" placeholder="">
            @error('newPassword')
                <small style="color: red;"> {{$message}} </small>
            @enderror
            @if(session('samePassword'))
                <small style="color: red;"> {{session('samePassword')}} </small>
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
