@extends('backend.master')
@section('content')

                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">Add New Thana</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('dashboard')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li><a class="parent-item" href="">Thana</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">Add Thana</li>
                        </ol>
                    </div>
                </div>
                <form action="{{route('thana.create')}}" method="post" role="form">
@csrf
                <div class="row">
                    <div class="col-sm-12">
                        @if(session()->has('message'))
                            <p class="alert alert-success">{{ session()->get('message') }}</p>
                            @endif
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                        <div class="card-box">
                            <div class="card-head">
                                <header>Add Thana</header>
{{--                                <button id = "panel-button"--}}
{{--                                        class = "mdl-button mdl-js-button mdl-button--icon pull-right"--}}
{{--                                        data-upgraded = ",MaterialButton">--}}
{{--                                    <i class = "material-icons">more_vert</i>--}}
{{--                                </button>--}}
{{--                                <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"--}}
{{--                                    data-mdl-for = "panel-button">--}}
{{--                                    <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>--}}
{{--                                    <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>--}}
{{--                                    <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>--}}
{{--                                </ul>--}}
                            </div>
                            <div class="card-body row">
                                <div class="col-lg-6 p-t-20">
                                    <label class = "">Name *</label>
                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input required name="name" class = "mdl-textfield__input" type = "text" id = "name">
                                    </div>
                                </div>


                                <div class="col-lg-6 p-t-20">
                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <label class = "">Select District *</label>
                                        <select class="form-control" name="district_id" id="">
                                        @foreach($districts as $disctrict)
                                                <option value="{{$disctrict->id}}">{{$disctrict->name.'('. $disctrict->bn_name.')'}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 p-t-20">
                                    <label class = "">Bangla Name</label>
                                    <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input required name="bn_name" class = "mdl-textfield__input" type = "text" id = "bn_name">
                                    </div>
                                </div>

                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                                    <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                </form>

@stop

