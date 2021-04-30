@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-auto ">



            <form method="POST" action="{{ route('search.route') }}" class="searchbox" role="search">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="search" class="search" id="search" placeholder="Name with kana">
                    <input type="submit" name="submit" class="submit" value="search" >


                </div>


            <table class="table-bordered">
                <thead>
                    <tr>
                        <th >Student Name</th>
                        <th >Student Name(カナ)</th>
                        <th >Parent Name</th>
                        <th >Branch Name</th>
                        <th >Staff Name</th>
                        <th width="120" >Action</th>



                    </tr>

                </thead>
                <tbody>
                @foreach($searchdata as $value)
                    <tr>
                        <td>{{$value->student_name}}</td>
                        <td>{{$value->student_name_kana}}</td>
                        <td>{{$value->parent_name}}</td>
                        <td>{{$value->branch->name}}</td>
                        <td>{{$value->user_name}}</td>

                        <td>
                            <form action="{{url('t_checklist_header.show',$value->id)}}" method="POST">
                            <a class="btn btn-success btn-sm" href="{{url('detail',$value->id)}}" >Detail</a>
                            </form>
                        </td>

                    </tr>
                @endforeach

                </tbody>


            </table>
            </form>
            <!--<div class="card-body">
              @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>-->
s
        </div>
    </div>
</div>


@endsection
