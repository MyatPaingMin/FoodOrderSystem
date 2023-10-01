@extends('admin.layout.master')

@section('title','Admin Order')

@section('main_content')

  <!-- DATA TABLE -->
  <div class="table-data__tool">
    <div class="table-data__tool-left">
        <div class="overview-wrap">
            <h2 class="title-1">Order List</h2>
        </div>
    </div>
    <div class="table-data__tool-right">
        <a href="#">
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
            <h2> Total - <span>{{$orders->total()}}</span> </h2>
        </div>
        <div class="d-flex w-100" style="width: 100%;">
            <div class="d-flex mb-3" style="width: 300px;">
                <label for="selectBox" class="w-25 ml-2 fs-4">Status</label>
                <select class="form-select w-75 statusChange" id="selectBox" aria-label="Default select example">
                    <option selected value="all"> All </option>
                    <option value="0">Pending</option>
                    <option value="1">Success</option>
                    <option value="2">Reject</option>
                </select>
            </div>
            <form method="GET" action="{{route('userorderlist')}}" class="d-flex flex-row align-self-end">
                <input type="date" name="startDate"  value="{{request('startDate')}}">
                <span>TO</span>
                <input type="date" name="endDate" value="{{request('endDate')}}">
                <input type="submit">
            </form>
        </div>

        <div class=" d-flex flex-row">
            <form action="{{route('userorderlist')}}" method="GET">
                <input type="text" name="search" value="{{request('search')}}">
                <input type="submit" value="Search">
            </form>
            <a href="{{route('userorderlist')}}">All</a>
        </div>

        <div>
            <p class="fs-4">Search Key : <span class="text-danger">{{request('search')}}</span></p>
        </div>
        {{-- {{dd(count($list))}} --}}
        @if(count($orders) == 0)
            <h2 style="color: gray;" class="text-secondary text-center mt-5">There is no orders.</h2>
        @else
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>Date</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {{-- {{dd($list)}} --}}
                @foreach($orders as $order)
                {{-- {{$category}} --}}
                    {{-- {{dd($product)}} --}}
                    <tr>
                        <td class="orderID">{{$order['id']}}</td>
                        <td>{{$order['user_id']}}</td>
                        <td>
                            @if($order['user_name'])
                                {{$order['user_name']}}
                            @else
                                <span class="text-danger">deleted user</span>
                            @endif
                        </td>
                        <td>{{$order['created_at']->format('Y-m-d | h : m : s')}}</td>
                        <td>{{$order['total_price']}} kyat</td>
                        <td>
                            <select class="adminChoice"  onchange="changeStatus(this);">
                                <option value="0" @if($order['status'] == 0) selected @endif>Pending</option>
                                <option value="1" @if($order['status'] == 1) selected @endif>Success</option>
                                <option value="2" @if($order['status'] == 2) selected @endif>Reject</option>
                            </select>
                        </td>

                        <td>
                            <div class="table-data-feature" >

                                <button class="item mx-3" data-toggle="tooltip" data-placement="top" title="View">
                                    <a  href="{{route('viewVoucher',$order['id'])}}">
                                    <i class="fa-sharp fa-solid fa-eye"></i>
                                    </a>
                                </button>
                                {{-- <button class="item mx-3" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <a  href="{{route('editProduct',$order['id'])}}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </button> --}}

                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        @endif
    </div>
    {{$orders->appends(request()->query())->links()}}

<!-- END DATA TABLE -->
@endsection


@section('sourceScript')
<script>
// console.log('sourceScript');
$(document).ready(function(){


    $('.statusChange').on('change',function(){
        $status = $('.statusChange').val();
        console.log($status);


        $.ajax({
            type: 'GET',
            url: 'http://127.0.0.1:8000/admin/ajax/order/status',
            data: {
                'status' : $status
            },
            datatype: 'json',
            success: function(response){
                console.log(response.data.length);
                // console.log(JSON.parse(response.data));

                $rows = '';
                for (let $i = 0; $i < response.data.length; $i++)
                {
                        var id = response.data[$i].id;
                        console.log(response.data[$i].id);

                        var d = new Date(response.data[$i].created_at);
                        // var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                        var date = d.getDate() + " - " + d.getMonth() + " - " + d.getFullYear();
                        var time = d.toLocaleTimeString().toLowerCase();
                        $chosenOpt  = '';

                    if(response.data[$i].status == 0 ){
                        $chosenOpt =
                        `<select class="adminChoice" onchange="changeStatus(this);">
                            <option value="0" selected>Pending</option>
                            <option value="1">Success</option>
                            <option value="2">Reject</option>
                        </select>`;
                    }else if(response.data[$i].status == 1 ){
                        $chosenOpt =
                        `<select class="adminChoice" onchange="changeStatus(this);">
                            <option value="0" >Pending</option>
                            <option value="1" selected>Success</option>
                            <option value="2">Reject</option>
                        </select>`;
                    }else if(response.data[$i].status == 2 ){
                        $chosenOpt =
                        `<select class="adminChoice" onchange="changeStatus(this);">
                            <option value="0" >Pending</option>
                            <option value="1">Success</option>
                            <option value="2" selected>Reject</option>
                        </select>`;
                    }

                        // <select>
                        //         <option value="0" ${if(response[$i].status == 0){'selected'}}>Pending</option>
                        //         <option value="1" ${if(response[$i].status == 1){'selected'}}>Success</option>
                        //         <option value="2" ${if(response[$i].status == 2){'selected'}}>Reject</option>
                        // </select>
                        $rows +=
                    `<tr>
                        <td class='orderID'>${response.data[$i].id}</td>
                        <td>${response.data[$i].user_id}</td>
                        <td>${response.data[$i].user_name}</td>
                        <td>
                            ${date} | ${time}
                        </td>
                        <td>${response.data[$i].total_price} kyat</td>

                        <td>
                                ${$chosenOpt}
                        </td>

                        <td>
                            <div class="table-data-feature" >

                                <button class="item mx-3" data-toggle="tooltip" data-placement="top" title="View">
                                    <a  href="{{route('viewProduct',1)}}">
                                    <i class="fa-sharp fa-solid fa-eye"></i>
                                    </a>
                                </button>
                                <button class="item mx-3" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <a  href="{{route('editProduct',1)}}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </button>

                            </div>
                        </td>
                    </tr> `

                    // `<tr>
                    //     <td>{{$order['id']}}</td>
                    //     <td>{{$order['user_id']}}</td>
                    //     <td>{{$order['user_name']}}</td>
                    //     <td>{{$order['created_at']}}</td>
                    //     <td>{{$order['total_price']}} kyat</td>
                    //     <td>
                    //         <select>
                    //             <option value="0" @if($order['status'] == 0) selected @endif>Pending</option>
                    //             <option value="1" @if($order['status'] == 1) selected @endif>Success</option>
                    //             <option value="2" @if($order['status'] == 2) selected @endif>Reject</option>
                    //         </select>
                    //     </td>

                    //     <td>
                    //         <div class="table-data-feature" >

                    //             <button class="item mx-3" data-toggle="tooltip" data-placement="top" title="View">
                    //                 <a  href="{{route('viewProduct',$order['id'])}}">
                    //                 <i class="fa-sharp fa-solid fa-eye"></i>
                    //                 </a>
                    //             </button>
                    //             <button class="item mx-3" data-toggle="tooltip" data-placement="top" title="Edit">
                    //                 <a  href="{{route('editProduct',$order['id'])}}">
                    //                 <i class="fa-solid fa-pen-to-square"></i>
                    //                 </a>
                    //             </button>

                    //         </div>
                    //     </td>
                    // </tr> `
                }
                // console.log($rows);
                $('tbody').html($rows);
            }
        })
    });





    })

function changeStatus(select){
        console.log('STATUS CHANGE');
        $orderID = $(select).parents('tr').find('.orderID').text();
        console.log($orderID);

        $.ajax({
            type :  "GET",
            url : "http://127.0.0.1:8000/admin/ajax/order/admit",
            data : {
                "orderID" : $orderID,
                "status" : $('.adminChoice').val()
            },
            datatype : "json",
            success : function(response){
                console.log(response);
            }
        });
    }
</script>
@endsection

