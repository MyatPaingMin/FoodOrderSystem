@extends('admin.layout.master')

@section('title','Category')

@section('main_content')

            @if(session('deletedAdmin'))
                <div class="alert alert-primary alert-dismissible fade show w-75 m-2"  role="alert">
                    <strong>{{session('deletedAdmin')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('roleChangeAdmin'))
            <div class="alert alert-success alert-dismissible fade show w-75 m-2"  role="alert">
                <strong>{{session('roleChangeAdmin')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Admin List</h2>
                                    </div>
                                </div>
                                {{-- <div class="table-data__tool-right">
                                    <a href="{{route('productcreate')}}">
                                        <button  type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Add Product
                                        </button>
                                    </a>
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        CSV download
                                    </button>
                                </div> --}}
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                    <div>
                                        <h2> Total - <span>{{$list->total()}}</span> </h2>
                                    </div>
                                    <div class=" d-flex flex-row">
                                        <form action="{{route('admin#list')}}" method="GET">
                                            <input type="text" name="search" value="{{request('search')}}">
                                            <input type="submit" value="Search">
                                        </form>
                                        <a href="{{route('admin#list')}}">All</a>
                                    </div>

                                    <div>
                                        <p class="fs-4">Search Key : <span class="text-danger">{{request('search')}}</span></p>
                                    </div>

                                    @if(count($list) == 0)
                                        <h2 style="color: gray;" class="text-secondary text-center mt-5">There is no admin here.</h2>
                                    @else
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- {{dd($list)}} --}}
                                            @foreach($list as $admin)
                                            {{-- {{$category}} --}}
                                                {{-- {{dd($product)}} --}}
                                                <tr>
                                                    <td>
                                                        @if($admin['profile_photo_path'] == NULL)
                                                            @if($admin['gender'] == 'female')
                                                                <img style="width:80px; height:80px; object-fit:contain; background: gray;" src="{{asset('profile_default/default_female.jpg')}}" alt="">
                                                            @else
                                                                <img style="width:80px; height:80px; object-fit:contain; background: gray;" src="{{asset('profile_default/default_male.jpg')}}" alt="">
                                                            @endif
                                                        @else
                                                            <img style="width:80px; height:80px; object-fit:contain; background: gray;" src="{{asset('storage/user/'.$admin['profile_photo_path'])}}" alt="">
                                                        @endif
                                                    </td>
                                                    <td>{{$admin['user_name']}}</td>
                                                    <td>{{$admin['email']}}</td>
                                                    <td>{{$admin['gender']}}</td>
                                                    <td>{{$admin['phone']}}</td>
                                                    <td>{{$admin['address']}}</td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                                                <a  href="{{route('viewProduct',$admin['id'])}}">
                                                                <i class="fa-sharp fa-solid fa-eye"></i>
                                                                </a>
                                                            </button>
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <a  href="{{route('editProduct',$admin['id'])}}">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                            </button> --}}
                                                            @if(Auth::user()['id'] != $admin['id'])

                                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Role Down">
                                                                    <a  href="{{route('roleChangePage',$admin['id'])}}">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                    </a>
                                                                </button>

                                                                <div class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                    <a  href="{{route('deleteAdmin',$admin['id'])}}">
                                                                        <i class="fa-solid fa-trash"></i>
                                                                    </a>
                                                                </div>

                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                                {{$list->links()}}

                            <!-- END DATA TABLE -->

                        </div>
                    </div>
                </div>
@endsection
{{-- {{dd(Auth::user()->get()->toArray())}} --}}
