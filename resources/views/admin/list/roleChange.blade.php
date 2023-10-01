@extends('admin.layout.master')

@section('title','Category')

@section('main_content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="col-lg-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title position-relative">
                        {{-- <button class="btn text-dark position-absolute bottom-3 start-0 fs-3" onclick="history.back()"><i class="fa-sharp fa-solid fa-arrow-left"></i></button> --}}
                        <a href="{{route('admin#list')}}">
                            <button class="btn text-dark position-absolute bottom-3 start-0 fs-3">
                                <i class="fa-sharp fa-solid fa-arrow-left"></i>
                            </button>
                        </a>
                        <h3 class="text-center title-2">Change Role</h3>
                    </div>
                    <hr>
                        <form class="row" action="{{route('roleChange',$user['id'])}}"  method="POST" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="col-4">
                                <div class="row w-100 d-flex justify-content-center">

                                       @if($user['profile_photo_path'] == NULL)
                                           @if($user['gender'] == 'female')
                                               <img src="{{asset('profile_default/default_female.jpg')}}" alt="profile" class="w-100">
                                           @else
                                               <img src="{{asset('profile_default/default_male.jpg')}}" alt="profile" class="w-100">
                                           @endif
                                       @else
                                           <img src="{{asset('storage/user/admin/'.$user['profile_photo_path'])}}" class="myImage" alt="profile" class="w-100">
                                       @endif

                                </div>
                                <br>
                                {{-- <div class="mb-3">
                                    <input disabled type="file" class="form-control rounded" id="profilepic" id="myFileInput disabled" name="profile_photo_path" value="{{old('profile_photo_path')}}">
                                    @error('profile_photo_path')
                                        <small>{{$message}}</small>
                                    @enderror
                                </div> --}}
                                <br>
                                <br>
                                <div class="row w-100 d-flex justify-content-center flex-row">
                                    {{-- <a href="{{route('editProfile')}}" class=" btn btn-dark rounded">Save</a> --}}
                                    <input type="submit" value="Save" class="btn btn-dark rounded col-5 ">
                                    <a href="{{route('admin#list')}}" class="btn btn-secondary rounded col-5 offset-1" >Discard</a>
                                </div>
                            </div>
                            <div class="col-6 offset-1 ">
                                <div class="mb-3">
                                    <label for="userName" class="form-label">User Name</label>
                                    <input disabled type="text" class="form-control" id="userName" name="username" value="{{old('userName',$user->user_name)}}" placeholder="Enter user name here">
                                </div>
                                @error('username')
                                    <small>{{$message}}</small>
                                @enderror

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input disabled type="text" class="form-control" id="email" name="email" value="{{old('email',$user->email)}}" placeholder="Enter user name here">
                                </div>
                                @error('email')
                                    <small>{{$message}}</small>
                                @enderror

                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <input disabled type="text" class="form-control" id="gender" name="gender" value="{{old('gender',$user->gender)}}" placeholder="Enter user name here">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input disabled type="text" class="form-control" id="phone" name="phone" value="{{old('phone',$user->phone)}}" placeholder="Enter user name here">
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" class="form-control">
                                        <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                                        <option value="user" @if($user->role == 'user') selected @endif>User</option>
                                    </select>
                                    {{-- <input type="text"  id="role" name="role" value="{{old('role',$user->role)}}" placeholder="Enter user name here"> --}}
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea disabled class="form-control" id="address" name="address" rows="3">
                                        {{old('address',$user->address)}}
                                    </textarea>
                                </div>
                                @error('address')
                                    <small>{{$message}}</small>
                                @enderror
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
