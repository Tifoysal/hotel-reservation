@extends('backend.master')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card spur-card">
              
                <div class="card-header transaction-ch">
             
                        <div class="spur-card-icon">
                                <i class="fas fa-table"></i>
                                <div class="spur-card-title ml-2">Lottery Draw Date</div>
                            </div>
                           
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> Add Winning List </button>
            </div>

                <div class="card-body ">
                    <table id="winner_dt" class="table table-hover table-in-card">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Draw Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $count =1?>

                        @foreach($drawDate as $date)
                        <tr>
                            <th scope="row">{{$count++}}</th>
                            <td>{{$date->draw_date}}</td>

                           <td>
                                <a href="{{route('two.three.digit',$date->id)}}" class="btn btn-success btn-sm"> <i class="fas fa-eye"></i>
                                </a>
                            </td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
               {{-- {{ $date->links()}}--}}
            </div>
        </div>

    </div>


    {{--Add winning lis--}}


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-content-center" id="exampleModalLabel">Add Winning list</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    @if(session()->has('message'))
                          <div class="alert alert-success">
                                {{ session()->get('message') }}
                          </div>
                     @endif

                    <form action="{{route('add.winner.list')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Lottery Draw Date:</label>
                            <input type="date" class="form-control" name="draw_date" id="message-text">
                            @if($errors->first('draw_date') == true)
                                <span class="text-danger">*{{$errors->first('draw_date') }} </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Two Digit:</label>
                            <textarea class="form-control" placeholder="xx,xx,xx,xx,xx" value="{{ old('two-digit')}}"  name="two-digit" id="message-text"></textarea>
                            @if($errors->first('two-digit') == true)
                                <span class="text-danger">*{{$errors->first('two-digit') }} </span>
                            @endif

                        </div>

                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Three Digit:</label>
                            <textarea class="form-control" placeholder="yyy,yyy,yyy,yyy,yyy"  name="three-digit" id="message-text"></textarea>

                            @if($errors->first('three-digit') == true)
                                <span class="text-danger">*{{$errors->first('three-digit') }} </span>
                            @endif

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="submit">
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>


@stop

@section('javascript')


    @if ($errors->any())

        <script>
            $(function() {
                $('#exampleModal').modal('show');
            });
        </script>

    @endif

    @if(session()->has('message'))
        <script>
            $(function() {
                $('#exampleModal').modal('show');
            });
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('#winner_dt').DataTable();
        });
    </script>
@stop





