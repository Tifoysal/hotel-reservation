@extends('backend.master')
@section('content')

    {{--        <div class="col-md-6">--}}
    {{--            <div id="my_camera"></div>--}}
    {{--            <br/>--}}
    {{--            <input type=button value="Take Snapshot" onClick="take_snapshot()">--}}
    {{--            <input type="hidden" name="image" class="image-tag">--}}
    {{--        </div>--}}
    {{--        <div class="col-md-6">--}}
    {{--            <div id="results">Your captured image will appear here...</div>--}}
    {{--        </div>--}}
    {{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>--}}

    {{--        <!-- Configure a few settings and attach camera -->--}}
    {{--        <script language="JavaScript">--}}
    {{--            Webcam.set({--}}
    {{--                width: 490,--}}
    {{--                height: 390,--}}
    {{--                image_format: 'jpeg',--}}
    {{--                jpeg_quality: 90--}}
    {{--            });--}}

    {{--            Webcam.attach( '#my_camera' );--}}

    {{--            function take_snapshot() {--}}
    {{--                Webcam.snap( function(data_uri) {--}}
    {{--                    $(".image-tag").val(data_uri);--}}
    {{--                    document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';--}}
    {{--                } );--}}
    {{--            }--}}
    {{--        </script>--}}
    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Add Room Booking</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                       href="{{route('dashboard')}}">Home</a>&nbsp;<i
                        class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="">Booking</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Add Booking</li>
            </ol>
        </div>
    </div>

    <form action="{{route('booking.store')}}" method="post" enctype="multipart/form-data" role="form">
        @csrf
        <div class="row">
            <div class="col-sm-12">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                <div class="card-box">
                    <div class="card-head">
                        <header>Add Room Booking</header>
                        <button id="panel-button"
                                class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                data-upgraded=",MaterialButton">
                            <i class="material-icons">more_vert</i>
                        </button>
                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            data-mdl-for="panel-button">
                            <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
                            <li class="mdl-menu__item"><i class="material-icons">print</i>Another action</li>
                            <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
                        </ul>
                    </div>
                    <div class="card-body row">
                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input name="first_name" required class="mdl-textfield__input" type="text"
                                       id="txtFirstName">
                                <label class="mdl-textfield__label">First Name</label>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input name="last_name" required class="mdl-textfield__input" type="text"
                                       id="txtLasttName">
                                <label class="mdl-textfield__label">Last Name</label>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input name="father_name" required class="mdl-textfield__input" type="text"
                                       id="txtFatherName">
                                <label class="mdl-textfield__label">Father's Name</label>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input name="mother_name" required class="mdl-textfield__input" type="text"
                                       id="txtMotherName">
                                <label class="mdl-textfield__label">Mother's Name</label>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input name="email" class="mdl-textfield__input" type="email" id="txtemail">
                                <label class="mdl-textfield__label">Email</label>
                                <span class="mdl-textfield__error">Enter Valid Email Address!</span>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div
                                class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                <input name="gender" class="mdl-textfield__input" type="text" id="sample2" value=""
                                       readonly
                                       tabIndex="-1">
                                <label for="sample2" class="pull-right margin-0">
                                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                </label>
                                <label for="sample2" class="mdl-textfield__label">Gender</label>
                                <ul data-mdl-for="sample2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <li class="mdl-menu__item" data-val="DE">Male</li>
                                    <li class="mdl-menu__item" data-val="BY">Female</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input placeholder="017xxxxxxxx" minlength="11" maxlength="11" name="mobile" required
                                       class="mdl-textfield__input" type="text"
                                       pattern="-?[0-9]*(\.[0-9]+)?" id="text5">
                                <label class="mdl-textfield__label" for="text5">Mobile Number</label>
                                <span class="mdl-textfield__error">Number required!</span>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input minlength="11" maxlength="11" name="relative_mobile" class="mdl-textfield__input"
                                       type="number"
                                       pattern="-?[0-9]*(\.[0-9]+)?" id="text5">
                                <label class="mdl-textfield__label" for="text5">Mobile Number (Relative)</label>
                                {{--                                <span class="mdl-textfield__error">Number required!</span>--}}
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">

                            <label class="col-md-4 control-label">Arrive</label>
                            <input onchange="setDate()" class="form-control" type="date" id="start" name="arrive"
                                   value="{{date('Y-m-d',strtotime(today()))}}"
                                   min="">

                        </div>
                        <div class="col-lg-6 p-t-20">
                            <label class="col-md-4 control-label">Depart</label>

                            <input class="form-control" type="date" id="start-to-date" name="depart"
                                   value="{{date('Y-m-d',strtotime(today().' +1 day'))}}"
                                   min="">

                        </div>

                        <div class="col-lg-6 p-t-20">
                            <label class="col-md-2 control-label">Check IN</label>
                            <input type="time" name="check_in" class="form-control">

                        </div>
                        <div class="col-lg-6 p-t-20">
                            <label class="col-md-4 control-label">Check Out</label>
                            <input value="11:30" type="time" name="check_out" class="form-control">
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div
                                class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                <input class="mdl-textfield__input" type="text" id="list2" value="" readonly
                                       tabIndex="-1">
                                <label for="list2" class="pull-right margin-0">
                                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                </label>
                                <label for="list2" class="mdl-textfield__label">No Of Persons</label>
                                <ul data-mdl-for="list2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <li class="mdl-menu__item" data-val="1">1</li>
                                    <li class="mdl-menu__item" data-val="2">2</li>
                                    <li class="mdl-menu__item" data-val="3">3</li>
                                    <li class="mdl-menu__item" data-val="4">4</li>
                                    <li class="mdl-menu__item" data-val="5">5</li>
                                    <li class="mdl-menu__item" data-val="6">6</li>
                                    <li class="mdl-menu__item" data-val="7">7</li>
                                    <li class="mdl-menu__item" data-val="8">8</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">

                            <div class="row">
                                <label for="room" class="control-label col-lg-3">Select Room
                                    <span class="required" aria-required="true"> * </span>
                                </label>
                                <div class="col-lg-12">
                                    <select id="room" required class="form-control" name="room_id">
                                        <option value="">Select Room</option>
                                        @foreach($rooms as $room)
                                            <option value="{{$room->id}}">{{$room->number}}-{{$room->type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            {{--                        <div--}}
                            {{--                            class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">--}}
                            {{--                            <input class="mdl-textfield__input" type="text" id="list3" value="" readonly tabIndex="-1">--}}
                            {{--                            <label for="list3" class="pull-right margin-0">--}}
                            {{--                                <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>--}}
                            {{--                            </label>--}}
                            {{--                            <label for="list3" class="mdl-textfield__label">Room Type</label>--}}
                            {{--                            <ul data-mdl-for="list3" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">--}}
                            {{--                                <li class="mdl-menu__item" data-val="1">Single</li>--}}
                            {{--                                <li class="mdl-menu__item" data-val="2">Double</li>--}}
                            {{--                                <li class="mdl-menu__item" data-val="3">Quad</li>--}}
                            {{--                                <li class="mdl-menu__item" data-val="4">King</li>--}}
                            {{--                                <li class="mdl-menu__item" data-val="5">Suite</li>--}}
                            {{--                                <li class="mdl-menu__item" data-val="6">Apartments</li>--}}
                            {{--                                <li class="mdl-menu__item" data-val="7">Villa</li>--}}
                            {{--                            </ul>--}}
                            {{--                        </div>--}}
                        </div>

                        <div class="col-lg-12 p-t-20">
                            <div class="row">
                                <div class="col-lg-6 p-t-20">

                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input placeholder="Enter Age" minlength="1" maxlength="3" name="age" required
                                               class="mdl-textfield__input" type="text"
                                               pattern="-?[0-9]*(\.[0-9]+)?" id="text5">
                                        <label class="mdl-textfield__label" for="text5">Age</label>

                                    </div>

                                </div>
                                <div class="col-lg-6 p-t-20">

                                    <label class="control-label col-md-4">Upload Photo</label>
                                    <div class="dz-message">
                                        <input type="file" name="image" class="form-control">
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 p-t-20">

                            <div class="row">
                                <div class="col-lg-6">
                                    <label class="control-label col-lg-4">NID/Passport No:
                                        {{--                                        <span class="" aria-required="true">  </span>--}}
                                    </label>
                                    <div class="col-lg-12">
                                        <input placeholder="Enter NID/Password" name="nid_passport" type="text"
                                               class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label class="control-label col-lg-4">Profession:
                                        {{--                                        <span class="required" aria-required="true"> * </span>--}}
                                    </label>
                                    <div class="col-lg-12">
                                        <input placeholder="Enter Profession" name="profession" type="text"
                                               class="form-control">
                                    </div>
                                </div>

                            </div>

                        </div>

                        @livewire('all-division')

                        <div class="form-group col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <label class="control-label col-lg-4">Select Union
                                            <span class="required" aria-required="true"> * </span>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" placeholder="Union" name="union">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield txt-full-width">
					                     <textarea name="address" class="mdl-textfield__input" rows="4"
                                                   id="text7"></textarea>
                                <label class="mdl-textfield__label" for="text7">Full Address</label>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <p><label for="">Select Booking Type</label></p>
                            <input type="checkbox" id="present" name="type" value="present">
                            <label for="present"> Present</label><br>
                            <input type="checkbox" id="past" name="type" value="past">
                            <label for="past"> Past</label><br>
                        </div>

                        <div class="col-lg-12 p-t-20 text-center">
                            <button type="submit"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">
                                Submit
                            </button>
                            <button type="button"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
@push('js')

    <script>
      

        var start = document.getElementById('start');
        var start_to_date = document.getElementById('start-to-date');


        start.addEventListener('change', function (event) {
            var value = event.target.value;
            console.log(value);
            var today = new Date(value);
            today.setDate(today.getDate() + 1)
            start_to_date.value = moment(today).format('YYYY-MM-DD')
        });


    </script>
@endpush
