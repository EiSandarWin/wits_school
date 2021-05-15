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
use App\T_checklist_details;
use DateTime;





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



        $folderPath = public_path('studentupload/' );

        $image_parts = explode(";base64,", $request->signature);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $signature = uniqid() . '.'.$image_type;

        $file = $folderPath . $signature;

        file_put_contents($file, $image_base64);



        $folderPath1 = public_path('staffupload/' );

        $image1_parts = explode(";base64,", $request->signature1);

        $image1_type_aux = explode("image/", $image1_parts[0]);

        $image1_type = $image1_type_aux[1];

        $image1_base64 = base64_decode($image1_parts[1]);

        $signature1 = uniqid() . '.'.$image1_type;

        $file1 = $folderPath1 . $signature1;

        file_put_contents($file1, $image1_base64);
        //$dt = new DateTime;
        //$now -> updated_at = $dt->format('Y-m-d H:i'); //Fomat Date and time
        //$now = $request->check_data;

        request()->validate([
            'template_id' =>'required',
            'branch_id' => 'required',
            'user_name' => 'required',
            'student_name' => 'required',
            'student_name_kana' => 'required',
            'parent_name' => 'required',



        ]);

        $requestData = $request->all();
        $check_template_details = $request->input("checkbox");
        $requestData['signature'] = $signature;
        $requestData['signature_staff'] = $signature1;
        //$requestData['check_date'] = $now;









//
//        $t_checklist_details = new t_checklist_details();
//        $t_checklist_details->m_template_details_id = $request->merge([
//            'm_template_details_id' =>implode(',',(array)$request->get('checkflag')) []);
//        $t_checklist_details->checklist_id = $t_checklist->checklist_id;
//        $t_checklist_details->checkflag = $request->merge([
//            'checkflag' =>implode(',',(array)$request->get('checkflag'))
//        ]);


        $check_list_header = T_checklist_header::create($requestData);
        $checklist_detail = array();
        foreach ( $check_template_details as $value){
// Code Here
            $checklist_detail[] = array('checklist_id'=>$check_list_header->id,
                'm_template_id'=>$check_list_header->template_id,'m_template_details_id'=>$value, 'checkflag'=>1);
        }
        T_checklist_details::insert($checklist_detail);

        return redirect()->route('transaction.create')
                        ->with('success','Student Data successfully Save.');
    }


    public function checkListTemplate(Request $request){
        $template_id = $request->input("template_id");
        $template_details = M_template_details::where('template_id','=', $template_id)->get();

        return Response($template_details->toArray());
    }


    public function searchlist(T_checklist_header $id){
        $searchdata = T_checklist_header::find($id);
        $branches = M_branch::all();
        return view('/home',compact('searchdata','branches'));
    }

    public function search(Request $request){
        $search = $request->search;
        $branches = M_branch::all();
        $t_checklist_header =T_checklist_header::all();
        $searchdata=T_checklist_header::where('student_name_kana','LIKE','%' .$search. '%')
            ->get();

        //dd($searchdata);




        return view('/home',compact('searchdata','branches','t_checklist_header'));



    }



    public function show( $id)
    {


        $t_checklist_header=T_checklist_header::find($id);
        $t_checklist_details=T_checklist_details::where('checklist_id',$id)->get();





        return view('detail',compact('t_checklist_header','t_checklist_details'));
    }





}
