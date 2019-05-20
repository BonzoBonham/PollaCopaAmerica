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
        return $this->belongsToMany('App\Partido')->withPivot('goles', 'ganador')->withTimestamps();
    }

    public function partidosFaseGrupos() {
        return $this->belongsToMany('App\Partido')->fase(1)->withPivot('goles', 'ganador');
    }
    public function partidosFaseGruposGanados() {
        return $this->belongsToMany('App\Partido')->fase(1)->wherePivot('ganador', 1);
    }
     public function partidosFaseGruposPerdidos() {
        return $this->belongsToMany('App\Partido')->fase(1)->wherePivot('ganador', 0);
    }
     public function partidosFaseGruposEmpatados() {
        return $this->belongsToMany('App\Partido')->fase(1)->wherePivot('ganador', 2);
    }

    public function scopeGrupo($query, $grupo){
        return $query->where('grupo', '=', $grupo);
    }
    public function scopeGanadores($query){
        return $query->where('ganador', '=', '1');
    }

}
