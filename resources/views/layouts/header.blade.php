
<style>
.cart-count {
    position: absolute;
    top: -4px;
    right: -1px;
    background-color: red;
    color: white;
    font-size: 12px;
    padding: 2px 6px;
    border-radius: 50%;
    font-weight: bold;
    min-width: 18px;
    text-align: center;
}

 @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');

  .cart-icon {
    position: relative;
    display: inline-block;
  }

  .cart-icon i {
    transition: all 0.3s ease;
  }

  .cart-icon:hover i {
    color: #0d6efd;
    transform: scale(1.1);
  }

  .cart-badge {
    top: 0;
    right: -9px;
    font-size: 10px;
    padding: 3px 6px;
  }
</style>
<header class="header header-layout2">
    <nav class="navbar navbar-expand-lg sticky-navbar">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route('dashboard')}}">
          {{-- <img src="" class="logo-light" alt="logo"> --}}
          <img src="{{asset('images/'.$settings->site_logo)}}" class="logo-dark" width="120px" alt="logo">
          {{-- <a href="{{route('index')}}"><img src="{{asset('assets/'.$settings->logo)}}" alt="{{$settings->site_name}}" class="logo-dark" width="120px"></a> --}}
        </a>
        <button class="navbar-toggler" type="button">
          <span class="menu-lines"><span></span></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavigation">
          <ul class="navbar-nav ml-auto">
            @forelse ($site_menu as $menu)
            @if($menu->has_child)
            <li class="nav__item has-dropdown">
              <a href="{{route($menu->slug)}}" data-toggle="dropdown" class="dropdown-toggle nav__item-link">{{$menu->name}}</a>
              @if(count($menu->subMenu) > 0)
              <ul class="dropdown-menu">
                @forelse ($menu->subMenu as $sub) 
                <li class="nav__item">
                  <a href="{{route($sub->slug, $sub->hashid)}}" class="nav__item-link">{{$sub->name}}</a>
                </li>
                @empty
                
                @endforelse
                
              </ul>
              @endif
            </li><!-- /.nav-item -->
            @else 
            <li class="nav__item"> <a class="nav__item-link" href="{{route($menu->slug)}}">{{$menu->name}}</a>@endif
            @empty 
            <p> menu is empty </p>
            @endforelse
          </ul><!-- /.navbar-nav -->
          <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
        </div><!-- /.navbar-collapse -->
    
        <div class="d-none d-xl-flex align-items-center position-relative ml-30">
          
          @guest
              
         
            <a href="" class=" btn-sm nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown">
              <i class="icon-user"></i>
              <span>Get Started</span>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
          </ul>
          @else
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="icon-user"></i>
            {{ Auth::user()->first_name }}
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('users.account.index') }}">Profile</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </li>
        </ul>
          @endguest

          </div>

{{-- <div class="d-flex justify-content-end align-items-center mb-4 pe-3">
  <a href="{{ route('carts.index') }}" class="cart-icon position-relative text-dark text-decoration-none">
    <i class="fa-solid fa-cart-shopping fs-4"></i>
    <span class="cart-badge position-absolute translate-middle badge rounded-pill bg-danger">
       @php
        $cartCount = $cartCount = collect(session('cart', []))->sum('quantity');

        @endphp
        @if($cartCount > 0)
            <span class="cart-count">{{ $cartCount }}</span>
        @else
      0
      @endif
    </span>
  </a>
  
</div> --}}


           
       {{-- @php
        $cartCount = $cartCount = collect(session('cart', []))->sum('quantity');

        @endphp
        @if($cartCount > 0)
            <span class="cart-count">{{ $cartCount }}</span>
        @else
      0
      @endif
    </span> --}}


          <div class="d-none d-xl-flex align-items-center position-relative ml-30">
            <a href="{{ route('carts.index') }}" class=" btn-sm">
              <i class="icon-cart"></i>
               <span class="cart-badge position-absolute  badge rounded-pill bg-danger">
              {{-- <span>MyCart</span> --}}
                 @php
        $cartCount = $cartCount = collect(session('cart', []))->sum('quantity');

        @endphp
        @if($cartCount > 0)
            <span class="cart-count">{{ $cartCount }}</span>
            @else
            0
        @endif

            </a>
          </div>
        {{-- <button class="action__btn-search ml-30"><i class="fa fa-search"></i></button> --}}
      </div><!-- /.container -->
    </nav><!-- /.navabr -->
  </header><!-- /.Header -->
{{-- 
<nav class="navbar navbar-expand-lg" style="background: #1a1a1a; padding: 4px 0;">
  <div class="container" style="max-width: 1100px;">

    <!-- Brand -->
    <a class="navbar-brand text-white fw-bold" href="#">MyShop</a>

    <!-- Toggler for Mobile -->
    <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
      <i class="bi bi-list" style="font-size: 1.4rem;"></i>
    </button>

    <!-- Navbar Content -->
    <div class="collapse navbar-collapse" id="mainNavbar">
      <div class="d-flex justify-content-between align-items-center w-100">

        <!-- Left: Categories -->
        <div class="d-flex align-items-center text-white fw-bold me-3 d-none d-lg-flex" style="font-size: 14px;">
          <i class="bi bi-grid me-1"></i>
          Categories
        </div>

        <!-- Center: Search (Flat Dark Style) -->
        <form class="d-flex mx-auto flex-grow-1" style="max-width: 320px;">
          <div class="input-group" style="height: 32px;">
            <input 
              type="search" 
              class="form-control text-white" 
              placeholder="Search..." 
              aria-label="Search"
              style="background: #333; border: none; font-size: 13px; padding: 6px 12px;"
            >
            <button class="btn text-white" type="submit" style="background: #444; border: none; font-size: 13px; padding: 6px 12px;">
              <i class="bi bi-search"></i>
            </button>
          </div>
        </form>

        <!-- Right: Cart -->
        <div class="d-flex align-items-center text-white ms-3" style="font-size: 14px;">
          <div class="position-relative me-2">
            <i class="bi bi-cart" style="font-size: 1.3rem;"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger text-white" style="font-size: 10px;">
              3
            </span>
          </div>
          <span>$90.00</span>
        </div>
      </div>
    </div>
  </div>
</nav> --}}

<!-- Bootstrap CSS & JS + Icons -->
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"> --}}






<!-- Bootstrap Icons CDN -->

