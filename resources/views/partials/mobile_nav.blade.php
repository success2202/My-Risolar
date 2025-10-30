<div class="ps-navigation--footer">
    <div class="ps-nav__item" ><a href="#" style="color:#000; height:0px" id="open-menu"><i class="icon-menu"></i>
    </a>
     <small>Menu</small>
    <a href="#" id="close-menu">
        <i class="icon-cross"></i></a>
    </div>
    <div class="ps-nav__item"><a style="color:#000; height:0px" href="{{route('index')}}"><i class="icon-home2"></i></a>
    <small> Home</small></div>
    <div class="ps-nav__item"><a  style="color:#000; height:0px" href="{{route('users.account.index')}}"><i class="icon-user"></i></a>
    <small> Account</small></div>
    <div class="ps-nav__item"><a style="color:#000; height:0px; width:49px" href="{{route('carts.index')}}"><i class="icon-cart-empty"></i><span class="badge cartReload">{{Cart::count()}}</span></a>
    <small>Cart </small>
    </div>
        <div class="ps-nav__item"><a style="color:#000; height:0px" href=""><i class="fa fa-envelope-o"></i><span class="badge"></span></a>
        <small>Chat </small></div>
</div>