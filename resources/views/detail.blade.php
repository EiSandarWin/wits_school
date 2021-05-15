@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('home') }}"> Back</a>
            </div>
        </div>
    </div>




        <table class="col-md-8 table-auto mt-4 ml-4">
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
                    <th >{{$detail->templatename->name}}</th>
                    <!--<th><input type="checkbox" name="checkglag" id="checkflag" value="1" {{  ($detail->checkflag == 1 ? ' checked' : '') }}</th>-->
                    <th><input name="checkflag" type="checkbox" value="" {{ ($detail->checkflag == 1 ? 'checked' : '')}}></th>
                    <th>{{$detail->m_template_details_id}}</th>
                    <th>{{$detail->template->description}}</th>
                </tr>


            @endforeach


        </table>




        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Staff Name:</strong>
                {{ $t_checklist_header->user_name}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Staff signature:</strong>
                <img src="{{asset('staffupload/' .$t_checklist_header->signature_staff)}}"  width="180" height="100"  class="border"  alt="">

            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Name:</strong>
                {{ $t_checklist_header->student_name }}
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Signature:</strong>
                <img src="{{asset('studentupload/' .$t_checklist_header->signature)}}"  width="180" height="100"  class="border"  alt="">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student Name(kana):</strong>
                {{ $t_checklist_header->student_name_kana }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Parent Name:</strong>
                {{ $t_checklist_header->parent_name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Branch Name:</strong>
                {{ $t_checklist_header->branch->name }}
            </div>
        </div>




@endsection
