<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MTask extends Model
{
    use HasFactory;

    protected $table = 'm_task';
    protected $primaryKey = 'id_task';

    public function statusTask()
    {
        return $this->hasOne('App\Models\StatusTask', 'id_status_task', 'id_status_task');
    }
    public function logs(){
        return $this->belongsTo('App\Models\log_project', 'id_log_project', 'id_log_project');
    }
    public function tim(){
        return $this->belongsTo('App\Models\Tim', 'id_log_project', 'id_log_project');
    }
}
