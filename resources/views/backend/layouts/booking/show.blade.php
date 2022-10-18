@extends('backend.master')
@section('content')

    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Show Room Booking</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('dashboard')}}">Home</a>&nbsp;<i
                        class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="">Booking</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Show Booking</li>
            </ol>
        </div>
    </div>


    <div class="container bootstrap snippets bootdeys">
        <div class="row" id="printableArea">
            <div class="col-md-12">
                <div class="panel panel-default invoice" id="invoice">
                    <div class="panel-body">
                        <div class="invoice-ribbon"><div class="ribbon-inner">Booked</div></div>
                        <div class="row">

                            <div class="col-sm-4 top-left">
{{--                                <i class="fa fa-home"></i>--}}
{{--                                <h3>BM Group</h3>--}}
                                <h5><span class="bold">Resort Name: </span>{{$booking->resort->name}}</h5>
                                <h5><span class="bold">Room Number :</span>{{$booking->room->number}}</h5>
{{--                                <h5>Address: {{$booking->resort->address}}</h5>--}}
                            </div>
                            <div class="col-sm-4 text-center">
                                <img width="200px;" src="{{url('logo.png')}}" alt="logo">
                                <h4>BM Group</h4>
                                <hr style="margin: 0px !important;">
                                <span style="color: cornflowerblue">COX'S BAZAR</span>
                            </div>
                            <div class="col-sm-4 top-right">
                                <h3 class="marginright">Arrive | Check-IN</h3>
                                <span class="marginright">{{$booking->arrive}}</span> <span class="p-2">|</span>
                                <span class="marginright">{{date('h:i A',strtotime($booking->check_in))}}</span>
                            </div>

                        </div>
                        <hr>
                        <div class="col-md-12">
                            <h1 style="margin: auto;text-align: center;text-decoration: underline;">Guest Details</h1>

                        </div>

                        <div class="row" style="padding:50px;">
                            <div class="col-md-4 col-sm-4">

                                <p class="lead marginbottom payment-info">Guest Info</p>
                                <p><span class="bold">Full Name: </span>{{$booking->first_name}} {{$booking->last_name}}</p>
                                <p><span class="bold">Father's Name: </span>{{$booking->father_name}} </p>
                                <p><span class="bold">Mother's Name: </span>{{$booking->mother_name}} </p>
                                <p><span class="bold">Email: </span>{{$booking->email}}</p>
                                <p><span class="bold">Mobile: </span>{{$booking->mobile}}</p>
                                <p><span class="bold">Mobile (Relative): </span>{{$booking->relative_mobile}}</p>
                                <p><span class="bold">Gender:</span> {{$booking->gender}}</p>
                                <p><span class="bold">NID / Passport:</span> {{$booking->nid_passport}}</p>

                            </div>



                            <div class="col-md-4 col-sm-4">
                                <p class="lead marginbottom payment-info">Address</p>
                                <p><span class="bold">Division: </span>{{$booking->divi?$booking->divi->name:''}}</p>
                                <p><span class="bold">District:</span> {{$booking->dis?$booking->dis->name:''}}</p>
                                <p><span class="bold">Police Station:</span> {{$booking->thana?$booking->thana->name:''}}</p>
                                <p><span class="bold">Union: </span>{{$booking->union}}</p>
                                <p><span class="bold">Full Address: </span>{{$booking->address}}</p>

                            </div>
                            <div class="col-md-4 col-sm-4 text-center">
                                <img style="border-radius: 5px" width="200px;" src="{{url('/uploads/customer/'.$booking->image)}}" alt="">
                            </div>

                        </div>
                        <div class="col-md-12">
                            <h1 style="margin: auto;text-align: center;text-decoration: underline;">Booking Details</h1>
                        </div>
                        <div class="row table-row">
                            <table class="table table-striped">

                                <tbody>
                                <tr>

                                    <td><span class="bold">Arrive</span></td>
                                    <td>{{$booking->arrive}}</td>
                                    <td class=""><span class="bold">Depart</span></td>
                                    <td>{{$booking->depart}}</td>

                                </tr>

                                <tr>
                                    <td class=""><span class="bold">Check In</span></td>
                                    <td>{{date('h:i A',strtotime($booking->check_in))}}</td>
                                    <td class=""><span class="bold">Check Out</span></td>
                                    <td>{{date('h:i A',strtotime($booking->check_out))}}</td>
                                </tr>



                                </tbody>
                            </table>

                        </div>
                        <div class="col-md-12" style="padding-top:30px; ">
                            <span class="bold">Booked At : {{date('Y-m-d h:i A',strtotime($booking->created_at))}}</span>
                            &nbsp &nbsp <span class="bold">Booked By: {{$booking->user->name}} </span>
                        <p style="padding-top: 30px;" class="marginbottom text-center">Thank You and Enjoy Your Vacation.</p>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 text-center">


            <input class="btn btn-primary" type="button" onclick="printDiv('printableArea')" value="Print" />
            <a href="{{route('booking.edit',$booking->id)}}" class="btn btn-info" type="button">Edit</a>
            <a href="{{route('booking.list')}}" class="btn btn-success" type="button">Back</a>

        </div>
    </div>

@stop
@push('js')
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
    @endpush

