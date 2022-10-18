@extends('backend.master')
@section('content')
    <div class="row p-4">
        <div class="col-md-2"></div>
        <div class="col-md-8">


            <h3 class="text-center">User Registration</h3>
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
            @if (session('message'))
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                    {{ session('message')}}
                </div>
            @endif
            <form action="{{route('userAddProcess')}}" method="post" role="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name<span class="required" style="color: red">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('full_name') }}"
                           placeholder="Full Name" required>
                </div>

                <div class="form-group">
                    <label for="name">Email<span class="required" style="color: red">*</span></label>
                    <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email"
                           required>
                </div>
                <div class="form-group">
                    <label for="name">Password<span class="required" style="color: red">*</span></label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                </div>
                <div class="form-group">

                    <label for="name">Contact Number<span class="required" style="color: red">*</span></label>
                    <input type="number" name="phone" class="form-control" value="{{ old('phone') }}"
                           placeholder="Number" required>
                </div>
                <div class="form-group">
                    <label for="name">Present Address<span class="required" style="color: red">*</span></label>
                    <input type="text" name="address" value="{{ old('address') }}" class="form-control"
                           placeholder="Address" required>
                </div>

                <div class="form-group">
                    <label for="image">Image :</label>
                    <input name="image" type="file" class="form-control" id="image">
                </div>

                <div class="form-group">
                    <label for="resort_id">Select Resort :</label>
                    <select class="select2 form-control" name="resort_id" id="resort_id">
                        @foreach($resorts as $resort)
                            <option value="{{$resort->id}}">{{$resort->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-info">Create</button>
                    <a href="{{route('user.create')}}" type="button" class="btn btn-danger">Clear</a>
                </div>
            </form>
        </div>
    </div>

@stop
