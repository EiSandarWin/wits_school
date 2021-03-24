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

                <div class="col-xs-9 col-sm-9 col-md-9 text-center mb-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            
            </form>
                
        </div> 

            
    </div>

</div>


      
@endsection
