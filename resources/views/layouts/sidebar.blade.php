<div class="navigation-menu-group">
    <div class="open" id="dashboards">
        <ul>
         <li class="navigation-divider">Dashboard</li>
         <li>
            <a  href="{{route('admin.index')}}" data-toggle="tooltip" data-placement="right" title="Dashboard"
           data-nav-target="#dashboards">
           <i class="fa fa-home"></i> &nbsp;Dashboard</a>
        </li>
         <li class="navigation-divider">Manage Website</li>
        <li>
            <a  href="" data-toggle="tooltip" data-placement="right" title="Manage Categories"
            data-nav-target="#dashboards">
             <i class="fa fa-list"></i>&nbsp; Manage Category</a>
         </a>
             <ul>
                 <li><a  href="{{route('category.create')}}">Add Category</a></li>
                 <li><a href="{{route('category.index')}}">Manage Category</a></li>
             </ul>
         </li>
         <li>
            <a  href="" data-toggle="tooltip" data-placement="right" title="Manage Menus"
           data-nav-target="#dashboards">
            <i class="fa fa-image"></i>&nbsp; Manage Products</a>
            <ul>
                <li><a href="{{route('product.create')}}">Add Product</a></li>
                <li><a href="{{route('product.index')}}">Manage Products</a></li>
            </ul>
        </li>

        <li>
            <a  href="" data-toggle="tooltip" data-placement="right" title="Manage Menus"
           data-nav-target="#dashboards">
            <i class="fa fa-image"></i>&nbsp; Manage Services</a>
            <ul>
                <li><a href="{{route('admin.service.create')}}">Add Service</a></li>
                <li><a href="{{route('admin.service.index')}}">Manage Services</a></li>
            </ul>
        </li>



        <li>
            <a  href="" data-toggle="tooltip" data-placement="right" title="Manage Menus"
           data-nav-target="#dashboards">
            <i class="fa fa-image"></i>&nbsp; Manage Blogs</a>
            <ul>
                <li><a href="{{route('admin.blog.create')}}">Add Blog Post</a></li>
                <li><a href="{{route('admin.blog.index')}}">Manage Blogs</a></li>
            </ul>
        </li>
        <li class="navigation-divider">Manage Users</li>
        <li>
            <a  href="" data-toggle="tooltip" data-placement="right" title="View and Manage Sales"
            data-nav-target="#dashboards">
            <i class="fa fa-line-chart"></i>&nbsp;Manage Sales</a>
             <ul>
                 <li><a href="{{route('admin.orders')}}">View Orders</a></li>
             </ul>
         </li>
         <li>
            <a  href="" data-toggle="tooltip" data-placement="right" title="View and Manage Sales"
            data-nav-target="#dashboards">
            <i class="fa fa-line-chart"></i>&nbsp;Manual Payment</a>
             <ul>
                 <li><a href="{{route('admin.manual.payments')}}"> View Payments </a></li>
             </ul>
         </li>
         
         <li>
            <a  href="" data-toggle="tooltip" data-placement="right" title="Manage Blogs"
               data-nav-target="#dashboards">
                <i class="fa fa-newspaper-o"></i>&nbsp;Prescriptions</a>
                <ul>
                    <li><a href="{{route('admin.prescription')}}">View all</a></li>
                </ul>
        </li>  

        <li>
            <a  href="" data-toggle="tooltip" data-placement="right" title="View and Manage Users"
               data-nav-target="#dashboards">
               <i class="fa fa-users"></i> &nbsp; Manage Users</a>
                <ul>
                      <li><a href="{{route('admin.users')}}">Manage Users</a></li>
                </ul>
            </li>
            <li>
                <a  href="" data-toggle="tooltip" data-placement="right" title="Send Notifications to Users"
                   data-nav-target="#dashboards">
                   <i class="fa fa-bell"></i>&nbsp;Notifications</a>
                    <ul>
                          <li><a href="{{route('admin.notify')}}">Send Notifications</a></li>
                    </ul>
                </li>
                <li>
                    <a  href="" data-toggle="tooltip" data-placement="right" title="View User's activities"
                       data-nav-target="#dashboards">
                       <i class="fa fa-bar-chart"></i>&nbsp; Analytical</a>
                        <ul>
                              <li><a href="{{route('admin.analytical')}}">Manage Analytical</a></li>
                        </ul>
                    </li>
           
        <li class="navigation-divider">Settings</li>
        <li>
            <a  href="" data-toggle="tooltip" data-placement="right" title="Manage Settings"
               data-nav-target="#dashboards">
                <i class="fa fa-globe"></i>&nbsp; Wesbite Settings</a>
                <ul>
                      <li><a href="{{route('admin.settings.index')}}">Manage Contents</a></li>
                </ul>
        </li> 
        <li>
            <a  href="" data-toggle="tooltip" data-placement="right" title="Manage Admin"
               data-nav-target="#dashboards">
                <i class="fa fa-users"></i>&nbsp; Manage Admin</a>
                <ul>
                      <li><a href="{{route('admin.profile')}}">Manage Admin</a></li>
                </ul>
          </li>  

         
        </ul>
    </div>
</div>