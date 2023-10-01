@extends('user.layout.master');

@section('content')
@if(session('passChange'))
    <h1 style="color: green;">{{session('passChange')}}</h1>
@endif
<div class="section__content section__content--p30">
    <div class="container-fluid">

        {{-- <div class="col-3 offset-8">
            <a href="{{route('category_list')}}"><button class="btn bg-dark text-white my-3">List</button></a>
        </div> --}}

        <div class="col-lg-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title position-relative">
                        <a href="{{route('userHome')}}" class="text-dark">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>
                        <h3 class="text-center title-2">Account Detail</h3>
                    </div>
                    <hr>
                    <div class="p-1 m-1 row">
                        <div class="col-3 offset-1">
                            <div class="row w-100 d-flex justify-content-center">

                                    @if(Auth::user()['profile_photo_path'] == NULL)
                                        @if(Auth::user()['gender'] == 'female')
                                            <img src="{{asset('admin/images/default/default_female.jpg')}}" alt="profile" class="w-100">
                                        @else
                                            <img src="{{asset('admin/images/default/default_male.jpg')}}" alt="profile" class="w-100">
                                        @endif
                                    @else
                                        <img src="{{asset('storage/user/'.Auth::user()['profile_photo_path'])}}" alt="profile" class="w-100">
                                    @endif

                            </div>
                            <br>
                            <div class="row w-100 d-flex justify-content-center">
                                <a href="{{route('editUserProfile')}}" class=" btn btn-dark rounded">Edit Profile</a>
                            </div>
                        </div>
                        <div class="col-6 offset-1">
                            <p class="fs-4">Name : {{Auth::user()['user_name']}}</p>
                            <br>
                            <p class="fs-4">Email : {{Auth::user()['email']}}</p>
                            <br>
                            <p class="fs-4">Gender : {{Auth::user()['gender']}}</p>
                            <br>
                            <p class="fs-4">Phone : {{Auth::user()['phone']}}</p>
                            <br>
                            <p class="fs-4">Address : {{Auth::user()['address']}}</p>
                            <br>
                            <p class="fs-4">Role : {{Auth::user()['role']}}</p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
