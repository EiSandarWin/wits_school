@extends('layouts.userapp')

@section('content')




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
<div class="container">

        <div class="confirmarea">

            <form action="{{ route('transaction.store') }}" id="signature_form" method="POST">
                @csrf

                <div class="templatearea" >
                    <label for="fileInput" > </label>

                        <select  name="template_id"
                                id="template_id" onchange="getChecklist()">
                            <option></option>
                        @foreach($templates as $template)
                        <option value="{{$template->id}}">{{$template->name}}</option>
                        @endforeach
                        </select>
                </div>


                <table class="maintable">
                    <thead class="theadarea">
                        <tr>
                            <!--<th>ジャンル</th>-->
                            <th>チェック</th>
                            <th>No</th>
                            <th>確認事項</th>
                        </tr>
                    </thead>
                    <tbody  id="table_checklist"></tbody>

{{--                    @foreach($template_details as $template_detail)--}}
{{--                    <tr>--}}

{{--                        <td>{{$template_detail->template_id}}</td>--}}


{{--                        <td> {{ Form::checkbox('active') }}</td>--}}
{{--                        <td></td>--}}

{{--                        <td> {{$template_detail->description}}</td>--}}
{{--                        @endforeach--}}
{{--                    </tr>--}}



                </table>

               <p align="right">※については必要に応じてご説明いたします。</p>




                <div class="signarea">


                    <dt><label for="student_name" >{{  __('氏名')}}</label></dt>
                    <dd><input id="student_name" type="text" name="student_name" placeholder="氏名"></dd>

                    @error('student_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                    <dt><label for="student_name_kana" >{{  __('氏名（カナ）')}}</label></dt>
                    <dd> <input id="student_name_kana" type="text" name="student_name_kana" placeholder="氏名（カナ）"></dd>

                    @error('student_name_kana')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                    <dt><label for="parent_name" >{{  __('保護者氏名')}}</label></dt>
                    <dd> <input id="parent_name" type="text" name="parent_name" placeholder="保護者氏名"></dd>

                    @error('parent_name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                    <dt><label for="signature" >{{  __('サイン（保護者）')}}</label></dt>
                    <dd><div class="wrapper">
                            <canvas id="signature-pad" class="signature-pad" width=500 height=200  ></canvas>
                        </div>
                        <input type="hidden" name="signature" id="signature"><br>
                        <button type="button" class="btn btn-primary" id="clear">アクション</button></dd>




                    <dt><label for="user_name" >{{  __('スタッフ名')}}</label></dt>
                    <dd><input id="user_name" type="text" name="user_name" placeholder="スタッフ名"></dd>

                        @error('user_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror



                    <dt><label for="signature" >{{  __('サイン（スタッフ）')}}</label></dt>

                    <dd><div class="wrapper">
                        <canvas id="signature-pad1" class="signature-pad" width=500 height=200 ></canvas>
                    </div>
                <input type="hidden" name="signature1" id="signature1">

                        <button type="button" class="btn btn-primary" id="clear1">アクション</button></dd>



                    <dt><label for="fileInput" > 教室名</label></dt>

                        <dd><select  name="branch_id">
                        @foreach($branches as $branch)
                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                        @endforeach
                        </select></dd>

                    <div class="clr"> </div>


            </form>
                    <div class="btnarea">
                        <button type="button" class="btn btn-primary" id="save">保存</button>
                    </div>


            <script type="text/javascript">

                var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
                    backgroundColor: 'rgba(255, 255, 255, 0)',
                    penColor: 'rgb(0, 0, 0)'
                });

                var signaturePad1 = new SignaturePad(document.getElementById('signature-pad1'), {
                    backgroundColor: 'rgba(255, 255, 255, 0)',
                    penColor: 'rgb(0, 0, 0)'
                });


                var saveButton = document.getElementById('save');
                var cancelButton = document.getElementById('clear');
                var cancelButton1 = document.getElementById('clear1');


                saveButton.addEventListener('click', function (event) {
                    // var dataURL = canvas.toDataURL();
                    // data = signaturePad.toDataURL('image/png');
                    const signature =  signaturePad.toDataURL("data:image/png;base64,signature");
                    const signature1 =  signaturePad1.toDataURL("data:image/png;base64,signature1");


// Send data to server instead...
                   // window.open(data);
                    $("#signature").val(signature)
                    $("#signature1").val(signature1)
                    // $("#table_checklist input:checked").each(function (item) {
                    //     console.log($(this).val())
                    // })
                    $("#signature_form").submit()


                });

                cancelButton.addEventListener('click', function (event) {
                    signaturePad.clear();
                });

                cancelButton1.addEventListener('click', function (event) {
                    signaturePad1.clear();
                });




            </script>



        </div>







</div>


<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>




<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function getChecklist() {
        let template = $("#template_id option:selected")

        $.ajax({
            type:'POST',
            url:'/checklist',
            data:{ template_id:template.val()},
            success:function(data) {
                console.log(data)
                let tr = "";
                    for(let i=0; i<data.length; i++){
                        tr = tr +
                            //"<tr><td class='genre-check'>" + template.text() + "</td>"+

                            "<td class='genre-check'> <input type='checkbox' name='checkbox[]' value="+data[i]["id"]+"></td>"+

                            "<td class='genre-check'>" +  data[i]["id"] + "</td>"+
                            "<td >" + data[i]["description"] + "</td></tr>"

                    }
                    document.getElementById("table_checklist").innerHTML = tr
            }
        });
    }
</script>








    @endsection

