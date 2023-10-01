@extends('admin.layout.master')

@section('title','Category')

@section('main_content')

            {{-- @if(session('changedPass'))
                <div class="alert alert-primary alert-dismissible fade show w-75 m-2"  role="alert">
                    <strong>{{session('changedPass')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('categoryCreated'))
                <div class="alert alert-success alert-dismissible fade show w-75 m-2"  role="alert">
                    <strong>{{session('categoryCreated')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('categoryDeleted'))
                <div class="alert alert-danger alert-dismissible fade show w-75 m-2"  role="alert">
                    <strong>{{session('categoryDeleted')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('categoryUpdated'))
                <div class="alert alert-primary alert-dismissible fade show w-75 m-2"  role="alert">
                    <strong>{{session('categoryUpdated')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif --}}

            {{-- <form action="{{route('searchProduct')}}" method="GET">
                <input type="text" name="search" value="{{request('search')}}">
                <input type="submit" value="Search">
            </form> --}}

            {{-- <form action="{{route('')}}" method="POST">
                @csrf
                <input type="submit" value="All">
            </form> --}}

            {{-- <div>
                <p class="text-secondary">Search key :  <span class='text-danger'>{{request('search')}}</span></p>
                <h3>Total - {{$categories->total()}}</h3>


            </div> --}}

                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Product List</h2>
                                    </div>
                                </div>
                                <div class="table-data__tool-right">
                                    <a href="{{route('productcreate')}}">
                                        <button  type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Add Product
                                        </button>
                                    </a>
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        CSV download
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                    <div>
                                        <h2> Total - <span>{{$list->total()}}</span> </h2>
                                    </div>
                                    <div class=" d-flex flex-row">
                                        <form action="{{route('productlist')}}" method="GET">
                                            <input type="text" name="search" value="{{request('search')}}">
                                            <input type="submit" value="Search">
                                        </form>
                                        <a href="{{route('productlist')}}">All</a>
                                    </div>

                                    <div>
                                        <p class="fs-4">Search Key : <span class="text-danger">{{request('search')}}</span></p>
                                    </div>
                                    {{-- {{dd(count($list))}} --}}
                                    @if(count($list) == 0)
                                        <h2 style="color: gray;" class="text-secondary text-center mt-5">There is no product here.</h2>
                                    @else
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Waiting Time</th>
                                                <th>View Count</th>
                                                <th>Created at</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- {{dd($list)}} --}}
                                            @foreach($list as $product)
                                            {{-- {{$category}} --}}
                                                {{-- {{dd($product)}} --}}
                                                <tr>
                                                    <td>
                                                        <img style="width:100px; height:80px; object-fit:contain; background: gray;" src="{{asset('storage/product/'.$product['image'])}}" alt="">
                                                    </td>
                                                    <td>{{$product['name']}}</td>
                                                    <td>{{$product['category_name']}}</td>
                                                    <td>{{$product['description']}}</td>
                                                    <td>{{$product['price']}}</td>
                                                    <td>{{$product['waiting_time']}} MIN</td>
                                                    <td>{{$product['view_count']}}</td>
                                                    <td>{{$product['created_at']}}</td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                                                <a  href="{{route('viewProduct',$product['id'])}}">
                                                                <i class="fa-sharp fa-solid fa-eye"></i>
                                                                </a>
                                                            </button>
                                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <a  href="{{route('editProduct',$product['id'])}}">
                                                                <i class="fa-solid fa-pen-to-square"></i>
                                                                </a>
                                                            </button>
                                                            <div class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <a  href="{{route('deleteProduct',$product['id'])}}">
                                                                    <i class="fa-solid fa-trash"></i>
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
                                {{$list->links()}}

                            <!-- END DATA TABLE -->

                        </div>
                    </div>
                </div>
@endsection
{{-- {{dd(Auth::user()->get()->toArray())}} --}}
