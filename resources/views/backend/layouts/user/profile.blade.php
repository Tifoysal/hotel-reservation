@extends('backend.master')
@section('content')
    @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
    @endif
    @if($errors)
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @endif
    <div class="row">

        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <form action="{{route('profile.update',$user->id)}}" method="POST" role="form" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input name="name" type="text" class="form-control" id="name"
                                   value="{{$user->name}}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input name="phone" type="text" class="form-control" id="phone" value="{{$user->phone}}" required>
                        </div>
                    </div>
                    <div class="col-lg-4" style="text-align: center">

                        <div class="form-group">
                            <img src="{{url('/uploads/user/'.$user->image)}}" alt="user image"
                                 style=" height:100px;width:100px;border-radius: 50%">
                        </div>

                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="type">User Type :</label>
                            <span class="badge badge-primary">{{$user->user_type}}</span>
                        </div>

                    </div>


                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="type">Resort</label>

                        </div>

                    </div>

                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="type">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>

                    </div>

                    <div class="col-lg-12">

                        <button type="submit" class="btn btn-success mr-2">Update</button>

                    </div>
                </div>

            </form>
            <hr>
            <div class="col-lg-12" style="border: 2px solid #cdd2d8;padding: 10px;">
                <form action="{{route('profile.password.update',auth()->user()->id)}}" method="post">
@csrf
                    @method('put')
                        <div class="form-group">
                            <label for="password">Old Password *</label>
                            <input required name="old_password" placeholder="Enter Old password" type="password"
                                   class="form-control"
                                  id="password" >
                        </div>

                        <div class="form-group">
                            <label for="new_password">New Password *</label>
                            <input required name="new_password" placeholder="Enter New Password" type="password"
                                   class="form-control"
                                   id="new_password">
                        </div>

                        <button type="submit" class="btn btn-info mr-2">Update</button>

                </form>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
@stop
