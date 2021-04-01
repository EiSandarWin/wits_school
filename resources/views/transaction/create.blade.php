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
    <div class="row justify-content-center">
        <div class="col-md-12 border border-secondary">

            <form action="{{ route('transaction.store') }}" id="signature_form" method="POST">
                @csrf

                <div class="form-group row">
                    <label for="fileInput" class="col-md-3 col-form-label text-md-right mt-1 my-1"> Template</label>
                    <div class="col-md-6">
                        <select class="form-control col-md-4" name="template_id"
                                id="template_id" onchange="getChecklist()">
                            <option>Choose template</option>
                        @foreach($templates as $template)
                        <option value="{{$template->id}}">{{$template->name}}</option>
                        @endforeach
                        </select>
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
                    <tbody id="table_checklist"></tbody>

{{--                    @foreach($template_details as $template_detail)--}}
{{--                    <tr>--}}

{{--                        <td>{{$template_detail->template_id}}</td>--}}


{{--                        <td> {{ Form::checkbox('active') }}</td>--}}
{{--                        <td></td>--}}

{{--                        <td> {{$template_detail->description}}</td>--}}
{{--                        @endforeach--}}
{{--                    </tr>--}}



                </table>




                <div class="form-group row mt-4">
                    <label for="user_name" class="col-md-3 col-form-label text-md-right">{{  __('Staff Name')}}</label>

                    <div class="col-md-6">
                        <input id="user_name" type="text" name="user_name" placeholder="Staff Name">


                        @error('user_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">

                    <label for="fileInput" class="col-md-3 col-form-label text-md-right "> Branch Name</label>
                    <div class="col-md-6">
                        <select class="form-control col-md-4" name="branch_id">
                        @foreach($branches as $branch)
                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="student_name" class="col-md-3 col-form-label text-md-right">{{  __('Student Name')}}</label>

                    <div class="col-md-6">
                        <input id="student_name" type="text" name="student_name" placeholder="Student Name">


                        @error('student_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="parent_name" class="col-md-3 col-form-label text-md-right">{{  __('Parent Name')}}</label>

                    <div class="col-md-6">
                        <input id="parent_name" type="text" name="parent_name" placeholder="Parent Name">


                        @error('parent_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="signature" class="col-md-3 col-form-label text-md-right">{{  __('Signature')}}</label>
                </div>




                <div class="wrapper ">

                    <canvas id="signature-pad" class="signature-pad"  width=500 height=200></canvas>
                </div>
                <div>
                    <input type="hidden" name="signature" id="signature">
                </div>
            </form>

            <button type="button" class="btn btn-primary" id="save">Save</button>
            <button type="button" class="btn btn-primary" id="clear">Clear</button>

            <script type="text/javascript">

                var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
                    backgroundColor: 'rgba(255, 255, 255, 0)',
                    penColor: 'rgb(0, 0, 0)'
                });


                var saveButton = document.getElementById('save');
                var cancelButton = document.getElementById('clear');

                saveButton.addEventListener('click', function (event) {
                    // var dataURL = canvas.toDataURL();
                    // data = signaturePad.toDataURL('image/png');
                    const signature =  signaturePad.toDataURL("data:image/png;base64,signature");
// Send data to server instead...
                   // window.open(data);
                    $("#signature").val(signature)
                    $("#signature_form").submit()


                });

                cancelButton.addEventListener('click', function (event) {
                    signaturePad.clear();
                });




            </script>
        </div>















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
                            "<tr><td>" + template.text() + "</td>"+

                            "<td> <input type='checkbox' value='1'></td>"+
                            "<td>" +  (i+1) + "</td>"+
                            "<td>" + data[i]["description"] + "</td></tr>"

                    }
                    document.getElementById("table_checklist").innerHTML = tr
            }
        });
    }
</script>





    @endsection

