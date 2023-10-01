@extends('admin.layout.master')

@section('title','Category')

@section('main_content')

            @if(session('changedPass'))
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
            @endif

            <form action="{{route('searchCategory')}}" method="GET">
                <input type="text" name="key" value="{{request('key')}}" placeholder="key">
                {{-- <input type="text" name="order" value="{{request('order')}}" placeholder="order"> --}}
                <select type="text" name="order">
                    <option @if(!request('order'))@endif value="ASC"> Choose with order. </option>
                    <option @if(request('order') == 'ASC') selected @endif value="ASC">Oldest</option>
                    <option @if(request('order') == 'DESC') selected @endif value="DESC">Latest</option>
                </select>
                <select type="text" name="creater">
                    <option value=""> Choose with creater. </option>
                    @foreach($creaters as $creater)
                        <option @if(request('creater') == $creater['id']) selected @endif value="{{$creater['id']}}">{{$creater['admin_name']}}</option>
                    @endforeach
                </select>
                <input type="submit" value="Search">
            </form>

            <form action="{{route('adminCategoryList')}}" method="POST">
                @csrf
                <input type="submit" value="All">
            </form>

            <div>
                <p class="text-secondary">Search key :  <span class='text-danger'>{{request('search')}}</span></p>
                <h3>Total - {{$categories->total()}}</h3>
                {{-- <p>{{Auth::user()['user_name']}}</p> --}}
                {{-- {{dd($categories->toArray())}} --}}

            </div>

                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <!-- DATA TABLE -->
                            <div class="table-data__tool">
                                <div class="table-data__tool-left">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Category List</h2>
                                    </div>
                                </div>
                                <div class="table-data__tool-right">
                                    <a href="{{route('adminCategoryCreate')}}">
                                        <button  type="submit" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add item
                                        </button>
                                    </a>
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        CSV download
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                                @if(count($categories) == 0)
                                    <h2 style="color: gray;" class="text-secondary text-center mt-5">There is no category here.</h2>
                                @else
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>created at</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                        {{-- {{$category}} --}}
                                            <tr>
                                                <td>{{$category['id']}}</td>
                                                <td>{{$category['name']}}</td>
                                                <td>{{$category['created_at']}}</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                                            <a  href="{{route('adminCategoryDetail',$category['id'])}}">
                                                            <i class="fa-sharp fa-solid fa-eye"></i>
                                                            </a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <a  href="{{route('adminCategoryEdit',$category['id'])}}">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                            </a>
                                                        </button>
                                                        <div class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a  href="{{route('adminCategoryDelete',$category['id'])}}">
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
                            {{$categories->links()}}
                            {{-- {{$categories->appends(request()->query())->links()}} --}}

                            <!-- END DATA TABLE -->

                        </div>
                    </div>
                </div>
@endsection
{{-- {{dd(Auth::user()->get()->toArray())}} --}}
