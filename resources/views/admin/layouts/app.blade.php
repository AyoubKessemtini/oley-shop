<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Oley-shop Admin Dashboard</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    
   
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Common -->
    <link rel="shortcut icon" href="{{asset('uploads/logo/logo.png')}}" type="image/x-icon">
    <link href="{{asset('css/admin/lib/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin/lib/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin/lib/menubar/sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin/lib/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin/lib/helper.css')}}" rel="stylesheet">
    <link href="{{asset('css/admin/style.css')}}" rel="stylesheet">
</head>

<body>

<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures" style="height: 100%;">
      <div class="nano">
        <div class="nano-content" style="height: 100%;">
          <div class="logo"><a href="/admin"><!-- <img src="assets/images/logo.png" alt="" /> --><span>Admin dashbord</span></a></div>
          <ul style="height: 100%;">  
            #products
            <!-- products /> -->           
                <li><a href="{{route('allproductsforadmin')}}">all products({{$nbrproducts}})</a></li>
                <li><a href="{{route('indexaddproduct')}}">add new product</a></li>   
              
                <!-- products per category /> --> 
                #products per category   
                @foreach($categories as $category)       
                <li><a href="/admin/allproducts/{{$category->id}}">{{$category->name}}</a></li>
                @endforeach
            
    <!-- categories /> -->
      #categories
                <li><a href="{{route('allcategoriesforadmin')}}">all categories({{$nbrcategories}})</a></li>
                <li><a href="{{route('indexaddcategory')}}">add new category</a></li> 

    <!-- checkouts /> -->
    #checkouts
                <li><a href="{{route('newcheckout')}}">new checkouts({{$nbrnewcheckouts}})</a></li> 
                <li><a href="{{route('allcheckout')}}">all checkouts({{$nbrallcheckouts}})</a></li> 

    <!-- users /> -->


          </ul>
        </div>
      </div>
</div>
    <main>
    <div class="header">
        <div class="container-fluid">
          @yield('content')
        </div>
    </div>
    </main>
    <!-- Common -->
    <script src="{{asset('js/admin/lib/jquery.min.js')}}"></script>
    <script src="{{asset('js/admin/lib/jquery.nanoscroller.min.js')}}"></script>
    <script src="{{asset('js/admin/lib/menubar/sidebar.js')}}"></script>
    <script src="{{asset('js/admin/lib/preloader/pace.min.js')}}"></script>
    <script src="{{asset('js/admin/lib/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/admin/scripts.js')}}"></script>
</body>
</html>