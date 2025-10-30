@extends('layouts.app')
@section('title')
<title> Blog Details - Sanlive Pharmacy  </title>
@endsection
@section('head')
<link rel="canonical" href="{{ url()->current() }}">
@endsection
@section('content')


{{-- <div class="ps-post ps-post--sidebar">
    <div class="container">
        <ul class="ps-breadcrumb">
            <li class="ps-breadcrumb__item"><a href="{{route('index')}}">Home</a></li>
            <li class="ps-breadcrumb__item active" aria-current="page">Blog</li>
        </ul>
        <div class="ps-post__content">
            <div class="row">
                <div class="col-12 col-md-9">
                    <div class="ps-blog__banner">
                            <img src="{{asset('images/blog/'.$blog->image)}}" alt="{{asset($blog->title)}}" style="width: 400px">
                             </div>
                    <h1 class="ps-post__title">{{$blog->title}}</h1>
                    <div class="ps-blog__meta"> <span class="ps-blog__date">Created: {{$blog->created_at->format('M d, Y')}}.</span>
                        <a class="ps-blog__author" href="">{{_('By'). ' '.$settings->site_name}}</a></div>
                    
                    <p class="ps-blog__text">{!! $blog->content !!}</p>
                </div>
                <div class="col-12 col-md-3">
                    <div class="ps-widget ps-widget--blog">
                        <div class="ps-widget__block">
                            <h4 class="ps-widget__title">Latest Blogs</h4><a class="ps-block-control" href="#"><i class="fa fa-angle-down"></i></a>
                            <div class="ps-widget__content">
                                <div class="ps-widget__product">

                                    @forelse ($blogs as $item)
                                    <div class="ps-product ps-product--standard">
                                        <div class="ps-product__thumbnail">
                                            <a class="ps-product__image" href="{{route('blogs.details',$item->hashid)}}">
                                                <figure><img src="{{asset('images/blog/'.$item->image)}}" alt="{{$item->title}}"><img src="{{asset('images/blog/'.$item->image)}}" alt="{{$item->title}}">
                                                </figure>
                                            </a>
                                        </div>
                                        <div class="ps-product__content">
                                            <h5 class="ps-product__title"><a href="{{route('blogs.details',$item->hashid)}}">{!! $item->title !!}</a></h5>
                                            </div>
                                        </div>

                                        
                                    @empty
                                        
                                    @endforelse


                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}



 <!-- ========================
       page title 
    =========================== -->
    <section class="page-title pt-30 pb-30 text-center">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="{{route('users.index')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{route('users.blogs')}}">Blog</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{$blog->title}}</li>
                </ol>
              </nav>
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.page-title -->
  
      <!-- ======================
        Blog Single
      ========================= -->
      <section class="blog blog-single pt-0 pb-80">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8">
              <div class="post-item mb-0">
                <div class="post__img">
                  <a href="#">
                    <img src="{{ asset('frontend/images/blog/single/si.jpg') }}" alt="post image" loading="lazy">
                  </a>
                </div><!-- /.post-img -->
                <div class="post__body pb-0">
                  <div class="post__meta-cat">
                    <a href="#">Consulting</a><a href="#">Sales</a>
                  </div><!-- /.blog-meta-cat -->
                  <div class="post__meta d-flex align-items-center mb-20">
                    <span class="post__meta-date">{{$blog->created_at->format('M d, Y')}}.</span>
                    <a class="post__meta-author" href="#">{{_('By'). ' '.$settings->site_name}}</a>
                    <a class="post__meta-comments" href="#">2 coments</a>
                  </div><!-- /.blog-meta -->
                  <h1 class="post__title mb-30">
                    {{$blog->title}}
                  </h1>
                  <div class="post__desc">
                    <p>{!! $blog->content !!} </p>
                  </div><!-- /.blog-desc -->
                </div>
              </div><!-- /.post-item -->
              <div class="d-flex flex-wrap justify-content-between border-top border-bottom pt-30 pb-30 mb-40">
                <div class="blog-share d-flex flex-wrap align-items-center">
                  <strong class="mr-20 color-heading">Share</strong>
                  <ul class="list-unstyled social-icons d-flex mb-0">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-google"></i></a></li>
                  </ul>
                </div><!-- /.blog-share -->
                <div class="widget-tags">
                  <ul class="list-unstyled d-flex flex-wrap mb-0">
                    <li><a href="#">Consulting</a></li>
                    <li><a href="#">Tech</a></li>
                    <li><a href="#">Employee</a></li>
                  </ul>
                </div><!-- /.blog-tags -->
              </div>
              <div class="widget-nav d-flex justify-content-between mb-40">
                
                <a href="#" class="widget-nav__prev d-flex flex-wrap">
                  <div class="widget-nav__img">
                    <img src="{{ asset('frontend/images/blog/grid/Picture1.png') }}" alt="blog thumb">
                  </div>
                  <div class="widget-nav__content">
                    <span>Previous Post</span>
                    <h5 class="widget-nav__ttile mb-0">Unsure About Wearing a Face Mask?</h5>
                  </div>
                </a><!-- /.widget-prev  -->
                <a href="#" class="widget-nav__next d-flex flex-wrap">
                  <div class="widget-nav__img">
                    <img src="{{ asset('frontend/images/blog/grid/pp.jpg') }}" alt="blog thumb">
                  </div>
                  <div class="widget-nav__content">
                    <span>Next Post</span>
                    <h5 class="widget-nav__ttile mb-0">Tips for Eating Healthy When You’re Home</h5>
                  </div>
                </a><!-- /.widget-next  -->
              </div>
              <div class="blog-author d-flex flex-wrap mb-70">
                <div class="blog-author__avatar">
                  <img src="{{ asset('frontend/images/blog/author/1.jpg') }}" alt="avatar">
                </div><!-- /.author-avatar  -->
                <div class="blog-author__content">
                  <h6 class="blog-author__name">Mahmoud Baghagho</h6>
                  <p class="blog-author__bio">Founded by Begha over many cups of tea at her kitchen table in 2009, our
                    brand promise is simple: to
                    provide powerful digital marketing solutions to small and medium businesses.</p>
                  <ul class="social-icons list-unstyled mb-0">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-vimeo-v"></i></a> </li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a> </li>
                  </ul>
                </div><!-- /.author-content  -->
              </div><!-- /.blog-author  -->
              <div class="blog-comments mb-70">
                <h5 class="blog-widget__title">2 comments</h5>
                <ul class="comments-list list-unstyled">
                  <li class="comment__item">
                    <div class="comment__avatar">
                      <img src="{{ asset('frontend/images/blog/author/2.jpg') }}" alt="avatar">
                    </div>
                    <div class="comment__content">
                      <h5 class="comment__author">Richard Muldoone</h5>
                      <span class="comment__date">Feb 28, 2017 - 08:07 pm</span>
                      <p class="comment__desc">The example about the mattress sizing page you mentioned in the last WBF
                        can be a perfect example
                        of new keywords and content, and broadening the funnel as well. I can only imagine the sale
                        numbers if that was the site of a mattress selling company.</p>
                      <a class="comment__reply" href="#">reply</a>
                    </div>
                    <ul class="nested__comment list-unstyled">
                      <li class="comment__item">
                        <div class="comment__avatar">
                          <img src="{{ asset('frontend/images/blog/author/3.jpg') }}" alt="avatar">
                        </div>
                        <div class="comment__content">
                          <h5 class="comment__author">Mike Dooley</h5>
                          <span class="comment__date">Feb 28, 2017 - 08:22 pm</span>
                          <p class="comment__desc">The example about the mattress sizing page you mentioned in the last
                            WBF can be a perfect
                            example of new keywords and content, and broadening the funnel as well. I can only imagine the
                            sale numbers if that was the site of a mattress selling company.</p>
                          <a class="comment__reply" href="#">reply</a>
                        </div>
                      </li><!-- /.comment -->
                    </ul><!-- /.nested-comment -->
                  </li><!-- /.comment -->
                </ul><!-- /.comments-list -->
              </div><!-- /.blog-comments -->
              <div class="blog-widget blog-comments-form mb-30">
                <h5 class="blog-widget__title">Leave A Reply</h5>
                <form>
                  <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name:">
                      </div><!-- /.form-group -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-12 col-md-4 col-lg-4">
                      <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email:">
                      </div><!-- /.form-group -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-sm-12 col-md-4 col-lg-4">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Website:">
                      </div><!-- /.form-group -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-12">
                      <div class="form-group">
                        <textarea class="form-control" placeholder="Comment"></textarea>
                      </div><!-- /.form-group -->
                    </div><!-- /.col-lg-12 -->
                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex flex-wrap align-items-center">
                      <button type="submit" class="btn btn__primary btn__rounded btn__xl">
                        <span>Submit Comment</span> <i class="icon-arrow-right"></i>
                      </button>
                    </div><!-- /.col-lg-12 -->
                  </div><!-- /.row -->
                </form>
              </div><!-- /.blog-comments-form -->
            </div><!-- /.col-lg-8 -->
            <div class="col-sm-12 col-md-12 col-lg-4">
              <aside class="sidebar">
                <div class="widget widget-search">
                  <h5 class="widget__title">Search</h5>
                  <div class="widget__content">
                    <form class="widget__form-search">
                      <input type="text" class="form-control" placeholder="Search...">
                      <button class="btn" type="submit"><i class="icon-search"></i></button>
                    </form>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-search -->
                <div class="widget widget-posts">
                  <h5 class="widget__title">Recent Posts</h5>
                  <div class="widget__content">
                    <!-- post item #1 -->

                    @forelse ($blogs as $item)
                        
                      <div class="widget-post-item d-flex align-items-center">
                      <div class="widget-post__img">
                        <a href="{{route('blogs.details',$blog->id)}}"><img src="{{ asset('frontend/images/blog/grid/2.jpg') }}" alt="thumb"></a>
                      </div><!-- /.widget-post-img -->
                      <div class="widget-post__content">
                        <span class="widget-post__date">{{$item->created_at->format('M d, Y')}}.</span>
                        <h4 class="widget-post__title"><a href="{{route('blogs.details',$blog->id)}}">{{ $item->title }}</a>
                        </h4>
                      </div><!-- /.widget-post-content -->
                    </div><!-- /.widget-post-item -->

                    @empty
                        
                    @endforelse
                    <!-- post item #2 -->
                    {{-- <div class="widget-post-item d-flex align-items-center">
                      <div class="widget-post__img">
                        <a href="#"><img src="assets/images/blog/grid/3.jpg" alt="thumb"></a>
                      </div><!-- /.widget-post-img -->
                      <div class="widget-post__content">
                        <span class="widget-post__date">July 7, 2022</span>
                        <h4 class="widget-post__title"><a href="#">Do Employee Surveys Tell About Employee?</a>
                        </h4>
                      </div><!-- /.widget-post-content -->
                    </div><!-- /.widget-post-item --> --}}
                    <!-- post item #3 -->
                    {{-- <div class="widget-post-item d-flex align-items-center">
                      <div class="widget-post__img">
                        <a href="#"><img src="assets/images/blog/grid/6.jpg" alt="thumb"></a>
                      </div><!-- /.widget-post-img -->
                      <div class="widget-post__content">
                        <span class="widget-post__date">March 13, 2022</span>
                        <h4 class="widget-post__title"><a href="#">Succession Risks That Threaten Your Leadership</a>
                        </h4>
                      </div><!-- /.widget-post-content -->
                    </div><!-- /.widget-post-item --> --}}
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-posts -->
                <div class="widget widget-categories">
                  <h5 class="widget__title">Categories</h5>
                  <div class="widget-content">
                    <ul class="list-unstyled mb-0">
                      <li><a href="#"><span class="cat-count">4</span><span>Neurology</span></a></li>
                      <li><a href="#"><span class="cat-count">0</span><span>Cardiology</span></a></li>
                      <li><a href="#"><span class="cat-count">3</span><span>Pathology</span></a></li>
                      <li><a href="#"><span class="cat-count">2</span><span>Laboratory</span></a></li>
                      <li><a href="#"><span class="cat-count">4</span><span>Pediatric</span></a></li>
                      <li><a href="#"><span class="cat-count">1</span><span>Cardiac Clinic</span></a></li>
                    </ul>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-categories -->
                <div class="widget widget-tags">
                  <h5 class="widget__title">Tags</h5>
                  <div class="widget-content">
                    <ul class="list-unstyled mb-0">
                      <li><a href="#">Insights</a></li>
                      <li><a href="#">Industry</a></li>
                      <li><a href="#">Modern</a></li>
                      <li><a href="#">Corporate</a></li>
                      <li><a href="#">Business</a></li>
                    </ul>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-tags -->
              </aside><!-- /.sidebar -->
            </div><!-- /.col-lg-4 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.blog Single -->
@endsection