@extends('admin.layout.master')

@section('title','Category')

@section('main_content')


                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">User List</h2>
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
                                    {{-- <div>
                                        <h2> Total - <span>{{$users->total()}}</span> </h2>
                                    </div> --}}
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

                                    @if(count($users) == 0)
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
                                            @foreach($users as $user)
                                            {{-- {{$category}} --}}
                                                {{-- {{dd($product)}} --}}
                                                <tr>
                                                    <td>
                                                        @if($user['profile_photo_path'] == NULL)
                                                            @if($user['gender'] == 'female')
                                                                <img style="width:80px; height:80px; object-fit:contain; background: gray;" src="{{asset('profile_default/default_female.jpg')}}" alt="">
                                                            @else
                                                                <img style="width:80px; height:80px; object-fit:contain; background: gray;" src="{{asset('profile_default/default_male.jpg')}}" alt="">
                                                            @endif
                                                        @else
                                                            <img style="width:80px; height:80px; object-fit:contain; background: gray;" src="{{asset('storage/user/'.$user['profile_photo_path'])}}" alt="">
                                                        @endif
                                                    </td>
                                                    <td>{{$user['user_name']}}</td>
                                                    <td>{{$user['email']}}</td>
                                                    <td>{{$user['gender']}}</td>
                                                    <td>{{$user['phone']}}</td>
                                                    <td>{{$user['address']}}</td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                                                <a  href="{{route('viewProduct',$user['id'])}}">
                                                                <i class="fa-sharp fa-solid fa-eye"></i>
                                                                </a>
                                                            </button>
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <a  href="{{route('editProduct',$user['id'])}}">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                            </button> --}}
                                                            <button class=" btn btn-success mr-3 py-0 px-1 roleUp" id="{{$user['id']}}" data-toggle="tooltip" data-placement="top" title="Role Up">
                                                                <i class="fa-solid fa-circle-up"></i> <span class="fs-6">set as admin</span>
                                                            </button>

                                                                <button class="item btn btn-danger deleteUser" data-toggle="tooltip" data-placement="top" id="{{$user['id']}}" title="Delete">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>

                                                                <div class="item" data-toggle="tooltip" data-placement="top" title="Detail">
                                                                    <a  href="{{route('detailUser',$user['id'])}}">
                                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                                    </a>
                                                                </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    @endif
                                </div>
                                {{$users->links()}}

                            <!-- END DATA TABLE -->

                        </div>
                    </div>
                </div>
@endsection
{{-- {{dd(Auth::user()->get()->toArray())}} --}}

@section('sourceScript')
        <script>

            $(document).ready(function(){
                $('.roleUp').click(function(){
                    $t = $(this);

                    $id = $(this).attr('id');
                    console.log($id);
                    $.ajax({
                        type : "GET",
                        url : 'http://127.0.0.1:8000/admin/userRoleUp',
                        data : {
                            "userID" : $id
                        },
                        datatype : 'json',
                        success : function(response){
                            console.log(response);
                            // $dataParent = $(this).parents('td');
                            // $dataParent.find('#'.$id).replaceWith($newHTML);

                            $newHTML = `
                                <button class="btn btn-secondary mr-5 px-2 py-0 disabled" title="Admin" >
                                    ADMIN
                                </button>
                            `;
                            $t.replaceWith($newHTML);
                        }
                    })
                })

                $('.deleteUser').click(function(){
                    var id = $(this).id;
                    $.ajax({
                        type : "GET",
                        url : 'http://127.0.0.1:8000/admin/userDelete',
                        data : {
                            "userID" : $id
                        },
                        datatype : 'json',
                        success : function(response){
                            console.log(response);
                        }
                    })
                })
            })

        </script>
@endsection
