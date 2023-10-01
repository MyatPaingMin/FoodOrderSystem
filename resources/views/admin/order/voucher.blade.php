{{-- {{dd($list)}} --}}
@extends('admin.layout.master')

@section('title','Category')

@section('main_content')

<div>
    <div class="col-5">
        <div class="row m-4 p-5 bg-white">
            <p class="row p-2"> Order ID - {{$list[0]['order_id']}}</p>
            <p class="row p-2"> Customer Name -
                @if($list[0]['user_name'])
                    {{$list[0]['user_name']}}
                @else
                    <span class="text-danger">deleted user</span>
                @endif
            </p>
            <p class="row p-2"> Date - {{$list[0]['order_date']}}</p>
        </div>
    </div>
</div>

<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="col-md-12">
<div class="table-responsive table-responsive-data2">
    @if(count($list) == 0)
        <h2 style="color: gray;" class="text-secondary text-center mt-5">There is no category here.</h2>
    @else
    <table class="table table-data2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product</th>
                <th>Created at</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $item)
            {{-- {{$category}} --}}
                <tr>
                    <td>{{$item['item_id']}}</td>
                    <td>
                        <img src="{{asset('storage/product/'.$item['image'])}}" alt="" width="50px" height="50px">
                    </td>
                    <td>{{$item['product_name']}}</td>
                    <td>{{$item['created_at']}}</td>
                    <td>{{round($item['price'])}}</td>
                    <td>{{$item['quantity']}}</td>
                    <td>{{$item['price'] * $item['quantity']}}</td>
                    <td>
                        {{-- <div class="table-data-feature">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="View">
                                <a  href="{{route('viewCategory',$item['item_id'])}}">
                                <i class="fa-sharp fa-solid fa-eye"></i>
                                </a>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <a  href="{{route('editCategory',$item['item_id'])}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </button>
                            <div class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <a  href="{{route('deleteCategory',$item['item_id'])}}">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </div> --}}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    @endif
</div>
{{$list->links()}}

</div>
</div>
</div>
@endsection
