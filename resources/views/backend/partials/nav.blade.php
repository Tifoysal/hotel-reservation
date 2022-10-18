<!-- start sidebar menu -->
<div class="sidebar-container">
    <div class="sidemenu-container navbar-collapse collapse fixed-menu">
        <div id="remove-scroll">
            <ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="sidebar-user-panel">
                    <div class="user-panel">
                        <div class="row">
                            <div class="sidebar-userpic">
                                <img src="{{url('/uploads/user/'.auth()->user()->image)}}" class="img-responsive" alt=""> </div>
                        </div>
                        <div class="profile-usertitle">
                            <div class="sidebar-userpic-name"> {{auth()->user()->name}} </div>
{{--                            <div class="profile-usertitle-job"> Manager </div>--}}
                        </div>

                    </div>
                </li>


                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="">
                        <i class="material-icons">dashboard</i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                    </a>
                </li>

                <li class="nav-item {{ (request()->is('booking/*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">business_center</i>
                        <span class="title">Booking</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ (request()->is('booking/create')) ? 'active' : '' }}">
                            <a href="{{route('booking.create')}}" class="nav-link ">
                                <span class="title">New Booking</span>
                            </a>
                        </li>
                        <li class="nav-item {{ (request()->is('booking/list')) ? 'active' : '' }}">
                            <a href="{{route('booking.list')}}" class="nav-link ">
                                <span class="title">View Booking</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item {{ (request()->is('room/*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">vpn_key</i>
                        <span class="title">Rooms</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        @if(auth()->user()->user_type==='admin')
                        <li class="nav-item {{ (request()->is('room/create')) ? 'active' : '' }}">
                            <a href="{{route('room.create')}}" class="nav-link ">
                                <span class="title">Add New Room</span>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item {{ (request()->is('room/list')) ? 'active' : '' }}">
                            <a href="{{route('room.list')}}" class="nav-link ">
                                <span class="title">View All Rooms</span>
                            </a>
                        </li>

                    </ul>
                </li>
                @if(auth()->user()->user_type==='admin')
                <li class="nav-item {{ (request()->is('user/*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">group</i>
                        <span class="title">Staff</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ (request()->is('user/create')) ? 'active' : '' }}">
                            <a href="{{route('user.create')}}" class="nav-link ">
                                <span class="title">Add Staff Details</span>
                            </a>
                        </li>
                        <li class="nav-item {{ (request()->is('user/list')) ? 'active' : '' }}">
                            <a href="{{route('user.list')}}" class="nav-link ">
                                <span class="title">View All Staffs</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item {{ (request()->is('resort/*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">business_center</i>
                        <span class="title">Resort</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ (request()->is('resort/create')) ? 'active' : '' }}">
                            <a href="{{route('resort.create')}}" class="nav-link ">
                                <span class="title">Add Resort</span>
                            </a>
                        </li>
                        <li class="nav-item {{ (request()->is('resort/list')) ? 'active' : '' }}">
                            <a href="{{route('resort.list')}}" class="nav-link ">
                                <span class="title">View Resort</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">local_taxi</i>
                        <span class="title">Transportation</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item">
                            <a href="add_vehicle.html" class="nav-link ">
                                <span class="title">Add Vehicle Details</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="all_vehicles.html" class="nav-link ">
                                <span class="title">View All Vehicle</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="edit_vehicle.html" class="nav-link ">
                                <span class="title">Edit Vehicle Details</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ (request()->is('location/*')) ? 'active' : '' }}">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="material-icons">settings</i>
                        <span class="title">Location</span>
                        <span class="arrow"></span>
{{--                        <span class="label label-rouded label-menu label-danger">new</span>--}}
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item {{ (request()->is('location/thana')) ? 'active' : '' }}">
                            <a href="{{route('thana.list')}}" class="nav-link ">
                                <span class="title">Thana</span>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="email_view.html" class="nav-link ">--}}
{{--                                <span class="title">View Mail</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="email_compose.html" class="nav-link ">--}}
{{--                                <span class="title">Compose Mail</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </li>
                    @endif
            </ul>
        </div>
    </div>
</div>
<!-- end sidebar menu -->
