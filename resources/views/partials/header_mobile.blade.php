<header class="ps-header ps-header--8 ps-header--mobile">
    <div class="ps-noti">
        <div class="container">
            <p class="m-0"> <marquee> {!! $announcment->content??null !!}</marquee> </p>
        </div><a class="ps-noti__close"><i class="icon-cross"></i></a>
    </div>
    <div class="ps-header__middle">
        <div class="container">
            <div class="ps-logo"><a href="{{route('users.index')}}"> <img src="{{asset('images/'.$settings->site_logo)}}" alt></a></div>
            <div class="ps-header__right">
                <ul class="ps-header__icons">
                    {{-- <a href="#" id="open-menu"><i class="icon-menu"></i></a><a href="#" id="close-menu"><i class="icon-cross"></i></a> --}}
                </ul>
            </div>
        </div>
    </div>
        <div class="ps-search__content ps-search--mobile" style="padding: 15px">
            <form action="{{route('products.search')}}" method="get">
                <div class="ps-search-table" style="border-radius: 5px">
                    <div class="input-group">
                        <input class="form-control ps-input" value="{{old('q')}}" style="border-radius: 5px" name="q" type="text" placeholder="Enter product name, category or items">
                        <div class="input-group-append">
                            <button class="btn " style="background:#07631d; color:#fff; padding:8px" type="submit"> 
                                <span style="font-size: 15px"> Search </span></button></div>
                    </div>
                </div>
            </form>
  
    </div>
    
</header>