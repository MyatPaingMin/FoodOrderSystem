
@extends('user/layout/master')

@section('content')

<div class="col-lg-8 table-responsive mb-5">
    <table class="table table-light table-borderless table-hover text-center mb-0 ">
        <thead class="thead-dark">
            <tr>
                <th>Date</th>
                <th>Order Code</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="align-middle ">

            @foreach($orders as $order)
            <tr style="height: 63px;">
                <td class="align-middle productPrice">{{$order['created_at']->format('h: m: s  |  Y-m-d')}}</td>
                <td class="align-middle productPrice">{{$order['id']}}</td>
                <td class="align-middle productPrice">{{$order['total_price']}}</td>
                <td class="align-middle productPrice">
                    @if($order['status'] == 0)
                        <span class="text-warning"><i class="fa-regular fa-clock"></i> Pending</span>
                    @elseif($order['status'] == 1)
                        <span class="text-success"><i class="fa-solid fa-check"></i> Success</span>
                    @elseif($order['status'] == 2)
                        <span class="text-danger"><i class="fa-solid fa-circle-exclamation"></i> Rejected</span>
                    @endif
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

            <div class="mt-2">
                {{$orders->links()}}
            </div>
</div>
@endsection
