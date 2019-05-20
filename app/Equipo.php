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
        return $this->belongsToMany('App\Partido')->withPivot('goles')->withTimestamps();
    }

    public function partidosDeFaseGrupos() {
        return $this->belongsToMany('App\Partido')->fase(1);
    }

    public function scopeGrupo($query, $grupo){
        return $query->where('grupo', '=', $grupo);
    }
    public function scopeGanadores($query){
        return $query->where('ganador', '=', '1');
    }

}
