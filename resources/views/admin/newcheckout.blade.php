@extends('admin.layouts.app')
@section('content')
<br><br>
<h3>Welcome back admin , you have {{$nbr}} new Orders(s)</h3>
<div class="row">
    @foreach($orders as $order)
        <div class="col-lg-3">
            <div class="card">
                <div class="card-title">
                    <h4>Order to {{$order->country}}</h4>
                    <div class="card-title-right-icon">
                        <ul>
                            For : {{$order->user->firstName}}            
                        </ul>
                        
                    </div>
                </div>
                <form action="/admin/percheckout/user/{{$order->user->id}}" method="get">
                    @csrf
                    <input type="hidden" name="user_id" value="{{$order->user->id}}">
                    <div class="sweetalert m-t-15">
                        <button class="btn btn-warning btn sweet-confirm">Complete Order</button>
                    </div>
                </form>
            </div>
                                <!-- /# card -->
        </div>
    @endforeach
</div>
@endsection