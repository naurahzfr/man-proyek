<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class level_akun_user extends Model
{
    use HasFactory;
    protected $table = 'm_level_akun_user';
    protected $primaryKey = 'id_level_akun_user';
    
    protected $fillable = [
        'level',
    ];
    public function akun_user(){
        // return $this->hasMany(akun_user::class());
        return $this->hasMany('App\Models\akun_user', 'id_level_akun_user', 'id_level_akun_user');
    }
}
