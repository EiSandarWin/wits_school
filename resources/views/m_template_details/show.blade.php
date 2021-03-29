@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Template Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('m_template_details.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Template Name:</strong>
                {{ $m_template_detail->template->name }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $m_template_detail->description }}
            </div>
        </div>
    </div>
@endsection
<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>