<?php
    
namespace App\Http\Controllers;
    
use App\M_templates;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\M_template_details;  



    
class M_templatesController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:m_templates-list|m_templates-create|m_templates-edit|m_templates-delete', ['only' => ['index','show']]);
         $this->middleware('permission:m_templates-create', ['only' => ['create','store']]);
         $this->middleware('permission:m_templates-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:m_templates-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $m_templates = M_templates::orderBy('id','asc')->paginate(5);
        return view('m_templates.index',compact('m_templates'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('m_templates.create');
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
            
            'name' => 'required',
            
        ]);
    
        M_templates::create($request->all());
    
        return redirect()->route('m_templates.index')
                        ->with('success','Template created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\M_templates  $template
     * @return \Illuminate\Http\Response
     */
    public function show(M_templates $m_template)
    {
        return view('m_templates.show',compact('m_template'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\M_templates  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(M_templates $m_template)
    {
        return view('m_templates.edit',compact('m_template'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\M_templates  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, M_templates $m_template)
    {
         request()->validate([
            
            'name' => 'required',
           
        ]);
    
        $m_template->update($request->all());
    
        return redirect()->route('m_templates.index')
                        ->with('success','Template updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\M_templates  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(M_templates $m_template)
    {
        $m_template->delete();
    
        return redirect()->route('m_templates.index')
                        ->with('success','Template deleted successfully');
    }
}