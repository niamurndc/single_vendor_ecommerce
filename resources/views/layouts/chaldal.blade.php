<!DOCTYPE html>
<html lang="en">
<?php $setting = App\Models\Setting::find(1); ?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="{{$setting->desc}}">
  <meta name="tags" content="{{$setting->tags}}">

  <!-- Fontawesome ICON -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" >

  <link rel="stylesheet" href="/css/app.css">

  <link rel="stylesheet" href="/css/style.css">
  <title>{{$setting->title}}</title>
</head>
<body>
  <header class="bg-light text-info">
    <div class="header-content d-flex justify-content-between align-items-center py-3 px-2 px-md-4">
      <div class="header-box-left text-left d-flex align-items-center">
        <i class="fa fa-bars mr-3" id="menu-button"></i>
        <a href="/" class="text-info"><h3 class="brand-logo">{{$setting->title}}</h3></a>
        
      </div>
      
      <div class="search-box border rounded-sm p-1">
        <form action="/search" method="get" class="search-form d-flex align-items-center">
          <input type="text" name="search" id="search" class="form-control header-search">
          <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-search"></i></button>
        </form>
      </div>
      <div class="header-box-3 text-right d-flex align-items-center">
        <div class="icon-box d-flex align-items-center mr-3 mr-md-5">
          <a href="/home" class="header-box-link text-info mr-4"><i class="fa fa-list"></i></a>
          <a href="/save-later" class="header-box-link text-info mr-4"><i class="fa fa-heart-o"></i></a>
          
          <a href="/login" class="header-box-link text-info mr-4"><i class="fa fa-user-o"></i></a>
          
          <a href="/cart" class="btn btn-outline-info border border-info border-2 rounded-sm font-weight-bold"><i class="fa fa-shopping-cart"></i> Cart {{App\Models\OrderItem::where('sid', session_id())->sum('qty')}}</a>
          
        </div>
      </div>
    </div>

    <div class="search-box-small p-2">
      <form action="/search" method="get" class="search-form d-flex align-items-center">
        <input type="text" name="search" id="search" class="form-control header-search">
        <button type="submit" class="btn btn-light btn-sm"><i class="fa fa-search"></i></button>     
      </form>
    </div>
  </header>

  <div class="sidebar bg-dark position-absolute">
    <ul class="side-nav"> 
      @foreach(App\Models\Category::where('parent_id', null)->get() as $category)
      <li class="side-nav-item"><a class="text-warning" href="/category/{{$category->id}}">{{$category->title}}</a></li>
      @endforeach
    </ul>
  </div>

  @yield('content')

  <footer class="bg-dark text-light p-5">
    <div class="px-4">
      <div class="row">
        <div class="col-md-4">
          <h2 class="text-warning">{{$setting->title}}</h2>
          <p class="pr-5">{{$setting->subtitle}}</p>
          <p class="mb-1">{{$setting->address}}</p>
          <p class="mb-1">{{$setting->email}}</p>
          <p class="mb-1">{{$setting->phone}}</p>
        </div>
        <div class="col-md-2">
          <h5 class="text-warning">OUR STORE</h5>
          <a href="/page/about" class="nav-link text-light pl-0">About Us</a>
          <a href="/page/contact" class="nav-link text-light pl-0">Contact Us</a>
          <a href="/shop" class="nav-link text-light pl-0">Shop</a>
          <a href="/trending" class="nav-link text-light pl-0">Trending</a>
        </div>
        <div class="col-md-2">
          <h5 class="text-warning">USEFUL LINKS</h5>
          <a href="/page/privacy" class="nav-link text-light pl-0">Privacy Policy</a>
          <a href="/page/terms" class="nav-link text-light pl-0">Terms & Conditions</a>
          <a href="/page/return" class="nav-link text-light pl-0">Return Policy</a>
          <a href="/page/payment" class="nav-link text-light pl-0">Payment Policy</a>
        </div>
        <div class="col-md-4">
          <h5 class="text-warning">SOCIAL LINK</h5>
          <a href="{{$setting->facebook}}" class="social-link"><i class="fa fa-facebook"></i></a>
          <a href="{{$setting->twitter}}" class="social-link"><i class="fa fa-twitter"></i></a>
          <a href="{{$setting->instagram}}" class="social-link"><i class="fa fa-instagram"></i></a>
          <a href="{{$setting->youtube}}" class="social-link"><i class="fa fa-youtube"></i></a>
        </div>
      </div>
    </div>
    <div class=" px-4 mt-4">
      <p class="my-3">Bloop Web Solution &copy; All Right Reserved</p>
    </div>
  </footer>
  <script src="/js/app.js"></script>
  <script>

    const menuButton = document.getElementById('menu-button');
    const sidebar = document.querySelector('.sidebar');
    
    let showBar = 0;
    menuButton.addEventListener('click', function() {
      //console.log(123);
      if(showBar == 1){
        sidebar.style.display = 'none';
        showBar = 0;
        console.log(showBar);
      }else{
        sidebar.style.display = 'block';
        showBar = 1;
        console.log(showBar);
      }
      
    
    });


  </script>
</body>
</html>