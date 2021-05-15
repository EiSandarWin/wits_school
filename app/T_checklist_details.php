<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_checklist_details extends Model
{
    protected $table='t_checklist_details';
    protected $fillable=[
      'checklist_id','m_template_id','m_template_details_id','checkflag'
    ];

    public function header()
    {
       return $this ->belongsTo('App\T_checklist_header','checklist_id');

    }

    public function template()
    {
        return $this->belongsTo('App\M_template_details','m_template_details_id');
    }

    public function templatename()
    {
        return $this->belongsTo('App\M_templates','m_template_id');
    }


}
