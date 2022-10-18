@extends('backend.master')
@section('content')

    <div class="page-bar">
        <div class="page-title-breadcrumb">
            <div class=" pull-left">
                <div class="page-title">Edit New Resort</div>
            </div>
            <ol class="breadcrumb page-breadcrumb pull-right">
                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('dashboard')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li><a class="parent-item" href="">Resort</a>&nbsp;<i class="fa fa-angle-right"></i>
                </li>
                <li class="active">Edit Resort</li>
            </ol>
        </div>
    </div>
    <form action="{{route('resort.update',$resort->id)}}" method="post" role="form">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-sm-12">
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                <div class="card-box">
                    <div class="card-head">
                        <header>Edit Resort</header>
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
                                <input value="{{$resort->name}}" required name="name" class = "mdl-textfield__input" type = "text" id = "name">
                                <label class = "mdl-textfield__label">Name *</label>
                            </div>
                        </div>


                        <div class="col-lg-6 p-t-20">
                            <div class = "mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                <input required value="{{$resort->mobile}}" name="mobile" class = "mdl-textfield__input" type = "text"
                                       pattern = "-?[0-9]*(\.[0-9]+)?" id = "text5">
                                <label class = "mdl-textfield__label" for = "text5">Mobile Number *</label>
                                <span class = "mdl-textfield__error">Number required!</span>
                            </div>
                        </div>

                        <div class="col-lg-6 p-t-20">
                            <div class = "mdl-textfield mdl-js-textfield txt-full-width">
					                     <textarea name="address" class = "mdl-textfield__input" rows =  "4"
                                                   id = "text7" >{{$resort->address}}</textarea>
                                <label class = "mdl-textfield__label" for = "text7">Address</label>
                            </div>
                        </div>

                        <div class="col-lg-6 p-t-20">
                            <label class = "" for = "text8">Status</label>
                            <select class="form-control" name="status" id="text8">
                                <option @if($resort->status==='active') selected @endif value="active">Active</option>
                                <option @if($resort->status==='inactive') selected @endif value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="col-lg-12 p-t-20 text-center">
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Update</button>
                            <a href="{{route('resort.list')}}" type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

@stop

