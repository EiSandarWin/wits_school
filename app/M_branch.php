<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class M_branch extends Model
{
    use SoftDeletes;

	protected $table = 'm_branch';
    protected $fillable=[
    	'name'
    ];

    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function checklistheaders()
    {
        return $this->hasMany('App\T_checklist_header');
    }
}
