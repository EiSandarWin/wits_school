<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class T_checklist_details extends Model
{
    protected $table;
    protected $fillable=[
      'checklist_id','m_template_details_id','checkflag'
    ];

    public function checklistsheader()
    {
        return $this->belongsToMany('App\T_checklist_header','t_checklist_header');

    }
}
