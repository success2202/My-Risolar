@extends('layouts.app')
@section('title')
<title> Blogs - Sanlive Pharmacy  </title>
@endsection
@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')

{{-- <div class="ps-blog ps-blog--masonry">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="index.html">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Blog </li>
        </ul>
        <div class="ps-blog__content">
            <div class="row">

                @forelse ($blogs as $item)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="ps-blog--latset">
                        <div class="ps-blog__thumbnail"><a href="{{route('blogs.details',$item->hashid)}}">
                            <img src="{{asset('images/blog/'.$item->image)}}" alt="{{$item->title}}"></a>
                          
                        </div>
                        <div class="ps-blog__content">
                            <div class="ps-blog__meta"> <span class="ps-blog__date">Created: {{$item->created_at->format('M d, Y')}}.</span>
                                <a class="ps-blog__author" href="{{route('blogs.details',$item->hashid)}}">{{_('By'). ' '.$settings->site_name}}</a></div>
                                <a class="ps-blog__title" href="{{route('blogs.details',$item->hashid)}}">{{$item->title}} </a>

                        </div>
                    </div>
                </div>
                @empty

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="ps-blog--latset">
                        <div class="ps-blog__content">
                            <p class="ps-blog__desc">No data found</p>
                        </div>
                    </div>
                </div>
                    
                @endforelse

            </div>
        </div>
    </div>
</div> --}}


 
{{-- <section class="page-title page-title-layout5 text-center"> --}}
  {{-- <div class="bg-img"><img src="{{ asset('frontend/images/backgrounds/6.jpg') }}" alt="background"></div>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="pagetitle__heading">Our Blogs</h1> --}}
        {{-- <nav>
          <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">blog</li>
          </ol>
        </nav> --}}
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
      {{-- </div><!-- /.col-xl-6 --> --}}
    {{-- </div><!-- /.row --> --}}
  {{-- </div><!-- /.container --> --}}
{{-- </section><!-- /.page-title --> --}}
  
      <!-- ======================
        Blog Grid
      ========================= -->
      {{-- <section class="blog-grid">
        <div class="container">
          <div class="row"> --}}
            <!-- Post Item #1 -->
            {{-- @forelse ($blogs as $item)
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="post-item">
                <div class="post__img">
                  <a href="{{route('blogs.details',$item->hashid)}}">
                    <img src="{{asset('images/blog/'.$item->image)}}" class="logo-dark" height="200px" width="300px" alt="post image" loading="lazy">
                  </a>
                </div><!-- /.post__img -->
                <div class="post__body">
                  <div class="post__meta-cat">
                    <a href="#">Roisola</a>
                  </div><!-- /.blog-meta-cat --> --}}
                  {{-- <div class="post__meta d-flex">
                    <span class="post__meta-date">{{$item->created_at->format('M d, Y')}}.</span>
                    <a class="post__meta-author" href="#">{{_('By'). ' '.$settings->site_name}}</a>
                  </div>
                  <h4 class="post__title"><a href="{{route('blogs.details',encrypt($item->id))}}">{{$item->title}}</a></h4>
  
                  <p class="post__desc">{{trim(strip_tags($item->content))}}
                  </p>
                  <a href="{{route('blogs.details',encrypt($item->id))}}" class="btn btn__secondary btn__link btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a> --}}
                {{-- </div><!-- /.post__body --> --}}
              {{-- </div><!-- /.post-item --> --}}
            {{-- </div><!-- /.col-lg-4 --> --}}

            {{-- @empty

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="ps-blog--latset">
                        <div class="ps-blog__content">
                            <p class="ps-blog__desc">No data found</p>
                        </div>
                    </div>
                </div>
                    
                @endforelse --}}

            {{-- <!-- Post Item #2 -->
            <div class="col-sm-12 col-md-6 col-lg-4">
              <div class="post-item">
                <div class="post__img">
                  <a href="blog-single-post.html">
                    <img src="{{ asset('frontend/images/page-titles/back1.jpg') }}" class="logo-dark" height="200px" width="300px" alt="post image" loading="lazy">
                  </a>
                </div><!-- /.post__img -->
                <div class="post__body">
                  <div class="post__meta-cat">
                    <a href="#">Infectious</a><a href="#">Tips</a>
                  </div><!-- /.blog-meta-cat -->
                  <div class="post__meta d-flex">
                    <span class="post__meta-date">Jan 30, 2022</span>
                    <a class="post__meta-author" href="#">John Ezak</a>
                  </div>
                  <h4 class="post__title"><a href="#">Unsure About Wearing a Face Mask? Here’s How and Why</a></h4>
                  <p class="post__desc">That means that you should still be following any shelter-in-place orders in your
                    community. But when you’re venturing out to the grocery store, pharmacy or hospital..
                  </p>
                  <a href="blog-single-post.html" class="btn btn__secondary btn__link btn__rounded">
                    <span>Read More</span>
                    <i class="icon-arrow-right"></i>
                  </a>
                </div><!-- /.post__body -->
              </div><!-- /.post-item -->
            </div><!-- /.col-lg-4 -->
            
          <div class="row">
            <div class="col-12 text-center">
              {{-- <nav class="pagination-area">
                <ul class="pagination justify-content-center">
                  <li><a class="current" href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#"><i class="icon-arrow-right"></i></a></li>
                </ul>
              </nav><!-- .pagination-area --> --}}

              {{-- <nav class="pagination-area">
                <ul class="pagination justify-content-center">
                  @php
                  $start = max($blogs->currentPage() - 1, 1);
                  $end = min($blogs->currentPage() + 1, $blogs->lastPage());
                 @endphp
                    {{-- Previous Arrow --}}
                    {{-- @if ($blogs->onFirstPage())
                        <li class="disabled"><span><i class="icon-arrow-left"></i></span></li>
                    @else
                        <li><a href="{{ $blogs->previousPageUrl() }}"><i class="icon-arrow-left"></i></a></li>
                    @endif --}}
            
                    {{-- Page Numbers --}}
                    {{-- @for ($i = $start; $i <= $end; $i++)
                        <li>
                            <a 
                                href="{{ $blogs->url($i) }}" 
                                class="{{ $blogs->currentPage() == $i ? 'current' : '' }}">
                                {{ $i }}
                            </a>
                        </li>
                    @endfor --}}
            
                    {{-- Next Arrow --}}
                    {{-- @if ($blogs->hasMorePages())
                        <li><a href="{{ $blogs->nextPageUrl() }}"><i class="icon-arrow-right"></i></a></li>
                    @else
                        <li class="disabled"><span><i class="icon-arrow-right"></i></span></li>
                    @endif
            
                </ul>
            </nav> --}} 

            {{-- </div><!-- /.col-12 --> --}}
          {{-- </div><!-- /.row --> --}}
        {{-- </div><!-- /.container --> --}}
      {{-- </section> <!-- /.blog Grid --> --}}
  
{{-- resources/views/components/blogs-template.blade.php --}}
{{--
  Responsive Blade template (pure CSS) for displaying blog posts.
  - Mobile: 2 posts per row
  - Tablet / Desktop: adjusts to 2–3 per row
  - Includes image, title, excerpt (limited to 3 lines), and read more button.
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
  .blogs-wrapper {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
  }
  .blogs-title {
    text-align: center;
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 25px;
    color: #333;
  }
  .blogs-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
  }
  @media (min-width: 768px) {
    .blogs-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }
  @media (min-width: 1024px) {
    .blogs-grid {
      grid-template-columns: repeat(3, 1fr);
    }
  }

  .blog-card {
    background: #fff;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0,0,0,.08);
    display: flex;
    flex-direction: column;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .blog-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,.15);
  }

  .blog-image {
    width: 100%;
    height: 180px;
    overflow: hidden;
  }
  .blog-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }
  .blog-card:hover img {
    transform: scale(1.08);
  }

  .blog-body {
    padding: 15px;
    display: flex;
    flex-direction: column;
    flex: 1;
  }
  .blog-body h3 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 8px;
    color: #222;

     flex: 1;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 1; /* limits excerpt to 1 lines */
    -webkit-box-orient: vertical;
  }
  .blog-body p {
    font-size: 14px;
    color: #555;
    
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2; /* limits excerpt to 2 lines */
    -webkit-box-orient: vertical;
  }
  .blog-footer {
    margin-top: 12px;
  }
  .blog-btn {
    display: inline-block;
    background: #4f46e5;
    color: #fff;
    padding: 10px 12px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
    transition: background 0.3s ease;
  }
  .blog-btn:hover {
    background: #3730a3;
  }
  .no-blogs {
    text-align: center;
    margin-top: 30px;
    color: #888;
  }
</style>
@endsection
<div class="blogs-wrapper">
  <h2 class="blogs-title">Latest Blog Posts</h2>

  <div class="blogs-grid">
    @foreach($blogs as $item)
      <article class="blog-card">
        <div class="blog-image">
          <img src="{{asset('images/blog/'.$item->image)}}" alt="{{ $blog['title'] ?? '' }}">
        </div>
        <div class="blog-body">
        <div class="post__meta d-flex">
                    <span class="post__meta-date">{{$item->created_at->format('M d, Y')}}.</span> | &nbsp;

                    <a class="post__meta-author" href="#">{{_('By'). ' '.$settings->site_name}}</a>
                  </div>
          <h3>{{ $item['title'] ?? $item->title }}</h3>
          <p>{{trim(strip_tags($item->content))}}</p>
          <div class="blog-footer">
            <a href="{{route('blogs.details',$item->hashid)}}" class="blog-btn">Read More</a>
          </div>
        </div>
      </article>
    @endforeach
  </div>

  @if(count($blogs) === 0)
    <p class="no-blogs">No blog posts available at the moment.</p>
  @endif
</div>
@endsection