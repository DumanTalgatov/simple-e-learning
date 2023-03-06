<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    protected $table = "permissions";

    // public function users()
    // {
    //     return $this->hasMany('App\User');
    // }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
}
