<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_template_details extends Model
{	
	protected $table='M_template_details';
    protected $fillable=[
    	'template_id','listno','description'
    ];

    public function template()
    {
        return $this->belongsTo('App\M_templates');
    }
}
