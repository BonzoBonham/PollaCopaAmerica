<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Equipo extends Model
{
    // El equipo tiene muchos usuarios
    public function users() {
        return $this->hasMany(User::class);
    }

    public function partidos() {
        return $this->belongsToMany('App\Partido')->withTimestamps();
    }
}
