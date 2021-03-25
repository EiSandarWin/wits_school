@extends('layouts.userapp')

@section('content')

<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel 6 User Roles and Permissions Tutorial') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <style>
        
        table,th, td{
            border: 1px solid black;
            border-collapse: collapse;
            
        }
        th, td{
            padding: 15px;
        }
       
        
        

        div#img-box{
        border:3px solid #000;
        width:500px;
        }

        div#btn-box{
        position: fixed;
        bottom :0px;
        }
        
        .kbw-signature { width: 100%; height: 180px;}
        #signaturePad canvas{
        width: 100% !important;
        height: auto;
        }
 
    </style>
</head>
   

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
            
            <form action="{{ route('transaction.store') }}" method="POST">
                @csrf

                <div class="form-group row">
                    <label for="fileInput" class="col-md-3 col-form-label text-md-right mt-1 my-1"> Template</label>
                    <div class="col-md-6">
                        <select class="form-control col-md-4" name="template_id">
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
                    @foreach($templates as $template)
                    <tr>
                        <td>{{$template->name}}</td>
                        <td> check</td>
                        <td>1</td>
                        <td> 2</td>
                        
                    </tr>
                    @endforeach
                </table>


              

                <div class="form-group row">
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

                <div class="col-md-12">
    <label class="" for="">Signature:</label>
    <br/>
    <div id="signaturePad" ></div>
    <br/>

   <!--<canvas id="canvassample" width="600" height="300"></canvas> -->
   
        <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>

        <textarea id="signature64" name="signed" style="display: none"></textarea>
</div>

<br/>
    <button class="btn btn-success">Save</button>



</div>
</div>
</div>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">
<script type="text/javascript">



var signaturePad = $('#signaturePad').signature({syncField: '#signature64', syncFormat: 'PNG'});
$('#clear').click(function(e) {
e.preventDefault();
signaturePad.signature('clear');
$("#signature64").val('');
$("#signaturePad").touch();
});
</script>
</body>
</html>
          

                <div class="col-xs-9 col-sm-9 col-md-9 text-center mb-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

                
            
            </form>
                
        </div> 

            
    </div>

</div>

</html>
      
@endsection
