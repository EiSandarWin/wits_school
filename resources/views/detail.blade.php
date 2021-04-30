@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('home') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        @foreach($t_checklist_header as $val)
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Staff Name:</strong>
                {{ $val->user_name}}
            </div>
        </div>

        <table class="col-md-6 table-auto mt-4 ml-4">
            <thead>
            <tr>
                <th>ジャンル</th>
                <th>チェック</th>
                <th>#</th>
                <th>確認事項</th>
            </tr>
            </thead>

            @foreach($t_checklist_details as $detail)
                <tr>
                    <td>a</td>
                    <td><input type='checkbox' name='checkbox[]' value="1"></td>
                    <td>b</td>
                    <td>c</td>
                </tr>


            @endforeach


        </table>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Staff signature:</strong>

            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Name:</strong>
                {{ $val->student_name }}
            </div>
        </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Student Name:</strong>
                    {{ $val->student_name_kana }}
                </div>
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Parent Name:</strong>
                {{ $val->parent_name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Signature:</strong>

            </div>
        </div>






    @endforeach


@endsection
