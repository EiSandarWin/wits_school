<?php
    
namespace App\Http\Controllers;

use App\M_template_details;  
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\M_templates;



    
class M_template_detailsController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:m_template_details-list|m_template_details-create|m_template_details-edit|m_template_details-delete', ['only' => ['index','show']]);
         $this->middleware('permission:m_template_details-create', ['only' => ['create','store']]);
         $this->middleware('permission:m_template_details-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:m_template_details-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $m_template_details = M_template_details::orderBy('id','asc')->paginate(10);
        return view('m_template_details.index',compact('m_template_details'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $templates =M_templates::all();
        return view('m_template_details.create',compact('templates'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'template_id' =>'required',
            'description' => 'required',
            
        ]);
        
        M_template_details::create($request->all());
    
        return redirect()->route('m_template_details.index')
                        ->with('success','description created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\M_template_details  $m_template_detail
     * @return \Illuminate\Http\Response
     */
    public function show(M_template_details $m_template_detail)
    {
        return view('m_template_details.show',compact('m_template_detail'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\M_template_details  $template_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(M_template_details $m_template_detail)
    {   
        $templates =M_templates::all();
        return view('m_template_details.edit',compact('m_template_detail','templates'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\M_template_details  $template_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, M_template_details $m_template_detail)
    {
         request()->validate([
            'template_id'=>'required',
            'description' => 'required',
        ]);
    
        $m_template_detail->update($request->all());
    
        return redirect()->route('m_template_details.index')
                        ->with('success','description updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\M_template_details  $template_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(M_template_details $m_template_detail)
    {
        $m_template_detail->delete();
    
        return redirect()->route('m_template_details.index')
                        ->with('success','description deleted successfully');
    }
}