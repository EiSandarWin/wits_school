<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_checklist_header extends Model
{
	protected $table = 't_checklist_header';
    protected $fillable =[
    	'template_id','branch_id','user_name','signature_staff','student_name','student_name_kana','parent_name','signature'
    ];

    public function template_details()
    {
        return $this->belongsToMany('App\M_template_details','t_checklist_details')
                    ->withPivot('checkflag')
                    ->withTimestamps();
    }
}
