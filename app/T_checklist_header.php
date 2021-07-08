<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_checklist_header extends Model
{
	protected $table = 't_checklist_header';
    protected $fillable =[
    	'template_id','branch_id','user_name','signature_staff','student_name','student_name_kana','parent_name','signature'
    ];

    public function details()
    {
        return $this->belongsToMany('App\T_checklist_details');

    }

    public function branch()
    {
        return $this->belongsTo('App\M_branch')->withTrashed();
    }
}
