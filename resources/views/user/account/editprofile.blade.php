@extends('user.layout.master');

@section('content')
<div class="section__content section__content--p30">
    <div class="container-fluid">



        <div class="col-lg-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title position-relative">
                        <a href="{{route('user#account')}}" class="text-dark">
                            <i class="fa-solid fa-arrow-left"></i>
                        </a>

                        <h3 class="text-center title-2">Edit Account</h3>
                    </div>
                    <hr>

                    {{-- FORM STARTS --}}
                    <form class="p-1 m-1 row" method="POST" action="{{route('updateUser')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-4">
                            <div class="row w-100 d-flex justify-content-center">

                                   @if(Auth::user()['profile_photo_path'] == NULL)
                                       @if(Auth::user()['gender'] == 'female')
                                           <img src="{{asset('admin/images/default/default_female.jpg')}}" alt="profile" class="w-100">
                                       @else
                                           <img src="{{asset('admin/images/default/default_male.jpg')}}" alt="profile" class="w-100">
                                       @endif
                                   @else
                                       <img src="{{asset('storage/user/'.Auth::user()['profile_photo_path'])}}" class="myImage" alt="profile" class="w-100">
                                   @endif

                            </div>
                            <br>
                            <div class="mb-3">
                                {{-- <label for="userName" class="form-label">User Name</label> --}}
                                <input type="file" class="form-control rounded" id="profilepic" id="myFileInput" name="profile_photo_path" value="{{old('profile_photo_path')}}">
                                @error('profile_photo_path')
                                    <small>{{$message}}</small>
                                @enderror
                            </div>
                            <br>
                            <br>
                            <div class="row w-100 d-flex justify-content-center flex-row">
                                {{-- <a href="{{route('editProfile')}}" class=" btn btn-dark rounded">Save</a> --}}
                                <input type="submit" value="Save" class="btn btn-dark rounded col-5 ">
                                <a href="{{route('user#account')}}" class="btn btn-secondary rounded col-5 offset-1" >Discard</a>
                            </div>
                        </div>
                        <div class="col-6 offset-1 ">
                            <div class="mb-3">
                                <label for="userName" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="userName" name="username" value="{{old('userName',Auth::user()->user_name)}}" placeholder="Enter user name here">
                            </div>
                            @error('username')
                                <small>{{$message}}</small>
                            @enderror

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{old('email',Auth::user()->email)}}" placeholder="Enter user name here">
                            </div>
                            @error('email')
                                <small>{{$message}}</small>
                            @enderror

                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <input type="text" class="form-control" id="gender" name="gender" value="{{old('gender',Auth::user()->gender)}}" placeholder="Enter user name here">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone',Auth::user()->phone)}}" placeholder="Enter user name here">
                            </div>
                            {{-- <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <input type="text" class="form-control" id="role" name="role" value="{{old('role',Auth::user()->role)}}" placeholder="Enter user name here">
                            </div> --}}

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3">
                                    {{old('address',Auth::user()->address)}}
                                </textarea>
                            </div>
                            @error('address')
                                <small>{{$message}}</small>
                            @enderror
                        </div>
                    </form>
                    {{-- FORM END  --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    const fileInput = document.getElementById('myFileInput');
    const imageElement = document.querySelector('.myImage');
    console.log('Image script');
    fileInput.addEventListener('change', function(event) {
        console.log('New photo');
      const file = event.target.files[0];
      const reader = new FileReader();
        if(file){
            console.log(file.name);
        }
    //   reader.onload = function(e) {
    //     imageElement.src = e.target.result;
    //   };

    //   reader.readAsDataURL(file);
    });

//     document.getElementById('input').addEventListener('change', function(e) {
//   if (e.target.files[0]) {
//     document.body.append('You selected ' + e.target.files[0].name);
//   }
// });
</script>
