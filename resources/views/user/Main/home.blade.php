{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>HOME PAGE OF CUSTOMER</h1>
    <h3>Role - {{Auth::user()->role}}</h3>

    <form action="{{route('logout')}}" method="POST">
        @csrf
        <input type="submit" value="Logout">
    </form>
</body>
</html> --}}
@extends('user/layout/master')

@section('content')
    {{-- <h1>HOME PAGE OF CUSTOMER</h1>
    <h3>Role - {{Auth::user()->role}}</h3> --}}


    <!-- Shop Start -->
    <div class="container-fluid" onload= myFunction()>
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">

                @if(session('itemAdded'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <p>{{message('itemAdded')}}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <!-- Price Start -->
                {{-- <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-1">
                            <l abel class="custom-control-label" for="price-1">$0 - $100</l>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-2">
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-3">
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="price-4">
                            <label class="custom-control-label" for="price-4">$300 - $400</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="price-5">
                            <label class="custom-control-label" for="price-5">$400 - $500</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Price End -->

                <!-- Color Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by color</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" checked id="color-all">
                            <label class="custom-control-label" for="price-all">All Color</label>
                            <span class="badge border font-weight-normal">1000</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-1">
                            <label class="custom-control-label" for="color-1">Black</label>
                            <span class="badge border font-weight-normal">150</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-2">
                            <label class="custom-control-label" for="color-2">White</label>
                            <span class="badge border font-weight-normal">295</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-3">
                            <label class="custom-control-label" for="color-3">Red</label>
                            <span class="badge border font-weight-normal">246</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" id="color-4">
                            <label class="custom-control-label" for="color-4">Blue</label>
                            <span class="badge border font-weight-normal">145</span>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" id="color-5">
                            <label class="custom-control-label" for="color-5">Green</label>
                            <span class="badge border font-weight-normal">168</span>
                        </div>
                    </form>
                </div>
                <!-- Color End --> --}}

                <!-- Size Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3"></span></h5>
                <div class="bg-light mb-30">
                    <form>
                        <div class="custom-control w-100 custom-checkbox d-flex align-items-center bg-dark text-white justify-content-between">

                            <p class=" p-3 fs-1 " for="size-all">Categories</p>
                            <span class="badge border font-weight-normal m-3">{{count($category)}}</span>
                        </div>

                        @foreach($category as $cat)
                                <div>
                                    {{-- RouteGet separate function  --}}
                                    {{-- <a href="{{route('filterCat',$cat->id)}}" class="px-3 py-2" for="size-1"> - {{$cat->name}}</a> --}}

                                    {{-- Same function using WHEN  --}}
                                    <form action="{{route('userHome')}}" method="GET">
                                        <input type="text" name="filterCategory" value='{{$cat->id}}' hidden>
                                        <input type="submit" value=" {{$cat->name}}">
                                    </form>

                                    {{-- ajax --}}
                                    <p class="px-3 py-2 categoryShift" id="{{$cat->id}}"> - {{$cat->name}}</p>
                                </div>
                        @endforeach

                        <p class="px-3 py-2 categoryShift" id="all"> - All</p>

                    </form>
                </div>
                <div class="">
                    <button class="btn btn btn-warning w-100">Order</button>
                </div>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Popularity</a>
                                        <a class="dropdown-item" href="#">Best Rating</a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    {{-- <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button> --}}
                                    {{-- <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item ascending"  href="#">Ascending</a>
                                        <a class="dropdown-item descending" href="#">Descending</a>
                                    </div> --}}

                                    <select name="sorting" id="sortingID">
                                        <option value="asc">Ascending</option>
                                        <option value="desc" selected>Descending</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                    <div class="row" id="myList">

                    @if(count($pizzas) == 0)
                        <h2 class="col offset-3">There is no category here.</h2>
                    @else
                    @foreach($pizzas as $pizza)
                        <a href="detail.html">
                            <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                <div class="product-item bg-light mb-4">
                                    <div class="product-img position-relative overflow-hidden">
                                        <img class="img-fluid w-100" src="{{asset('storage/product/'.$pizza->image)}}" alt="">
                                        <div class="product-action">
                                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                            <a class="btn btn-outline-dark btn-square" href="{{route('pizzaDetail',$pizza->id)}}"><i class="fa-solid fa-circle-info"></i></a>
                                        </div>
                                    </div>
                                    <div class="text-center py-4">
                                        <div class="h6 text-decoration-none text-truncate">
                                            {{-- {{dd($pizza->product_id)}} --}}
                                            <div class="loveReact d-inline" id={{$pizza->id}}>
                                                {{-- @if($pizza->love)
                                                    @if($pizza->love == 1)
                                                        <i class="fa-solid fa-heart text-danger loveIcon"></i>
                                                    @else
                                                        <i class="fa-regular fa-heart loveIcon"></i>
                                                    @endif
                                                @else
                                                    <i class="fa-regular fa-heart loveIcon"></i>
                                                @endif --}}

                                            </div>

                                            {{$pizza->name}}
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center mt-2">
                                            <h5>{{$pizza->price}}</h5><h6 class="text-muted ml-2"><del>25000</del></h6>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center mb-1">
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                            <small class="fa fa-star text-primary mr-1"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    @endif

                    </div>
                </div>
                    {{-- <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="https://onecms-res.cloudinary.com/image/upload/s--sEfcyVTf--/c_crop%2Ch_717%2Cw_957%2Cx_153%2Cy_771/c_fill%2Cg_auto%2Ch_622%2Cw_830/f_auto%2Cq_auto/v1/mediacorp/cna/image/2022/04/01/final-2.jpeg?itok=urO6AS9r" alt="">
                                <!-- <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div> -->
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">Cheesy Pizza</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>20000 kyats</h5><h6 class="text-muted ml-2"><del>25000</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="https://danamic-media.danamic.org/danamic-production/2022/04/12003417/Chicken-Satay-Pizza-Top-1024x1024.jpg" alt="">
                                <!-- <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div> -->
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">Cheesy Pizza</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>20000 kyats</h5><h6 class="text-muted ml-2"><del>25000</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="https://d1sag4ddilekf6.azureedge.net/compressed_webp/items/SGITE20200407093514014750/detail/674be39ff1144d6e9f5db2211c92f067_1590056669449973127.webp" alt="">
                                <!-- <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div> -->
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">Cheesy Pizza</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>20000 kyats</h5><h6 class="text-muted ml-2"><del>25000</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="https://media-cdn.tripadvisor.com/media/photo-s/1a/62/fb/84/pizza-hut.jpg" alt="">
                                <!-- <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                                </div> -->
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="">Cheesy Pizza</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>20000 kyats</h5><h6 class="text-muted ml-2"><del>25000</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>

            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
@endsection

@section('sourceScript')
<script>

    $catID = 'all';
    $order = 'desc';

    $(document).ready(function(){

        // $loveReact = document.querySelector('.loveReact');
        // for (let i = 0; i < $loveReact.length; i++) {
        //     $loveReact[i].html(loveFunction());
        // }

        // $(".loveReact").text(loveFunction());

        $('.categoryShift').on('click',function(){
            $catID = this.id;
            changeList();
        })

        $('#sortingID').on('change',function(){
            $order = $('#sortingID').val();
            changeList();
        })

        // function loveFunction(){
        //     console.log('entry');
        //     var userID = {{Auth::user()['id']}};
        //     var productID = $(this).attr('id');

        //     $.ajax({
        //         type : 'GET',
        //         url : 'http://127.0.0.1:8000/user/love',
        //         data : {
        //             "userID" : userID,
        //             "productID" : productID,
        //         },
        //         datatype : 'json',
        //         success : function(response){
        //             console.log(response);
        //             if(response == 1){
        //                 console.log('Love');
        //                 return `<i class="fa-regular fa-heart "></i>`;
        //             }else{
        //                 console.log('pt');
        //                 // return `<i class="fa-solid fa-heart text-danger"></i>`;
        //                 return '<h1>HIHIHIHI</h1>';
        //             }
        //         }
        //     })
        // }

        function changeList(){
            $.ajax({
                    type : 'get',
                    url : 'http://127.0.0.1:8000/user/ajax/pizza/orderCat',
                    data : {
                        'order' :  $order,
                        'catID' : $catID
                    },
                    datatype : 'json',
                    success : function(response){
                        console.log($order);
                        // console.log(JSON.parse(response));
                        $list = '';
                    if(response.length == 0){
                        $('#myList').html(`<h2 class="col offset-3">There is no category here.</h2>`);
                    }else{

                    for (let $i = 0; $i < response.length; $i++) {
                        var id = response[$i].id;
                        // var love = loveFunction($id);
                        // console.log(love);
                        console.log(response[$i].id);
                        $list += `
                                <a href="detail.html">
                                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                                        <div class="product-item bg-light mb-4">
                                            <div class="product-img position-relative overflow-hidden">
                                                <img class="img-fluid w-100" src="{{asset('storage/product/${response[$i].image}')}}" alt="">
                                                <div class="product-action">
                                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                                    <a class="btn btn-outline-dark btn-square" href="{{route('pizzaDetail',1)}}"><i class="fa-solid fa-circle-info"></i></a>
                                                </div>
                                            </div>
                                            <div class="text-center py-4">

                                                <div class="h6 text-decoration-none text-truncate">
                                                    <div class="d-inline">
                                                        love
                                                    </div>
                                                    ${response[$i].name}
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center mt-2">
                                                    <h5>${response[$i].price}</h5><h6 class="text-muted ml-2"><del>25000</del></h6>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center mb-1">
                                                    <small class="fa fa-star text-primary mr-1"></small>
                                                    <small class="fa fa-star text-primary mr-1"></small>
                                                    <small class="fa fa-star text-primary mr-1"></small>
                                                    <small class="fa fa-star text-primary mr-1"></small>
                                                    <small class="fa fa-star text-primary mr-1"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                `;

                                // console.log($list);
                                $('#myList').html($list);
                    }
                }}})
        }

        function clickFunction(){
            console.log('clicked');
        }


        $(".loveIcon").click(function(){
            var userID = {{Auth::user()['id']}};
            var productID = $(this).parent().attr('id');

            console.log(productID);

            $.ajax({
                type : 'GET',
                url : 'http://127.0.0.1:8000/user/loveClick',
                data : {
                    "userID" : userID,
                    "productID" : productID,
                },
                datatype : 'json',
                success : function(response){
                    console.log(response);
                }
            })
        })

    })



//     $(document).ready(function(){

//         $('#sortingID').on('change', function() {
//             console.log('change');
//             $order = $('#sortingID').val();
//             if($order == 'asc'){
//                 $.ajax({
//                     type : 'get',
//                     url : 'http://127.0.0.1:8000/user/ajax/pizza/list',
//                     data : {'status' :  'asc'},
//                     datatype : 'json',
//                     success : function(response){
//                         // console.log(response);
//                         $list = '';

//                         for (let $i = 0; $i < response.length; $i++) {
//                             $element = response[$i];
//                             $list += `
//                                 <a href="detail.html">
//                                     <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
//                                         <div class="product-item bg-light mb-4">
//                                             <div class="product-img position-relative overflow-hidden">
//                                                 <img class="img-fluid w-100" src="{{asset('storage/product/${response[$i].image}')}}" alt="">
//                                                 <div class="product-action">
//                                                     <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
//                                                     <a class="btn btn-outline-dark btn-square" href=""><i class="fa-solid fa-circle-info"></i></a>
//                                                 </div>
//                                             </div>
//                                             <div class="text-center py-4">
//                                                 <a class="h6 text-decoration-none text-truncate" href="">${response[$i].name}</a>
//                                                 <div class="d-flex align-items-center justify-content-center mt-2">
//                                                     <h5>${response[$i].price}</h5><h6 class="text-muted ml-2"><del>25000</del></h6>
//                                                 </div>
//                                                 <div class="d-flex align-items-center justify-content-center mb-1">
//                                                     <small class="fa fa-star text-primary mr-1"></small>
//                                                     <small class="fa fa-star text-primary mr-1"></small>
//                                                     <small class="fa fa-star text-primary mr-1"></small>
//                                                     <small class="fa fa-star text-primary mr-1"></small>
//                                                     <small class="fa fa-star text-primary mr-1"></small>
//                                                 </div>
//                                             </div>
//                                         </div>
//                                     </div>
//                                 </a>
//                                 `;

//                             console.log($element);
//                             console.log($list);
//                         }
//                         $("#myList").html($list);

//                     }
//                 })
//             }else if($order == 'desc'){
//                 $.ajax({
//                     type : 'get',
//                     url : 'http://127.0.0.1:8000/user/ajax/pizza/list',
//                     data : {'status' :  'desc'},
//                     datatype : 'json',
//                     success : function(response){
//                         // console.log(response);
//                         $list = '';

//                         for (let $i = 0; $i < response.length; $i++) {
//                             $element = response[$i];
//                             $list += `
//                                 <a href="detail.html">
//                                     <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
//                                         <div class="product-item bg-light mb-4">
//                                             <div class="product-img position-relative overflow-hidden">
//                                                 <img class="img-fluid w-100" src="{{asset('storage/product/${response[$i].image}')}}" alt="">
//                                                 <div class="product-action">
//                                                     <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
//                                                     <a class="btn btn-outline-dark btn-square" href=""><i class="fa-solid fa-circle-info"></i></a>
//                                                 </div>
//                                             </div>
//                                             <div class="text-center py-4">
//                                                 <a class="h6 text-decoration-none text-truncate" href="">${response[$i].name}</a>
//                                                 <div class="d-flex align-items-center justify-content-center mt-2">
//                                                     <h5>${response[$i].price}</h5><h6 class="text-muted ml-2"><del>25000</del></h6>
//                                                 </div>
//                                                 <div class="d-flex align-items-center justify-content-center mb-1">
//                                                     <small class="fa fa-star text-primary mr-1"></small>
//                                                     <small class="fa fa-star text-primary mr-1"></small>
//                                                     <small class="fa fa-star text-primary mr-1"></small>
//                                                     <small class="fa fa-star text-primary mr-1"></small>
//                                                     <small class="fa fa-star text-primary mr-1"></small>
//                                                 </div>
//                                             </div>
//                                         </div>
//                                     </div>
//                                 </a>
//                                 `;

//                             console.log($element);
//                             console.log($list);
//                         }
//                         $("#myList").html($list);

//                     }
//                 })
//             }
//         });
//     })


//     $(document).ready(function(){
//         $('.categoryShift').on('click',function(){
//             // console.log(this.id);
//             $catId = this.id;

//             $.ajax({
//                 url : 'http://127.0.0.1:8000/user/ajax/pizza/category',
//                 type : 'GET',
//                 data : {
//                     'catID' : $catId
//                 },
//                 datatype : 'json',
//                 success : function(response){
//                     $list = '';
//                     if(response.length == 0){
//                         $('#myList').html(`<h2 class="col offset-3">There is no category here.</h2>`);
//                     }else{

//                     for (let $i = 0; $i < response.length; $i++) {
//                         $list += `
//                                 <a href="detail.html">
//                                     <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
//                                         <div class="product-item bg-light mb-4">
//                                             <div class="product-img position-relative overflow-hidden">
//                                                 <img class="img-fluid w-100" src="{{asset('storage/product/${response[$i].image}')}}" alt="">
//                                                 <div class="product-action">
//                                                     <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
//                                                     <a class="btn btn-outline-dark btn-square" href=""><i class="fa-solid fa-circle-info"></i></a>
//                                                 </div>
//                                             </div>
//                                             <div class="text-center py-4">
//                                                 <a class="h6 text-decoration-none text-truncate" href="">${response[$i].name}</a>
//                                                 <div class="d-flex align-items-center justify-content-center mt-2">
//                                                     <h5>${response[$i].price}</h5><h6 class="text-muted ml-2"><del>25000</del></h6>
//                                                 </div>
//                                                 <div class="d-flex align-items-center justify-content-center mb-1">
//                                                     <small class="fa fa-star text-primary mr-1"></small>
//                                                     <small class="fa fa-star text-primary mr-1"></small>
//                                                     <small class="fa fa-star text-primary mr-1"></small>
//                                                     <small class="fa fa-star text-primary mr-1"></small>
//                                                     <small class="fa fa-star text-primary mr-1"></small>
//                                                 </div>
//                                             </div>
//                                         </div>
//                                     </div>
//                                 </a>
//                                 `;

//                                 console.log($list);
//                                 $('#myList').html($list);

//                     }
//                 }}
//             })
//         })
//     })
</script>
@endsection


