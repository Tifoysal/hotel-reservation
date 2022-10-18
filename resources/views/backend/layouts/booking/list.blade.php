@extends('backend.master')
@section('content')
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">All Bookings</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                       href="{{route('dashboard')}}">Home</a>&nbsp;<i
                        class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="">Booking</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">All Bookings</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-box">
                <div class="card-head">
                    <header>All Bookings</header>
                    <div class="tools">
                        <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                        <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                        <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="row p-b-20">
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="btn-group">
                                <a href="{{route('booking.create')}}" id="addRow" class="btn btn-info">
                                    Add New <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="btn-group pull-right">
                                <a href="{{route('booking.print',[$date['from'],$date['to'],$resort_id])}}">
                                    <i class="fa fa-print"></i> Print </a>

                            </div>
                        </div>
                    </div>
                    <form action="{{route('booking.list')}}" method="get">

                    <div class="row">

                        <div class="col-md-4">
                            <input value="{{$date['from']}}" name="from" type="date" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <input value="{{$date['to']}}" name="to" type="date" class="form-control">
                        </div>

                        @if(auth()->user()->user_type==='admin')

                        <div class="col-md-2">
                            <select class="select2 form-control" name="resort_id" id="resort_id">
                                <option value="0">--Select Resort--</option>
                                @foreach($resorts as $resort)
                                    <option @if((int)$resort_id===$resort->id) selected @endif value="{{$resort->id}}">{{$resort->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-primary">
                        </div>

                    </div>
                    </form>
                    @if($is_search)
                    <div class="col-md-12 text-center p-2">
                        <p class="alert alert-success">Showing ( {{count($bookings)}} ) Bookings from {{$date['from']}} to {{$date['to']}}</p>
                    </div>
                    @endif
                    <div class="table-scrollable">

                        <table class="table table-hover table-bordered table-checkable order-column full-width" id="example4">

                            <thead>
                            <tr>
                                <th class="center">Customer Image</th>
                                <th class="center"> Name</th>
                                <th class="center"> Mobile</th>
                                <th class="center"> Arrive</th>
                                <th class="center"> Depart</th>
                                <th class="center"> Room Name</th>
                                {{--                                <th class="center"> Payment </th>--}}
                                <th class="center"> Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($bookings as $key=>$booking)
                                <tr class="odd gradeX">
                                    <td class="user-circle-img">
                                        <img width="50px;" src="{{url('/uploads/customer/'.$booking->image)}}" alt="">
                                    </td>
                                    <td class="center">{{$booking->first_name}} {{$booking->last_name}}</td>
                                    <td class="center"><a href="tel:4444565756">
                                            {{$booking->mobile}} </a></td>

                                    <td class="center">{{$booking->arrive}}</td>
                                    <td class="center">{{$booking->depart}}</td>
                                    <td class="center">{{$booking->room->number}}</td>
                                    {{--                                <td class="center">--}}
                                    {{--                                    <span class="label label-sm label-success">Paid </span>--}}
                                    {{--                                </td>--}}
                                    <td class="center">
                                        <a href="{{route('booking.edit',$booking->id)}}"
                                           class="btn btn-tbl-edit btn-xs">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="{{route('booking.show',$booking->id)}}"
                                           class="btn btn-tbl-edit btn-info btn-xs">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('booking.delete',$booking->id)}}"
                                           onclick="return confirm('Are you sure you want to delete this Booking?');"
                                           class="btn btn-tbl-delete btn-xs">
                                            <i class="fa fa-trash-o "></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

