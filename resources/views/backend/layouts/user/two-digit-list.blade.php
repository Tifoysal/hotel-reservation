@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card spur-card">
                <div class="card-header">
                    <div class="spur-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="spur-card-title">2 Digit Winners List</div>

                </div>
                <div class="card-body ">
                    <table class="table table-hover table-in-card">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Winning Number</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php $count =1?>

                        @foreach($winnersListTwo as $winner)
                        <tr>
                            <th scope="row">{{$count++}}</th>
                            <td>{{$winner}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
               {{-- {{ $users->links()}}--}}
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card spur-card">
                <div class="card-header">
                    <div class="spur-card-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    <div class="spur-card-title">3 Digit Winners List</div>

                </div>
                <div class="card-body ">
                    <table class="table table-hover table-in-card">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Winning Number</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $count =1?>

                        @foreach($winnersListThree as $winner)
                            <tr>
                                <th scope="row">{{$count++}}</th>
                                <td>{{$winner}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                {{-- {{ $users->links()}}--}}
            </div>
        </div>

    </div>

    {{--Add winning lis--}}

@stop





