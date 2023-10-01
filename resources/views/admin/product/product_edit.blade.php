@extends('admin.layout.master')

@section('title','Category')

@section('main_content')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="col-lg-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-title position-relative">
                        <button class="btn text-dark position-absolute bottom-3 start-0 fs-3" onclick="history.back()"><i class="fa-sharp fa-solid fa-arrow-left"></i></button>
                        {{-- <a href="{{route('viewProduct',$productDetail->id)}}">
                            <button class="btn text-dark position-absolute bottom-3 start-0 fs-3">
                                <i class="fa-sharp fa-solid fa-arrow-left"></i>
                            </button>
                        </a> --}}
                        <h3 class="text-center title-2">Edit Product</h3>
                    </div>
                    <hr>
                        <form class="row" action="{{route('updateProduct')}}"  method="POST" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf

                        <div class="col-5 mt-3">
                            <img src="{{asset('storage/product/'.$productDetail['image'])}}" alt="">
                            <br>
                            {{-- image --}}
                            <div class="form-group">
                                {{-- <label for="cc-payment" class="control-label mb-1">productImage</label> --}}
                                <input id="cc-pament" name="productImage" value="{{old('productImage')}}"   type="file" class="form-control @error('productImage') is-invalid     @enderror" aria-required="true" aria-invalid="false" >
                                @error('productImage')
                                    <small style="color: red;">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            {{-- ID  --}}
                                <input id="cc-pament" hidden name="id" value="{{$productDetail->id,old  ('productid')}}" type="text" class="form-control">


                            {{-- Name --}}
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Name</label>
                                <input id="cc-pament" name="productName" value="{{$productDetail->name,old  ('productName')}}" type="text" class="form-control @error('productName')  is-invalid @enderror" aria-required="true" aria-invalid="false"  placeholder="Pizza...">
                                @error('productName')
                                    <small style="color: red;">{{$message}}</small>
                                @enderror
                            </div>

                            {{-- Category_ID --}}
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Category</label>
                                <select name="categoryID" id="" class="form-select" aria-label="Default     select example">
                                    <option value="">Open this select menu</option>
                                    @foreach($category as $cat)
                                        @if($cat['id'] == $productDetail['category_id'])
                                            <option value="{{$cat['id']}}" selected>{{$cat['name']}}</option>
                                        @else
                                            <option value="{{$cat['id']}}">{{$cat['name']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('categoryID')
                                    <small style="color: red;">{{$message}}</small>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Description</label>
                                <input id="cc-pament" name="productDescription" value="{{   $productDetail->description,old('productDescription')}}" type="text"  class="form-control @error('productDescription') is-invalid @enderror"   aria-required="true" aria-invalid="false" placeholder="Please enter the   description...">

                                @error('productDescription')
                                    <small style="color: red;">{{$message}}</small>
                                @enderror
                            </div>



                            {{-- waiting_time --}}

                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Waiting Time</label>
                                <input id="cc-pament" name="productWait" value="{{  $productDetail->waiting_time,old('productWait')}}" type="text"   class="form-control @error('productName') is-invalid @enderror"   aria-required="true" aria-invalid="false">
                                @error('productWait')
                                    <small style="color: red;">{{$message}}</small>
                                @enderror
                            </div>

                            {{-- Price --}}
                            <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Price</label>
                                <input id="cc-pament" name="productPrice" value="{{$productDetail->price,   old('productPrice')}}" type="text" class="form-control @error  ('productPrice') is-invalid @enderror" aria-required="true"   aria-invalid="false">
                                @error('productPrice')
                                    <small style="color: red;">{{$message}}</small>
                                @enderror
                            </div>
                        <div class="row justify-content-center">
                        <div class="w-50">
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info    btn-block">
                                <span id="payment-button-amount">Update</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                                <i class="fa-solid fa-circle-right"></i>
                            </button>
                        </div>

                    </div>
                </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
