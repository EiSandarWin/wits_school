<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class M_templates extends Model
{

    use SoftDeletes;

	protected $table = 'm_templates';
    protected $fillable=[
    	'name'
    ];

    protected $dates = ['deleted_at'];

    public function template_details()
    {
        return $this->hasMany('App\M_template_details');
    }


    public function t_checklist_details()
    {
        return $this->hasMany('App\T_checklist_details');
    }
}
