@extends('backend.master')
@section('content')
    @if(Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
    @endif
    <div class="row">

        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <form action="{{route('user.update',$user->id)}}" method="POST" role="form">
                @csrf
                @method('PUT')
                <div class="col-lg-12">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Full Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1"
                               value="{{$user->name}}"
                               readonly>
                    </div>


                    {{--            <div class="col-md-6">--}}
                    {{--                <div class="form-group">--}}
                    {{--                    <img src="{{url('/uploads/user/'.$user->image)}}" alt="user image" style=" height:100px;width:100px;border-radius: 50%">--}}
                    {{--                </div>--}}
                    {{--            </div>--}}


                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" value="{{$user->phone}}" readonly>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="type">Change User Type</label>
                        <select class="form-control" id="type" name="user_type">
                            <option @if($user->user_type=='manager') selected @endif value="manager">Manager
                            </option>
                            <option @if($user->user_type=='admin') selected @endif value="admin">Admin</option>

                        </select>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="type">Status</label>
                        <select class="form-control" id="type" name="status">
                            <option value="active" {{$user->status==='active' ? 'selected':''}}>Active</option>
                            <option value="inactive" {{$user->status==='inactive' ? 'selected':''}} >Inactive
                            </option>
                        </select>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="type">Resort</label>
                        <select class="form-control" id="type" name="resort_id">
                            @foreach($resorts as $resort)
                                <option value="{{$resort->id}}" {{$resort->id===$user->resort_id ? 'selected':''}}>{{$resort->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="password">Update Password</label>
                        <input name="password" placeholder="Enter New password" type="password" class="form-control"
                               id="" value="">
                    </div>

                    <button type="submit" class="btn btn-success mr-2">Update</button>
                    <a href="{{route('user.list')}}" class="btn btn-primary">Back</a>
                </div>


            </form>
        </div>
        <div class="col-lg-2"></div>
    </div>
@stop
