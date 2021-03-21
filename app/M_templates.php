<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_templates extends Model
{	
	protected $table = 'm_templates';
    protected $fillable=[
    	'name'
    ];

     public function template_details()
    {
        return $this->hasMany('App\M_template_details');
    }
}
