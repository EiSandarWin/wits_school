@extends('layouts.app')

@section('content')

<div class="container">

    <div class="confirmarea">
        <div class="templatearea">
        <a class="btn btn-primary" href="{{ url('home') }}"> Back</a>
        </div>
        <table class="maintable">
            <thead class="theadarea">
                <tr>
                    <th>ジャンル</th>
                    <th>チェック</th>
                    <th>#</th>
                    <th>確認事項</th>
                </tr>
            </thead>

            @foreach($t_checklist_details as $detail)
                <tr>
                    <td class="genre-check">{{$detail->templatename->name}}</td>
                    <!--<th><input type="checkbox" name="checkglag" id="checkflag" value="1" {{  ($detail->checkflag == 1 ? ' checked' : '') }}</th>-->
                    <td class="genre-check"><input name="checkflag" type="checkbox" value="" {{ ($detail->checkflag == 1 ? 'checked' : '')}}></td>
                    <td class="genre-check">{{$detail->m_template_details_id}}</td>
                    <td>{{$detail->template->description}}</td>
                </tr>

            @endforeach

        </table>


        <div class="signarea">
            <dl>
                <dt><strong>Staff Name:</strong></dt>
                 <dd>{{ $t_checklist_header->user_name}}</dd>

                <dt><strong>Staff signature:</strong></dt>
               <dd><img src="{{asset('staffupload/' .$t_checklist_header->signature_staff)}}"  width="180" height="100"  class="border"  alt=""></dd>

                <dt><strong>Student Name:</strong></dt>
                <dd>{{ $t_checklist_header->student_name }}</dd>

                <dt><strong>Student Signature:</strong></dt>
                <dd><img src="{{asset('studentupload/' .$t_checklist_header->signature)}}"  width="180" height="100"  class="border"  alt=""></dd>

                <dt><strong>Student Name(kana):</strong></dt>
                <dd>{{ $t_checklist_header->student_name_kana }}</dd>

                <dt><strong>Parent Name:</strong></dt>
                <dd>{{ $t_checklist_header->parent_name }}</dd>

                <dt><strong>Branch Name:</strong></dt>
                <dd>{{ $t_checklist_header->branch->name }}</dd>
            </dl>
            <div class="clr"></div>
        </div>
    </div>

</div>


@endsection
