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

<h1 class="fashion_taital">Your Profile </h1>
<div class="container">
    <div role="tabpanel" class="tab-pane active col justify-content-center" id="1">
        <div class="contact-information">
                <h2>Contact information</h2>
                <div class="phone-content">
                    <h3 class="contact-title" style="color:#f26522;">First name:</h3>
                    <span class="phone-number">{{$user->firstName}}</span>
                </div>
                <div class="address-content">
                    <h3 class="contact-title" style="color:#f26522;">Last name:</h3>
                    <span class="mail-address">{{$user->lastName}}</span>
                </div>
                <div class="email-content">
                    <h3 class="contact-title" style="color:#f26522;">Email:</h3>
                    <span class="contact-email">{{$user->email}}</span>
                </div>
                <div class="website-content">
                    <h3 class="contact-title" style="color:#f26522;">products in cart:</h3>
                    <span class="contact-website">{{$cartnbr}}</span>
                </div>                  
        </div>
    </div>
    <h2>Change password</h2>
    <form action="{{route('changepassword')}}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <div class="form-group col-md-8">
            <label class="col-lg-4 col-form-label" for="val-username">Old password<span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <input type="password" class="form-control" name="oldpassword" placeholder="********" required>
            </div>
        </div>

        <div class="form-group col-md-8">
            <label class="col-lg-4 col-form-label" for="val-username">New password<span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <input type="password" class="form-control" name="newpassword" placeholder="********" required minlength="8">
            </div>
        </div>

        <div class="form-group col-md-8">
            <label class="col-lg-4 col-form-label" for="val-username">Confirm new password<span class="text-danger">*</span></label>
            <div class="col-lg-8">
                <input type="password" class="form-control" name="confirmnewpassword" placeholder="********" required minlength="8">
            </div>
        </div>
        <div class="col-lg-8 ml-auto">
            <button type="submit" class="btn" style="background-color: #fd7e14;border:none;color:white">Change password!</button>
        </div>
    </form>
    @if(session()->get('nomsg') != '')
        <p class="alert alert-danger">{{session()->get('nomsg')}}</p>
    @endif
    @if(session()->get('yesmsg') != '')
        <p class="alert alert-success">{{session()->get('yesmsg')}}</p>
    @endif
</div>

</div> 

     
@endsection
