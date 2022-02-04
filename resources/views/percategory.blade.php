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
                        @foreach($products as $product)
                        <a href="/product/{{$product->id}}">
                           <div class="col-lg-4 col-sm-4">
                              <div class="box_main" style="border : solid 1px #f26522;">
                              <p style="color:#f26522;">{{$product->category->name}}</p>
                            
                                 <h4 class="shirt_text">{{$product->title}}</h4>
                                 <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                                 <center><img style="height: 200px;" src="{{asset($product->image)}}"></center>
                                 <div class="btn_main">
                                 <form action="{{route('addtocart')}}" method="post" >
                                       @csrf
                                       <div class="seemore_bt">
                                             <button type="submit" class="btn" style="background-color:#f26522; color:white">
                                                <input name="product_id" type="hidden" value="{{$product->id}}">Add to cart
                                             </button>                    
                                       </div>       
                                    </form>
                                    <div class="seemore_bt"><a href="/product/{{$product->id}}">See More</a></div>
                                 </div>
                              </div>
                           </div>
                           </a>
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
               
                    
                
            </div>
            
         </div>
      </div>

     
@endsection
