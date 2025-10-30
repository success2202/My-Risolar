@extends('layouts.app')
@section('title')
<title> Product Details - Sanlive Pharmacy  </title>
@endsection
@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')
    

<section id="content" class=" pb-80">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8">
          <div class="text-block mb-50">
            
                
            <p class="text-block__desc mb-20 font-weight-bold color-secondary"><h3 style="text-align: center">{{$service->title}}</h3></p>
            <div class="video-banner-layout3 bg-overlay mb-50">
              <img src="{{asset('frontend/images/blog/grid/Picture1.png')}}" alt="banner">
              <a class="video__btn video__btn-white popup-video" href="https://www.youtube.com/watch?v=nrJtHemSPW4">
                <div class="video__player">
                  <i class="fa fa-play"></i>
                </div>
              </a>
            </div><!-- /.video-banner -->
            <p class="text-block__desc mb-20">{{$service->contents}}</p>
           
              
            </div><!-- /.text-block -->

          {{-- <div class="widget-plan mb-60">
            <div class="widget__body">
              <h5 class="widget__title">Health Care Plans</h5>
              <p>Our doctors include highly qualified male and female practitioners who come from a range of
                backgrounds
                and bring with a diversity of skills and special interests. Our administration and support staff all
                have exceptional people skills and trained to assist you with all medical enquiries.
              </p>
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="plan__items">
                    <ul class="list-items list-items-layout2 list-unstyled mb-0">
                      <li>Review your medical records.</li>
                      <li>Check and test blood pressure.</li>
                      <li>Run tests such as blood tests.</li>
                    </ul>
                  </div>
                </div><!-- /.col-md-6 -->
                <div class="col-sm-12 col-md-6">
                  <div class="plan__items">
                    <ul class="list-items list-items-layout2 list-unstyled mb-0">
                      <li>Check and test lung function.</li>
                      <li>Narrowing of the arteries.</li>
                      <li>Other specialized tests.</li>
                    </ul>
                  </div>
                </div><!-- /.col-md-6 -->
              </div><!-- /.row -->
            </div><!-- /.widget__body -->
            <div class="widget__footer d-flex flex-wrap justify-content-between align-items-center">
              <div class="plan__price">$50<span class="period">/Month</span></div>
              <div class="d-flex align-items-center">
                <a href="#" class="btn btn__secondary btn__rounded mr-30">
                  <span>Purchase Now</span> <i class="icon-arrow-right"></i>
                </a>
                <a href="#" class="btn btn__primary btn__link">
                  <i class="icon-arrow-right icon-filled"></i> <span>Explore Other Plans</span>
                </a>
              </div>
            </div><!-- /.widget__footer -->
          </div><!-- /.widget-plan --> --}}
          <div class="text-block mb-50">
            <h5 class="text-block__title">Our Core Values</h5>
            <p class="text-block__desc mb-20">Today the hospital is recognised as a world renowned institution, not
              only providing outstanding care and treatment, but improving the outcomes for all through a
              comprehensive medical research. For over 20 years, our hospital has touched lives of millions of people,
              and provide care and treatment for the sickest in our community including rehabilitation and aged care.
            </p>
          </div>
          <!-- ======================
               Team
           ========================= -->
          <section class="team-layout2 pt-0 pb-30">
            <div class="heading mb-40">
              <h3 class="heading__title">Meet Our Team</h3>
              <p class="heading__desc">Our administration and support staff all have exceptional people skills and
                trained to assist you with all medical enquiries.
              </p>
            </div><!-- /.heading -->
            <div class="slick-carousel"
              data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "autoplay": true, "arrows": false, "dots": false, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 2}}, {"breakpoint": 767, "settings": {"slidesToShow": 1}}, {"breakpoint": 480, "settings": {"slidesToShow": 1}}]}'>
              <!-- Member #1 -->
              <div class="member">
                <div class="member__img">
                  <img src="{{ asset('/images/picture5.png') }}" alt="member img">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name"><a href="doctors-single-doctor1.html">Mike Dooley</a></h5>
                  <p class="member__job">Cardiology Specialist</p>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
              <!-- Member #2 -->
              <div class="member">
                <div class="member__img">
                  <img src="{{ asset('/images/picture6.png') }}" alt="member img">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name"><a href="doctors-single-doctor1.html">Dermatologists</a></h5>
                  <p class="member__job">Cardiology Specialist</p>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
              <!-- Member #3 -->
              <div class="member">
                <div class="member__img">
                  <img src="{{ asset('/images/picture7.png') }}" alt="member img">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name"><a href="doctors-single-doctor1.html">Maria Andaloro</a></h5>
                  <p class="member__job">Pediatrician</p>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
              <!-- Member #4 -->
              <div class="member">
                <div class="member__img">
                  <img src="{{ asset('/images/picture8.png') }}" alt="member img">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name"><a href="doctors-single-doctor1.html">Dupree Black</a></h5>
                  <p class="member__job">Urologist</p>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
              <!-- Member #5 -->
              <div class="member">
                <div class="member__img">
                  <img src="{{ asset('/images/picture5.png') }}" alt="member img">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name"><a href="doctors-single-doctor1.html">Markus skar</a></h5>
                  <p class="member__job">Laboratory</p>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
              <!-- Member #6 -->
              <div class="member">
                <div class="member__img">
                  <img src="{{ asset('/images/picture6.png') }}" alt="member img">
                </div><!-- /.member-img -->
                <div class="member__info">
                  <h5 class="member__name"><a href="doctors-single-doctor1.html">Kiano Barker</a></h5>
                  <p class="member__job">Pathologist </p>
                </div><!-- /.member-info -->
              </div><!-- /.member -->
            </div><!-- /.carousel -->
          </section><!-- /.Team -->
        </div><!-- /.col-lg-8 -->
        <div class="col-sm-12 col-md-12 col-lg-4">
          <aside class="sidebar has-marign-left sticky-top">
            <div class="widget widget-services">
              <h5 class="widget__title">Our Solution</h5>
              <div class="widget-content">
                <ul class="list-unstyled mb-0">
                    @forelse ($se as $item)
                    <li><a href="{{ route('service.details',encrypt($service->id)) }}"><span>{{ $item->title }}</span><i class="icon-arrow-right"></i></a></li>  
                    @empty
                   
                    @endforelse
                  
                  
                </ul>
              </div><!-- /.widget-content -->
            </div><!-- /.widget-services -->
            <div class="widget widget-help bg-overlay bg-overlay-secondary-gradient">
              <div class="bg-img"><img src="assets/images/banners/5.jpg" alt="background"></div>
              <div class="widget-content">
                <div class="widget__icon">
                  <i class="icon-call3"></i>
                </div>
                <h4 class="widget__title">Emergency Cases</h4>
                <p class="widget__desc">Please feel welcome to contact our friendly reception staff with any general
                   enquiry about our product call us.
                </p>
                <a href="tel:+201061245741" class="phone__number">
                  <i class="icon-phone"></i> <span>{{$settings->site_phone}}</span>
                </a>
              </div><!-- /.widget-content -->
            </div><!-- /.widget-help -->
            <div class="widget widget-schedule">
              <div class="widget-content">
                <div class="widget__icon">
                  <i class="icon-charity2"></i>
                </div>
                <h4 class="widget__title">Opening Hours</h4>
                <ul class="time__list list-unstyled mb-0">
                  <li><span>Monday - Friday</span><span>8.00 - 7:00 pm</span></li>
                  <li><span>Saturday</span><span>9.00 - 10:00 pm</span></li>
                  <li><span>Sunday</span><span>10.00 - 12:00 pm</span></li>
                </ul>
              </div><!-- /.widget-content -->
            </div><!-- /.widget-schedule -->
            <div class="widget widget-reports">
              <a href="#" class="btn btn__primary btn__block">
                <i class="icon-pdf-file"></i>
                <span>2024 Client Reports</span>
              </a>
            </div>
          </aside><!-- /.sidebar -->
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </section>

@endsection