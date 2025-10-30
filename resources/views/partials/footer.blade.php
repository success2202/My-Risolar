<footer class="ps-footer ps-footer--8" style="background: #73c2fb">

    <div class="container">
        <div class="ps-footer__middle" >
            <div class="row">
                <div class="col-12 col-md-5">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <div class="ps-footer--address">
                                <div class="ps-logo"><a href="{{route('index')}}"> <img src="{{asset('images/'.$settings->site_logo)}}" style="border-radius: 5px" alt>
                                    <img class="logo-white" src="{{asset('images/'.$settings->site_logo)}}"  style="border-radius: 5px" alt="{{asset('images/'.$settings->site_logo)}}">
                                    <img class="logo-black" src="{{asset('images/'.$settings->site_logo)}}" style="border-radius: 5px"  alt="{{asset('images/'.$settings->site_logo)}}">
                                    <img class="logo-white-all" src="{{asset('images/'.$settings->site_logo)}}"  style="border-radius: 5px" alt="{{asset('images/'.$settings->site_logo)}}">
                                    <img class="logo-green" src="{{asset('images/'.$settings->site_logo)}}" style="border-radius: 5px"  alt="{{asset('images/'.$settings->site_logo)}}" ></a></div>
                                <div class="ps-footer__title">Our store</div>
                                <p style="color:#000">{{$settings->address}}</p>
                                <ul class="ps-social">
                                    <li><a class="ps-social__link facebook" style="color:#000" href="{{$settings->facebook}}"><i class="fa fa-facebook"> </i><span class="ps-tooltip">Facebook</span></a></li>
                                    <li><a class="ps-social__link instagram" style="color:#000" href="{{$settings->instagram}}"><i class="fa fa-instagram"></i><span class="ps-tooltip">Instagram</span></a></li>
                                    <li><a class="ps-social__link pinterest" style="color:#000" href="{{ $settings->pinterest}}"><i class="fa fa-pinterest-p"></i><span class="ps-tooltip">Pinterest</span></a></li>
                                    <li><a class="ps-social__link linkedin" style="color:#000" href="{{ $settings->linkedIn}}"><i class="fa fa-linkedin"></i><span class="ps-tooltip">Linkedin</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="ps-footer--contact">
                                <h5 class="ps-footer__title">Need help</h5>
                                <div class="ps-footer__work" style="color:#000"><i class="icon-telephone"></i>{{$settings->site_phone}}</div>
                                <p class="ps-footer__work" style="color:#000">{{$settings->site_email}}</p>
                              
                      
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title" style="color:#000">Categories</h5>
                                <ul class="ps-block__list">
                                    @forelse ($site_categories->take(5) as $menus)
                                    <li><a href="{{route('products.search',$menus->hashid)}}">{{ucfirst(strtolower($menus->name))}}</a></li>
                                    @empty
                                    @endforelse
                                   
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title" style="color:#000">Account</h5>
                                <ul class="ps-block__list">
                                    <li><a href="{{route('users.account.index')}}">My account</a></li>
                                    <li><a href="{{route('users.orders')}}">My orders</a></li>
                                    <li><a href="{{route('users.account.address')}}">Address Book</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="ps-footer--block">
                                <h5 class="ps-block__title" style="color:#000">Help Links</h5>
                                <ul class="ps-block__list">
                                    {{-- <li><a href="{{ route('AboutUs')}}">About Us</a></li> --}}
                                    <li><a href="{{ route('PrivacyPolicy')}}">Privacy Policy</a></li>
                                    <li><a href="{{route('pages.terms')}}">Terms &amp; Conditions</a></li>
                                    {{-- <li><a href="{{ route('contactUs')}}">Contact Us</a></li> --}}
                                    <li><a href="{{ route('blogs.index')}}">Blogs</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-footer--bottom">
            <div class="row">
                <div class="col-12 col-md-5" style="background: #">
                    <p style="color:#000">{{$settings->site_copyright}}</p>
                </div> 
                <div class="col-12 col-md-7 text-right" style="background: #">
                    <img src="{{asset('/images/paystack_logo.png')}}"  width="50px" alt>
                    <img class="payment-light" src="{{asset('/images/paystack.png')}}"      width="50px"alt>
                    <img class="payment-light" src="{{asset('/images/nafdac.png')}}"      width="50px"alt>
                    <img class="payment-light" src="{{asset('/images/secure_ssl.png')}}"  width="50px" alt>
                    <img class="payment-light" src="{{asset('/images/mastercard.png')}}"  width="50px"alt>
                    <img class="payment-light" src="{{asset('/images/visa.png')}}"  width="50px" alt>
                    <img class="payment-light" src="{{asset('/images/pcn.png')}}"  width="50px"alt>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>