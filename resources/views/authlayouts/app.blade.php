<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>{{env('SHOPNAME')}}</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesoeet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <style>
         .banner_bg_main{
            background-image: url('{{asset("uploads/fronts/banner-bg.png")}}');
         }
         .logo{
            width: 200px;
         }
      </style>
   </head>
   <body>
      <!-- banner bg main start -->
      <div class="banner_bg_main">
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li>Time : {{date("h:i")}} GMT |</li>
                           <li>Email : {{env('EMAIL')}} |</li>
                           <li>Phone : {{env('PHONE')}}</li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="/">Home</a>
                        <p>All categories</p>
                        @foreach($categories as $category)
                           <a href="/category/{{$category->id}}">{{$category->name}}</a>
                        @endforeach
                     
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="{{asset('uploads/fronts/toggle-icon.png')}}"></span>
                  <div class="main">
                     <!-- Another variation with a button -->
                     <div class="input-group">
                        <form action="{{route('search')}}" method="post" style="width: 100%;">
                           @csrf
                           <div class="row">
                              <div class="col-10">
                                 <input type="text" name="search" class="form-control" placeholder="Search ...">
                              </div>
                              <div class="col-2">
                                 <button class="btn btn-secondary" type="submit" style="background-color: #f26522; border-color:#f26522 ">
                                 <i class="fa fa-search"></i>
                                 </button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
                  <div class="header_box">
                     <div class="login_menu">
                        <ul>
                        <li><a href="#">
                             <a href="{{route('home')}}"><span class="padding_10"><i class="fa fa-home" aria-hidden="true"></i> Home</span></a>
                           </li>

                           <li><a href="#">
                             <a href="{{route('register')}}"><span class="padding_10"><i class="fa fa-sign-in" aria-hidden="true"></i> Signin</span></a>
                           </li>
                           <li><a href="#">
                              <a href="{{route('login')}}"><span class="padding_10"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</span></a>
                           </li>  
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
<main style="margin-top: 100px; margin-bottom:100px;">
    @yield('content')
</main>
<div class="footer_section layout_padding">
    <div class="container">
       <div class="footer_logo" style="color:white;"><i class="fa fa-shopping-bag" aria-hidden="true"></i>{{env('SHOPNAME')}}</div>
       <div class="input_bt"></div>
       <div class="footer_menu">
          <ul>             
            @foreach($categories as $category)
             <li><a href="/category/{{$category->id}}">{{$category->name}}</a></li>
            @endforeach
          </ul>
       </div>
       <div class="input_bt"></div>
       <div class="location_main">Help Line  Number : <a href="#">{{env('PHONE')}}</a></div>
    </div>
 </div>
 <!-- footer section end -->
 <!-- copyright section start -->
 <div class="copyright_section">
    <div class="container">
       <p class="copyright_text">{{env('SHOPNAME')}} | © {{DATE('Y')}} All Rights Reserved.</p>
    </div>
 </div>
 <!-- copyright section end -->
 <!-- Javascript files-->
 <script src="{{asset('js/jquery.min.js')}}"></script>
 <script src="{{asset('js/popper.min.js')}}"></script>
 <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
 <script src="{{asset('js/jquery-3.0.0.min.js')}}"></script>
 <script src="{{asset('js/plugin.js')}}"></script>
 <!-- sidebar -->
 <script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
 <script src="{{asset('js/custom.js')}}"></script>
 <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }
    
    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
 </script>
</body>
</html>