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
                  <h1 class="fashion_taital">Welcome to {{env('SHOPNAME')}}</h1>
                     <div class="fashion_section_2">
                           @if(session()->has('added'))
                              <p class="alert alert-success">{{session()->get('added')}}</p>
                           @endif
                        <div class="row">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main" style="border-right : solid 1px #f26522;">                    
                                 <center><img style="height: 400px;" src="{{asset($product->image)}}"></center>
                             </div>
                           </div>
                           <div class="col-lg-8 col-sm-8">
                              <div class="box_main" style="height: 400px;">
                              <h2 >{{$product->title}}</h2>
                                 <h3 style="color:#f26522;">Price : <span style="color:black;">${{$product->price}}</span> </h3>
                                 <h3>Description :</h3>
                                 <p>{{$product->description}}</p>
                                 <div class="btn_main">
                                 <form action="{{route('addtocart')}}" method="post" >
                                       @csrf
                                       <div class="seemore_bt">
                                             <button type="submit" class="btn" style="background-color:#f26522; color:white">
                                                <input name="product_id" type="hidden" value="{{$product->id}}">Add to cart
                                             </button>                    
                                       </div>       
                                    </form>
                                 </div>
                              </div>           
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               
                    
                
            </div>
            
         </div>
      </div>

     
@endsection
