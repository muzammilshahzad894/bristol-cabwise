<div class="dlabnav">
    <div class="dlabnav-scroll">
        @if(Auth::user()->role == 'admin')
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
                <li class="{{ request()->routeIs('admin.drivers.index') || request()->routeIs('admin.drivers.create') ? 'mm-active' : '' }} || request()->routeIs('admin.drivers.edit')">
                    <a href="{{ route('admin.drivers.index') }}" class="" aria-expanded="false">
                        <i class="fa fa-taxi"></i>
                        <span class="nav-text">Drivers</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.block-dates.index') || request()->routeIs('admin.block-dates.index') ? 'mm-active' : '' }} || request()->routeIs('admin.block-dates.edit')">
                    <a href="{{ route('admin.block-dates.index') }}" class="" aria-expanded="false">
                    
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
                <li class="{{ request()->routeIs('admin.booking') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.booking') }}" class="" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        <span class="nav-text">Booking by Admin</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.draft.index') || request()->routeIs('admin.draft.create') ? 'mm-active' : '' }} || request()->routeIs('admin.draft.edit')">
                    <a href="{{ route('admin.draft.index') }}" class="" aria-expanded="false">
                        <i class="fa fa-file-alt"></i>
                        <span class="nav-text">Draft Bookings</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.confirm.index') || request()->routeIs('admin.confirm.create') ? 'mm-active' : '' }} || request()->routeIs('admin.confirm.edit')">
                    <a href="{{ route('admin.confirm.index') }}" class="" aria-expanded="false">
                        <i class="fa fa-clipboard-list"></i>
                        <span class="nav-text">Bookings</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.refund.index') || request()->routeIs('admin.confirm.create') ? 'mm-active' : '' }} || request()->routeIs('admin.confirm.edit')">
                    <a href="{{ route('admin.refund.index') }}" class="" aria-expanded="false">
                        <i class="fa fa-clipboard-list"></i>
                        <span class="nav-text">Refunds Request</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.settings.index') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.settings.index') }}" class="" aria-expanded="false">
                        <i class="fa fa-cog"></i>
                        <span class="nav-text">Settings</span>
                    </a>
                </li>
                @if(request()->has('programmer'))
                    <li class="{{ request()->routeIs('admin.emails.index') ? 'mm-active' : '' }}">
                        <a href="{{ route('admin.emails.index') }}" class="" aria-expanded="false">
                            <i class="fa fa-envelope"></i>
                            <span class="nav-text">Emails</span>
                        </a>
                    </li>
                @endif
            </ul>
        @endif
        @if(Auth::user()->role == 'driver')
            <ul class="metismenu" id="menu">
                <li class="{{ request()->routeIs('driver.dashboard') ? 'mm-active' : '' }}">
                    <a href="{{ route('driver.dashboard') }}" class="" aria-expanded="false">
                        <i class="flaticon-025-dashboard"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('driver.bookings.index') ? 'mm-active' : '' }}">
                    <a href="{{ route('driver.bookings.index') }}" class="" aria-expanded="false">
                        <i class="fa fa-clipboard-list"></i>
                        <span class="nav-text">Bookings</span>
                    </a>
                </li>
            </ul>
        @endif
    </div>
</div>