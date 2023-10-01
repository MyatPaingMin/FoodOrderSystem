@extends('admin.layout.master');

@section('main_content')
@if(session('updateProfile'))
    <h1 style="color: green;">{{session('updateProfile')}}</h1>
@endif
<div class="section__content section__content--p30">
    <div class="container-fluid row">

        {{-- <div class="col-2 offset-8">

        </div> --}}

        <div class="col-10 offset-2 m-0 p-0">
            <div class="card w-100 m-0 p-0">
                <div class="card-body">


                    <div class="card-title position-relative">
                        <button class="btn text-dark position-absolute top--1 start-0 fs-3" onclick="history.back()"><i class="fa-sharp fa-solid fa-arrow-left"></i></button>
                        {{-- <a href="{{route('productlist')}}">
                            <button class="btn text-dark position-absolute top--1 start-0 fs-3">
                                <i class="fa-sharp fa-solid fa-arrow-left"></i>
                            </button>
                        </a> --}}
                        <h3 class="text-center title-2">Product Detail</h3>
                    </div>
                    <hr>
                    <div class="p-1 m-1 row">
                        <div class="col-2 offset-1">
                            <div class="row w-100 d-flex justify-content-center">

                                {{-- @if({{$productDetail['image']}} == NULL)
                                    <img src="" alt="">
                                @else --}}
                                    <img src="{{asset('storage/product/'.$productDetail['image'])}}" class="img-thumbnail" alt="profile" class="w-100">
                                {{-- @endif --}}

                            </div>
                            <br>
                            <div class="row w-100 d-flex justify-content-center">
                                <a href="{{route('editProduct',$productDetail['id'])}}" class=" btn btn-dark rounded">Edit</a>
                            </div>
                        </div>
                        <div class="col-8 offset-1">
                            <div class="fs-4 fw-3 text-decoration-underline "><b>{{$productDetail['name']}}</b></div>
                            <br>
                            <div class="row w-100">
                                <span class="fs-6 rounded text-white bg-dark p-2 text-center col mr-2"><i class="fa-solid fa-circle-info pr-2"></i> {{$productDetail['name']}}</span>
                                <br>
                                <span class="fs-6 rounded text-white bg-dark p-2 text-center col mr-2"><i class="fa-solid fa-clock pr-2"></i> {{$productDetail['waiting_time']}}</span>
                                <br>
                                <span class="fs-6 rounded text-white bg-dark p-2 text-center col mr-2"><i class="fa-solid fa-coins pr-2"></i>{{$productDetail['price']}}</span>
                                <br>
                            </div>
                            <br><br>
                            <div class="fs-5 text-dark">Description :
                                <br>
                                <small class="text-gray ">{{$productDetail['description']}}</small>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
