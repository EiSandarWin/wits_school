<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\M_templates;
use App\M_branch;
use App\T_checklist_header;
use App\M_template_details;



class T_checklist_headerController extends Controller
{	

	public function index()
    {
        $templates = M_templates::all();
        $branches = M_branch::all();
        $template_details = M_template_details::all();
        
        return view('transaction.create',compact('templates','branches','template_details'));
    }


     public function create()
    {   
        $templates = M_templates::all();
        $branches = M_branch::all();
        
        return view('transaction.create',compact('templates','branches'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'template_id' =>'required',
            'branch_id' => 'required',
            'user_name' => 'required',
            'student_name' => 'required',
            'parent_name' => 'required'
            
        ]);
        
        T_checklist_header::create($request->all());
    
        return redirect()->route('transaction.create')
                        ->with('success','Student Data successfully Save.');
    }
}
