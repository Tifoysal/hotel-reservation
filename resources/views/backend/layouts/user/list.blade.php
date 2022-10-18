@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card spur-card">
                <div class="card-header d-flex justify-content-between">
                    <div class="spur-card-icon float-left">
                        <i class="fas fa-table"></i> User/all
                    </div>
                    <div class="spur-card-title float-right">
                    <a type="button" class="btn btn-success" href="{{route('user.create')}}" >Registrations
                        <i class="mdi mdi-plus"></i>
                    </a>
                    </div>
                </div>
                <div class="card-body ">

                    <h4 class="card-title">User Lists</h4>


                    <table id="user_dt" class="table table-hover table-in-card">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Mobile</th>
{{--                            <th scope="col">Image</th>--}}
                            <th scope="col">Resort</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key=>$user)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$user->name}}</td>
                                <td> <span class="badge badge-pill badge-success">{{$user->user_type}}</span></td>
                                <td>{{$user->phone}}</td>
{{--                                <td class="d-none d-sm-table-cell">--}}
{{--                                    <img src="{{url('/uploads/user/'.$user->image)}}" alt="" width="50px">--}}
{{--                                </td>--}}
                                <td>{{$user->resort->name}}</td>
                                <td>
                                    @if($user->status=='active')
                                        <span class="badge badge-success">Active</span>
                                    @elseif($user->status=='inactive')
                                        <span class="badge badge-danger">Inactive</span>
                                @endif
                                </td>
                                <td><a href="{{route('user.edit',$user->id)}}" class="btn btn-info btn-sm"> <i class="fa fa-pencil"></i> </a>
                                </td>
                            </tr>
                         @endforeach
                    </table>
                    {{ $users->links()}}
                </div>
            </div>
        </div>
    </div>

@stop
@section('javascript')
    <script>
        $(document).ready(function() {
            $('#user_dt').DataTable();
        });
    </script>
@stop
