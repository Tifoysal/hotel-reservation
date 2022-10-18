@extends('backend.master')
@section('content')
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Bookings</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                       href="{{route('dashboard')}}">Home</a>&nbsp;<i
                        class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a class="parent-item" href="{{route('booking.list')}}">Booking</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">List</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>Bookings Print Preview</header>
                    <div class="tools">
                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                    </div>
                </div>
                <div class="card-body ">



                    <div class="table-scrollable" id="printTable">
                        <div class="container bootstrap snippets bootdeys">
                            <div class="row" id="printableArea">
                                <div class="col-md-12">
                                    <div class="panel panel-default invoice" id="invoice">
                                        <div class="panel-body">
                                            <div class="invoice-ribbon"><div class="ribbon-inner">Report</div></div>
                                            <div class="row">

                                                <div class="col-sm-4 top-left">
                                                    {{--                                <i class="fa fa-home"></i>--}}
                                                    {{--                                <h3>BM Group</h3>--}}
                                                    <h5><span class="bold">From Date: {{$date['from']}} </span></h5>
                                                    <h5><span class="bold">To Date : {{$date['to']}}</span></h5>
                                                    <h5><span class="bold">Resort Name : {{$resort}}</span></h5>
                                                    {{--                                <h5>Address: {{$booking->resort->address}}</h5>--}}
                                                </div>
                                                <div class="col-sm-4 text-center">
                                                    <img width="200px;" src="{{url('logo.png')}}" alt="logo">
{{--                                                    <h4>BM Group</h4>--}}
{{--                                                    <hr style="margin: 0px !important;">--}}
{{--                                                    <span style="color: cornflowerblue">COX'S BAZAR</span>--}}
                                                </div>
                                                <div class="col-sm-4 top-right">
                                                    <h3 class="marginright">Booking Report</h3>

                                                </div>

                                            </div>
                                            <hr>

                                            <table class="table">

                                                <thead>
                                                <tr>
                                                    <th class="center">Customer Image</th>
                                                    <th class="center"> Name</th>
                                                    <th class="center"> Mobile</th>
                                                    <th class="center"> Arrive</th>
                                                    <th class="center"> Depart</th>
                                                    <th class="center"> Room Name</th>
                                                    {{--                                <th class="center"> Payment </th>--}}
                                                    {{--                                <th class="center"> Action</th>--}}
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($bookings as $key=>$booking)
                                                    <tr class="odd gradeX">
                                                        <td class="user-circle-img">
                                                            <img width="50px;" src="{{url('/uploads/customer/'.$booking->image)}}" alt="">
                                                        </td>
                                                        <td class="center">{{$booking->first_name}} {{$booking->last_name}}</td>
                                                        <td class="center">
                                                                {{$booking->mobile}} </td>

                                                        <td class="center">{{$booking->arrive}}</td>
                                                        <td class="center">{{$booking->depart}}</td>
                                                        <td class="center">{{$booking->room->number}}</td>
                                                        {{--                                <td class="center">--}}
                                                        {{--                                    <span class="label label-sm label-success">Paid </span>--}}
                                                        {{--                                </td>--}}

                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>


                                            <div class="col-md-12" style="padding-top:30px; ">

                                                <p style="padding-top: 30px;" class="marginbottom text-center">Prepare By: {{auth()->user()->name}} | Date time: {{date('Y-m-d h:i A')}}</p>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <button class="btn btn-primary" onclick="printDiv('printTable')">Print</button>
                </div>
            </div>
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
