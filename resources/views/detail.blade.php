@extends('layouts.app')

@section('content')

<div class="container">

    <div class="confirmarea">
        <div class="templatearea">
        <a class="btn btn-primary" href="{{ url('home') }}"> 戻る</a>
        </div>
        <table class="maintable">
            <thead class="theadarea">
                <tr>
                    <th>ジャンル</th>
                    <th>チェック</th>
                    <th>No</th>
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
                <dt><strong>氏名</strong></dt>
                <dd>{{ $t_checklist_header->student_name }}</dd>

                <dt><strong>氏名（カナ）</strong></dt>
                <dd>{{ $t_checklist_header->student_name_kana }}</dd>

                <dt><strong>保護者氏名</strong></dt>
                <dd>{{ $t_checklist_header->parent_name }}</dd>

                <dt><strong>サイン（保護者）</strong></dt>
                <dd><img src="{{asset('parentupload/' .$t_checklist_header->signature)}}"  width="180" height="100"  class="border"  alt=""></dd>

                <dt><strong>スタッフ名</strong></dt>
                <dd>{{ $t_checklist_header->user_name}}</dd>

                <dt><strong>サイン（スタッフ）</strong></dt>
                <dd><img src="{{asset('staffupload/' .$t_checklist_header->signature_staff)}}"  width="180" height="100"  class="border"  alt=""></dd>

                <dt><strong>教室名</strong></dt>
                <dd>{{ $t_checklist_header->branch->name }}</dd>
            </dl>
            <div class="clr"></div>
        </div>
    </div>

</div>


@endsection
