@extends('layouts.app')
@section('content')
<div class="banner_section layout_padding">
    <div class="container">
        <div id="my_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-sm-12">
                            <img src="{{asset('uploads/fronts/electronics.png')}}" alt="">
                                <div class="buynow_bt"><a href="/">Buy Now</a></div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-sm-12">
                        <img src="{{asset('uploads/fronts/woman-accessory.png')}}" alt="">
                            <div class="buynow_bt"><a href="/">Buy Now</a></div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-sm-12">
                        <img src="{{asset('uploads/fronts/clothes.png')}}" alt="">
                            <div class="buynow_bt"><a href="/">Buy Now</a></div>
                        </div>
                    </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>
      
    <div class="fashion_section" style="margin-top: 150px;">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <h1 class="fashion_taital">Your cart </h1>
                        @if(session()->has('msg'))
                            <p class="alert alert-danger">{{session()->get('msg')}}</p>
                        @endif
                        @if(session()->has('ordered'))
                            <p class="alert alert-success">{{session()->get('ordered')}}</p>
                        @endif
                        @if($cart)
                        @foreach($cart as $product)
                        <div class="row" style="border: #f26522 1px solid;margin-bottom:10px">
                            <div class="col col-md-4" style="border-right: #f26522 1px solid;">
                                <img style="width: 200px;" src="{{asset($product->product->image)}}" alt="product image">
                            </div>  
                            <div class="col col-md-8">
                                <h2>{{$product->product->title}}</h2>
                                <h3 style="color:#f26522;">Price : <span style="color:black;">${{$product->product->price}}</span> </h3>
                                <h3 style="color:#f26522;">Quantity : <span style="color:black;">{{$product->qte}}</span> </h3>
                                <div style="display :flex">
                                <form action="cart/addqte" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$product->id}}" name="product_id">
                                        <button type="submit" class="btn" style="background-color:#f26522;color:white;margin-right:10px" >+</button>
                                    </form>
                                    <form action="cart/minqte" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$product->id}}" name="product_id">
                                        <button type="submit" class="btn" style="background-color:#f26522;color:white" >-</button>
                                    </form>
                                </div>
                                <h3 style="color:#f26522;">Total price : <span style="color:black;">${{$product->product->price * $product->qte}}</span> </h3>
                                <form action="{{route('deletecart')}}" method="post" >
                                    @csrf
                                    <input type="hidden" value="{{$product->id}}" name="product_id">
                                        <button type="submit" style="border: none; background-color:transparent"><span style="color:red">remove from cart</span></button>   
                                </form>
                            </div>
                        </div> 
                        @endforeach
                           @if($total != 0)
                                <center>
                                    <h3 style="color:#f26522;">Total to pay : 
                                        <span style="color:black;">
                                            ${{$total}}
                                        </span>
                                        <span>
                                            <form action="{{route('order')}}" method="get">
                                                @csrf
                                                <button class="btn" style="background-color:#f26522;color:white;margin-left:10px">
                                                    Order Now
                                                </button>
                                            </form>
                                        </span>
                                    </h3>
                                </center>
                           @endif
                           @if($total == 0)
                                <h3 style="color:#f26522;">Your cart is empty</h3>
                           @endif
                        @endif
                  </div>
               </div>
               
                    
                
            </div>
            
        </div>
    </div>

     
@endsection
