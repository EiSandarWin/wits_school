@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Templates</h2>
            </div>
            <div class="pull-right">
                @can('m_templates-create')
                <a class="btn btn-success" href="{{ route('m_templates.create') }}"> Create New Template</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            
            <th width="280px">Action</th>
        </tr>
	    @foreach ($m_templates as $m_template)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $m_template->name }}</td>
	        
	        <td>
                <form action="{{ route('m_templates.destroy',$m_template->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('m_templates.show',$m_template->id) }}">Show</a>
                    @can('m_templates-edit')
                    <a class="btn btn-primary" href="{{ route('m_templates.edit',$m_template->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('m_templates-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $m_templates->links() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection