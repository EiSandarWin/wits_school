<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_branch extends Model
{
	protected $table = 'm_branch';
    protected $fillable=[
    	'name'
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function checklistheaders()
    {
        return $this->hasMany('App\T_checklist_header');
    }
}
