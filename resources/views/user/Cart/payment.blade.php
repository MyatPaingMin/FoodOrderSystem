@extends('user/layout/master')

@section('content')
    @if(session('payment'))
        Ordered successfully.
    @endif

    <h1>Payment Section</h1>


@endsection
