@extends('user/layout/master')

@section('content')

 <!-- Cart Start -->
 <div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">

                    @foreach($items as $i)
                    <tr>
                        <td class="align-middle userID" hidden>{{Auth::user()['id']}}</td>
                        <td class="align-middle productID" hidden>{{$i['id']}}</td>
                        <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;">{{$i['name']}}</td>
                        <td class="align-middle productPrice">{{$i['price']}}</td>
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-minus minusButton">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center pro_qty" value="{{$i['quantity']}}">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-primary btn-plus plusButton">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td class="align-middle itemPrice">{{$i['price'] * $i['quantity']}} kyat</td>
                        <td class="align-middle"><button class="btn btn-sm btn-danger btnRemove"><i class="fa fa-times"></i></button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Subtotal</h6>
                        <h6 class="subtotalPrice">
                            {{$totalPrice}} kyat
                        </h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">3000 kyat</h6>
                    </div>
                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5 class="alltotalPrice">{{$totalPrice + 3000}} kyat</h5>
                    </div>
                    @if(count($items) == 0)
                        <a class="btn btn-block btn-primary font-weight-bold my-3 py-3 orderButton disabled" > Proceed To Checkout</a>
                    @else
                        <a class="btn btn-block btn-primary font-weight-bold my-3 py-3 orderButton " > Proceed To Checkout</a>
                    @endif

                    <a class="btn btn-block btn-primary font-weight-bold my-3 py-3 clearButton @if(count($items) == 0) disabled @endif">Clear Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->
@endsection

@section('sourceScript')
    <script src="{{asset('user/js/cartCtrl.js')}}"></script>
@endsection
