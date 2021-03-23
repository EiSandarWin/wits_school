@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Template Detail</h2>
            </div>
            <div class="pull-right">
                @can('m_template_details-create')
                <a class="btn btn-success" href="{{ route('m_template_details.create') }}"> Create New Detail</a>
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
            <th>Template Name</th>
            <th>listno</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($m_template_details as $m_template_detail)
	    <tr>
            <td>{{ ++$i }}</td>
	        <td>{{ $m_template_detail->template->name }}</td>
	        <td>{{ $m_template_detail->listno }}</td>
	        <td>{{ $m_template_detail->description }}</td>
	        <td>
                <form action="{{ route('m_template_details.destroy',$m_template_detail->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('m_template_details.show',$m_template_detail->id) }}">Show</a>
                    @can('m_template_details-edit')
                    <a class="btn btn-primary" href="{{ route('m_template_details.edit',$m_template_detail->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('m_template_details-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $m_template_details->links() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection