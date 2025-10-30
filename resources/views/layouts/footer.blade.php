<footer class="footer">
    <div class="footer-primary">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-2">
            <div class="footer-widget-about">
                <a href="{{route('dashboard')}}"><img src="{{asset('images/'.$settings->site_logo)}}"  alt=""  width="150px"/></a>
              <p class="color-gray">{!!substr($settings->about, 0,100) !!}
              </p>
            
            </div><!-- /.footer-widget__content -->
          </div><!-- /.col-xl-2 -->
          <div class="col-sm-6 col-md-6 col-lg-2 offset-lg-1">
            <div class="footer-widget-nav">
              <h6 class="footer-widget__title"></h6>
              <nav>
                <ul class="list-unstyled">
                    @forelse ($site_menu as $menu )
                    <li > 
                    @if($menu->name == 'Home') 
                    <a style="color:#d6d2d2" href="{{route('dashboard')}}">{{$menu->name}}</a>
                     @else <a style="color:#d6d2d2" href="{{route('pages', encrypt($menu->id))}}">{{$menu->name}}</a> @endif
                   </li>
                     @empty
                    @endforelse
                </ul>
              </nav>
            </div><!-- /.footer-widget__content -->
          </div><!-- /.col-lg-2 -->
          <div class="col-sm-6 col-md-6 col-lg-2">
            <div class="footer-widget-nav">
              <h6 class="footer-widget__title">Links</h6>
              <nav>
                  <ul class="list-unstyled">
                <li><a href="{{ route('pages.terms') }}">Terms & Conditions</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Cookies</a></li>
              </ul>
              </nav>
            </div><!-- /.footer-widget__content -->
          </div><!-- /.col-lg-2 -->
          <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="footer-widget-contact" style="background: #1d2a4d; color:#fff">
              <h6 class="footer-widget__title" style="color:#fff">Quick Contacts</h6>
              <ul class="contact-list list-unstyled">
                <li>If you have any questions or need help, feel free to contact with our team.</li>
                <li>
                  <a href="tel:01061245741" class="phone__number" style="color:#fff">
                    <i class="icon-phone"></i> <span>{{$settings->site_phone}}</span>
                  </a>
                </li>
                <p style="color:#d6d2d2"><i class="fa fa-map-marker"></i> {{$settings->address}}.</p>
              </ul>
              <div class="d-flex align-items-center">
                <ul class="social-icons list-unstyled mb-0">
                    <p style="color:#d6d2d2"><i class="fa fa-envelope-o"></i>  {{$settings->site_email}}</p>
               
                </ul><!-- /.social-icons -->
              </div>
            </div><!-- /.footer-widget__content -->
          </div><!-- /.col-lg-2 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
       <div style="color:#fff; text-align:center"> {{$settings->site_copyright}} </div>
    </div><!-- /.footer-primary -->
  </footer><!-- /.Footer -->

<style>

.footer {
  background: #f9f9f9;
  color: #333;
  font-family: 'Inter', sans-serif;
}

.footer a:hover {
  color: #fbbf24; /* yellow hover */
}

.footer .fa {
  transition: color 0.3s ease;
}

.footer .fa:hover {
  color: #fbbf24;
}

.footer .list-unstyled a {
  transition: color 0.3s ease;
}

.footer .list-unstyled a:hover {
  color: #000;
  text-decoration: underline;
}

@media (max-width: 768px) {
  .footer {
    text-align: center;
  }
  .footer .d-flex {
    justify-content: center;
  }
}



</style>

<footer class="footer bg-light pt-5 pb-3 mt-5 border-top">
  <div class="container">
    <div class="row gy-4">

      <!-- Logo & Contact Info -->
      <div class="col-12 col-md-4">
        <div class="footer-logo mb-3">
           <a href="{{route('dashboard')}}"><img src="{{asset('images/'.$settings->site_logo)}}"  alt=""  width="150px"/></a>
        </div>
        <p class="small mb-2"><i class="fa fa-headphones me-2 text-warning"></i> Got questions? Call us 24/7!</p>
        <p class="fw-semibold mb-3">(+234) 0813-532-4241</p>
        <h6 class="fw-bold mb-2">Contact Info</h6>
        <p class="small text-muted">
          Block C12 shop 02 & 09, Arena Shopping Complex,<br>
          Bolade-Oshodi, Lagos
        </p>
        <div class="d-flex gap-3 mt-3">
          <a href="#" class="text-dark"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-dark"><i class="fab fa-google"></i></a>
          <a href="#" class="text-dark"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-dark"><i class="fab fa-github"></i></a>
        </div>
      </div>




      <!-- Categories -->
      <div class="col-6 col-md-3">
        <h6 class="fw-bold mb-3">Categories</h6>
        <ul class="list-unstyled small">
          @foreach ($categories as $cat)
          <li {{ request('category') == $cat->id ? 'active' : '' }}>
            <a href="{{route('category.products',$cat->id)}}" {{ request()->category == $cat->id ? 'text-yellow' : '' }} class="text-decoration-none text-muted d-block mb-1">
              {{ $cat->name }}</a></li>
               @endforeach
          {{-- <li><a href="#" class="text-decoration-none text-muted d-block mb-1">Storage Inverters</a></li>
          <li><a href="#" class="text-decoration-none text-muted d-block mb-1">Utility Inverters</a></li>
          <li><a href="#" class="text-decoration-none text-muted d-block mb-1">Accessories</a></li>
          <li><a href="#" class="text-decoration-none text-muted d-block mb-1">Battery</a></li>
          <li><a href="#" class="text-decoration-none text-muted d-block mb-1">Solar Panel</a></li>
          <li><a href="#" class="text-decoration-none text-muted">Available capacities and what it can carry</a></li> --}}
        </ul>
      </div>


      <!-- Links -->
      <div class="col-6 col-md-2">
        <h6 class="fw-bold mb-3">Links</h6>
        <ul class="list-unstyled small">
        @forelse ($site_menu as $menu )
          <li>
          @if($menu->name == 'Home')
          <a href="{{route('dashboard')}}" class="text-decoration-none text-muted d-block mb-1">{{$menu->name}}</a>
           @else <a href="{{route('pages', encrypt($menu->id))}}" class="text-decoration-none text-muted d-block mb-1">{{$menu->name}}</a> @endif
          </li>
           @empty
           @endforelse
          {{-- <li><a href="/products" class="text-decoration-none text-muted d-block mb-1">Products</a></li>
          <li><a href="/projects" class="text-decoration-none text-muted d-block mb-1">Projects</a></li>
          <li><a href="/news" class="text-decoration-none text-muted d-block mb-1">News</a></li>
          <li><a href="/contact" class="text-decoration-none text-muted d-block">Contact Us</a></li> --}}
        </ul>
      </div>

      <!-- Contact Us -->
      <div class="col-12 col-md-3">
        <h6 class="fw-bold mb-3">Contact Us</h6>
        <p class="small mb-1 fw-semibold">Got questions? Call us 24/7!</p>
        <p class="small mb-1"><strong>Phone:</strong> (+234) 0813-532-4241</p>
        <p class="small mb-1"><strong>Email:</strong> support@sofarsolar.ng</p>
        <p class="small mb-0"><strong>Address:</strong><br>
          Block C12 shop 02 & 09,<br> Arena Shopping Complex, Bolade-Oshodi, Lagos
        </p>
      </div>

    </div>

    <hr class="my-4">

    <div class="text-center small text-muted">
      © <span class="fw-bold">Risolar.ng</span> - All rights reserved
    </div>
  </div>
</footer>




  @include('layouts.js')