<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_checklist_header extends Model
{	
	protected $table = 't_checklist_header';
    protected $fillable =[
    	'template_id','branch_id','user_name','student_name','parent_name'
    ];
}
