<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_checklist_details extends Model
{
    protected $table='t_checklist_details';
    protected $fillable=[
      'checklist_id','m_template_details_id','checkflag'
    ];

    public function header()
    {
       return $this ->belongsTo('App\T_checklist_header','checklist_id');

    }

    public function templates()
    {
        return $this->belongsToMany('App\M_template_details');
    }


}
