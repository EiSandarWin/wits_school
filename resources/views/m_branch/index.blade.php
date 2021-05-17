@extends('layouts.app')


@section('content')
    <div class="confirmarea">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Branches</h2>
                </div>
                <div class="pull-right">
                    @can('m_branch-create')
                    <a class="btn btn-success" href="{{ route('m_branch.create') }}"> Create New Branch</a>
                    @endcan
                </div>
            </div>
        </div>


        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <table class="maintable">
            <thead class="theadarea">
            <tr>
                <th>No</th>
                <th>Name</th>

                <th width="280px">Action</th>
            </tr>
            </thead>
            @foreach ($m_branches as $m_branch)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $m_branch->name }}</td>

                <td>
                    <form action="{{ route('m_branch.destroy',$m_branch->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('m_branch.show',$m_branch->id) }}">Show</a>
                        @can('m_branch-edit')
                        <a class="btn btn-primary" href="{{ route('m_branch.edit',$m_branch->id) }}">Edit</a>
                        @endcan


                        @csrf
                        @method('DELETE')
                        @can('m_branch-delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    {!! $m_branches->links() !!}


<p class="text-center text-primary"><small>Wits.com</small></p>
@endsection
