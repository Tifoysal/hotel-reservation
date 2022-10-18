@extends('backend.master')
@section('content')
    <!-- start widget -->
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Dashboard</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('dashboard')}}">Home</a>&nbsp;
                    <i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </div>
    <div class="state-overview">
        <div class="row">

            <div class="col-md-4">
                <div class="info-box bg-blue">
                    <span class="info-box-icon push-bottom"><i class="fa fa-list-ol"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Bookings</span>
                        <span class="info-box-number">{{Count($total_booking)}}</span>
                        <div class="progress">
                            <div class="progress-bar width-60"></div>
                        </div>
                        <span class="progress-description">
                            @foreach($resorts as $resort)
                            <p>
                               {{count($today_stay->where('resort_id',$resort->id))}} Staying at BM ({{$resort->name}})
                            </p>
                            @endforeach
					                  </span>
{{--                        {{Count($today_depart)}} are Exiting Today.--}}
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <div class="info-box bg-orange">
                    <span class="info-box-icon push-bottom"><i class="fa fa-home"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Rooms</span>
                        <span class="info-box-number">{{Count($total_room)}}</span>
                        <div class="progress">
                            <div class="progress-bar width-40"></div>
                        </div>

                        <span class="progress-description">
                            @foreach($resorts as $resort)
                                <p>
                               {{count($booked_room->where('resort_id',$resort->id))}} Available at BM ({{$resort->name}})
                            </p>
                            @endforeach
					                  </span>

                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <div class="info-box bg-purple">
                    <span class="info-box-icon push-bottom"><i class="fa fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Staff</span>
                        <span class="info-box-number">{{Count($total_user)}}</span>
                        <div class="progress">
                            <div class="progress-bar width-80"></div>
                        </div>

                        <span class="progress-description">
                            @foreach($resorts as $resort)
                                <p>
                               {{count($total_user->where('resort_id',$resort->id))}} at BM ({{$resort->name}})
                            </p>
                            @endforeach
					                  </span>
{{--                        {{Count($total_user)}} are on Duty.--}}
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- end widget -->
        </div>


        <div class="d-flex justify-content-center">
        <div class="responsive" style="text-align:center; padding-top: 20px;">
            <a href="{{route('booking.create')}}"
               class="btn-grad1"
               data-upgraded=",MaterialButton,MaterialRipple">Create Booking
            </a>
            <a href="{{route('booking.list')}}"
               class="btn-grad2"
               data-upgraded=",MaterialButton,MaterialRipple">View Booking</a>
            <!-- /.col -->
            {{--            <div class="my_design" style="margin-top:120px;display: flex;flex-direction: row;">--}}


            <a href="{{route('room.list')}}"
               class="btn-grad3"
               data-upgraded=",MaterialButton,MaterialRipple">View Room</a>


            @if(auth()->user()->user_type==='admin')

                <a href="{{route('room.create')}}"
                   class="btn-grad4"
                   data-upgraded=",MaterialButton,MaterialRipple">Create Room</a>


                <a href="{{route('user.create')}}"
                   class="btn-grad5"
                   data-upgraded=",MaterialButton,MaterialRipple">Add New Staff</a>


                <a href="{{route('user.list')}}"
                   class="btn-grad6"
                   data-upgraded=",MaterialButton,MaterialRipple">Staff List</a>


            @endif
        </div>
        </div>
    </div>




@stop
