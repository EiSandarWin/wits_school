<?php

namespace App\Http\Controllers;

use App\T_checklist_details;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\True_;
use Symfony\Component\Console\Input\Input;
use App\T_checklist_header;
use App\M_branch;

class T_checklist_detailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t_checklist_details=T_checklist_details::all();
        $t_checklist_header=T_checklist_header::all();

        return view('detail',compact('t_checklist_details',$t_checklist_header));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $t_checklist_header = T_checklist_header::all();
        $t_checklist_details=T_checklist_details::all();
        return view('detail',compact('t_checklist_header','t_checklist_details'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = new Request();

        $request->checkflag=Input::get('checkflag') == 'on' ? 1 :0 ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\T_checklist_details  $t_checklist_details
     * @return \Illuminate\Http\Response
     */
    public function show(T_checklist_details $t_checklist_details)
    {

        return view('detail',compact('t_checklist_details'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\T_checklist_details  $t_checklist_details
     * @return \Illuminate\Http\Response
     */
    public function edit(T_checklist_details $t_checklist_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\T_checklist_details  $t_checklist_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, T_checklist_details $t_checklist_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\T_checklist_details  $t_checklist_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(T_checklist_details $t_checklist_details)
    {
        //
    }


}
