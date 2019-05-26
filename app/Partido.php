<?php

namespace App;

use App\Events\PartidoTerminado;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{

    public function equipos() {
        return $this->belongsToMany('App\Equipo')->withPivot('goles', 'ganador')->withTimestamps();
    }

    public function scopeFase($query, $fase)
    {
        return $query->where('fase', '=', $fase);
    }
    public function scopeEliminatoria($query){
        return $query->where('fase', '>', '1');
    }
    public function scopeGanados($query){
        return $query->where('', '>', '1');
    }
    public function scopePerdidos($query){
        return $query->where('fase', '>', '1');
    }

}
