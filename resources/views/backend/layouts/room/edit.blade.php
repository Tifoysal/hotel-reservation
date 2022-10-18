@extends('backend.master')
@section('content')

    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Edit Room</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('dashboard')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="">Room</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Edit Room</li>
            </ol>
        </div>
    </div>
    <form action="{{route('room.update',$room->id)}}" method="post" role="form">
        @csrf
        @method('put')
        <div class="row">

            <div class="col-sm-12">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                <div class="card-box">
                    <div class="card-head">
                        <header>Edit Room Details</header>
                        <button id = "panel-button"
                                class = "mdl-button mdl-js-button mdl-button--icon pull-right"
                                data-upgraded = ",MaterialButton">
                            <i class = "material-icons">more_vert</i>
                        </button>
                        <ul class = "mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                            data-mdl-for = "panel-button">
                            <li class = "mdl-menu__item"><i class="material-icons">assistant_photo</i>Action</li>
                            <li class = "mdl-menu__item"><i class="material-icons">print</i>Another action</li>
                            <li class = "mdl-menu__item"><i class="material-icons">favorite</i>Something else here</li>
                        </ul>
                    </div>
                    <div class="card-body row">
                        <div class="col-lg-6 p-t-20">
                            <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input value="{{$room->number}}" required name="number" class = "mdl-textfield__input" type = "text" id = "txtRoomNo">
                                <label class = "mdl-textfield__label">Room Number</label>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                <input value="{{$room->type}}" required name="type" class="mdl-textfield__input" type="text" id="list3" readonly tabIndex="-1">
                                <label for="list3" class="pull-right margin-0">
                                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                </label>
                                <label for="list3" class="mdl-textfield__label">Room Type</label>
                                <ul data-mdl-for="list3" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <li class="mdl-menu__item" data-val="1">Single</li>
                                    <li class="mdl-menu__item" data-val="2">Double</li>
                                    <li class="mdl-menu__item" data-val="3">Quad</li>
                                    <li class="mdl-menu__item" data-val="4">King</li>
                                    <li class="mdl-menu__item" data-val="5">Suite</li>
                                    <li class="mdl-menu__item" data-val="6">Apartments</li>
                                    <li class="mdl-menu__item" data-val="7">Villa</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                <input required name="is_ac" class="mdl-textfield__input" type="text" id="sample2" value="{{$room->is_ac}}" readonly tabIndex="-1">
                                <label for="sample2" class="pull-right margin-0">
                                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                </label>
                                <label for="sample2" class="mdl-textfield__label">AC/Non AC</label>
                                <ul data-mdl-for="sample2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <li class="mdl-menu__item" data-val="DE">AC</li>
                                    <li class="mdl-menu__item" data-val="BY">Non AC</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                <input required name="meal" class="mdl-textfield__input" type="text" id="sample3" value="{{$room->meal}}" readonly tabIndex="-1">
                                <label for="sample3" class="pull-right margin-0">
                                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                </label>
                                <label for="sample2" class="mdl-textfield__label">Meal</label>
                                <ul data-mdl-for="sample3" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <li class="mdl-menu__item" data-val="1">Free Breakfast</li>
                                    <li class="mdl-menu__item" data-val="2">Free Dinner</li>
                                    <li class="mdl-menu__item" data-val="3">Free Breakfast &amp; Dinner</li>
                                    <li class="mdl-menu__item" data-val="4">Free Welcome Drink</li>
                                    <li class="mdl-menu__item" data-val="5">No Free Food</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                <input required name="cancellation_rate" class="mdl-textfield__input" type="text" id="sample4" value="{{$room->cancellation_rate}}" readonly tabIndex="-1">
                                <label class="pull-right margin-0">
                                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                </label>
                                <label class="mdl-textfield__label">Cancellation Charges</label>
                                <ul data-mdl-for="sample4" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                    <li class="mdl-menu__item" data-val="1">Free Cancellation</li>
                                    <li class="mdl-menu__item" data-val="2">10% Before 24 Hours</li>
                                    <li class="mdl-menu__item" data-val="1">No Cancellation Allow</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                                <input required name="bed_capacity" class="mdl-textfield__input" type="text" id="list2" value="{{$room->bed_capacity}}" readonly tabIndex="-1">
                                <label for="list2" class="pull-right margin-0">
                                    <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                                </label>
                                <label for="list2" class="mdl-textfield__label">Bed Capacity</label>
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
                            <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input value="{{$room->telephone}}" name="telephone" class = "mdl-textfield__input" type = "text"
                                       pattern = "-?[0-9]*(\.[0-9]+)?" id = "text8">
                                <label class = "mdl-textfield__label" for = "text8">Telephone Number</label>
                                <span class = "mdl-textfield__error">Number required!</span>
                            </div>
                        </div>
                        <div class="col-lg-6 p-t-20">
                            <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input value="{{$room->rent}}" required name="rent" class = "mdl-textfield__input" type = "text"
                                       pattern = "-?[0-9]*(\.[0-9]+)?" id = "text7">
                                <label class = "mdl-textfield__label" for = "text7">Rent Per Night</label>
                                <span class = "mdl-textfield__error">Number required!</span>
                            </div>
                        </div>

                        <div class="col-lg-6 p-t-20">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">

                                <div class="form-group">
                                    <label>Select Resort</label>
                                    <select name="resort_id" class="form-control row has-error">
                                        @foreach($resorts as $resort)
                                            <option @if($room->resort_id===$resort->id) selected @endif value="{{$resort->id}}">{{$resort->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 p-t-20">
                            <div class = "mdl-textfield mdl-js-textfield txt-full-width">
					                     <textarea required name="details" class = "mdl-textfield__input" rows =  "4"
                                                   id = "education" >{{$room->details}}</textarea>
                                <label class = "mdl-textfield__label" for = "text7">Room Details</label>
                            </div>
                        </div>
                        <div class="col-lg-12 p-t-20 text-center">
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Update</button>
                            <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

@stop

