<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    use HasFactory;

    protected $table = 't_log_project';
    protected $primaryKey = 'id_log_project';

    protected $fillable = [
        'id_project',
        'id_user',
    ];

    public function m_user(){
        return $this->belongsTo('App\Models\Marketing', 'id_user', 'id_user');
    }

    public function task(){
        return $this->hasMany('App\Models\MTask', 'id_log_project', 'id_log_project');
    }

}
