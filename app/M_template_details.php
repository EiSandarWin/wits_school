<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class M_template_details extends Model
{
    use SoftDeletes;

	protected $table='m_template_details';
    protected $fillable=[
    	'template_id','description'
    ];

    protected $dates = ['deleted_at'];

    public function template()
    {
        return $this->belongsTo('App\M_templates')->withTrashed();
    }
    //then just


    public function checklists()
    {
        return $this->belongsTo('App\T_checklist_header');

    }

    public function transactiondetails()
    {
        return $this->hasMany('App\T_checklist_details');
    }
}
