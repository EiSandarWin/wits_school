<?php

namespace App\Http\Controllers;

use App\M_branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class M_branchController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
        {
         $this->middleware('permission:product-list|m_branch-create|m_branch-edit|m_branch-delete', ['only' => ['index','show']]);
         $this->middleware('permission:m_branch-create', ['only' => ['create','store']]);
         $this->middleware('permission:m_branch-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:m_branch-delete', ['only' => ['destroy']]);
        }


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $m_branches = M_branch::orderBy('id','asc')->paginate(10);
        return view('m_branch.index',compact('m_branches'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches =M_branch::all();
        return view('m_branch.create',compact('branches'));
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

        M_branch::create($request->all());

        return redirect()->route('m_branch.index')
                        ->with('success','Branch created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\M_branch  $m_branch
     * @return \Illuminate\Http\Response
     */
    public function show(M_branch $m_branch)
    {
        return view('m_branch.show',compact('m_branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\M_branch  $m_branch
     * @return \Illuminate\Http\Response
     */
    public function edit(M_branch $m_branch)
    {
        return view('m_branch.edit',compact('m_branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\M_branch  $m_branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, M_branch $m_branch)
    {
        request()->validate([

            'name' => 'required',

        ]);

        $m_branch->update($request->all());

        return redirect()->route('m_branch.index')
                        ->with('success','Branch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\M_branch  $m_branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(M_branch $m_branch)
    {
        $m_branch->delete();

        return redirect()->route('m_branch.index')
                        ->with('success','Branch deleted successfully');
    }
}
