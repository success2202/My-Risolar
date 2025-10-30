<div class="ps-navigation" style="background:aliceblue; border-top:1px solid #e4e8ee; border-bottom:1px solid #e4e8ee ">
    <div class="container">
        <div class="ps-navigation__left">
            <nav class="ps-main-menu" >
                <ul class="menu">
                    <li class="has-mega-menu"><a href="{{route('products.search')}}" style="font-size:0.9em"> <i class="fa fa-bars"></i>All Categories<span class="sub-toggle"></span></a>
                        {{-- <div class="mega-menu">
                            <div class="container">
                                <div class="mega-menu__row">                                
                                @forelse($site_categories as $site_cat)
                                    <div class="mega-menu__column" >
                                        <a href="" style="font-size:0.9em; font-weight:bolder; color:rgb(10, 10, 168)">{{ucwords(strtolower($site_cat->name))}}</a>
                                        <ul class="sub-menu--mega">
                                            @php $x = 0 @endphp
                                        @forelse($site_cat->products as $prod)
                                            <li><a href="" style="font-family:  sans-serif; font-size:0.85em;color:#000">{{$prod->name}}</a></li>
                                          @php 
                                            $x++;
                                            if($x > 6) break;
                                           @endphp
                                            @empty
                                        @endforelse
                                        </ul>
                                    </div>
                                @empty 
                                @endforelse 

                                </div>
                            </div>
                        </div> --}}
                    </li>
                    <li><a style="font-size:0.9em; "  href="{{ route('index')}}">Home</a></li>
                    <li><a style="font-size:0.9em; "  href="{{ route('AboutUs')}}">About Us</a></li>
                    <li><a style="font-size:0.9em;"  href="{{ route('contactUs')}}">Contact Us</a></li>
                    <li><a style="font-size:0.9em;" href="{{ route('blogs.index')}}">Blog</a></li>
                    <li><a style="font-size:0.9em;" href="{{ route('faq.index')}}">FAQ</a></li>

                    {{-- @forelse($site_categories->take(6) as $site_cat)
                   
                    <li class="has-mega-menu"><a  style="font-size:0.9em; font-weight:light" href="{{route('products.search',$site_cat->hashid)}}">{{substr(ucfirst(strtolower($site_cat->name)),0,20)}}</a></li>
                    @empty
                    @endforelse --}}

                </ul>
            </nav>
        </div>
        <div class="ps-navigation__right">Need help?  <i class="fa fa-phone"> </i><strong>{{$settings->site_phone}}</strong></div>
    </div>
</div>
