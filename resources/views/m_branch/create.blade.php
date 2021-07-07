@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Branch</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('m_branch.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('m_branch.store') }}" method="POST">
    	@csrf

            

         
		    <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Branch Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Branch Name">
                </div>
            </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


<p class="text-center text-primary"><small>Wits.com</small></p>
@endsection