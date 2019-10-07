<li class="{{ Request::is('/') ? 'active' : '' }}">
    <a href="{!! route('admin.dashboard') !!}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
</li>

<li class="header">MAIN NAVIGATION</li>

<li class="{{ Request::is('admins*') ? 'active' : '' }}">
    <a href="{!! route('admins.index') !!}"><i class="fa fa-user"></i><span>Admins</span></a>
</li>


<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-users"></i><span>Users</span></a>
</li>


<li class="active treeview menu-open" style="height: auto;">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Products Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu" style="">

            <li class="{{ Request::is('products*') ? 'active' : '' }}">
                <a href="{!! route('products.index') !!}"><i class="fa fa-edit"></i><span>Products</span></a>
            </li>

            <li class="{{ Request::is('categories*') ? 'active' : '' }}">
                <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
            </li>

            <li class="{{ Request::is('units*') ? 'active' : '' }}">
                <a href="{!! route('units.index') !!}"><i class="fa fa-edit"></i><span>Units</span></a>
            </li>

            <li class="{{ Request::is('banners*') ? 'active' : '' }}">
                <a href="{!! route('banners.index') !!}"><i class="fa fa-edit"></i><span>Banners</span></a>
            </li>
          </ul>
</li>


<li class="active treeview menu-open" style="height: auto;">
          <a href="#">
            <i class="fa fa-cubes"></i> <span>Shops Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu" style="">
            <li class="{{ Request::is('shops*') ? 'active' : '' }}">
                <a href="{!! route('shops.index') !!}"><i class="fa fa-edit"></i><span>Shops</span></a>
            </li>

            <li class="{{ Request::is('orders*') ? 'active' : '' }}">
                <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Orders</span></a>
            </li>
          </ul>
</li>


