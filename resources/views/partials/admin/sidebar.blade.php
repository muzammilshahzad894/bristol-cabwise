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
            <!-- <li class="{{ request()->routeIs('admin.car.index') || request()->routeIs('admin.car.create') ? 'mm-active' : '' }}">
                <a href="{{ route('admin.cars.index') }}" class="" aria-expanded="false">
                    <i class="flaticon-086-star"></i>
                    <span class="nav-text">Cars</span>
                </a>
            </li> -->
        </ul>
    </div>
</div>