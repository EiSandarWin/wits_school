<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_templates extends Model
{
    protected $fillable=[
    	'name'
    ];

     public function m_template_detailes()
    {
        return $this->hasMany('App\m_template_details');
    }
}
