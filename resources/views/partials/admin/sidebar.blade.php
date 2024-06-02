<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="{{ request()->routeIs('admin.dashboard') ? 'mm-active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.services.index') || request()->routeIs('admin.services.create') ? 'mm-active' : '' }}">
                <a href="{{ route('admin.services.index') }}" class="" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Services</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.fleets.index') || request()->routeIs('admin.fleets.create') ? 'mm-active' : '' }}">
                <a href="{{ route('admin.fleets.index') }}" class="" aria-expanded="false">
                    <i class="fa fa-list-ul"></i>
                    <span class="nav-text">Fleets</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.settings.index') || request()->routeIs('admin.settings.index') ? 'mm-active' : '' }} || request()->routeIs('admin.settings.edit')">
                <a href="{{ route('admin.settings.index') }}" class="" aria-expanded="false">
                 
                    <i class="fa fa-calendar">
                        
                    </i>
                    <span class="nav-text">Block Dates</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.coupons.index') || request()->routeIs('admin.coupons.create') ? 'mm-active' : '' }} || request()->routeIs('admin.coupons.edit')">
                 <a href="{{ route('admin.coupons.index') }}" class="" aria-expanded="false">
                    <i class="fa fa-list-ul"></i>
                    <span class="nav-text">Coupon</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.draft.index') || request()->routeIs('admin.draft.create') ? 'mm-active' : '' }} || request()->routeIs('admin.draft.edit')">
                 <a href="{{ route('admin.draft.index') }}" class="" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    <span class="nav-text">Draft User</span>
                </a>
            </li>
            <li class="{{ request()->routeIs('admin.confirm.index') || request()->routeIs('admin.confirm.create') ? 'mm-active' : '' }} || request()->routeIs('admin.confirm.edit')">
                 <a href="{{ route('admin.confirm.index') }}" class="" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    <span class="nav-text">Clients</span>
                </a>
            </li>
            <!-- <li class="{{ request()->routeIs('admin.car.index') || request()->routeIs('admin.car.create') ? 'mm-active' : '' }}">
                <a href="{{ route('admin.cars.index') }}" class="" aria-expanded="false">
                    <i class="flaticon-086-star"></i>
                    <span class="nav-text">Cars</span>
                </a>
            </li> -->
        </ul>
    </div>
</div>