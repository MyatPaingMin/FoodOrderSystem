@extends('admin.layout.master')

@section('title','Category')

@section('main_content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 offset-8">
                <a href="{{route('productlist')}}"><button class="btn bg-dark text-white my-3">List</button></a>
            </div>
        </div>
        <div class="col-lg-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Product Form</h3>
                    </div>
                    <hr>
                    <form action="{{route('productCreate')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        {{-- Name --}}
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Name</label>
                            <input id="cc-pament" name="productName" value="{{old('productName')}}" type="text" class="form-control @error('productName') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Pizza...">
                            @error('productName')
                                <small style="color: red;">{{$message}}</small>
                            @enderror
                        </div>

                        {{-- Category_ID --}}
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Category</label>
                            <select name="categoryID" id="" class="form-select" aria-label="Default select example">
                                <option selected value="">Open this select menu</option>
                                @foreach($category as $cat)
                                <option value="{{$cat['id']}}">{{$cat['name']}}</option>
                                @endforeach
                            </select>
                            @error('categoryID')
                                <small style="color: red;">{{$message}}</small>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Description</label>
                            <input id="cc-pament" name="productDescription" value="{{old('productDescription')}}" type="text" class="form-control @error('productDescription') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Please enter the description...">
                            @error('productDescription')
                                <small style="color: red;">{{$message}}</small>
                            @enderror
                        </div>

                        {{-- image --}}
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">productImage</label>
                            <input id="cc-pament" name="productImage" value="{{old('productImage')}}" type="file" class="form-control @error('productImage') is-invalid @enderror" aria-required="true" aria-invalid="false" >
                            @error('productImage')
                                <small style="color: red;">{{$message}}</small>
                            @enderror
                        </div>

                        {{-- waiting_time --}}

                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Waiting Time</label>
                            <input id="cc-pament" name="productWait" value="{{old('productWait')}}" type="text" class="form-control @error('productName') is-invalid @enderror" aria-required="true" aria-invalid="false">
                            @error('productWait')
                                <small style="color: red;">{{$message}}</small>
                            @enderror
                        </div>

                        {{-- Price --}}
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Price</label>
                            <input id="cc-pament" name="productPrice" value="{{old('productPrice')}}" type="text" class="form-control @error('productPrice') is-invalid @enderror" aria-required="true" aria-invalid="false">
                            @error('productPrice')
                                <small style="color: red;">{{$message}}</small>
                            @enderror
                        </div>

                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Create</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                <i class="fa-solid fa-circle-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
