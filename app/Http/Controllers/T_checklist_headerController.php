<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\M_templates;
use App\M_branch;
use App\T_checklist_header;
use App\M_template_details;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;



class T_checklist_headerController extends Controller
{

	public function index()
    {
        $templates = M_templates::all();
        $branches = M_branch::all();
        $template_details = M_template_details::all();

        return view('transaction.create',compact('template_details','branches','templates'));
    }


     public function create()
    {
        $templates = M_templates::all();
        $template_details = M_template_details::all();
        $branches = M_branch::all();

        return view('transaction.create',compact('template_details','branches','templates'));
    }

    public function store(Request $request)
    {



        $folderPath = public_path('upload/' );

        $folderPath1 = public_path('staffupload/' );

        $image_parts = explode(";base64,", $request->signature);

        $image1_parts = explode(";base64,", $request->signature1);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image1_type_aux = explode("image/", $image1_parts[0]);

        $image_type = $image_type_aux[1];

        $image1_type = $image1_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $image1_base64 = base64_decode($image1_parts[1]);

        $signature = uniqid() . '.'.$image_type;

        $signature1 = uniqid() . '.'.$image1_type;

        $file = $folderPath . $signature;

        $file1 = $folderPath1 . $signature1;

        file_put_contents($file, $image_base64);

        file_put_contents($file1, $image1_base64);


        request()->validate([
            'template_id' =>'required',
            'branch_id' => 'required',
            'user_name' => 'required',
            'student_name' => 'required',
            'student_name_kana' => 'required',
            'parent_name' => 'required',


        ]);

        $requestData = $request->all();

        $requestData['signature'] = $signature;
        $requestData['signature_staff'] = $signature1;

        T_checklist_header::create($requestData);

        return redirect()->route('transaction.create')
                        ->with('success','Student Data successfully Save.');
    }


    public function checkListTemplate(Request $request){
        $template_id = $request->input("template_id");
        $template_details = M_template_details::where('template_id','=', $template_id)->get();

        return Response($template_details->toArray());
    }


}
