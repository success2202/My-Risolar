<div class="ps-search">
    <div class="ps-search__content ps-search--mobile">
        <a class="ps-search__close" style="top:5px; color:red" href="#" id="close-search"><i class="icon-cross" style="color:red"></i>
        </a>
        <form action="{{route('products.search')}}" method="get">
            <div class="ps-search-table">
                <div class="input-group">
                    <input class="form-control ps-input" name="q" type="text" placeholder="Search for products">
                    <div class="input-group-append">
                        <button class="btn" style="background:#07631d; color:#fff" type="submit"> <span style="font-size: 15px"> Search</span></button></div>
                </div>
            </div>
        </form>
    </div>
</div>