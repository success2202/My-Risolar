{{-- <div class="header-topbar">
    <div class="container-fluid">
      <div class="row align-items-center">
        
        <div class="col-12">
          <div class="d-flex align-items-center justify-content-between">
            <ul class="contact__list d-flex flex-wrap align-items-center list-unstyled mb-0">
              <li>
                <i class="icon-phone"></i><a href="tel:+5565454117">Emergency Line: {{$settings->site_phone}}</a>
              </li>
              <li>
                <i class="icon-location"></i><a href="#">{{$settings->address}}</a>
              </li>
              <li>
                <i class="icon-clock"></i><a href="contact-us.html">{{$settings->opening_hours}}</a>
              </li>
            </ul><!-- /.contact__list -->
            <div class="d-flex">
              <ul class="social-icons list-unstyled mb-0 mr-30">
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              </ul><!-- /.social-icons -->
              <form class="header-topbar__search">
                <input type="text" class="form-control" placeholder="Search...">
                <button class="header-topbar__search-btn"><i class="fa fa-search"></i></button>
              </form>
            </div>
          </div>
        </div><!-- /.col-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.header-top -->




 --}}

 <style>
  .top-bar {
    width: 100%;
    height: 35px; /* smaller height */
    background-color: #051e33; /* adjust color */
    color: #fff;
    overflow: hidden;
    display: flex;
    align-items: center; /* vertically center text */
    font-size: 14px;
    font-weight: bold;
    position: relative;
    z-index: 999;
}

.scrolling-text {
    white-space: nowrap;
    display: inline-block;
    padding-left: 100%; /* start off screen */
    animation: scroll-left 15s linear infinite;
}

/* Animation keyframes */
@keyframes scroll-left {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-100%); }
}

 </style>


 <!-- Top Bar -->
<div class="top-bar">
  <div class="scrolling-text">
     <i class="icon-phone"></i><a href="tel:+5565454117">Emergency Line: {{$settings->site_phone}}</a>
     <i class="icon-location"></i><a href="#">{{$settings->address}}</a>
    🚚 Free Delivery on Orders Over $50 | 🎉 Big Sales Coming Soon!
  </div>
</div>
