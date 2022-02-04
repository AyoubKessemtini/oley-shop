@extends('admin.layouts.app')
@section('content')
<br><br>
<h3>Welcome back admin , <span style="color: #e7b63a;">{{$orderinfo->user->firstName}} {{$orderinfo->user->lastName}}</span> has new order!</h3>
<div class="row">
    @foreach($cart as $product)
        <div class="col-lg-3">
            <div class="card">
                <div class="card-title">
                    <h4>{{$product->product->title}}</h4>
                    <div class="card-title-right-icon">
                        <ul>
                            Quantity : {{$product->qte}}            
                        </ul>
                        <ul>
                            Total : ${{$product->qte * $product->product->price}}            
                        </ul>
                        <ul>
                            <a href="{{$product->product->link}}" target="_blank"><span style="color:#e7b63a">link</span></a>           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-12">
            <div class="card">
                <div class="card-title">
                    <h3>Total to pay : <span style="color: #e7b63a;">${{$totaltopay}}</span> </h3>
                </div>
            </div>
    </div>
    <div class="col-12">
            <div class="card">
                <div class="card-title">
                    <h3>Total gain from this order : <span style="color: #e7b63a;">${{$totalgain}}</span> </h3>
                </div>
            </div>
    </div>
    <div class="col-12">
            <div class="card">
                <div class="card-title">
                    <h3>Destination info : </h3>
                    <div><h4>-Phone : {{$orderinfo->phone}}</h4></div>
                    <div><h4>-Address : {{$orderinfo->address}}</h4></div>
                    @if($orderinfo->address2)
                    <div><h4>-Address2 : {{$orderinfo->address2}}</h4></div>
                    @endif
                    <div><h4>-Country : {{$orderinfo->country}}</h4></div>
                    <div><h4>-State : {{$orderinfo->state}}</h4></div>
                    <div><h4>-Zip : {{$orderinfo->zip}}</h4></div>
                </div>
            </div>
    </div>
    <form action="{{route('completeorder')}}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{$orderinfo->user->id}}">
        <div class="sweetalert m-t-15">
            <button type="submit" class="btn btn-warning btn sweet-confirm">Complete Order</button>
        </div>
    </form>
</div>

@endsection