<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    protected $table = "roles";

    public function permissions()
    {
        return $this->hasMany('App\Models\Permission');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'user_role', 'role_id');
    }
}
