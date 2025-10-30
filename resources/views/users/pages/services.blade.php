@extends('layouts.app')
@section('title')
<title> Services - Sanlive Pharmacy  </title>
@endsection
@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')




{{-- <section class="page-title page-title-layout5 text-center"> --}}
  {{-- <div class="bg-img"><img src="{{ asset('frontend/images/backgrounds/6.jpg') }}" alt="background"></div> --}}
  {{-- <div class="container">
    <div class="row"> --}}
      {{-- <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3"> --}}
        {{-- <div class="heading text-center mb-60">
          <h2 class="heading__title ">Our services</h2>
          <h3 class="heading__subtitle"><p>The company offers a complete assortment of both on-grid and off-grid solutions, including modules, inverters, mounting systems and accessories.</p></h3>
        </div><!-- /.heading --> --}}
       <section class="page-title">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-0 mb-0">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">About Us</li>
      </ol>
    </nav>
  </div>
</section>
        {{-- <nav>
          <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">shop</li>
          </ol>
        </nav> --}}
      {{-- </div><!-- /.col-xl-6 --> --}}
    {{-- </div><!-- /.row --> --}}
  {{-- </div><!-- /.container --> --}}
{{-- </section><!-- /.page-title --> --}}
  
  
      <!-- ========================
          Services Layout 1
      =========================== -->
      <!-- /.Services Layout 1 -->


      {{-- resources/views/components/services-blade-template.blade.php --}}
{{--
  Responsive Blade template (pure CSS) for showing services in a grid.
  - Mobile: 2 services per row
  - Tablet / Desktop: adjusts to 3–4 per row
  - Includes smooth hover animations
--}}
@section('styles')
<style>
.page-title {
    padding: 8px 0;
    background: #f5f6fa;
    border-bottom: 1px solid #e5e7eb;
    margin-bottom: 0;
  }

  .breadcrumb {
    background: none;
    margin: 0;
    font-size: 14px;
  }

  .breadcrumb a {
    color: #4f46e5;
    text-decoration: none;
  }

  .breadcrumb a:hover {
    text-decoration: underline;
  }
  .services-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
  }
  .services-title {
    text-align: center;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 20px;
    color: #333;
  }
  .services-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
  }
  @media (min-width: 768px) {
    .services-grid {
      grid-template-columns: repeat(3, 1fr);
    }
  }
  @media (min-width: 1024px) {
    .services-grid {
      grid-template-columns: repeat(4, 1fr);
    }
  }

  .service-card {
    background: #fff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,.08);
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,.15);
  }

  .service-image {
    width: 100%;
    height: 150px;
    overflow: hidden;
  }
  .service-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }
  .service-card:hover img {
    transform: scale(1.1);
  }

  .service-body {
    padding: 12px 14px;
    flex: 1;
    display: flex;
    flex-direction: column;
  }
  .service-body h3 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 6px;
    color: #222;
  }
  .service-body p {
    font-size: 14px;
    color: #666;
    flex: 1;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2; /* limits to 2 lines */
    -webkit-box-orient: vertical;
  }
  .service-btn {
    display: inline-block;
    margin-top: 10px;
    background: #4f46e5;
    color: #fff;
    padding: 10px;
    text-align: center;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    transition: background 0.3s ease;
  }
  .service-btn:hover {
    background: #3730a3;
  }

  .no-services {
    text-align: center;
    margin-top: 30px;
    color: #888;
  }
</style>
@endsection

<div class="services-wrapper">
  <h2 class="services-title">Our Services</h2>

  <div class="services-grid">
    @foreach($services as $service)
      <article class="service-card">
        <div class="service-image">
          <img src="{{asset('/images/services/'.$service->images)}}" alt="Product" loading="lazy"> alt="{{ $service['title'] ?? '' }}">
        </div>

        <div class="service-body">
          <h3>{{ $service['title'] ?? $service->title }}</h3>
          <p>{{ trim(strip_tags($service->contents)) }}</p>
          <a href="{{ route('service.details',encrypt($service->id)) }}" class="service-btn">Learn More</a>
        </div>
      </article>
    @endforeach
  </div>

  @if(count($services) === 0)
    <p class="no-services">No services available at the moment.</p>
  @endif
</div>



@endsection