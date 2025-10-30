
<style>
        .ss{
                background-color: rgb(7, 7, 31) !important;
                border: 0px;
        }
</style>


<div class="col-md-3 mb-4">
            <div class="list-group shadow-sm">
                <a href="#" class="list-group-item list-group-item-action active ss">
                    Account Information
                </a>
                {{-- <a href="#" class="list-group-item list-group-item-action">My Account</a>
                <a href="#" class="list-group-item list-group-item-action">My Orders</a>
                <a href="#" class="list-group-item list-group-item-action">My Address Book</a>
                <a href="#" class="list-group-item list-group-item-action">Recently Viewed</a>
                <a href="#" class="list-group-item list-group-item-action">Card Payments</a>
                <a href="#" class="list-group-item list-group-item-action">Update Account</a> --}}

        <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all">
           
            <li class="border-b-4"><a class="dropdown-item" style="padding:15px; text-weight:bold"
                    href="{{route('users.account.index')}}"> <i class="icon-user"> </i> &nbsp; My Account </a></li>
            <li><a class="dropdown-item navIL" href="{{route('users.orderList')}}"> <i class=" icon-cart"> </i> &nbsp;
                    My Orders</a></li>
            <li><a class="dropdown-item navIL" href="{{route('users.account.address')}}"> <i class="bi bi-journal-bookmark me-2"></i> &nbsp; My Address
                    Book</a></li>
            <li><a class="dropdown-item navIL" href="{{route('users.recent.views')}}"><i class="bi bi-eye me-2"></i> &nbsp;
                    Recently Viewed</a></li>
            <li><a class="dropdown-item navIL" href="{{route('users.order.payments')}}"> <i class="bi bi-credit-card me-2"></i>&nbsp; Card
                    Payments</a></li>
            <li><a class="dropdown-item navIL" href="{{route('users.account.settings')}}"><i class="bi bi-person-gear me-2"></i>&nbsp; Update
                    Account</a></li>
                    <li><a class="dropdown-item navIL" href="{{route('logout') }}" onclick="event.preventDefault() 
                        document.getElementById('logout-form').submit()" ><i class="bi bi-box-arrow-right me-2"></i>&nbsp;
                         Logout</a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                @csrf
                            </form> 
                </li>
            </ul>
            </div>
        </div>