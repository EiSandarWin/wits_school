@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Template</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('m_templates.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $m_template->name }}
            </div>
        </div>
        
    </div>
@endsection
<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>