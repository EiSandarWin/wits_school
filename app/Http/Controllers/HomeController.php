<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\M_templates;
use App\M_branch;
use App\T_checklist_header;
use App\M_template_details;
use App\T_checklist_details;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $t_checklist_details = T_checklist_details::all();
        return view('/home');

    }

   // public function search(Request $request)
    //{
    //    if ($request->ajax()) {
    //        $output = "";
    //        $searchdata = DB::table('T_checklist_header')
    //            ->where('name', 'LIKE', '%' . $request->search . "%")
    //            ->get();

    //        if ($searchdata) {
    //            foreach ($searchdata as $key => $data) {
    //                $data .= '<tr>' .
    //                    '<td>' . $data->student_name . '</td>' .
    //                    '<td>' . $data->student_name_kana . '</td>' .
    //                    '<td>' . $data->student_parent_name . '</td>' .
    //                    '<td>' . $data->student_branch_id . '</td>' .
    //                    '<td>' . $data->student_user_name . '</td>' .
     //                   '</tr>';
    //            }
    //            return Response($output);
    //        }
    //    }

   // }







}
